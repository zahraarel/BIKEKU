<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwalperawatan';  // Nama tabel di database
    protected $primaryKey = 'id_perawatan'; // Primary key tabel
    protected $allowedFields = ['id_user', 'id_kendaraan', 'tanggal', 'id_layanan', 'is_email_sent']; // Disesuaikan dengan penggunaan id_layanan

    // Fungsi untuk mendapatkan data layanan dari tabel menu
    public function getLayanan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('menu');
        return $builder->get()->getResultArray(); // Mengambil semua data dari tabel menu
    }

    // Fungsi untuk mendapatkan nama layanan berdasarkan id_layanan
    public function getNamaLayanan($id_layanan)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('menu');
        $builder->select('nama_layanan, hari'); // Tambahkan atribut 'hari'
        $builder->where('id_layanan', $id_layanan);
        return $builder->get()->getRowArray(); // Mengambil data nama_layanan dan hari berdasarkan id_layanan
    }

    public function getLayananByJenisKendaraan($jenis_kendaraan)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('menu');
        $builder->where('jenis_kendaraan', $jenis_kendaraan);
        return $builder->get()->getResultArray();
    }
    // Fungsi untuk mendapatkan semua data jadwal, termasuk informasi nama kendaraan dan layanan
    public function getJadwalWithDetails($id_user)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('jadwalperawatan.*, kendaraan.nama_kendaraan, menu.nama_layanan');
        $builder->join('kendaraan', 'kendaraan.id_kendaraan = jadwalperawatan.id_kendaraan', 'left');
        $builder->join('menu', 'menu.id_layanan = jadwalperawatan.id_layanan', 'left');
        $builder->where('jadwalperawatan.id_user', $id_user);
        return $builder->get()->getResultArray();
    }
}
