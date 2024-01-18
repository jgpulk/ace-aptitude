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
    protected $allowedFields    = ['name', 'email', 'phone', 'password', 'dob', 'gender'];

    public function registerUser($data){
        $this->insert($data);
        return true;
    }

    public function loginUser($data){
        $user = $this->select('id, password')->where('email', $data['email'])->first();
        if(!$user){
            return ['status'=> false, 'message'=> 'No user found'];
        }
        if($user['password'] != md5($data['password'])){
            return ['status'=> false, 'message'=> 'Incorrect password/email'];
        }
        return ['status'=> true, 'userid'=> $user['id']];
    }

    public function getProfileData($userid){
        $user = $this->select('id, name, email, phone, dob, gender')->where('id', $userid)->first();
        if(!$user){
            return ['status'=> false, 'message'=> 'No user found'];
        }
        return ['status'=> true, 'user'=> $user];
    }

    public function updateProfileData($userid, $data){
        $this->set($data)
            ->where($this->primaryKey, $userid)
            ->update();
        return true;
    }

    public function getUserDetails($userid, $select){
        $user = $this->select($select)->where('id', $userid)->first();
        return $user;
    }

    public function getNavbardetails($userid){
        $user = $this->select('email, name')->where('id', $userid)->first();
        return $user;
    }

    public function updatePassword($userid, $data){
        $this->set($data)
            ->where($this->primaryKey, $userid)
            ->update();
        return true;
    }
}
