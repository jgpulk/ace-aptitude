<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class QuestionPool extends BaseController
{
    public function index(){
        try {
            $isLoggedIn = session()->has('is_admin_logged_in');
            if(isset($isLoggedIn) && $isLoggedIn){
                $data['active_tab'] = 'import_qstn';
                return view('admin/import_question',$data);
            } else{
                return redirect()->to('admin/login');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
