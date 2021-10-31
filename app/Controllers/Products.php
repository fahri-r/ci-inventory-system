<?php

namespace App\Controllers;

class Products extends BaseController
{
    public function index()
    {
        return view('products/index');
    }

    public function create()
    {
        echo('create product');
    }
}
