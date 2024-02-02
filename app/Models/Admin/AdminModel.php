<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function upload_questions($questions){
        $chunks = array_chunk($questions,100);
        $inserted_count = 0;
        foreach ($chunks as $key => $chunk) {
            $this->db->table('question_pool')
                ->insertBatch($chunk);
            $inserted_count+=$this->db->affectedRows();
        }
        return $inserted_count;
    }

    public function add_test_definition($definition){
        $this->db->table('test_definition')
                ->insert($definition);
        if($this->db->affectedRows()==1){
            return true;
        } else{
            return false;
        }
    }
}
