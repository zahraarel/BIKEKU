<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Logout extends Controller
{
    public function index()
    {
        // Menghancurkan session
        session()->remove('logged_in');  // Menghapus session 'logged_in'
        session()->remove('user_data');  // Menghapus data pengguna yang tersimpan dalam session
        session()->destroy();  // Menghancurkan seluruh session
        
        return redirect()->to('/login');
    }
}
