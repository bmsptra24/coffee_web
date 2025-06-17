<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToReviews extends Migration
{
    public function up()
    {
        // Menambahkan kolom 'status' ke tabel 'reviews'
        $this->forge->addColumn('reviews', [
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'approved'],
                'default'    => 'approved',
                'after'      => 'content', // Sesuaikan posisi kolom jika perlu
            ],
        ]);
    }

    public function down()
    {
        // Menghapus kolom 'status' dari tabel 'reviews' jika rollback migrasi
        $this->forge->dropColumn('reviews', 'status');
    }
}
