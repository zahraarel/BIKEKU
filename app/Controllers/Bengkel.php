<?php

namespace App\Controllers;
use App\Models\BengkelModel;

class Bengkel extends BaseController {

    protected $bengkelModel;

    public function __construct() {
        $this->bengkelModel = new BengkelModel();
    }

    // Menampilkan semua data bengkel
    public function index() {
        $data['bengkel'] = $this->bengkelModel->get_all_bengkel();
        echo view('menu/bengkel', $data);
        echo view('menu/footer');
    }

    // Fungsi untuk menambah bengkel
    public function tambah() {
        // Ambil data dari form
        $data = [
            'nama_bengkel' => $this->request->getPost('nama_bengkel'),
            'alamat_bengkel' => $this->request->getPost('alamat_bengkel'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'kontak' => $this->request->getPost('kontak'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];

        // Simpan data bengkel ke database
        if ($this->bengkelModel->tambah_bengkel($data)){
        session()->setFlashdata('message', 'Bengkel berhasil ditambahkan');
        }
        else {
            session()->setFlashdata('error', 'Bengkel gagal ditambahkan');
        }
        return redirect()->to('/bengkel');
    }

    // Fungsi untuk mengedit bengkel
    public function edit($id) {
        // Ambil data bengkel berdasarkan ID
        $data['bengkel'] = $this->bengkelModel->find($id);
        return view('bengkel/edit', $data);
    }

    // Fungsi untuk memperbarui data bengkel
    public function update($id) {
        $data = [
            'nama_bengkel' => $this->request->getPost('nama_bengkel'),
            'alamat_bengkel' => $this->request->getPost('alamat_bengkel'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'kontak' => $this->request->getPost('kontak'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];

        // Panggil model untuk memperbarui data bengkel
        if($this->bengkelModel->update_bengkel($id, $data)){
        session()->setFlashdata('message', 'Data bengkel berhasil diperbarui');
        }
        else {
            session()->setFlashdata('error', 'Data bengkel gagal diperbaharui');
        }
        return redirect()->to('/bengkel');
    }

    // Fungsi untuk menghapus bengkel
    public function hapus($id) {
        if ($this->bengkelModel->hapus_bengkel($id)){
            session()->setFlashdata('message', 'Data bengkel berhasil dihapus');
        }
            else {
                session()->setFlashdata('error', 'Data bengkel gagal dihapus');
            }
        return redirect()->to('/bengkel');
    }
}
