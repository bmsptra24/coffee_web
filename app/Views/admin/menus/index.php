<?php // app/Views/admin/menus/index.php

$this->extend('admin/layouts/default');
$this->section('content');
?>

<h1 class="text-4xl font-extrabold text-primary-coffee mb-10 relative pb-3">
    Daftar Menu
    <span class="absolute bottom-0 left-0 w-24 h-1 bg-accent-gold rounded-full"></span>
</h1>

<div class="bg-white p-8 rounded-2xl border-2 border-gray-200">
    <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
        <h3 class="text-2xl font-semibold text-gray-800">Manajemen Menu</h3>
        <a href="<?= site_url('admin/menus/create') ?>" class="bg-primary-coffee hover:bg-accent-gold hover:text-primary-coffee
                    text-white font-bold py-3 px-6 rounded-full transition duration-300
                    transform hover:scale-105 border-2 border-primary-coffee">
            Tambah Menu Baru <span class="ml-2">&#x271B;</span>
        </a>
    </div>

    <?php if (empty($menus)): ?>
        <div class="text-center py-10">
            <p class="text-gray-600 text-xl">Belum ada menu yang ditambahkan. Mari buat yang pertama!</p>
            <a href="<?= site_url('admin/menus/create') ?>" class="mt-6 inline-block bg-accent-gold text-primary-coffee font-bold py-3 px-6 rounded-full
                                        hover:bg-primary-coffee hover:text-text-light transition duration-300 border-2 border-accent-gold">
                Tambahkan Menu Sekarang
            </a>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto rounded-lg border-2 border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-secondary-beige">
                    <tr>
                        <th class="py-4 px-6 text-left text-sm font-bold text-primary-coffee uppercase tracking-wider">Gambar</th>
                        <th class="py-4 px-6 text-left text-sm font-bold text-primary-coffee uppercase tracking-wider">Nama Menu</th>
                        <th class="py-4 px-6 text-left text-sm font-bold text-primary-coffee uppercase tracking-wider">Harga</th>
                        <th class="py-4 px-6 text-left text-sm font-bold text-primary-coffee uppercase tracking-wider">Featured</th>
                        <th class="py-4 px-6 text-left text-sm font-bold text-primary-coffee uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <?php foreach ($menus as $menu): ?>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="py-4 px-6">
                                <img src="<?= base_url($menu['image']) ?>" alt="<?= esc($menu['name']) ?>" class="w-24 h-24 object-cover rounded-md border border-gray-300">
                            </td>
                            <td class="py-4 px-6 text-gray-800 font-medium text-lg"><?= esc($menu['name']) ?></td>
                            <td class="py-4 px-6 text-gray-800 text-lg">Rp <?= number_format(esc($menu['price']), 0, ',', '.') ?></td>
                            <td class="py-4 px-6">
                                <span class="px-4 py-1 rounded-full text-sm font-semibold
                                    <?= $menu['is_featured'] ? 'bg-green-100 text-green-700 border border-green-300' : 'bg-gray-100 text-gray-700 border border-gray-300' ?>">
                                    <?= $menu['is_featured'] ? 'Ya' : 'Tidak' ?>
                                </span>
                            </td>
                            <td class="py-4 px-6 flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                                <a href="<?= site_url('admin/menus/edit/' . $menu['id']) ?>" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-full text-sm transition duration-300 transform hover:scale-105 border-2 border-blue-700">
                                    Edit
                                </a>
                                <a href="<?= site_url('admin/menus/delete/' . $menu['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?');" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-full text-sm transition duration-300 transform hover:scale-105 border-2 border-red-700">
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