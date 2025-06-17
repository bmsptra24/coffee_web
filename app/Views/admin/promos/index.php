<?php // app/Views/admin/promos/index.php

$this->extend('admin/layouts/default');
$this->section('content');
?>

<h1 class="text-4xl font-extrabold text-primary-coffee mb-10 relative pb-3">
    Daftar Promo
    <span class="absolute bottom-0 left-0 w-24 h-1 bg-accent-gold rounded-full"></span>
</h1>

<div class="bg-white p-8 rounded-2xl border-2 border-gray-200">
    <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
        <h3 class="text-2xl font-semibold text-gray-800">Manajemen Promo</h3>
        <a href="<?= site_url('admin/promos/create') ?>" class="bg-primary-coffee hover:bg-accent-gold hover:text-primary-coffee
                    text-white font-bold py-3 px-6 rounded-full transition duration-300
                    transform hover:scale-105 border-2 border-primary-coffee">
            Tambah Promo Baru <span class="ml-2">&#x271B;</span>
        </a>
    </div>

    <?php if (empty($promos)): ?>
        <div class="text-center py-10">
            <p class="text-gray-600 text-xl">Belum ada promo yang ditambahkan. Mari buat yang pertama!</p>
            <a href="<?= site_url('admin/promos/create') ?>" class="mt-6 inline-block bg-accent-gold text-primary-coffee font-bold py-3 px-6 rounded-full
                                        hover:bg-primary-coffee hover:text-text-light transition duration-300 border-2 border-accent-gold">
                Tambahkan Promo Sekarang
            </a>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto rounded-lg border-2 border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-secondary-beige">
                    <tr>
                        <th class="py-4 px-6 text-left text-sm font-bold text-primary-coffee uppercase tracking-wider">Gambar</th>
                        <th class="py-4 px-6 text-left text-sm font-bold text-primary-coffee uppercase tracking-wider">Judul</th>
                        <th class="py-4 px-6 text-left text-sm font-bold text-primary-coffee uppercase tracking-wider">Deskripsi</th>
                        <th class="py-4 px-6 text-left text-sm font-bold text-primary-coffee uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <?php foreach ($promos as $promo): ?>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="py-4 px-6">
                                <img src="<?= base_url($promo['image']) ?>" alt="<?= esc($promo['title']) ?>" class="w-24 h-24 object-cover rounded-md border border-gray-300">
                            </td>
                            <td class="py-4 px-6 text-gray-800 font-medium text-lg"><?= esc($promo['title']) ?></td>
                            <td class="py-4 px-6 text-gray-800 max-w-xs overflow-hidden text-ellipsis whitespace-nowrap"><?= esc($promo['description']) ?></td>
                            <td class="py-4 px-6 flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                                <a href="<?= site_url('admin/promos/edit/' . $promo['id']) ?>" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-full text-sm transition duration-300 transform hover:scale-105 border-2 border-blue-700">
                                    Edit
                                </a>
                                <a href="<?= site_url('admin/promos/delete/' . $promo['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus promo ini?');" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-full text-sm transition duration-300 transform hover:scale-105 border-2 border-red-700">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php $this->endSection(); ?>