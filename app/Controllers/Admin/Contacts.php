<?php // app/Controllers/Admin/Contacts.php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactModel;

class Contacts extends BaseController
{
    protected $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Pesan Kontak',
            'contacts' => $this->contactModel->orderBy('created_at', 'DESC')->findAll(),
        ];
        echo view('admin/contacts/index', $data);
    }

    public function delete($id = null)
    {
        if ($this->contactModel->delete($id)) {
            return redirect()->to(site_url('admin/contacts'))->with('success', 'Pesan kontak berhasil dihapus!');
        } else {
            return redirect()->to(site_url('admin/contacts'))->with('error', 'Gagal menghapus pesan kontak.');
        }
    }
}
