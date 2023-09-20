<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('hitung');
    }

    public function hitung()
    {
        $tahun = $this->request->getPost('tahun');

        if ($tahun % 4 == 0) {
            return "Kabisat";
        } else {
            return "Bukan Kabisat";
        }
    }
}
