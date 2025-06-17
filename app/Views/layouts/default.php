<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kafe Kopi Mantap - Nikmati Setiap Tegukan</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-RXf+QSDCUQs6o0NsM0BQF9dyuG+6GwRw+q9h3IRdzUNwBfIVyrU1ZRmjh6W6AqKRMp/6d0ZB5bZsU9d7f9SBpA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

        /* Custom styles for hero section background image */
        .hero-background {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        /* Overlay for hero section */
        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.5); /* Overlay gelap */
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #8B4513;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #6C3511;
        }
        /* Simple carousel styling */
        .carousel-container {
            overflow: hidden;
        }
        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .carousel-slide {
            min-width: 100%;
            box-sizing: border-box;
            padding: 1rem;
        }
    </style>
</head>

<body class="text-text-dark">

    <!-- Header & Navigation -->
    <header class="bg-primary-coffee text-text-light shadow-lg fixed w-full z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="<?= site_url('/') ?>" class="text-2xl font-bold tracking-wider hover:text-accent-gold transition duration-300">Coffe Kita</a>
            <div class="hidden md:flex space-x-8 items-center">
                <a href="#home" class="hover:text-accent-gold transition duration-300">Beranda</a>
                <a href="#menu" class="hover:text-accent-gold transition duration-300">Menu</a>
                <a href="#about" class="hover:text-accent-gold transition duration-300">Tentang Kami</a>
                <a href="#location" class="hover:text-accent-gold transition duration-300">Lokasi</a>
                <a href="#promo" class="hover:text-accent-gold transition duration-300">Promo</a>
                <a href="#reviews" class="hover:text-accent-gold transition duration-300">Ulasan</a>
                <a href="#contact" class="hover:text-accent-gold transition duration-300">Kontak</a>
                <a href="<?= site_url('admin') ?>" class="bg-accent-gold text-primary-coffee px-4 py-2 rounded-full hover:bg-secondary-beige hover:text-primary-coffee transition duration-300">Admin</a>
            </div>
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-text-light focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-primary-coffee">
            <nav class="flex flex-col items-center py-4 space-y-4">
                <a href="#home" class="block py-2 hover:text-accent-gold transition duration-300">Beranda</a>
                <a href="#menu" class="block py-2 hover:text-accent-gold transition duration-300">Menu</a>
                <a href="#about" class="block py-2 hover:text-accent-gold transition duration-300">Tentang Kami</a>
                <a href="#location" class="block py-2 hover:text-accent-gold transition duration-300">Lokasi</a>
                <a href="#promo" class="block py-2 hover:text-accent-gold transition duration-300">Promo</a>
                <a href="#reviews" class="block py-2 hover:text-accent-gold transition duration-300">Ulasan</a>
                <a href="#contact" class="block py-2 hover:text-accent-gold transition duration-300">Kontak</a>
                <a href="<?= site_url('admin') ?>" class="bg-accent-gold text-primary-coffee px-4 py-2 rounded-full hover:bg-secondary-beige hover:text-primary-coffee transition duration-300">Admin</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-16"> <!-- Sesuaikan padding-top dengan tinggi header -->
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-primary-coffee text-text-light py-8">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; <?= date('Y') ?> Coffe Kita. All rights reserved.</p>
            <div class="mt-4 text-sm">
                <a href="#" class="hover:text-accent-gold mx-2">Kebijakan Privasi</a> |
                <a href="#" class="hover:text-accent-gold mx-2">Syarat & Ketentuan</a>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });

                // Close mobile menu after clicking a link
                const mobileMenu = document.getElementById('mobile-menu');
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            });
        });

        // Toggle mobile menu visibility
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Carousel for reviews (simple JS)
        const carouselTrack = document.querySelector('.carousel-track');
        if (carouselTrack) {
            const carouselSlides = document.querySelectorAll('.carousel-slide');
            let currentSlide = 0;
            const slideCount = carouselSlides.length;

            function moveToSlide(index) {
                if (index >= slideCount) {
                    currentSlide = 0;
                } else if (index < 0) {
                    currentSlide = slideCount - 1;
                } else {
                    currentSlide = index;
                }
                carouselTrack.style.transform = 'translateX(-' + currentSlide * 100 + '%)';
            }

            // Auto slide every 5 seconds
            setInterval(() => {
                moveToSlide(currentSlide + 1);
            }, 5000);
        }

        // Auto-hide success/error messages
        const messages = document.querySelectorAll('.flash-message');
        messages.forEach(message => {
            setTimeout(() => {
                message.remove();
            }, 5000); // Hapus pesan setelah 5 detik
        });
    </script>
</body>

</html>