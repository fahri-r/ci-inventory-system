<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $storeModel;

    public function __construct()
    {
        $this->storeModel = new Store();
    }

    public function index()
    {
        $stores = $this->storeModel->all();

        $data = [
            "title" => "Manage Stores",
            "stores" => $stores
        ];

        return view("stores.index", $data);
    }

    public function create()
    {
        $data = [
            "title" => "Add Store"
        ];

        return view("stores.create", $data);
    }
    
    public function store(StoreRequest $request)
    {
        $this->storeModel->name = $request->name;
        $this->storeModel->active = $request->active;

        if ($this->storeModel->save()) {
            return redirect()->route('stores.index')->with('success', 'Data added successfully');
        }

        return redirect()->route('stores.index')->with('fail', 'Data failed to add');
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $store = $this->storeModel->find($id);
        
        $data = [
            "title" => "Edit Store",
            "store" => $store
        ];

        return view("stores.edit", $data);
    }
    
    public function update(StoreRequest $request, $id)
    {
        $store = $this->storeModel->find($id);
        $store->name = $request->name;
        $store->active = $request->active;

        if ($store->save()) {
            return redirect()->route('stores.index')->with('success', 'Data updated successfully');
        }

        return redirect()->route('stores.index')->with('fail', 'Data failed to update');
    }
    
    public function destroy($id)
    {
        $store = $this->storeModel->find($id);

        if ($store->delete()) {
            return redirect()->route('stores.index')->with('success', 'Data deleted successfully');
        }

        return redirect()->route('stores.index')->with('fail', 'Data failed to delete');
    }
}
