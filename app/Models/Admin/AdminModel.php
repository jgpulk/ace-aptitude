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
}
