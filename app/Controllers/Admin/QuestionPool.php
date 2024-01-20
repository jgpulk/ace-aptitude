<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Admin\AdminModel;

class QuestionPool extends BaseController
{
    protected $admin_model;

    public function __construct(){
        $this->admin_model = new AdminModel();
    }

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

    public function importQuestionValidator(){
        try {
            $rules = [
                'upload_file' => 'uploaded[upload_file]|mime_in[upload_file,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]|max_size[upload_file,10240]'
            ];
            if($this->validate($rules)){
                $response = ['status'=> true, 'message'=> 'Server side validation completed. Excel validation started'];
                $file = $this->request->getFile('upload_file');
                $newName = $file->getRandomName();
                $tempPath = ROOTPATH.'public/uploads/question_pool/';
                $file->move($tempPath, $newName);

                $spreadsheet = IOFactory::load($tempPath . $file->getName());
                $sheet = $spreadsheet->getActiveSheet();
                
                $excel_errors = [];
                foreach ($sheet->getRowIterator() as $key => $row) {
                    if($key>=2){
                        $cellIterator = $row->getCellIterator();
                        $cellIterator->setIterateOnlyExistingCells(false);
    
                        $rowData = [];
                        foreach ($cellIterator as $cell) {
                            $rowData[] = $cell->getValue();
                        }

                        if($key==2){
                            if(strcasecmp($rowData[2], 'section') != 0){
                                $excel_errors[] = 'Invalid column name at C2';
                            }
                            if(strcasecmp($rowData[3], 'sub section') != 0){
                                $excel_errors[] = 'Invalid column name at C3';
                            }
                            if(strcasecmp($rowData[4], 'question') != 0){
                                $excel_errors[] = 'Invalid column name at C4';
                            }
                            if(strcasecmp($rowData[5], 'option a') != 0){
                                $excel_errors[] = 'Invalid column name at C5';
                            }
                            if(strcasecmp($rowData[6], 'option b') != 0){
                                $excel_errors[] = 'Invalid column name at C6';
                            }
                            if(strcasecmp($rowData[7], 'option c') != 0){
                                $excel_errors[] = 'Invalid column name at C7';
                            }
                            if(strcasecmp($rowData[8], 'option d') != 0){
                                $excel_errors[] = 'Invalid column name at C8';
                            }
                            if(strcasecmp($rowData[9], 'option e') != 0){
                                $excel_errors[] = 'Invalid column name at C9';
                            }
                            if(strcasecmp($rowData[10], 'option f') != 0){
                                $excel_errors[] = 'Invalid column name at C10';
                            }   
                        }
                    }
                }
                if(count($excel_errors) > 0){
                    $response = ['status'=> false, 'message'=> 'Excel validation failed', 'excel_errors' => $excel_errors];
                } else{
                    $response = ['status'=> true, 'message'=> 'Excel validation success'];
                }
            } else{
                $response = ['status'=> false, 'message'=> 'Server side validation failed', 'errors' => $this->validation->getErrors()];
            }
            return $this->response->setJSON($response);
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
                $file = $this->request->getFile('upload_file');
                $newName = $file->getRandomName();
                $tempPath = ROOTPATH.'public/uploads/question_pool/';
                $file->move($tempPath, $newName);

                $spreadsheet = IOFactory::load($tempPath . $file->getName());
                $sheet = $spreadsheet->getActiveSheet();
                
                $questions = [];
                foreach ($sheet->getRowIterator() as $key => $row) {
                    if($key>=3){
                        $cellIterator = $row->getCellIterator();
                        $cellIterator->setIterateOnlyExistingCells(false);
    
                        $rowData = [];
                        foreach ($cellIterator as $cell) {
                            $rowData[] = $cell->getValue();
                        }
                        $questions[] = [
                            'section' => $rowData[2],
                            'sub_section' => $rowData[3],
                            'question' => $rowData[4],
                            'option_a' => $rowData[5],
                            'option_b' => $rowData[6],
                            'option_c' => $rowData[7],
                            'option_d' => $rowData[8],
                            'option_e' => $rowData[9],
                            'option_f' => $rowData[10],
                            'explanation' => $rowData[11],
                            'answer' => $rowData[12],
                            'difficulty' => $rowData[13]
                        ];
                    }
                }
                unlink($tempPath . $file->getName());
                $inserted_count = $this->admin_model->upload_questions($questions);
                if(count($questions) == $inserted_count){
                    $response = ['status'=> true, 'message'=> 'Upload completed'];
                } else{
                    $response = ['status'=> false, 'message'=> 'Not fully inserted'];
                }
            } else{
                $response = ['status'=> false, 'message'=> 'Server side validation failed', 'errors'=> $this->validation->getErrors()];
            }
            return $this->response->setJSON($response);
        } catch (\Throwable $th) {
            if(file_exists($tempPath . $file->getName())){
                unlink($tempPath . $file->getName());
            }
            throw $th;
        }
    }
}
