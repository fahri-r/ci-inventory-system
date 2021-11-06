<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }
    
    public function index()
    {
        $categories = $this->categoryModel->all();

        $data = [
            "title" => "Manage Categories",
            "categories" => $categories
        ];

        return view("categories.index", $data);
    }
    
    public function create()
    {
        $data = [
            "title" => "Add Category"
        ];

        return view("categories.create", $data);
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryModel->name = $request->name;
        $this->categoryModel->active = $request->active;

        if ($this->categoryModel->save()) {
            return redirect()->route('categories.index')->with('success', 'Data added successfully');
        }

        return redirect()->route('categories.index')->with('fail', 'Data failed to add');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = $this->categoryModel->find($id);
        
        $data = [
            "title" => "Edit Category",
            "category" => $category
        ];

        return view("categories.edit", $data);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categoryModel->find($id);
        $category->name = $request->name;
        $category->active = $request->active;

        if ($category->save()) {
            return redirect()->route('categories.index')->with('success', 'Data updated successfully');
        }

        return redirect()->route('categories.index')->with('fail', 'Data failed to update');
    }

    public function destroy($id)
    {
        $category = $this->categoryModel->find($id);

        if ($category->delete()) {
            return redirect()->route('categories.index')->with('success', 'Data deleted successfully');
        }

        return redirect()->route('categories.index')->with('fail', 'Data failed to delete');
    }
}
