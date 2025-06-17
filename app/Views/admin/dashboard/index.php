<?php // app/Views/admin/dashboard/index.php

$this->extend('admin/layouts/default');
$this->section('content');
?>

<h1 class="text-4xl font-extrabold text-primary-coffee mb-10 relative pb-3">
    Dashboard Admin
    <span class="absolute bottom-0 left-0 w-24 h-1 bg-accent-gold rounded-full"></span>
</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
    <!-- Card Total Menu -->
    <div class="bg-white rounded-2xl p-8 flex items-center justify-between transition duration-500 hover:scale-105 border-2 border-gray-200">
        <div>
            <p class="text-gray-600 text-lg font-medium">Total Menu</p>
            <h3 class="text-4xl font-bold text-primary-coffee mt-2"><?= esc($total_menus) ?></h3>
        </div>
        <div class="bg-secondary-beige p-4 rounded-full text-primary-coffee border border-primary-coffee">
            <i class="fas fa-utensils fa-2x"></i>
        </div>
    </div>

    <!-- Card Total Promo -->
    <div class="bg-white rounded-2xl p-8 flex items-center justify-between transition duration-500 hover:scale-105 border-2 border-gray-200">
        <div>
            <p class="text-gray-600 text-lg font-medium">Total Promo</p>
            <h3 class="text-4xl font-bold text-accent-gold mt-2"><?= esc($total_promos) ?></h3>
        </div>
        <div class="bg-secondary-beige p-4 rounded-full text-accent-gold border border-accent-gold">
            <i class="fas fa-tags fa-2x"></i>
        </div>
    </div>

    <!-- Card Pesan Kontak Baru -->
    <div class="bg-white rounded-2xl p-8 flex items-center justify-between transition duration-500 hover:scale-105 border-2 border-gray-200">
        <div>
            <p class="text-gray-600 text-lg font-medium">Pesan Kontak</p>
            <h3 class="text-4xl font-bold text-primary-coffee mt-2"><?= esc($total_contacts) ?></h3>
        </div>
        <div class="bg-secondary-beige p-4 rounded-full text-primary-coffee border border-primary-coffee">
            <i class="fas fa-envelope fa-2x"></i>
        </div>
    </div>

    <!-- Card Ulasan Menunggu Persetujuan -->
    <div class="bg-white rounded-2xl p-8 flex items-center justify-between transition duration-500 hover:scale-105 border-2 border-gray-200">
        <div>
            <p class="text-gray-600 text-lg font-medium">Ulasan Menunggu</p>
            <h3 class="text-4xl font-bold text-accent-gold mt-2"><?= esc($total_pending_reviews) ?></h3>
        </div>
        <div class="bg-secondary-beige p-4 rounded-full text-accent-gold border border-accent-gold">
            <i class="fas fa-star-half-alt fa-2x"></i>
        </div>
    </div>
</div>

<div class="mt-12 bg-white p-8 rounded-2xl border-2 border-gray-200">
    <h3 class="text-3xl font-bold text-primary-coffee mb-6 relative pb-2">
        Informasi Penting
        <span class="absolute bottom-0 left-0 w-16 h-1 bg-accent-gold rounded-full"></span>
    </h3>
    <p class="text-lg leading-relaxed text-gray-700">
        Selamat datang di dashboard admin! Ini adalah pusat kendali Anda untuk mengelola semua aspek website kafe.
        Pastikan untuk secara rutin memeriksa <strong class="text-primary-coffee">pesan kontak</strong> dan
        <strong class="text-primary-coffee">ulasan pelanggan</strong> yang masuk untuk menjaga interaksi yang baik.
    </p>
    <ul class="list-disc list-inside mt-6 text-lg text-gray-700 space-y-2">
        <li>Gunakan menu navigasi di samping untuk mengakses berbagai fitur manajemen.</li>
        <li>Semua perubahan yang Anda lakukan di sini akan langsung terlihat di halaman depan website Anda.</li>
        <li>Mohon perhatikan ukuran file gambar yang diunggah; disarankan tidak lebih dari <strong class="text-primary-coffee">1MB</strong> per gambar.</li>
        <li>Secara berkala perbarui konten promo dan menu untuk menarik lebih banyak pelanggan.</li>
    </ul>
</div>

<?php $this->endSection(); ?>