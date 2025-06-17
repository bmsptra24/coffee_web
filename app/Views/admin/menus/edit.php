<?php

$this->extend('admin/layouts/default');
$this->section('content');
?>

<h1 class="text-4xl font-extrabold text-primary-coffee mb-10 relative pb-3">
    Edit Menu
    <span class="absolute bottom-0 left-0 w-20 h-1 bg-accent-gold rounded-full"></span>
</h1>

<div class="bg-white p-8 rounded-2xl border-2 border-gray-200 max-w-2xl mx-auto">
    <form action="<?= site_url('admin/menus/update/' . $menu['id']) ?>" method="post" enctype="multipart/form-data">
        <div class="mb-6">
            <label for="name" class="block text-gray-800 text-base font-semibold mb-2">Nama Menu:</label>
            <input type="text" id="name" name="name" value="<?= old('name', $menu['name']) ?>"
                class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                       focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                placeholder="Misal: Espresso Klasik" required>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-800 text-base font-semibold mb-2">Deskripsi:</label>
            <textarea id="description" name="description" rows="5"
                class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                       focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                placeholder="Deskripsi singkat tentang menu"><?= old('description', $menu['description']) ?></textarea>
        </div>

        <div class="mb-6">
            <label for="price" class="block text-gray-800 text-base font-semibold mb-2">Harga (Rp):</label>
            <input type="number" id="price" name="price" value="<?= old('price', $menu['price']) ?>" step="any"
                class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                       focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                placeholder="Misal: 25000" required>
        </div>

        <div class="mb-8">
            <label for="current_image" class="block text-gray-800 text-base font-semibold mb-2">Gambar Saat Ini:</label>
            <?php if ($menu['image']): ?>
                <img src="<?= base_url($menu['image']) ?>" alt="Gambar Menu" class="w-40 h-40 object-cover rounded-lg mb-4 border-2 border-gray-300">
            <?php else: ?>
                <p class="text-gray-600 text-sm mb-4">Tidak ada gambar yang terunggah.</p>
            <?php endif; ?>

            <label for="image" class="block text-gray-800 text-base font-semibold mb-2 mt-4">Ganti Gambar Menu (Opsional):</label>
            <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg, image/webp"
                class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                       focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300
                       file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-2 file:border-primary-coffee file:text-sm file:font-semibold
                       file:bg-primary-coffee file:text-text-light hover:file:bg-accent-gold hover:file:text-primary-coffee cursor-pointer">
            <p class="text-xs text-gray-500 mt-2">Ukuran maksimal 1MB. Format: JPG, JPEG, PNG, WEBP.</p>
        </div>

        <div class="mb-8">
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" name="is_featured" value="1"
                    class="form-checkbox h-5 w-5 text-primary-coffee rounded-md border-gray-300 focus:ring-primary-coffee"
                    <?= old('is_featured', $menu['is_featured']) ? 'checked' : '' ?>>
                <span class="ml-2 text-gray-800 text-base">Tampilkan di Menu Unggulan (Halaman Depan)</span>
            </label>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-end gap-4">
            <a href="<?= site_url('admin/menus') ?>" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-3 px-6 rounded-full transition duration-300 border-2 border-gray-400 w-full sm:w-auto text-center">
                Batal
            </a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full transition duration-300
                        transform hover:scale-105 border-2 border-blue-700 w-full sm:w-auto">
                Perbarui Menu <span class="ml-2">&#x27A4;</span>
            </button>
        </div>
    </form>
</div>

<?php $this->endSection(); ?>