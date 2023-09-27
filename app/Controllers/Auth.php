<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\UsersModel;

class Auth extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('login');
    }

    public function login()
    {
        $session = session();
        $model = new AuthModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_password = password_verify($password, $pass);
            if ($verify_password) {
                $ses_data = [
                    'user_id' => $data['user_id'],
                    'email' => $data['email'],
                    'username' => $data['username'],
                    'role' => $data['role']
                ];
                $session->set($ses_data);
                if ($ses_data['role'] == 0) {
                    return redirect()->to('admin/dashboard');
                } else {
                    return redirect()->to('user');
                }
            } else {
                $session->setFlashdata('failed', 'Username or Password Incorrect');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('failed', 'Username or Password Incorrect');
            return redirect()->back();
        }
    }
    public function logout()
    {
        $session = session();
        unset(
            $_SESSION['username'],
            $_SESSION['role']
        );
        $session->setFlashdata('success', 'Logout Success');
        return redirect()->to('/auth');
    }

    public function register()
    {
        $session = session();
        $model = new UsersModel();
        $password = $this->request->getPost('password');
        $conf_password = $this->request->getPost('conf_password');
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');

        $data = $model->where('username', $username)
            ->orWhere('email', $email)
            ->first();

        $form = [
            'username' => $username,
            'email' => $email
        ];

        if ($password !== $conf_password) {
            $session->setFlashdata('failed', 'Password Mismatch');
            $session->setFlashdata('formData', $form);
            return redirect()->back();
        }
        if ($data) {
            $session->setFlashdata('failed', 'Username or Email Unavailable');
            $session->setFlashdata('formData', $form);
            return redirect()->back();
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $data = array(
            'username'  => $this->request->getPost('username'),
            'email'     => $this->request->getPost('email'),
            'password'  => $hashed_password,
            'role'      => 1
        );

        $model->insertUserData($data);
        $session->setFlashdata('success', 'Register Completed');
        return redirect()->back();
    }
}
