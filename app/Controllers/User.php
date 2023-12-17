<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

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
        try {
            $session = \Config\Services::session();
            $rules = [
                'name' => 'required|min_length[3]|max_length[255]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'phone' => 'required|min_length[10]|max_length[20]|is_unique[users.phone]',
                'password' => 'required|min_length[6]',
                're_password' => 'required|matches[password]',
            ];
            
            if($this->validate($rules)){
                $userModel = new UserModel();
                $user = array(
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'password' => $this->request->getPost('password')
                );
                $result = $userModel->registerUser($user);
                if($result){
                    $session->setFlashdata('success_message', 'Registration successful! You can now log in.');
                    return redirect()->to('user/login');
                } else{
                    $session->setFlashdata('error_message', 'Registration failed!');
                    return redirect()->to('user/register');
                }
            } else{
                $data['validation_errors'] = $this->validator->getErrors();
                return view('register', $data);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
