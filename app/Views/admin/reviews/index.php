<?php // app/Views/admin/reviews/index.php

$this->extend('admin/layouts/default');
$this->section('content');
?>

<div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-2xl font-semibold text-gray-800 mb-6">Manajemen Ulasan Pelanggan</h3>

    <?php if (empty($reviews)): ?>
        <p class="text-gray-600">Belum ada ulasan yang diterima.</p>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg">
                <thead class="bg-gray-100 border-b-2 border-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Penulis</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Konten Ulasan</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reviews as $review): ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4 text-gray-700 text-sm"><?= date('d M Y H:i', strtotime(esc($review['created_at']))) ?></td>
                            <td class="py-3 px-4 text-gray-700 font-medium"><?= esc($review['author']) ?></td>
                            <td class="py-3 px-4 text-gray-700 max-w-xs overflow-hidden text-ellipsis whitespace-nowrap"><?= esc($review['content']) ?></td>
                            <td class="py-3 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    <?= $review['is_approved'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                    <?= $review['is_approved'] ? 'Disetujui' : 'Menunggu' ?>
                                </span>
                            </td>
                            <td class="py-3 px-4 flex space-x-2">
                                <a href="<?= site_url('admin/reviews/toggle/' . $review['id']) ?>"
                                    class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-full text-sm transition duration-200">
                                    <?= $review['is_approved'] ? 'Sembunyikan' : 'Setujui' ?>
                                </a>
                                <a href="<?= site_url('admin/reviews/delete/' . $review['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?');" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-full text-sm transition duration-200">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php $this->endSection(); ?>