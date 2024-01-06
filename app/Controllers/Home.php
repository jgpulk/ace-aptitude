<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index(): string
    {
        return view('welcome_message');
    }

    public function home(){
        $data = array();
        $isLoggedIn = session()->has('is_user_logged_in');
        if(isset($isLoggedIn) && $isLoggedIn){
            $userid = session()->get('userid');
            $data['navbar_data'] = $this->userModel->getNavbardetails($userid);
        }
        return view('home', $data);
    }
}
