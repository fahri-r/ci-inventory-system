<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeValueRequest;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    protected $attributeValueModel;
    protected $attributeModel;

    public function __construct()
    {
        $this->attributeValueModel = new AttributeValue();
        $this->attributeModel = new Attribute();
    }

    public function index($attributeId)
    {
        $attribute = $this->attributeModel->find($attributeId);
        $attributeValues = $attribute->attributeValues;

        $data = [
            "title" => "Manage " . $attribute->name . " Values",
            "attributeId" => $attributeId,
            "attributeValues" => $attributeValues
        ];

        return view("attributes.values.index", $data);
    }

    public function create($attributeId)
    {
        $data = [
            "title" => "Add Value",
            "attributeId" => $attributeId,
        ];

        return view("attributes.values.create", $data);
    }

    public function store($attributeId, AttributeValueRequest $request)
    {
        $attribute = $this->attributeModel->find($attributeId);
        $this->attributeValueModel->name = $request->name;
        $attribute->attributeValues()->save($this->attributeValueModel);

        if ($this->attributeValueModel->save()) {
            return redirect()->route('attributes.values.index', ['attribute' => $attributeId])->with('success', 'Data added successfully');
        }

        return redirect()->route('attributes.values.index', ['attribute' => $attributeId])->with('fail', 'Data failed to add');
    }

    public function show($id)
    {
        //
    }

    public function edit($attributeId, $id)
    {
        $value = $this->attributeValueModel->find($id);

        $data = [
            "title" => "Edit Value",
            "attributeId" => $attributeId,
            "value" => $value,
        ];

        return view("attributes.values.edit", $data);
    }

    public function update($attributeId, AttributeValueRequest $request, $id)
    {
        $attributeValue = $this->attributeValueModel->find($id);
        $attributeValue->name = $request->name;

        if ($attributeValue->save()) {
            return redirect()->route('attributes.values.index', ['attribute' => $attributeId])->with('success', 'Data updated successfully');
        }

        return redirect()->route('attributes.values.index', ['attribute' => $attributeId])->with('fail', 'Data failed to update');
    }

    public function destroy($attributeId, $id)
    {
        $attributeValue = $this->attributeValueModel->find($id);

        if ($attributeValue->delete()) {
            return redirect()->route('attributes.values.index', ['attribute' => $attributeId])->with('success', 'Data deleted successfully');
        }

        return redirect()->route('attributes.values.index', ['attribute' => $attributeId])->with('fail', 'Data failed to delete');
    }
}
