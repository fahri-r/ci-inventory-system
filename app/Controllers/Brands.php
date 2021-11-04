<?php

namespace App\Controllers;

use \App\Models\BrandsModel;

class Brands extends BaseController
{
    protected $brandsModel;

    public function __construct()
    {
        $this->brandsModel = new BrandsModel();
    }

    public function new()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('brands/new', $data);
    }

    public function create()
    {
        if (!$this->validate($this->brandsModel->getValidationRules())) {
            $validation = \Config\Services::validation();
            return redirect()->to('/brands/new')->withInput()->with('validation', $validation);
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'active' => $this->request->getVar('active')
        ];

        if ($this->brandsModel->insert($data)) {
            $this->session->setFlashdata('success', 'Data added successfully');
        } else {
            $this->session->setFlashdata('fail', 'Data failed to add');
        };

        return redirect()->to('/brands');
    }

    public function index()
    {
        $brands = $this->brandsModel->findAll();

        $data = [
            'brands' => $brands
        ];

        return view('brands/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'brand' => $this->brandsModel->find($id)
        ];

        return view('brands/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate($this->brandsModel->getValidationRules())) {
            $validation = \Config\Services::validation();
            return redirect()->to('/brands/' . $id . '/edit')->withInput()->with('validation', $validation);
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'active' => $this->request->getVar('active')
        ];

        if ($this->brandsModel->update($id, $data)) {
            $this->session->setFlashdata('success', 'Data updated successfully');
        } else {
            $this->session->setFlashdata('fail', 'Data failed to update');
        };

        return redirect()->to('/brands');
    }

    public function delete($id)
    {
        if ($this->brandsModel->delete($id)) {
            $this->session->setFlashdata('success', 'Data deleted successfully');
        } else {
            $this->session->setFlashdata('fail', 'Data failed to delete');
        };

        return redirect()->to('/brands');
    }
}
