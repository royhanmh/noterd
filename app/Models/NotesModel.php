<?php

namespace App\Models;

use CodeIgniter\Model;

class NotesModel extends Model
{
    protected $table = 'notes';
    protected $primaryKey = 'note_id';


    public function getNoteData()
    {
        return $this->select('notes.note_id, notes.title, notes.content, notes.created_at, users.username as created_by')
            ->join('users', 'users.user_id = notes.user_id')
            ->findAll();
    }
    public function insertNoteData($data)
    {
        $query = $this->db->table('notes')
            ->insert($data);
        return $query;
    }

    public function updateNoteData($data, $id)
    {
        $query = $this->db->table('notes')
            ->update($data, array('note_id' => $id));
        return $query;
    }

    public function deleteNoteData($id)
    {
        $query = $this->db->table('notes')
            ->delete(array('note_id' => $id));
        return $query;
    }

    public function getNotesByUserId($id)
    {
        return $this->select('note_id, title, content, created_at')
            ->where('user_id', $id)
            ->findAll();
    }
}
