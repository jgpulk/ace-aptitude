<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AdminModel;

class Assessment extends BaseController
{
    protected $admin_model;

    public function __construct(){
        $this->admin_model = new AdminModel();
    }

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

    public function createTestDefinition(){
        try {
            $postData = json_decode(file_get_contents('php://input'),true);
            $data = array(
                'name' => $postData['definition']['name'],
                'definition' => json_encode($postData['definition'])
            );
            $result = $this->admin_model->add_test_definition($data);
            if($result){
                $response = ['status'=> true, 'message'=> 'Test definition added. You can create assessments now'];
            } else{
                $response = ['status'=> false, 'message'=> 'Test definition creation failed. Please try again'];
            }
            return $this->response->setJSON($response);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}