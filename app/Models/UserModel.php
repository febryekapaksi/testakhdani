<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $allowedFields    = ['id_user' . 'username' . 'email' . 'password' .
        'image' . 'notelp' . 'role_id' . 'is_active' . 'creted_at'];

    public function saveUser($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editUser($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_user', $id);
        return $builder->update($data);
    }

    public function hapusUser($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_user' => $id]);
    }

    public function getRolename()
    {
        $builder = $this->db->table('role')
            ->select('*')->get()->getResult();
        return $builder;
    }

    public function getIduser()
    {
        $builder = $this->db->table('user')
            ->select('id_user')
            ->orderBy('id_user', 'DESC')
            ->limit(1)
            ->get()->getRow();
        return $builder;
    }

    public function getUserAll($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_user' => $id]);
        }
    }

    public function getRole()
    {
        $builder = $this->db->table('user')
            ->select('*')
            ->join('role', 'user.id_role_user=role.id_role')
            ->orderBy('role.role_name')
            ->get()->getResult();
        return $builder;
    }
}
