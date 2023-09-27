<?php

namespace App\Controllers;

use App\Models\NotesModel;
use App\Models\UsersModel;

class User extends BaseController
{
    protected $NotesModel;
    protected $UsersModel;
    public function __construct()
    {
        $this->NotesModel = new NotesModel();
        $this->UsersModel = new UsersModel();
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function index()
    {

        $notes = $this->NotesModel->getNotesByUserId(session()->get('user_id'));
        $encrypter = \Config\Services::encrypter();
        $data = [
            'title' => 'Dashboard',
            'datas' => $notes,
            'encrypter' => $encrypter

        ];
        return view('user/dashboard', $data);
    }


    public function edit_profile()
    {
        $session = session();
        $model = new UsersModel();
        $id = $this->request->getPost('user_id');
        $current_password = $this->request->getPost('current_password');
        $password = $this->request->getPost('new_password');
        $conf_password = $this->request->getPost('confirm_new_password');
        $data = $model->where('user_id', $id)->first();
        $verify = password_verify($current_password, $data['password']);


        if ($password !== "" && $conf_password !== "" && $verify) {
            if ($password !== $conf_password) {
                $this->session->setFlashdata('failed', 'Password Mismatch');
                return redirect()->back();
            }
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $data = array(
                'username'     => $this->request->getPost('user_username'),
                'email'        => $this->request->getPost('user_email'),
                'password'     => $hashed_password,

            );
            $model->updateUserData($data, $id);
            $ses_data = [
                'email' => $data['email'],
                'username' => $data['username'],
            ];
            $session->set($ses_data);

            $this->session->setFlashdata('success', 'Update Profile Completed');
            print_r($data);
        }

        $data = array(
            'username'     => $this->request->getPost('user_username'),
            'email'        => $this->request->getPost('user_email'),

        );
        $model->updateUserData($data, $id);

        $ses_data = [
            'email' => $data['email'],
            'username' => $data['username'],
        ];
        $session->set($ses_data);

        $this->session->setFlashdata('success', 'Update Profile Completed');
        return redirect()->back();
    }

    public function insert_note()
    {
        $model = new NotesModel();
        $uuid = uniqid();
        $data = array(
            'note_id'  => $uuid,
            'user_id' => session()->get('user_id'),
            'title'  => $this->request->getPost('title'),
            'content'     => $this->request->getPost('content')
        );

        $model->insertNoteData($data);
        $this->session->setFlashdata('success', 'Note Succesfully Created');
        return redirect()->back();
    }

    public function update_note()
    {
        $model = new NotesModel();
        $id = $this->request->getPost('edit_note_id');
        $data = $model->find($id);
        if ($data['user_id'] == session()->get('user_id')) {
            $data = array(
                'title'     => $this->request->getPost('edit_title'),
                'content'        => $this->request->getPost('edit_content')
            );
            $model->updateNoteData($data, $id);
            $this->session->setFlashdata('success', 'Note Updated');
            return redirect()->back();
        }
        $this->session->setFlashdata('failed', 'Note Update Failed');
        return redirect()->back();
    }

    public function delete_note($id)
    {
        $model = new NotesModel();
        $data = $model->find($id);
        if ($data) {
            if ($data['user_id'] == session()->get('user_id')) {

                $model->deleteNoteData($id);
                $this->session->setFlashdata('success', 'Note Deleted');
                return redirect()->back();
            }
        }
        $this->session->setFlashdata('failed', 'Delete Failed');
        return redirect()->back();
    }
}
