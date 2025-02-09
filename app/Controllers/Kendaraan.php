<?php

namespace App\Controllers;

use App\Models\Kendaraan_model;

class Kendaraan extends BaseController
{

    protected $kendaraanModel;

    public function __construct()
    {
        $this->kendaraanModel = new Kendaraan_model();
    }

    public function index()
    {
        // Periksa apakah user sudah login
        if (session()->get('logged_in')) {
            $id_user = session()->get('user')['id_user']; // Ambil id_user dari session

            // Ambil kendaraan yang sesuai dengan id_user
            $data['kendaraan'] = $this->kendaraanModel->get_kendaraan_by_user($id_user);
        } else {
            $data['kendaraan'] = []; // Kosongkan data kendaraan jika belum login
        }

        echo view('menu/kendaraan', $data);
        echo view('menu/footer');
    }


    public function add()
    {
        // Ambil id_user dari session
        $id_user = session()->get('user')['id_user'];

        // Ambil data dari form
        $data = [
            'id_user' => $id_user, // Simpan id_user ke dalam data
            'nama_kendaraan' => $this->request->getPost('nama_kendaraan'),
            'jenis_kendaraan' => $this->request->getPost('jenis_kendaraan'),
            'tahun_kendaraan' => $this->request->getPost('tahun_kendaraan')
        ];

        if ($this->kendaraanModel->add_kendaraan($data)) {
            session()->setFlashdata('success', 'Data kendaraan berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data kendaraan.');
        }
        // Redirect kembali ke halaman kendaraan
        return redirect()->to('/kendaraan');
    }

    public function delete($id)
    {
       if ($this->kendaraanModel->delete_kendaraan($id)){
        session()->setFlashdata('success', 'Data kendaraan berhasil dihapus!');
    } else {
        session()->setFlashdata('error', 'Gagal menghapus data kendaraan.');
    }
        return redirect()->to('/kendaraan');
    }

    public function edit($id)
    {
        // Ambil data kendaraan berdasarkan ID
        $data['kendaraan'] = $this->kendaraanModel->find($id);

        // Tampilkan halaman edit kendaraan
        return view('kendaraan/edit', $data);
    }


}
