<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function register(){
        return view('register');
    }
}
