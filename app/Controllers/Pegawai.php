<?php

namespace App\Controllers;

use App\Models\KotaModel;
use App\Models\PengajuanModel;
use DateTime;

class Pegawai extends BaseController
{
    protected $kotaModel;
    protected $pengajuanModel;

    public function __construct()
    {
        $this->kotaModel = new KotaModel();
        $this->pengajuanModel = new PengajuanModel();
    }

    public function index()
    {
        $data = [
            'username' => $this->username,
            'image' => $this->image,
            'getPengajuan' => $this->pengajuanModel->getPengajuan()
        ];

        return view('pegawai/getperdin', $data);
    }

    public function add()
    {
        $data = [
            'username' => $this->username,
            'image' => $this->image,
            'id_user' => $this->id_user,
            'getKota' => $this->kotaModel->getKota()
        ];
        return view('pegawai/addperdin', $data);
    }

    public function saveperdin()
    {
        if (!$this->validate([
            'asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota asal arus diisi.',
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota tujuan harus diisi.',
                ]
            ],
            'tglpergi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pulau harus diisi.',
                ]
            ],
            'tglpulang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu.',
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Latitude harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/pegawai/addperdin')->withInput()->with('validation', $validation);
        }

        // $hari = $this->request->getPost('hari');
        $tglpergi = $this->request->getPost('tglpergi');
        $tglpulang =  $this->request->getPost('tglpulang');
        $tgl1 = new DateTime($tglpergi);
        $tgl2 = new DateTime($tglpulang);
        $hari = $tgl2->diff($tgl1);

        $asal = $this->request->getPost('asal');
        $tujuan = $this->request->getPost('tujuan');

        $getAsal = $this->kotaModel->where('nama_kota', $asal)->first();
        $getTujuan = $this->kotaModel->where('nama_kota', $tujuan)->first();

        $latFrom = $getAsal['latitude'];
        $longFrom = $getAsal['longitude'];
        $latTo = $getTujuan['latitude'];
        $longTo = $getTujuan['longitude'];


        $jarak = $this->kotaModel->jarak($latFrom, $longFrom, $latTo, $longTo);

        if ($jarak >= 60) {
            if ($getTujuan['luar_negeri'] == "Ya") {
                // mendapatkan biaya 50USD/hari
                $total = 50 * $hari->days;
                $biaya = 50;
            } else {
                if ($getTujuan['pulau'] == $getAsal['pulau']) {
                    if ($getTujuan['provinsi'] == $getAsal['provinsi']) {
                        //mendapatkan 200rb/hari
                        $total = 200000 * $hari->days;
                        $biaya = 200000;
                    } else {
                        //mendapatkan 250rb/hari
                        $total = 250000 * $hari->days;
                        $biaya = 250000;
                    }
                } else {
                    //mendapatkan biaya 300rb/hari
                    $total = 300000 * $hari->days;
                    $biaya = 300000;
                }
            };
        } else {
            //tidak dapat biaya
            $total = 0 * $hari->days;
            $biaya = 0;
        }

        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'kota_asal' => $asal,
            'kota_tujuan' => $tujuan,
            'tanggal_pergi' => $this->request->getPost('tglpergi'),
            'tanggal_pulang' => $this->request->getPost('tglpulang'),
            'keterangan' => $this->request->getPost('keterangan'),
            'hari' => $hari->days,
            'jarak' => $jarak,
            'biaya' => $biaya,
            'total' => $total,
            'status' => "Waiting"
        ];
        // dd($data);

        $this->pengajuanModel->savePengajuan($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/pegawai/getperdin');
    }
}
