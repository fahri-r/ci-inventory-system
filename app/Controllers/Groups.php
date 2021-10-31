<?php

namespace App\Controllers;

class Groups extends BaseController
{
    public function index()
    {
        return view('groups/index');
    }

    public function create()
    {
        return view('groups/create');
    }

    public function tes()
    {
        echo $_POST['gName'];
        for($i=0; $i< count($_POST['permission']); $i++) {
            echo $_POST['permission'][$i] ,'<br>';
        }
    }
}
