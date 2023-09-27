<?php

namespace App\Controllers;


use App\Models\NotesModel;
use App\Models\UsersModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


date_default_timezone_set('Asia/Jakarta');
class Admin extends BaseController
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
    public function dashboard()
    {
        $notes = $this->NotesModel->findAll();
        $users = $this->UsersModel->findAll();

        $data = [
            'title' => 'Dashboard | CI4',
            'page' => 'dashboard',
            'users' => count($users),
            'notes' => count($notes),
        ];
        return view('admin/dashboard', $data);
    }

    public function users_data()
    {
        $users = $this->UsersModel->getUserData();
        $encrypter = \Config\Services::encrypter();

        $data = [
            'title' => 'Users Data | CI4',
            'page' => 'users_data',
            'datas' => $users,
            'encrypter' => $encrypter

        ];
        return view('admin/users_data', $data);
    }
    public function insert_user()
    {
        $model = new UsersModel();
        $password = $this->request->getPost('password');
        $conf_password = $this->request->getPost('conf_password');

        if ($password !== $conf_password) {
            $this->session->setFlashdata('failed', 'Data Added Succesfully');
            return redirect()->back();
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $data = array(
            'username'  => $this->request->getPost('username'),
            'email'     => $this->request->getPost('email'),
            'password'  => $hashed_password,
            'role'      => $this->request->getPost('role'),
        );

        $model->insertUserData($data);
        $this->session->setFlashdata('success', 'Data Added Succesfully');
        return redirect()->back();
    }

    public function update_user()
    {
        $model = new UsersModel();
        $id = $this->request->getPost('user_id');
        $password = $this->request->getPost('edit_password');
        $conf_password = $this->request->getPost('edit_conf_password');
        $data = $model->find($id);
        if ($password !== "" && $conf_password !== "") {
            if ($password !== $conf_password) {
                $this->session->setFlashdata('failed', 'Data Update Failed');
                return redirect()->back();
            }
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $data = array(
                'username'     => $this->request->getPost('user_username'),
                'email'        => $this->request->getPost('user_email'),
                'password'     => $hashed_password,
                'role'         => $this->request->getPost('user_role'),

            );
            $model->updateUserData($data, $id);
            $this->session->setFlashdata('success', 'Data Update Completed');
            return redirect()->back();
        }

        $data = array(
            'username'     => $this->request->getPost('user_username'),
            'email'        => $this->request->getPost('user_email'),
            'role'         => $this->request->getPost('user_role'),

        );
        $model->updateUserData($data, $id);
        $this->session->setFlashdata('success', 'Data Update Completed');
        return redirect()->back();
    }

    public function delete_user($id)
    {
        $model = new UsersModel();
        $data = $model->find($id);
        $model->deleteUserData($id);
        $this->session->setFlashdata('success', 'Data Delete Completed');
        return redirect()->back();
    }


    public function notes_data()
    {
        $notes = $this->NotesModel->getNoteData();
        $encrypter = \Config\Services::encrypter();

        $data = [
            'title' => 'Notes Data | CI4',
            'page' => 'notes_data',
            'datas' => $notes,
            'encrypter' => $encrypter

        ];

        return view('admin/notes_data', $data);
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
        $this->session->setFlashdata('success', 'Data Succesfully Added');
        return redirect()->back();
    }

    public function update_note()
    {
        $model = new NotesModel();
        $id = $this->request->getPost('edit_note_id');
        $data = $model->find($id);

        $data = array(
            'title'     => $this->request->getPost('edit_title'),
            'content'        => $this->request->getPost('edit_content')
        );
        $model->updateNoteData($data, $id);
        $this->session->setFlashdata('success', 'Data Updated Succesfully');
        return redirect()->back();
    }

    public function delete_note($id)
    {
        $model = new NotesModel();
        $data = $model->find($id);
        if ($data) {
            $model->deleteNoteData($id);
            $this->session->setFlashdata('success', 'Data Deleted Succesfully');
            return redirect()->back();
        }
        $this->session->setFlashdata('failed', 'Data Not Exist');
        return redirect()->back();
    }
}
