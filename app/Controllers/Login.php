<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/login', $data);
        helper('form');
    }

    public function login()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'E-mail harus diisi.',
                    'valid_email' => 'E-mail tidak Valid'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password terlalu pendek.'
                ]
            ],
            'captcha_conf' => [
                'rules' => 'required|matches[captcha]',
                'errors' => [
                    'required' => 'Captcha harus diisi.',
                    'matches' => 'Captcha tidak sesuai.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Tidak bisa Login');
            return redirect()->to('login')->withInput()->with('validation', $validation);
        }
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $this->userModel->where('email', $email)->first();
        if ($user) {
            if ($user['is_active'] == 1) {
                $pass = $user['password'];
                // dd(password_hash($password, PASSWORD_DEFAULT));
                $verify_pass = password_verify($password, $pass);
                if ($verify_pass) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'email' => $user['email'],
                        'username' => $user['username'],
                        'image' => $user['image'],
                        'notelp' => $user['notelp'],
                        'id_role_user' => $user['id_role_user'],
                        'password' => $user['password'],
                        'created_at' => $user['created_at'],
                        'logged_in' => true,
                    ];

                    session()->set($data);
                    // dd($data);

                    if ($user['id_role_user'] == '1') {
                        return redirect()->to('/');
                    } else if ($user['id_role_user'] == '2') {
                        return redirect()->to('sdm/getperdin');
                    } else if ($user['id_role_user'] == '3') {
                        return redirect()->to('pegawai/getperdin');
                    } else {
                        session()->setFlashdata('gagal', 'Email Tidak Ditemukan');
                        return redirect()->to('/login');
                    }
                } else {
                    session()->setFlashdata('gagal', 'Password Salah');
                    return redirect()->to('/login');
                }
            } else {
                session()->setFlashdata('gagal', 'Data belum diverifikasi');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('gagal', 'Email Tidak Ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
