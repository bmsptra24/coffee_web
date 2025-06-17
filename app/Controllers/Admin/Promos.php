<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PromoModel;

class Promos extends BaseController
{
    protected $promoModel;

    public function __construct()
    {
        $this->promoModel = new PromoModel();
        helper(['form', 'url', 'filesystem']);
    }

    public function index(): string
    {
        $data = [
            'title' => 'Manajemen Promo',
            'promos' => $this->promoModel->orderBy('title', 'ASC')->findAll(),
        ];
        return view('admin/promos/index', $data);
    }

    public function create(): string
    {
        $data = [
            'title'     => 'Tambah Promo Baru',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/promos/create', $data);
    }

    public function store()
    {
        $rules = [
            'title'       => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty|min_length[10]',
            'image'       => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imageFile = $this->request->getFile('image');
        $newName   = $imageFile->getRandomName();

        $uploadPath = 'assets/img/promos';
        if (!is_dir(FCPATH . $uploadPath)) {
            mkdir(FCPATH . $uploadPath, 0777, true);
        }

        if ($imageFile->isValid() && ! $imageFile->hasMoved()) {
            $imageFile->move(FCPATH . $uploadPath, $newName);
            $imagePath = $uploadPath . '/' . $newName;
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengunggah gambar. ' . $imageFile->getErrorString());
        }

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'image'       => $imagePath,
        ];

        $this->promoModel->insert($data);

        return redirect()->to(site_url('admin/promos'))->with('success', 'Promo berhasil ditambahkan!');
    }

    public function edit($id = null): string
    {
        $promo = $this->promoModel->find($id);

        if (! $promo) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Promo tidak ditemukan: ' . $id);
        }

        $data = [
            'title'     => 'Edit Promo',
            'promo'      => $promo,
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/promos/edit', $data);
    }

    public function update($id = null)
    {
        $promo = $this->promoModel->find($id);

        if (! $promo) {
            return redirect()->back()->with('error', 'Promo tidak ditemukan.');
        }

        $rules = [
            'title'       => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty|min_length[10]',
        ];

        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid() && ! $imageFile->hasMoved()) {
            $rules['image'] = 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
        ];

        if ($imageFile && $imageFile->isValid() && ! $imageFile->hasMoved()) {
            if ($promo['image'] && file_exists(FCPATH . $promo['image'])) {
                unlink(FCPATH . $promo['image']);
            }

            $newName = $imageFile->getRandomName();
            $uploadPath = 'assets/img/promos';
            if (!is_dir(FCPATH . $uploadPath)) {
                mkdir(FCPATH . $uploadPath, 0777, true);
            }
            $imageFile->move(FCPATH . $uploadPath, $newName);
            $data['image'] = $uploadPath . '/' . $newName;
        }

        $this->promoModel->update($id, $data);

        return redirect()->to(site_url('admin/promos'))->with('success', 'Promo berhasil diperbarui!');
    }

    public function delete($id = null)
    {
        $promo = $this->promoModel->find($id);

        if (! $promo) {
            return redirect()->back()->with('error', 'Promo tidak ditemukan.');
        }

        if ($promo['image'] && file_exists(FCPATH . $promo['image'])) {
            unlink(FCPATH . $promo['image']);
        }

        $this->promoModel->delete($id);
        return redirect()->to(site_url('admin/promos'))->with('success', 'Promo berhasil dihapus!');
    }
}
