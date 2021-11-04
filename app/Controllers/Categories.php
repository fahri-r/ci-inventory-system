<?php

namespace App\Controllers;

use \App\Models\CategoriesModel;

class Categories extends BaseController
{
    protected $categoriesModel;

    public function __construct()
    {
        $this->categoriesModel = new CategoriesModel();
    }

    public function new()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('categories/new', $data);
    }

    public function create()
    {
        if (!$this->validate($this->categoriesModel->getValidationRules())) {
            $validation = \Config\Services::validation();
            return redirect()->to('/categories/new')->withInput()->with('validation', $validation);
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'active' => $this->request->getVar('active')
        ];

        if ($this->categoriesModel->insert($data)) {
            $this->session->setFlashdata('success', 'Data added successfully');
        } else {
            $this->session->setFlashdata('fail', 'Data failed to add');
        };

        return redirect()->to('/categories');
    }

    public function index()
    {
        $categories = $this->categoriesModel->findAll();

        $data = [
            'categories' => $categories
        ];

        return view('categories/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'category' => $this->categoriesModel->find($id)
        ];

        return view('categories/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate($this->categoriesModel->getValidationRules())) {
            $validation = \Config\Services::validation();
            return redirect()->to('/categories/' . $id . '/edit')->withInput()->with('validation', $validation);
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'active' => $this->request->getVar('active')
        ];

        if ($this->categoriesModel->update($id, $data)) {
            $this->session->setFlashdata('success', 'Data updated successfully');
        } else {
            $this->session->setFlashdata('fail', 'Data failed to update');
        };

        return redirect()->to('/categories');
    }

    public function delete($id)
    {
        if ($this->categoriesModel->delete($id)) {
            $this->session->setFlashdata('success', 'Data deleted successfully');
        } else {
            $this->session->setFlashdata('fail', 'Data failed to delete');
        };

        return redirect()->to('/categories');
    }
}
