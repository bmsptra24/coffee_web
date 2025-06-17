<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= esc($title) ?> | Admin Kafe Kopi Mantap</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style type="text/tailwindcss">
        /* Mendefinisikan warna kustom Tailwind CSS menggunakan @theme */
        @theme {
            --color-primary-coffee: #8B4513; /* Coklat kopi */
            --color-secondary-beige: #F5F5DC; /* Beige lembut */
            --color-accent-gold: #FFD700;    /* Emas aksen */
            --color-text-dark: #333333;      /* Teks gelap */
            --color-text-light: #F8F8F8;     /* Teks terang */
        }
        
        body {
      font-family: 'Inter', sans-serif;
    }

    .sidebar {
      background-color: #8B4513;
      color: #F8F8F8;
    }

    .nav-link {
      font-weight: 500;
    }

    .nav-link.active {
      background-color: rgba(0, 0, 0, 0.2);
      border-left: 4px solid #FFD700;
      color: #FFD700;
      font-weight: 700;
    }

    .nav-link:hover {
      background-color: rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body class="flex flex-col md:flex-row min-h-screen">

    <!-- Mobile Sidebar Toggle -->
    <div class="md:hidden bg-white p-4 shadow flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800"><?= esc($title) ?></h1>
        <button id="toggleSidebar" class="text-2xl text-gray-700 focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Sidebar -->
    <aside id="mobileSidebar"
        class="sidebar w-64 p-5 fixed inset-y-0 left-0 transform -translate-x-full md:translate-x-0 md:relative md:flex md:flex-col md:justify-between transition-transform duration-300 z-50">
        <div>
            <h1 class="text-3xl font-bold mb-8 text-yellow-400">Admin Panel</h1>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="<?= site_url('admin') ?>"
                            class="nav-link block py-3 px-4 rounded-lg transition duration-200 <?= (current_url() == site_url('admin') || current_url() == site_url('admin/')) ? 'active' : '' ?>">
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="<?= site_url('admin/menus') ?>"
                            class="nav-link block py-3 px-4 rounded-lg transition duration-200 <?= strpos(current_url(), 'admin/menus') !== false ? 'active' : '' ?>">
                            Manajemen Menu
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="<?= site_url('admin/promos') ?>"
                            class="nav-link block py-3 px-4 rounded-lg transition duration-200 <?= strpos(current_url(), 'admin/promos') !== false ? 'active' : '' ?>">
                            Manajemen Promo
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="<?= site_url('admin/reviews') ?>"
                            class="nav-link block py-3 px-4 rounded-lg transition duration-200 <?= strpos(current_url(), 'admin/reviews') !== false ? 'active' : '' ?>">
                            Ulasan Pelanggan
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="<?= site_url('admin/contacts') ?>"
                            class="nav-link block py-3 px-4 rounded-lg transition duration-200 <?= strpos(current_url(), 'admin/contacts') !== false ? 'active' : '' ?>">
                            Pesan Kontak
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="<?= site_url('admin/settings') ?>"
                            class="nav-link block py-3 px-4 rounded-lg transition duration-200 <?= strpos(current_url(), 'admin/settings') !== false ? 'active' : '' ?>">
                            Pengaturan Website
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="text-center mt-10">
            <a href="<?= site_url('admin/auth/logout') ?>"
                class="block bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full transition duration-300 border-2 border-red-700">
                Logout
            </a>
        </div>
    </aside>

    <!-- Overlay (hanya muncul di mobile saat sidebar terbuka) -->
    <div id="overlay"
        class="fixed inset-0 bg-black/50 z-40 hidden md:hidden transition-opacity duration-300"></div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <header class="bg-white p-4 hidden md:flex justify-between items-center border-b-2 border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800"><?= esc($title) ?></h2>
            <div class="text-gray-600">
                Halo, <span class="font-bold"><?= session()->get('username') ?></span>!
            </div>
        </header>

        <main class="flex-1 p-8 overflow-y-auto">
            <?php if (session()->getFlashdata('success')): ?>
                <div
                    class="flash-message bg-green-100 border-2 border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4">
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="flash-message bg-red-100 border-2 border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('info')): ?>
                <div class="flash-message bg-blue-100 border-2 border-blue-400 text-blue-700 px-4 py-3 rounded-lg relative mb-4">
                    <strong class="font-bold">Info!</strong>
                    <span class="block sm:inline"><?= session()->getFlashdata('info') ?></span>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="flash-message bg-red-100 border-2 border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4">
                    <strong class="font-bold">Validasi Gagal!</strong>
                    <ul class="list-disc list-inside">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <!-- Script Sidebar Toggle -->
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('mobileSidebar');
        const overlay = document.getElementById('overlay');

        toggleBtn?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        // Auto hide flash messages
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.flash-message').forEach(msg => {
                setTimeout(() => msg.remove(), 5000);
            });
        });
    </script>
</body>

</html>