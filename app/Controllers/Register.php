<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function save()
    {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password')); // Gunakan bcrypt atau password_hash() lebih aman

        // Cek apakah email sudah terdaftar
        if ($userModel->where('email', $email)->first()) {
            return redirect()->back()->with('error', 'Email sudah terdaftar. Gunakan email lain.');
        }

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $password
        ];

        // Menyimpan data ke database
        if ($userModel->insert($data)) {
            return redirect()->to('success');
        } else {
            return redirect()->back()->with('error', 'Gagal mendaftar. Silakan coba lagi.');
        }
    }

    public function success()
    {
        return view('menu/success');
    }
}
