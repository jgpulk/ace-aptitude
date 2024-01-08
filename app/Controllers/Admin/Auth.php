<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        return view('admin/login');
    }

    public function login_submission(){
        try {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required',
            ];
            if($this->validate($rules)){
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                if($email == env("ADMIN_USERNAME") && $password == env("ADMIN_PASSWORD")){
                    echo "Admin account authorized";
                } else{
                    $this->session->setFlashdata('error_message', 'Invalid username/password');
                    return redirect()->to('admin/login');
                }
            } else{
                return view('admin/login', ['validation' => $this->validation, 'prev_data' => $this->request->getPost()]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
