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

    public function importQuestionsSubmission(){
        try {
            $rules = [
                'upload_file' => 'uploaded[upload_file]|mime_in[upload_file,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]|max_size[upload_file,10240]'
            ];
            if($this->validate($rules)){
                $response = ['status'=> true];
            } else{
                $response = ['status'=> false, 'message'=> 'Server side validation failed', 'errors'=> $this->validation->getErrors()];
            }
            return $this->response->setJSON($response);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
