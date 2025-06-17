<?php // app/Controllers/Admin/Auth.php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    public function login()
    {
        // Jika sudah login, arahkan ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to(site_url('admin'));
        }
        $data['validation'] = \Config\Services::validation(); // Untuk menampilkan error validasi
        echo view('admin/auth/login', $data);
    }

    public function attemptLogin()
    {
        // Atur rules validasi
        $rules = [
            'username' => 'required|min_length[3]|max_length[100]',
            'password' => 'required|min_length[6]',
        ];

        // Jalankan validasi
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->getUserByUsername($username);

        // Periksa kredensial
        if ($user && password_verify($password, $user['password'])) {
            // Login berhasil, atur session
            $sessionData = [
                'user_id'    => $user['id'],
                'username'   => $user['username'],
                'isLoggedIn' => true,
                'role'       => 'admin', // Bisa ditambahkan jika ada role lain
            ];
            session()->set($sessionData);

            return redirect()->to(site_url('admin'))->with('success', 'Selamat datang, ' . $user['username'] . '!');
        } else {
            // Login gagal
            return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        // Hapus semua session
        session()->destroy();
        return redirect()->to(site_url('admin/auth'))->with('info', 'Anda telah berhasil logout.');
    }
}
