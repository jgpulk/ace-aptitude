<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

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
                'password' => 'required|min_length[6]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/]',
                're_password' => 'required|matches[password]',
            ];
            
            if($this->validate($rules)){
                $userModel = new UserModel();
                $user = array(
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'password' => md5($this->request->getPost('password'))
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

    public function login_submission(){
        try {
            $session = \Config\Services::session();
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required',
            ];
            if($this->validate($rules)){
                $userModel = new UserModel();
                $user = array(
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password')
                );
                $result = $userModel->loginUser($user);
                if($result['status']){
                    $userdata = [
                        'is_user_logged_in' => 1,
                        'userid' => $result['userid']
                    ];
                    $session->set($userdata);
                    return redirect()->to('user/account');
                } else{
                    $session->setFlashdata('error_message', $result['message']);
                    return redirect()->to('user/login');
                }
            } else{
                $data['validation_errors'] = $this->validator->getErrors();
                return view('login', $data);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function profile(){
        try {
            $isLoggedIn = session()->has('is_user_logged_in');
            if(isset($isLoggedIn) && $isLoggedIn){
                $userid = session()->get('userid');
                $userModel = new UserModel();
                $result = $userModel->getProfileData($userid);
                if($result['status']){
                    $data['profile'] = $result['user'];
                } else{
                    session()->setFlashdata('error_message', $result['message']);
                    return redirect()->to('user/login');
                }
                return view('profile', $data);
            } else{
                return redirect()->to('user/login');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update_profile(){
        try {
            $isLoggedIn = $this->session->has('is_user_logged_in');
            if(isset($isLoggedIn) && $isLoggedIn){
                $userid = $this->session->get('userid');
                $this->validation->setRules([
                    'name' => 'required|alpha_space',
                    'dob' => 'permit_empty|valid_date|not_future_date',
                    'gender' => 'permit_empty|alpha|in_list[male,female,other]'
                ],[
                    'dob' => [
                        'not_future_date' => 'The {field} must be a date not in the future.'
                    ]
                ]);
                if ($this->validation->withRequest($this->request)->run()) {
                    $validatedData = esc($this->validation->getValidated());
                    $result = $this->userModel->updateProfileData($userid, $validatedData);
                    if($result == true){
                        $this->session->setFlashdata('success_message', 'Profile updated successfully!');
                    } else{
                        $this->session->setFlashdata('error_message', 'Please try again. Some thing went wrong!');
                    }
                    return redirect()->to('user/account');
                } else{
                    // print_r($this->validation->getErrors());
                    $this->session->setFlashdata('error_message', 'Validation failed!');
                    return view('profile', ['validation' => $this->validation, 'prev_data' => $this->request->getPost()]);
                }
            } else{
                return redirect()->to('user/login');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function logout(){
        try {
            session()->destroy();
            return redirect()->to('user/login');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
