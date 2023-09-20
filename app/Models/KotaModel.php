<?php

namespace App\Models;

use CodeIgniter\Model;

class KotaModel extends Model
{
    protected $table            = 'kota';
    protected $allowedFields    = ['id_kota' . 'nama_kota' . 'provinsi' . 'pulau' .
        'luar_negeri' . 'latitude' . 'longitude'];

    public function saveKota($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editKota($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_kota', $id);
        return $builder->update($data);
    }

    public function hapusKota($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_kota' => $id]);
    }

    public function getKota($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_kota' => $id]);
        }
    }

    public function getDetail($nama_kota)
    {
        $builder = $this->db->table('kota')
            ->select('*')
            ->where('nama_kota', $nama_kota)
            ->get()->getResult();
        return $builder;
    }

    public function jarak($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
    {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
            pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);
        return $angle * $earthRadius;
    }
}
