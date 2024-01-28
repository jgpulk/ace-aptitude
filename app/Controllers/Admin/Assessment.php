<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Assessment extends BaseController
{
    public function index()
    {
        try {
            $isLoggedIn = session()->has('is_admin_logged_in');
            if(isset($isLoggedIn) && $isLoggedIn){
                $data['active_tab'] = 'assessment';
                return view('admin/generate_test_definition',$data);
            } else{
                return redirect()->to('admin/login');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}