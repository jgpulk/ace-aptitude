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

    public function register_submission(){
        $rules = [
            'name' => ['rules' => 'required|min_length[3]|max_length[255]'],
            'email' => ['rules' => 'required|valid_email|is_unique[user.email]'],
            'phone' => ['rules' => 'required|min_length[10]|max_length[20]'],
            'password' => ['rules' => 'required|min_length[6]'],
            're_password' => ['rules' => 'required|matches[password]'],
        ];
        
        if($this->validate($rules)){
            echo "Validation success";
        } else{
            echo "Validaton dailed";
            echo "<pre>";
            print_r($this->validator->getErrors());
            echo "</pre>";
        }
    }
}
