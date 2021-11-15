<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{
    protected $productModel;
    public $productId, $amount, $qty, $price, $stock;
    public $inputs = [];
    public $i = 0;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function render()
    {
        $products = $this->productModel->all();

        $data = [
            "products" => $products
        ];

        return view('livewire.cart', $data);
    }

    public function add()
    {
        $this->i++;
        array_push($this->inputs ,$this->i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function addQuantity($value)
    {
        if (!empty($this->productId[$value]))
        {
            $product = $this->productModel->find($this->productId[$value]);
            $this->amount[$value] = $product->price * $this->qty[$value];
        }
    }

    public function selectProduct($value)
    {
        $product = $this->productModel->find($this->productId[$value]);
        $this->price[$value] = $product->price;
        $this->stock[$value] = $product->qty;
    }
}
