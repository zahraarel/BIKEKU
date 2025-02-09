<?php

namespace App\Models;
use CodeIgniter\Model;

class BengkelModel extends Model {
    protected $table = 'bengkel';
    protected $primaryKey = 'id_bengkel';
    protected $allowedFields = ['nama_bengkel', 'alamat_bengkel', 'latitude', 'longitude', 'kontak', 'deskripsi'];

    // Fungsi untuk menambah data bengkel
    public function tambah_bengkel($data) {
        return $this->insert($data);
    }

    // Fungsi untuk mengambil semua data bengkel
    public function get_all_bengkel() {
        return $this->findAll();
    }

    // Fungsi untuk menghapus bengkel berdasarkan ID
    public function hapus_bengkel($id) {
        return $this->delete($id);
    }

    // Fungsi untuk memperbarui data bengkel
    public function update_bengkel($id, $data) {
        return $this->update($id, $data);
    }
}
