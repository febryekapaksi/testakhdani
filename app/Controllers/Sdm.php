<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Models\PengajuanModel;

class Sdm extends BaseController
{
    protected $pegawaiModel;
    protected $pengajuanModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
        $this->pengajuanModel = new PengajuanModel();
    }

    public function index()
    {
        $data = [
            'username' => $this->username,
            'image' => $this->image,
            'getPemohon' => $this->pengajuanModel->getPemohon()
        ];
        return view('sdm/getperdin', $data);
    }

    public function getpegawai()
    {
        $data = [
            'getPegawai' => $this->pegawaiModel->getPegawai(),
            'username' => $this->username,
            'image' => $this->image
        ];
        return view('sdm/getpegawai', $data);
    }

    public function approvalPerdin($id)
    {
        $data = [
            'image' => $this->image,
            'username' => $this->username,
            'approval' => $this->pengajuanModel->getPengajuan($id)->getRow(),
            'nama' => $this->pengajuanModel->getNama($id)
        ];
        // dd($data);

        return view('sdm/approval', $data);
    }

    public function approve($id)
    {
        $data = [
            'status' => "Approve"
        ];

        $this->pengajuanModel->approvePengajuan($data, $id);

        session()->setFlashdata('pesan', 'Pengajuan perjalanan dinas diterima');

        return redirect()->to('sdm/getperdin');
    }

    public function reject($id)
    {
        $data = [
            'status' => "Reject"
        ];

        $this->pengajuanModel->approvePengajuan($data, $id);

        session()->setFlashdata('pesan', 'Pengajuan perjalanan dinas ditolak');

        return redirect()->to('sdm/getperdin');
    }
}
