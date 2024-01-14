<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\IOFactory;

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
                $file = $this->request->getFile('upload_file');
                $newName = $file->getRandomName();
                $tempPath = ROOTPATH.'public/uploads/question_pool/';
                $file->move($tempPath, $newName);

                $spreadsheet = IOFactory::load($tempPath . $file->getName());
                $sheet = $spreadsheet->getActiveSheet();

                $data = [];
                foreach ($sheet->getRowIterator() as $key => $row) {
                    if($key>=3){
                        $cellIterator = $row->getCellIterator();
                        $cellIterator->setIterateOnlyExistingCells(false);
    
                        $rowData = [];
                        foreach ($cellIterator as $cell) {
                            $rowData[] = $cell->getValue();
                        }
                        $data[] = [
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
                $response = ['status'=> true, 'spreadsheet_data' =>  $data];
            } else{
                $response = ['status'=> false, 'message'=> 'Server side validation failed', 'errors'=> $this->validation->getErrors()];
            }
            return $this->response->setJSON($response);
        } catch (\Throwable $th) {
            unlink($tempPath . $file->getName());
            throw $th;
        }
    }
}
