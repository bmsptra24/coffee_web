<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReviewModel;

class Reviews extends BaseController
{
    protected $reviewModel;

    public function __construct()
    {
        $this->reviewModel = new ReviewModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Manajemen Ulasan Pelanggan',
            'reviews' => $this->reviewModel->orderBy('created_at', 'DESC')->findAll(),
        ];
        echo view('admin/reviews/index', $data);
    }

    public function toggleStatus($id = null)
    {
        $review = $this->reviewModel->find($id);

        if (!$review) {
            return redirect()->to(site_url('admin/reviews'))->with('error', 'Ulasan tidak ditemukan.');
        }

        $newStatus = ($review['status'] === 'approved') ? 'pending' : 'approved';

        if ($this->reviewModel->update($id, ['status' => $newStatus])) {
            $message = ($newStatus === 'approved') ? 'Ulasan berhasil disetujui!' : 'Ulasan berhasil diset ulang ke pending!';
            return redirect()->to(site_url('admin/reviews'))->with('success', $message);
        } else {
            return redirect()->to(site_url('admin/reviews'))->with('error', 'Gagal mengubah status ulasan.');
        }
    }

    public function delete($id = null)
    {
        if ($this->reviewModel->delete($id)) {
            return redirect()->to(site_url('admin/reviews'))->with('success', 'Ulasan berhasil dihapus!');
        } else {
            return redirect()->to(site_url('admin/reviews'))->with('error', 'Gagal menghapus ulasan.');
        }
    }

    public function submit()
    {
        $rules = [
            'author'  => 'required|min_length[3]|max_length[100]',
            'content' => 'required|min_length[10]|max_length[1000]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('review_errors', $this->validator->getErrors());
        }

        $data = [
            'author'  => $this->request->getPost('author'),
            'content' => $this->request->getPost('content'),
        ];

        if ($this->reviewModel->insert($data)) {
            return redirect()->to(site_url('/#submit-review'))->with('review_success', 'Terima kasih! Ulasan Anda telah terkirim dan akan ditinjau.');
        } else {
            return redirect()->back()->withInput()->with('review_error', 'Gagal mengirim ulasan. Silakan coba lagi.');
        }
    }
}
