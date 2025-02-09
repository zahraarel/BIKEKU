<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));  // Hashing password

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)
            ->where('password', $password)
            ->first();

        if ($user) {
            session()->set('logged_in', true);  // Set session login
            session()->set('user', $user);  // Menyimpan data pengguna dalam session
             session()->setFlashdata('login_success', 'Selamat Datang ' .$user['username'] . ', login berhasil');
            return redirect()->to('home');  // Redirect ke dashboard
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

}
