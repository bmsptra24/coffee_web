<?php

$this->extend('admin/layouts/default');
$this->section('content');
?>

<div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-2xl font-semibold text-gray-800 mb-6">Pesan Kontak Masuk</h3>

    <?php if (empty($contacts)): ?>
        <p class="text-gray-600">Belum ada pesan kontak yang diterima.</p>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg">
                <thead class="bg-gray-100 border-b-2 border-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Pesan</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4 text-gray-700 text-sm"><?= date('d M Y H:i', strtotime(esc($contact['created_at']))) ?></td>
                            <td class="py-3 px-4 text-gray-700 font-medium"><?= esc($contact['name']) ?></td>
                            <td class="py-3 px-4 text-gray-700"><?= esc($contact['email']) ?></td>
                            <td class="py-3 px-4 text-gray-700 max-w-xs overflow-hidden text-ellipsis whitespace-nowrap"><?= esc($contact['message']) ?></td>
                            <td class="py-3 px-4">
                                <a href="<?= site_url('admin/contacts/delete/' . $contact['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-full text-sm transition duration-200">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php $this->endSection(); ?>