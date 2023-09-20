<?php

namespace App\Models;

use CodeIgniter\Model;

class SdmModel extends Model
{
    protected $table            = 'sdm';
    protected $allowedFields    = ['id_sdm' . 'nama_sdm' . 'email_sdm' .
        'notelp_sdm' . 'image_sdm' . 'id_user_sdm'];

    public function saveSdm($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editSdm($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_sdm', $id);
        return $builder->update($data);
    }

    public function hapusSdm($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_sdm' => $id]);
    }
}
