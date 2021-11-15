<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $productModel;
    protected $brandModel;
    protected $categoryModel;
    protected $storeModel;
    protected $attributeValueModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->brandModel = new Brand();
        $this->categoryModel = new Category();
        $this->storeModel = new Store();
        $this->attributeModel = new Attribute();
        $this->attributeValueModel = new AttributeValue();
    }

    public function index()
    {
        $products = $this->productModel->all();

        $data = [
            "title" => "Manage Products",
            "products" => $products
        ];

        return view("products.index", $data);
    }

    public function create()
    {
        $brands = $this->brandModel->all();
        $categories = $this->categoryModel->all();
        $stores = $this->storeModel->all();
        $attributes = $this->attributeModel->all();
        $attributeValues = $this->attributeValueModel->all();

        $data = [
            "title" => "Add Product",
            "brands" => $brands,
            "categories" => $categories,
            "stores" => $stores,
            "attributes" => $attributes,
            "attributeValues" => $attributeValues
        ];

        return view("products.create", $data);
    }

    public function store(ProductStoreRequest $request)
    {
        try {
            $this->productModel->name = $request->name;
            $this->productModel->sku = $request->sku;
            $this->productModel->price = $request->price;
            $this->productModel->qty = $request->qty;

            $path = $request->file('image')->store('uploads/images');
            $this->productModel->image = $path;

            $this->productModel->availability = $request->availability;

            $brand = $this->brandModel->find($request->brand);
            $this->productModel->brand()->associate($brand);

            $category = $this->categoryModel->find($request->category);
            $this->productModel->category()->associate($category);

            $store = $this->storeModel->find($request->store);
            $this->productModel->store()->associate($store);

            $this->productModel->save();

            $product = $this->productModel->find($this->productModel->id);
            $product->attributeValues()->attach($request->attributeValue);

            return redirect()->route('products.index')->with('success', 'Data added successfully');
        } catch (\Throwable $th) {
            return redirect()->route('products.index')->with('fail', 'Data failed to add');
            //throw $th;
        }
    }

    public function show($id)
    {
        $brands = $this->brandModel->all();
        $categories = $this->categoryModel->all();
        $stores = $this->storeModel->all();
        $attributes = $this->attributeModel->all();
        $attributeValues = $this->attributeValueModel->all();
        $product = $this->productModel->find($id);

        $data = [
            "title" => "Show Product",
            "product" => $product,
            "brands" => $brands,
            "categories" => $categories,
            "stores" => $stores,
            "attributes" => $attributes,
            "attributeValues" => $attributeValues
        ];

        return view("products.show", $data);
    }

    public function edit($id)
    {
        $brands = $this->brandModel->all();
        $categories = $this->categoryModel->all();
        $stores = $this->storeModel->all();
        $attributes = $this->attributeModel->all();
        $attributeValues = $this->attributeValueModel->all();
        $product = $this->productModel->find($id);

        $data = [
            "title" => "Edit Product",
            "product" => $product,
            "brands" => $brands,
            "categories" => $categories,
            "stores" => $stores,
            "attributes" => $attributes,
            "attributeValues" => $attributeValues
        ];

        return view("products.edit", $data);
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        try {
            $product = $this->productModel->find($id);
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->qty = $request->qty;
            $product->availability = $request->availability;

            if ($request->file('image')) {
                Storage::delete($product->image);
                $path = $request->file('image')->store('uploads/images');
                $product->image = $path;
            }

            $brand = $this->brandModel->find($request->brand);
            $product->brand()->associate($brand);

            $category = $this->categoryModel->find($request->category);
            $product->category()->associate($category);

            $store = $this->storeModel->find($request->store);
            $product->store()->associate($store);

            $product->save();

            $product->attributeValues()->detach();
            $product->attributeValues()->attach($request->attributeValue);

            return redirect()->route('products.index')->with('success', 'Data updated successfully');
        } catch (\Throwable $th) {
            return redirect()->route('products.index')->with('fail', 'Data failed to update');
            //throw $th;
        }
    }

    public function destroy($id)
    {
        $product = $this->productModel->find($id);
        Storage::delete($product->image);

        if ($product->delete()) {
            return redirect()->route('products.index')->with('success', 'Data deleted successfully');
        }

        return redirect()->route('products.index')->with('fail', 'Data failed to delete');
    }
}
