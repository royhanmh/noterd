<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';


    public function getUserData()
    {
        $query = $this->db->table('users');
        $query->select('user_id, username, email, role, created_at');
        return $query->get()->getResult(); // Use getResult() to get the result as an array
    }
    public function insertUserData($data)
    {
        $query = $this->db->table('users')
            ->insert($data);
        return $query;
    }

    public function updateUserData($data, $id)
    {
        $query = $this->db->table('users')
            ->update($data, array('user_id' => $id));
        return $query;
    }

    public function deleteUserData($id)
    {
        $query = $this->db->table('users')
            ->delete(array('user_id' => $id));
        return $query;
    }
}
