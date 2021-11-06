<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    protected $attributeModel;

    public function __construct()
    {
        $this->attributeModel = new Attribute();
    }

    public function index()
    {
        $attributes = $this->attributeModel->all();

        $data = [
            "title" => "Manage Attributes",
            "attributes" => $attributes
        ];

        return view("attributes.index", $data);
    }

    public function create()
    {
        $data = [
            "title" => "Add Attribute"
        ];

        return view("attributes.create", $data);
    }

    public function store(AttributeRequest $request)
    {
        $this->attributeModel->name = $request->name;
        $this->attributeModel->active = $request->active;

        if ($this->attributeModel->save()) {
            return redirect()->route('attributes.index')->with('success', 'Data added successfully');
        }

        return redirect()->route('attributes.index')->with('fail', 'Data failed to add');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $attribute = $this->attributeModel->find($id);

        $data = [
            "title" => "Edit Attribute",
            "attribute" => $attribute
        ];

        return view("attributes.edit", $data);
    }

    public function update(AttributeRequest $request, $id)
    {
        $attribute = $this->attributeModel->find($id);
        $attribute->name = $request->name;
        $attribute->active = $request->active;

        if ($attribute->save()) {
            return redirect()->route('attributes.index')->with('success', 'Data updated successfully');
        }

        return redirect()->route('attributes.index')->with('fail', 'Data failed to update');
    }

    public function destroy($id)
    {
        $attribute = $this->attributeModel->find($id);

        if ($attribute->delete()) {
            return redirect()->route('attributes.index')->with('success', 'Data deleted successfully');
        }

        return redirect()->route('attributes.index')->with('fail', 'Data failed to delete');
    }
}
