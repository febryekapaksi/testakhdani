<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PegawaiModel;
use App\Models\KotaModel;
use App\Models\SdmModel;

class Admin extends BaseController
{
    protected $userModel;
    protected $pegawaiModel;
    protected $sdmModel;
    protected $kotaModel;

    public function __construct()
    {
        $this->userModel = new userModel();
        $this->pegawaiModel = new pegawaiModel();
        $this->sdmModel = new SdmModel();
        $this->kotaModel = new KotaModel();
    }

    public function index()
    {
        //
    }

    public function getkota()
    {
        $data = [
            'getKota' => $this->kotaModel->getKota(),
            'username' => $this->username,
            'image' => $this->image
        ];
        return view('admin/getkota', $data);
    }

    public function addkota()
    {
        $data = [
            'getKota' => $this->kotaModel->getKota(),
            'username' => $this->username,
            'image' => $this->image
        ];

        return view('admin/addkota', $data);
    }

    public function savekota()
    {
        if (!$this->validate([
            'nama_kota' => [
                'rules' => 'required|is_unique[kota.nama_kota]',
                'errors' => [
                    'required' => 'Nama Kota harus diisi.',
                    'is_unique' => 'Nomor sudah terdaftar.'
                ]
            ],
            'provinsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Provinsi harus diisi.',
                ]
            ],
            'pulau' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pulau harus diisi.',
                ]
            ],
            'luar_negeri' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu.',
                ]
            ],
            'latitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Latitude harus diisi.',
                ]
            ],
            'longitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Longitude harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/admin/addkota')->withInput()->with('validation', $validation);
        }
        $data = [
            'nama_kota' => $this->request->getPost('nama_kota'),
            'provinsi' => $this->request->getPost('provinsi'),
            'pulau' => $this->request->getPost('pulau'),
            'luar_negeri' => $this->request->getPost('luar_negeri'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
        ];

        $this->kotaModel->saveKota($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/admin/getkota');
    }

    public function getuser()
    {
        $data = [
            'getUser' => $this->userModel->getUserAll(),
            'getRole' => $this->userModel->getRole(),
            'getKota' => $this->kotaModel->getKota(),
            'username' => $this->username,
            'image' => $this->image
        ];
        return view('admin/getuser', $data);
    }

    public function adduser()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'getRolename' => $this->userModel->getRolename(),
            'getKota' => $this->kotaModel->getKota(),
            'username' => $this->username,
            'image' => $this->image
        ];
        return view('admin/adduser', $data);
    }

    public function saveuser()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi.'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]|valid_email',
                'errors' => [
                    'required' => 'E-mail harus diisi.',
                    'is_unique' => 'E-mail sudah terdaftar.',
                    'valid_email' => 'E-mail tidak Valid'
                ]
            ],
            'notelp' => [
                'rules' => 'required|max_length[13]|is_natural|is_unique[user.notelp]',
                'errors' => [
                    'required' => 'Tidak boleh kosong.',
                    'is_natural' => 'Nomor Telepon tidak Valid',
                    'max_length' => 'Nomor Telepon tidak Valid.',
                    'is_unique' => 'Nomor sudah terdaftar.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|matches[password_conf]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password terlalu pendek.',
                    'matches' => 'Password tidak sesuai'
                ]
            ],
            'password_conf' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tidak boleh kosong.'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/admin/adduser')->withInput()->with('validation', $validation);
        }
        // $option = ['cost' => 10];
        $password = $this->request->getPost('password');
        $passwordx = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'image' => 'avatar-1.png',
            'password' => $passwordx,
            'notelp' => $this->request->getPost('notelp'),
            'id_role_user' => $this->request->getPost('role'),
            'is_active' => 1
        ];

        $akses = $this->request->getPost('role');

        if ($akses == 3) {
            $this->userModel->saveUser($data);
            $getId = $this->userModel->getIduser();
            $pegawaidata = [
                'nama_pegawai' => $this->request->getPost('username'),
                'email_pegawai' => $this->request->getPost('email'),
                'image_pegawai' => 'avatar-5.png',
                'notelp_pegawai' => $this->request->getPost('notelp'),
                'id_user_pegawai' => $getId->id_user
            ];
            $this->pegawaiModel->savePegawai($pegawaidata);
        } elseif ($akses == 2) {
            $this->userModel->saveUser($data);
            $getId = $this->userModel->getIduser();
            $sdmdata = [
                'nama_sdm' => $this->request->getPost('username'),
                'email_sdm' => $this->request->getPost('email'),
                'image_sdm' => 'avatar-2.png',
                'notelp_sdm' => $this->request->getPost('notelp'),
                'id_user_sdm' => $getId->id_user
            ];
            $this->sdmModel->saveSdm($sdmdata);
        } else {
            $this->userModel->saveUser($data);
        }

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/admin/getuser');
    }
}
