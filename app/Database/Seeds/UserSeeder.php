<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('users')->insert($data);

        // Tambahkan data awal untuk settings
        $settings = [
            ['key' => 'about_us', 'value' => 'Selamat datang di Kafe Kopi Mantap! Kami menawarkan kopi berkualitas tinggi dari biji pilihan dan suasana nyaman untuk bersantai.', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['key' => 'location_address', 'value' => 'Jl. Kopi Nikmat No. 123, Kota Rasa, 12345', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['key' => 'location_map_embed', 'value' => '<iframe src="[https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0792348392135!2d106.82088031476994!3d-6.208763095493035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f417e2e3e2b1%3A0x6e2e0e0e0e0e0e0e!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1678901234567!5m2!1sid!2sid](https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0792348392135!2d106.82088031476994!3d-6.208763095493035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f417e2e3e2b1%3A0x6e2e0e0e0e0e0e0e!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1678901234567!5m2!1sid!2sid)" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')], // Placeholder map embed
            ['key' => 'opening_hours', 'value' => 'Senin - Jumat: 08:00 - 22:00, Sabtu - Minggu: 09:00 - 23:00', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('settings')->insertBatch($settings);

        // Tambahkan beberapa data menu awal
        $menus = [
            [
                'name' => 'Espresso Klasik',
                'description' => 'Espresso murni dari biji Arabika pilihan.',
                'price' => 25000.00,
                'image' => '[https://placehold.co/400x300/F5F5DC/8B4513?text=Espresso](https://placehold.co/400x300/F5F5DC/8B4513?text=Espresso)',
                'is_featured' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Latte Art Spesial',
                'description' => 'Latte creamy dengan seni latte yang indah.',
                'price' => 35000.00,
                'image' => '[https://placehold.co/400x300/F5F5DC/8B4513?text=Latte](https://placehold.co/400x300/F5F5DC/8B4513?text=Latte)',
                'is_featured' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Cappuccino Favorit',
                'description' => 'Campuran sempurna espresso, susu, dan busa.',
                'price' => 32000.00,
                'image' => '[https://placehold.co/400x300/F5F5DC/8B4513?text=Cappuccino](https://placehold.co/400x300/F5F5DC/8B4513?text=Cappuccino)',
                'is_featured' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        $this->db->table('menus')->insertBatch($menus);

        // Tambahkan beberapa data promo awal
        $promos = [
            [
                'title' => 'Promo Kopi Senin',
                'description' => 'Diskon 20% untuk semua jenis kopi setiap hari Senin!',
                'image' => '[https://placehold.co/600x400/8B4513/F5F5DC?text=Promo+Senin](https://placehold.co/600x400/8B4513/F5F5DC?text=Promo+Senin)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Gratis Roti Bakar',
                'description' => 'Dapatkan gratis roti bakar setiap pembelian 2 minuman apapun.',
                'image' => '[https://placehold.co/600x400/8B4513/F5F5DC?text=Gratis+Roti](https://placehold.co/600x400/8B4513/F5F5DC?text=Gratis+Roti)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        $this->db->table('promos')->insertBatch($promos);

        // Tambahkan beberapa ulasan awal
        $reviews = [
            [
                'author' => 'Ani Susanti',
                'content' => 'Kopi di sini sangat enak dan tempatnya nyaman sekali! Sangat direkomendasikan.',
                'is_approved' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'author' => 'Budi Cahyono',
                'content' => 'Pelayanan ramah, suasana asik, dan menu makanan ringannya juga pas untuk teman ngopi.',
                'is_approved' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'author' => 'Citra Dewi',
                'content' => 'Sering nongkrong di sini, kopi favorit saya adalah Caramel Macchiato-nya. Mantap!',
                'is_approved' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        $this->db->table('reviews')->insertBatch($reviews);
    }
}
