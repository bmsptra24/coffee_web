<?php // app/Models/ReviewModel.php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table            = 'reviews'; // Nama tabel ulasan Anda
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; // Atau 'object' jika Anda lebih suka
    protected $useSoftDeletes   = false; // Tidak menggunakan soft deletes untuk ulasan

    protected $allowedFields = ['author', 'email', 'content', 'status', 'created_at']; // Kolom yang diizinkan untuk diisi

    // Timestamps
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at'; // Tambahkan kolom 'updated_at' di tabel Anda jika diperlukan
    protected $dateFormat       = 'datetime';

    // Validation rules for review submission
    protected $validationRules = [
        'author'  => 'required|min_length[3]|max_length[100]',
        'email'   => 'permit_empty|valid_email|max_length[255]', // Email opsional
        'content' => 'required|min_length[10]|max_length[1000]',
    ];

    protected $validationMessages = [
        'author' => [
            'required'   => 'Nama penulis wajib diisi.',
            'min_length' => 'Nama penulis minimal 3 karakter.',
            'max_length' => 'Nama penulis maksimal 100 karakter.',
        ],
        'email' => [
            'valid_email' => 'Format email tidak valid.',
            'max_length'  => 'Email maksimal 255 karakter.',
        ],
        'content' => [
            'required'   => 'Ulasan wajib diisi.',
            'min_length' => 'Ulasan minimal 10 karakter.',
            'max_length' => 'Ulasan maksimal 1000 karakter.',
        ],
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['setReviewStatus'];

    protected function setReviewStatus(array $data)
    {
        // Set status default menjadi 'pending' untuk ulasan baru
        // Ini akan memastikan ulasan perlu disetujui admin sebelum ditampilkan
        $data['data']['status'] = 'pending';
        return $data;
    }
}
