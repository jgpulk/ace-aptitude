<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'phone', 'password'];

    public function registerUser($data){
        $this->insert($data);
        return true;
    }

    public function loginUser($data){
        $user = $this->select('id, password')->where('email', $data['email'])->first();
        if(!$user){
            return ['status'=> false, 'message'=> 'No user found'];
        }
        if($user['password'] != $data['password']){
            return ['status'=> false, 'message'=> 'Incorrect password/email'];
        }
        return ['status'=> true];
    }
}
