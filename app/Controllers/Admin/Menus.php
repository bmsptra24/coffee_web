<?php // app/Controllers/Admin/Menus.php
// FILE INI SUDAH DIUPDATE UNTUK MEMPERBAIKI JALUR UPLOAD GAMBAR.

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;

class Menus extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = new MenuModel();
        helper(['form', 'url', 'filesystem']);
    }

    public function index(): string
    {
        $data = [
            'title' => 'Manajemen Menu',
            'menus' => $this->menuModel->orderBy('name', 'ASC')->findAll(),
        ];
        return view('admin/menus/index', $data);
    }

    public function create(): string
    {
        $data = [
            'title'     => 'Tambah Menu Baru',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/menus/create', $data);
    }

    public function store()
    {
        $rules = [
            'name'        => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty|min_length[10]',
            'price'       => 'required|numeric|greater_than[0]',
            'image'       => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imageFile = $this->request->getFile('image');
        $newName   = $imageFile->getRandomName();

        // Jalur unggah yang dikoreksi: LANGSUNG KE 'assets/img/menus' dari direktori public
        $uploadPath = 'assets/img/menus';
        if (!is_dir(FCPATH . $uploadPath)) {
            mkdir(FCPATH . $uploadPath, 0777, true);
        }

        if ($imageFile->isValid() && ! $imageFile->hasMoved()) {
            $imageFile->move(FCPATH . $uploadPath, $newName); // Pindahkan ke public/assets/img/menus
            $imagePath = $uploadPath . '/' . $newName;
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengunggah gambar. ' . $imageFile->getErrorString());
        }

        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'image'       => $imagePath,
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
        ];

        $this->menuModel->insert($data);

        return redirect()->to(site_url('admin/menus'))->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit($id = null): string
    {
        $menu = $this->menuModel->find($id);

        if (! $menu) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Menu tidak ditemukan: ' . $id);
        }

        $data = [
            'title'     => 'Edit Menu',
            'menu'      => $menu,
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/menus/edit', $data);
    }

    public function update($id = null)
    {
        $menu = $this->menuModel->find($id);

        if (! $menu) {
            return redirect()->back()->with('error', 'Menu tidak ditemukan.');
        }

        $rules = [
            'name'        => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty|min_length[10]',
            'price'       => 'required|numeric|greater_than[0]',
        ];

        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid() && ! $imageFile->hasMoved()) {
            $rules['image'] = 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
        ];

        // Penanganan upload gambar baru
        if ($imageFile && $imageFile->isValid() && ! $imageFile->hasMoved()) {
            // Hapus gambar lama jika ada
            if ($menu['image'] && file_exists(FCPATH . $menu['image'])) {
                unlink(FCPATH . $menu['image']);
            }

            $newName = $imageFile->getRandomName();
            // Jalur unggah yang dikoreksi
            $uploadPath = 'assets/img/menus';
            if (!is_dir(FCPATH . $uploadPath)) {
                mkdir(FCPATH . $uploadPath, 0777, true);
            }
            $imageFile->move(FCPATH . $uploadPath, $newName); // Pindahkan ke public/assets/img/menus
            $data['image'] = $uploadPath . '/' . $newName;
        }

        $this->menuModel->update($id, $data);

        return redirect()->to(site_url('admin/menus'))->with('success', 'Menu berhasil diperbarui!');
    }

    public function delete($id = null)
    {
        $menu = $this->menuModel->find($id);

        if (! $menu) {
            return redirect()->back()->with('error', 'Menu tidak ditemukan.');
        }

        // Hapus file gambar terkait jika ada
        if ($menu['image'] && file_exists(FCPATH . $menu['image'])) {
            unlink(FCPATH . $menu['image']);
        }

        $this->menuModel->delete($id);
        return redirect()->to(site_url('admin/menus'))->with('success', 'Menu berhasil dihapus!');
    }
}
