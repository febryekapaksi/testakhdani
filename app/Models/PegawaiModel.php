<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'pegawai';
    protected $allowedFields    = ['id_pegawai' . 'nama_pegawai' . 'email_pegawai' .
        'notelp_pegawai' . 'image_pegawai' . 'id_user_pegawai'];

    public function savePegawai($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editPegawai($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_pegawai', $id);
        return $builder->update($data);
    }

    public function hapusPegawai($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_pegawai' => $id]);
    }

    public function getPegawai($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_pegawai' => $id]);
        }
    }
}
