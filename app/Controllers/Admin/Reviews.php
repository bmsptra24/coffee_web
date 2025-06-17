<?php // app/Controllers/Admin/Reviews.php

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

        // Toggle status is_approved
        $newStatus = ($review['is_approved'] == 1) ? 0 : 1;

        if ($this->reviewModel->update($id, ['is_approved' => $newStatus])) {
            $message = ($newStatus == 1) ? 'Ulasan berhasil disetujui!' : 'Ulasan berhasil disembunyikan!';
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
        // Validasi input
        $rules = [
            'author'  => 'required|min_length[3]|max_length[100]',
            'content' => 'required|min_length[10]|max_length[1000]',
        ];

        // Jika validasi gagal
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('review_errors', $this->validator->getErrors());
        }

        // Ambil data dari POST request
        $data = [
            'author'  => $this->request->getPost('author'),
            'content' => $this->request->getPost('content'),
            // Status akan diatur oleh beforeInsert callback di ReviewModel menjadi 'pending'
            // atau bisa diatur di sini jika Anda tidak menggunakan callback di model:
            // 'status'  => 'pending',
        ];

        // Simpan data ulasan ke database
        if ($this->reviewModel->insert($data)) {
            return redirect()->to(site_url('/#submit-review'))->with('review_success', 'Terima kasih! Ulasan Anda telah terkirim dan akan ditinjau.');
        } else {
            return redirect()->back()->withInput()->with('review_error', 'Gagal mengirim ulasan. Silakan coba lagi.');
        }
    }
}
