<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    protected $table            = 'pengajuan';
    protected $allowedFields    = ['id_pengajuan' . 'id_user' . 'kota_asal' . 'kota_tujuan' .
        'tanggal_pergi' . 'tanggal_pulang' . 'keterangan' . 'hari' . 'jarak' . 'biaya' . 'total' . 'status'];

    public function savePengajuan($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function approvePengajuan($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_pengajuan', $id);
        return $builder->update($data);
    }

    public function rejectPengajuan($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_pengajuan', $id);
        return $builder->update($data);
    }

    public function hapuPengajuan($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_pengajuan' => $id]);
    }

    public function getPengajuan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_pengajuan' => $id]);
        }
    }

    public function getPemohon()
    {
        $builder = $this->db->table('pengajuan')
            ->select('*')
            ->join('user', 'pengajuan.id_user=user.id_user')
            ->orderBy('user.username')
            ->get()->getResult();
        return $builder;
    }

    public function getNama($id)
    {
        $builder = $this->db->table('pengajuan')
            ->select('*')
            ->join('user', 'pengajuan.id_user=user.id_user')
            ->where('pengajuan.id_pengajuan', $id);
        $data = $builder->get()->getRow();
        return $data;
    }
}
