<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JadwalModel;
use CodeIgniter\I18n\Time;
use App\Models\Kendaraan_model;  // Pastikan model ini diimport
use App\Models\UserModel;

class KelolaJadwalController extends Controller
{
    protected $usermodel;
    protected $jadwalModel;
    protected $kendaraanModel;  // Menambahkan properti untuk model kendaraan

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->kendaraanModel = new Kendaraan_model();
        $this->usermodel = new UserModel();
    }

    public function index()
    {
        $id_user = session()->get('user')['id_user']; // Mengambil id_user dari session
            
        // Ambil data jadwal lengkap dengan detail nama kendaraan dan layanan
        $jadwal = $this->jadwalModel->getJadwalWithDetails($id_user);

        // Mengecek dan mengirim email jika perawatan sesuai dengan tanggal hari ini
        foreach ($jadwal as &$item) {
            // Atur timezone ke WIB
            date_default_timezone_set('Asia/Jakarta');

            // Ambil tanggal perawatan
            $tanggalPerawatan = \CodeIgniter\I18n\Time::parse($item['tanggal']);
            $tanggalSekarang = \CodeIgniter\I18n\Time::now('Asia/Jakarta');

            // Jika tanggal perawatan hari ini dan email belum dikirim, kirim email
            if ($tanggalPerawatan->format('Y-m-d') == $tanggalSekarang->format('Y-m-d') && !$item['is_email_sent']) {
                // Kirim email
                $this->kirimEmail($item);

                // Tandai bahwa email sudah dikirim
                $this->jadwalModel->update($item['id_perawatan'], ['is_email_sent' => true]);

                // Tandai di array lokal bahwa email sudah dikirim (opsional untuk tampilan)
                $item['is_email_sent'] = true;

            }
        }

        // Menampilkan view kelola_jadwal dengan data jadwal
        echo view('menu/kelola_jadwal', ['jadwal' => $jadwal]);
        echo view('menu/footer');
    }


    public function tambah()
    {
        // Ambil id_user dari session
        $id_user = session()->get('user')['id_user'];

        // Ambil kendaraan yang dimiliki oleh user
        $kendaraan = $this->kendaraanModel->where('id_user', $id_user)->findAll();

        // Pastikan pengguna memilih kendaraan terlebih dahulu
        if (empty($kendaraan)) {
            return redirect()->to('/kelola_jadwal')->with('error', 'Silakan tambahkan kendaraan terlebih dahulu.');
        }

        // Ambil jenis kendaraan dari kendaraan pertama (atau user memilih kendaraan)
        $jenis_kendaraan = $kendaraan[0]['jenis_kendaraan'];

        // Ambil data layanan yang sesuai dengan jenis kendaraan dari tabel menu
        $layanan = $this->jadwalModel->getLayananByJenisKendaraan($jenis_kendaraan);

        // Kirim data kendaraan dan layanan ke view
        return view('menu/tambah_jadwal', ['kendaraan' => $kendaraan, 'layanan' => $layanan]);
    }




    public function simpan()
    {
        // Validasi input
        $rules = [
            'id_kendaraan' => 'required',
            'id_layanan' => 'required', // Validasi untuk id_layanan
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Silakan periksa kembali data yang Anda masukkan.');
        }

        // Ambil id_layanan dari form
        $id_layanan = $this->request->getPost('id_layanan');

        // Ambil atribut 'hari' dari tabel menu berdasarkan id_layanan
        $menu = $this->jadwalModel->getNamaLayanan($id_layanan); // Pastikan getNamaLayanan mengembalikan atribut 'hari'
        if (!$menu || !isset($menu['hari'])) {
            return redirect()->back()->with('error', 'Layanan tidak valid.');
        }
        $hari = (int)$menu['hari'];

        // Hitung tanggal perawatan
        $tanggalPerawatan = date('Y-m-d', strtotime("+$hari days"));

        // Ambil data dari form
        $data = [
            'id_user' => session()->get('user')['id_user'],
            'id_kendaraan' => $this->request->getPost('id_kendaraan'),
            'tanggal' => $tanggalPerawatan,
            'id_layanan' => $id_layanan,
        ];

        // Simpan data ke database
        if ($this->jadwalModel->insert($data)) {
            return redirect()->to('/kelola_jadwal')->with('message', 'Jadwal perawatan berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Jadwal perawatan gagal ditambahkan');
        }
    }



    public function delete($id_perawatan)
    {
        // Proses untuk delete jadwal berdasarkan id_perawatan
        $jadwalModel = new JadwalModel();
        $jadwalModel->delete($id_perawatan);

        return redirect()->to('/kelola_jadwal')->with('message', 'Jadwal perawatan berhasil dihapus!');
    }


        private function kirimEmail($item)
    {
        // API Key Anda
        $api_key = getenv('SENDINBLUE_API_KEY');


        // Endpoint API
        $url = "https://api.brevo.com/v3/smtp/email";

        // Header dengan API Key
        $headers = [
            "accept" => "application/json",
            "api-key" => $api_key,
            "content-type" => "application/json",
        ];

        // Ambil email user dari session
        $userEmail = session()->get('user')['email'];

        // Data email
        $data = [
            "sender" => ["name" => "BIKE-KU", "email" => "manzrockys@gmail.com"],
            "to" => [
                ["email" => $userEmail, "name" => "Customer BIKE-KU"],
            ],
            "subject" => "BIKE-KU NOTIFICATION",
            "htmlContent" => "<html><body>" .
                "<h1>Jadwal Perawatan Anda</h1>" .
                "<p>Perawatan untuk kendaraan <strong>" . esc($item['nama_kendaraan']) . "</strong></p>" .
                "<p>Layanan: <strong>" . esc($item['nama_layanan']) . "</strong></p>" .
                "<p>Jadwal: <strong>" . esc($item['tanggal']) . "</strong></p>" .
                "</body></html>",
        ];

        // Mengirimkan permintaan POST menggunakan curlrequest dari CodeIgniter
        $client = \Config\Services::curlrequest();
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'json' => $data
        ]);

        // Periksa respons
        if ($response->getStatusCode() == 201) {
            echo "Email berhasil dikirim!";
        } else {
            echo "Terjadi kesalahan: " . $response->getStatusCode();
        }
    }
}