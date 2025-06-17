<?php

$this->extend('admin/layouts/default');
$this->section('content');
?>

<h1 class="text-4xl font-extrabold text-primary-coffee mb-10 relative pb-3">
    Pengaturan Website
    <span class="absolute bottom-0 left-0 w-24 h-1 bg-accent-gold rounded-full"></span>
</h1>

<div class="bg-white p-8 rounded-2xl border-2 border-gray-200 max-w-4xl mx-auto">
    <h3 class="text-2xl font-semibold text-gray-800 mb-6">Kelola Konten Halaman Depan</h3>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="flash-message bg-green-100 border-2 border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="flash-message bg-red-100 border-2 border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="flash-message bg-red-100 border-2 border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
            <strong class="font-bold">Validasi Gagal!</strong>
            <ul class="list-disc list-inside mt-2">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('admin/settings/update') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-6">
            <label for="about_us" class="block text-gray-800 text-base font-semibold mb-2">Tentang Kami (About Us):</label>
            <textarea id="about_us" name="about_us" rows="6"
                class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                             focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                placeholder="Tulis deskripsi tentang kafe Anda"><?= old('about_us', $about_us) ?></textarea>
        </div>

        <div class="mb-6">
            <label for="location_address" class="block text-gray-800 text-base font-semibold mb-2">Alamat Lokasi:</label>
            <input type="text" id="location_address" name="location_address" value="<?= old('location_address', $location_address) ?>"
                class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                          focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                placeholder="Misal: Jl. Kenangan No. 10, Kota Bahagia">
        </div>

        <div class="mb-6">
            <label for="opening_hours" class="block text-gray-800 text-base font-semibold mb-2">Jam Buka:</label>
            <textarea id="opening_hours" name="opening_hours" rows="4"
                class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                             focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                placeholder="Misal: Senin - Jumat: 08:00 - 22:00&#x0A;Sabtu - Minggu: 09:00 - 23:00"><?= old('opening_hours', $opening_hours) ?></textarea>
            <p class="text-xs text-gray-500 mt-1">Gunakan Enter (&#x0A;) untuk baris baru.</p>
        </div>

        <div class="mb-6">
            <label for="location_map_embed" class="block text-gray-800 text-base font-semibold mb-2">Kode Embed Google Maps (Iframe):</label>
            <textarea id="location_map_embed" name="location_map_embed" rows="6"
                class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                             focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                placeholder="Masukkan kode iframe Google Maps di sini"><?= old('location_map_embed', $location_map_embed) ?></textarea>
            <p class="text-xs text-gray-500 mt-1">Dapatkan kode iframe dari Google Maps.</p>
        </div>

        <div class="mb-8">
            <label for="hero_image_file" class="block text-gray-800 text-base font-semibold mb-2">Gambar Hero Halaman Depan:</label>
            <?php if ($hero_image && !strpos($hero_image, 'placehold.co')): ?>
                <div class="mb-4">
                    <p class="text-gray-600 text-sm mb-2">Gambar Saat Ini:</p>
                    <img src="<?= base_url($hero_image) ?>" alt="Current Hero Image" class="w-full max-w-lg h-48 object-cover rounded-lg border-2 border-gray-300">
                </div>
            <?php else: ?>
                <p class="text-gray-600 text-sm mb-4">Belum ada gambar hero kustom yang diunggah. Akan menggunakan gambar default.</p>
            <?php endif; ?>

            <input type="file" id="hero_image_file" name="hero_image_file" accept="image/png, image/jpeg, image/jpg, image/webp"
                class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                          focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300
                          file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-2 file:border-primary-coffee file:text-sm file:font-semibold
                          file:bg-primary-coffee file:text-text-light hover:file:bg-accent-gold hover:file:text-primary-coffee cursor-pointer">
            <p class="text-xs text-gray-500 mt-2">Ukuran maksimal 2MB. Format: JPG, JPEG, PNG, WEBP. Kosongkan jika tidak ingin mengubah.</p>
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="bg-primary-coffee hover:bg-accent-gold hover:text-primary-coffee
                        text-text-light font-bold py-3 px-6 rounded-full transition duration-300
                        transform hover:scale-105 border-2 border-primary-coffee">
                Perbarui Pengaturan <span class="ml-2">&#x27A4;</span>
            </button>
        </div>
    </form>
</div>

<?php $this->endSection(); ?>