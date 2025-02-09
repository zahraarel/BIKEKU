<?php

namespace App\Models;

use CodeIgniter\Model;

class Kendaraan_model extends Model
{
    protected $table = 'kendaraan';
    protected $primaryKey = 'id_kendaraan';
    protected $allowedFields = ['id_user', 'nama_kendaraan', 'jenis_kendaraan', 'tahun_kendaraan'];

    public function get_kendaraan_by_user($id_user)
    {
        return $this->where('id_user', $id_user)->findAll();
    }

    // Fungsi untuk menambah data kendaraan
    public function add_kendaraan($data)
    {
        return $this->insert($data);
    }

    // Fungsi untuk menghapus kendaraan berdasarkan ID
    public function delete_kendaraan($id)
    {
        return $this->delete($id);
    }

    public function update_kendaraan($id, $data)
    {
        return $this->update($id, $data);
    }
}
