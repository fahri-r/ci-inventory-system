<?php

namespace App\Controllers;

class Orders extends BaseController
{
    public function index()
    {
        return view('orders/index');
    }

    public function create()
    {
        echo('create order');
    }
}
