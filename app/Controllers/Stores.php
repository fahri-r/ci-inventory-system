<?php

namespace App\Controllers;

use App\Models\StoresModel;

class Stores extends BaseController
{
    protected $storesModel;

    public function __construct()
    {
        $this->storesModel = new StoresModel();
    }

    public function new()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('stores/new', $data);
    }

    public function create()
    {
        if (!$this->validate($this->storesModel->getValidationRules())) {
            $validation = \Config\Services::validation();
            return redirect()->to('/stores/new')->withInput()->with('validation', $validation);
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'active' => $this->request->getVar('active')
        ];

        if ($this->storesModel->insert($data)) {
            $this->session->setFlashdata('success', 'Data added successfully');
        } else {
            $this->session->setFlashdata('fail', 'Data failed to add');
        };

        return redirect()->to('/stores');
    }

    public function index()
    {
        $stores = $this->storesModel->findAll();

        $data = [
            'stores' => $stores
        ];

        return view('stores/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'store' => $this->storesModel->find($id)
        ];

        return view('stores/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate($this->storesModel->getValidationRules())) {
            $validation = \Config\Services::validation();
            return redirect()->to('/stores/' . $id . '/edit')->withInput()->with('validation', $validation);
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'active' => $this->request->getVar('active')
        ];

        if ($this->storesModel->update($id, $data)) {
            $this->session->setFlashdata('success', 'Data updated successfully');
        } else {
            $this->session->setFlashdata('fail', 'Data failed to update');
        };

        return redirect()->to('/stores');
    }

    public function delete($id)
    {
        if ($this->storesModel->delete($id)) {
            $this->session->setFlashdata('success', 'Data deleted successfully');
        } else {
            $this->session->setFlashdata('fail', 'Data failed to delete');
        };

        return redirect()->to('/stores');
    }
}
