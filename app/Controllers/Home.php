<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('menu/landingpage');

    }

    public function login(): string
    {
        return view('menu/login');
    }

    public function logout()
    {
        // Hapus semua sesi
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to('/login');
    }

    public function register(): string
    {
        return view('menu/register.php');
    }

    public function dashboard()
    {
        $user = session()->get('user');
    
        // Cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login'); // Redirect ke halaman login jika belum login
        }
    
        // Kirim data user ke view
        $data = ['id_user' => $user['id_user'] ?? null]; // Pastikan id_user ada
    
        // Tampilkan dashboard dan footer
        return view('menu/dashboard.php', $data) . view('menu/footer');
    }
    
    
    public function success(): string
    {
        return view('menu/success');
    }
    


}
