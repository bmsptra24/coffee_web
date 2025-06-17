<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Kafe Kopi Mantap</title>
    <!-- Tailwind CSS JIT Browser Compilation -->
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
            background-color: var(--color-secondary-beige); /* Menggunakan warna kustom untuk latar belakang */
            color: var(--color-text-dark);
        }
        /* Menggunakan custom scrollbar seperti di frontend */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: var(--color-secondary-beige);
        }
        ::-webkit-scrollbar-thumb {
            background: var(--color-primary-coffee);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #6C3511;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-2xl p-10 transform hover:scale-105 transition duration-500 border-2 border-gray-200">
        <h2 class="text-4xl font-extrabold text-center text-primary-coffee mb-8 relative pb-3">
            Login Admin
            <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-20 h-1 bg-accent-gold rounded-full"></span>
        </h2>

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
        <?php if (session()->getFlashdata('info')): ?>
            <div class="flash-message bg-blue-100 border-2 border-blue-400 text-blue-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
                <strong class="font-bold">Info!</strong>
                <span class="block sm:inline"><?= session()->getFlashdata('info') ?></span>
            </div>
        <?php endif; ?>
        <?php if (isset($validation) && $validation->getErrors()): ?>
            <div class="flash-message bg-red-100 border-2 border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
                <strong class="font-bold">Validasi Gagal!</strong>
                <ul class="list-disc list-inside mt-2">
                    <?php foreach ($validation->getErrors() as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('admin/auth/attemptLogin') ?>" method="post">
            <div class="mb-6">
                <label for="username" class="block text-gray-800 text-base font-semibold mb-2">Username:</label>
                <input type="text" id="username" name="username" value="<?= old('username') ?>"
                    class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                           focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                    placeholder="Masukkan username Anda" required autofocus>
            </div>
            <div class="mb-8">
                <label for="password" class="block text-gray-800 text-base font-semibold mb-2">Password:</label>
                <input type="password" id="password" name="password"
                    class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 mb-3 leading-tight
                           focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                    placeholder="Masukkan password Anda" required>
            </div>
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-primary-coffee hover:bg-accent-gold hover:text-primary-coffee
                            text-text-light font-bold py-3 px-8 rounded-full w-full
                            focus:outline-none transition duration-300 transform hover:scale-105 border-2 border-primary-coffee">
                    Login <span class="ml-2">&#x27A4;</span>
                </button>
            </div>
        </form>
        <div class="text-center mt-6 text-gray-600 text-sm">
            Kembali ke <a href="<?= site_url('/') ?>" class="text-primary-coffee hover:text-accent-gold font-semibold transition duration-300">Beranda</a>
        </div>
    </div>
    <script>
        // Auto-hide success/error/info messages after 5 seconds
        const messages = document.querySelectorAll('.flash-message');
        messages.forEach(message => {
            setTimeout(() => {
                message.remove();
            }, 5000); // Remove message after 5 seconds
        });
    </script>
</body>

</html>