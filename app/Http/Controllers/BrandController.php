<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandModel;

    public function __construct()
    {
        $this->brandModel = new Brand();
    }
    
    public function index()
    {
        $brands = $this->brandModel->all();

        $data = [
            "title" => "Manage Brands",
            "brands" => $brands
        ];

        return view("brands.index", $data);
    }

    public function create()
    {
        $data = [
            "title" => "Add Brand"
        ];

        return view("brands.create", $data);
    }

    public function store(BrandRequest $request)
    {
        $this->brandModel->name = $request->name;
        $this->brandModel->active = $request->active;

        if ($this->brandModel->save()) {
            return redirect()->route('brands.index')->with('success', 'Data added successfully');
        }

        return redirect()->route('brands.index')->with('fail', 'Data failed to add');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $brand = $this->brandModel->find($id);
        
        $data = [
            "title" => "Edit Brand",
            "brand" => $brand
        ];

        return view("brands.edit", $data);
    }

    public function update(BrandRequest $request, $id)
    {
        $brand = $this->brandModel->find($id);
        $brand->name = $request->name;
        $brand->active = $request->active;

        if ($brand->save()) {
            return redirect()->route('brands.index')->with('success', 'Data updated successfully');
        }

        return redirect()->route('brands.index')->with('fail', 'Data failed to update');
    }

    public function destroy($id)
    {
        $brand = $this->brandModel->find($id);

        if ($brand->delete()) {
            return redirect()->route('brands.index')->with('success', 'Data deleted successfully');
        }

        return redirect()->route('brands.index')->with('fail', 'Data failed to delete');
    }
}
