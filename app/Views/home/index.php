<?php
$this->extend('layouts/default');
$this->section('content');
?>

<section id="home" class="relative h-screen flex items-center justify-center text-center text-text-light"
    style="background-image: url('<?= base_url($hero_image) ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="hero-overlay absolute inset-0 bg-black opacity-60"></div> <!-- Darker overlay for contrast -->
    <div class="relative z-10 px-4 max-w-4xl">
        <h1 class="text-5xl md:text-7xl font-extrabold mb-6 drop-shadow-2xl animate-fade-in-down text-accent-gold tracking-wide">
            Nikmati Setiap Tegukan<br>Kopi Terbaik Kami
        </h1>
        <p class="text-xl md:text-3xl mb-10 leading-relaxed animate-fade-in-up font-light text-secondary-beige">
            Temukan aroma kopi pilihan, hidangan lezat, dan suasana hangat yang sempurna untuk bersantai atau bekerja.
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
            <a href="#menu" class="bg-accent-gold text-primary-coffee hover:bg-secondary-beige hover:text-primary-coffee
                        font-bold py-4 px-10 rounded-full text-xl md:text-2xl
                        transition duration-500 ease-in-out transform hover:scale-110 inline-block
                        shadow-xl border-2 border-primary-coffee">
                Jelajahi Menu Kami <span class="ml-2">&#x2192;</span>
            </a>
            <a href="#submit-review" class="bg-primary-coffee text-text-light hover:bg-accent-gold hover:text-primary-coffee
                        font-bold py-4 px-10 rounded-full text-xl md:text-2xl
                        transition duration-500 ease-in-out transform hover:scale-110 inline-block
                        shadow-xl border-2 border-accent-gold">
                Berikan Ulasan <span class="ml-2">&#x2B50;</span>
            </a>
        </div>
    </div>
</section>

<section id="menu" class="py-20 bg-gradient-to-br from-secondary-beige to-white">
    <div class="container mx-auto px-8 text-center">
        <h2 class="text-5xl font-bold mb-16 text-primary-coffee relative pb-4">
            <span class="relative z-10">Menu Unggulan</span>
            <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-accent-gold rounded-full"></span>
        </h2>
        <?php if (!empty($menus)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <?php foreach ($menus as $menu): ?>
                    <div class="bg-white rounded-xl shadow-2xl overflow-hidden transform hover:scale-105 transition duration-500
                                group animate-fade-in-up border border-gray-200">
                        <div class="relative overflow-hidden">
                            <img src="<?= base_url($menu['image']) ?>" alt="<?= esc($menu['name']) ?>" class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-50"></div>
                            <span class="absolute top-4 right-4 bg-primary-coffee text-white text-lg font-semibold px-4 py-2 rounded-full shadow-lg">
                                Rp <?= number_format(esc($menu['price']), 0, ',', '.') ?>
                            </span>
                        </div>
                        <div class="p-8 text-left">
                            <h3 class="text-3xl font-bold mb-3 text-primary-coffee group-hover:text-accent-gold transition duration-300"><?= esc($menu['name']) ?></h3>
                            <p class="text-gray-700 mb-6 line-clamp-3 leading-relaxed"><?= esc($menu['description']) ?></p>
                            <div class="text-center">
                                <button class="bg-primary-coffee text-text-light px-6 py-3 rounded-full font-semibold text-lg
                                            hover:bg-accent-gold hover:text-primary-coffee transition duration-300
                                            transform hover:translate-y-1 shadow-md">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-gray-600 text-xl py-10">Menu unggulan belum tersedia. Segera hadir!</p>
        <?php endif; ?>
    </div>
</section>

<section id="about" class="py-20 bg-white">
    <div class="container mx-auto px-8 flex flex-col md:flex-row items-center gap-16">
        <div class="md:w-1/2 text-center md:text-left animate-fade-in-left">
            <h2 class="text-5xl font-bold mb-10 text-primary-coffee relative pb-4">
                <span class="relative z-10">Tentang Kami</span>
                <span class="absolute bottom-0 left-0 w-24 h-1 bg-accent-gold rounded-full"></span>
            </h2>
            <p class="text-lg leading-loose text-gray-700 mb-6">
                <?= nl2br(esc($about_us)) ?: 'Selamat datang di Kafe Kopi Mantap! Kami bersemangat menyajikan kopi berkualitas terbaik dari biji pilihan yang dipanggang dengan sempurna. Lebih dari sekadar tempat minum kopi, kami menciptakan ruang di mana setiap tegukan adalah pengalaman, setiap kunjungan adalah momen relaksasi. Kami percaya pada kehangatan komunitas dan seni meracik kebahagiaan dalam cangkir.' ?>
            </p>
            <p class="text-lg leading-loose text-gray-700">
                Dari biji kopi Arabika pilihan hingga camilan buatan tangan yang lezat, kami berkomitmen untuk memberikan kualitas dan kepuasan tak tertandingi. Datang dan rasakan perbedaannya!
            </p>
        </div>
        <div class="md:w-1/2 flex justify-center animate-fade-in-right">
            <img src="https://images.unsplash.com/photo-1556740767-414a9c4860c1?q=80&w=1171&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Interior Kafe Kopi Mantap" class="rounded-2xl shadow-3xl w-full max-w-md object-cover transform hover:scale-105 transition duration-500">
        </div>
    </div>
</section>

<section id="location" class="py-20 bg-secondary-beige">
    <div class="container mx-auto px-8 text-center">
        <h2 class="text-5xl font-bold mb-16 text-primary-coffee relative pb-4">
            <span class="relative z-10">Temukan Kami</span>
            <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-accent-gold rounded-full"></span>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
            <div class="text-center bg-white p-8 rounded-xl shadow-lg border border-gray-200 animate-fade-in-left">
                <h3 class="text-3xl font-bold text-primary-coffee mb-6">Informasi Kontak & Jam Buka</h3>
                <p class="text-lg mb-4 text-gray-700">
                    <strong class="text-primary-coffee block mb-2 text-xl">Alamat Kami:</strong>
                    <?= nl2br(esc($location_address)) ?: 'Jl. Kopi Nikmat No. 123, Kota Rasa, 12345' ?>
                </p>
                <p class="text-lg text-gray-700">
                    <strong class="text-primary-coffee block mb-2 text-xl">Jam Operasional:</strong>
                    <?= nl2br(esc($opening_hours)) ?: 'Senin - Jumat: 08:00 - 22:00<br>Sabtu - Minggu: 09:00 - 23:00' ?>
                </p>
                <a href="#contact" class="mt-8 inline-block bg-primary-coffee text-white font-bold py-3 px-6 rounded-full
                                        hover:bg-accent-gold hover:text-primary-coffee transition duration-300 shadow-md">
                    Hubungi Kami
                </a>
            </div>
            <div class="w-full h-96 bg-gray-200 rounded-xl shadow-lg overflow-hidden animate-fade-in-right border border-gray-200">
                <?= $location_map_embed ?: '<div class="flex items-center justify-center h-full text-gray-500">Peta lokasi kafe akan ditampilkan di sini.</div>' ?>
            </div>
        </div>
    </div>
</section>

<section id="promo" class="py-20 bg-white">
    <div class="container mx-auto px-8 text-center">
        <h2 class="text-5xl font-bold mb-16 text-primary-coffee relative pb-4">
            <span class="relative z-10">Penawaran Spesial</span>
            <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-accent-gold rounded-full"></span>
        </h2>
        <?php if (!empty($promos)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <?php foreach ($promos as $promo): ?>
                    <div class="bg-white rounded-xl shadow-2xl overflow-hidden flex flex-col md:flex-row
                                transform hover:scale-105 transition duration-500 group border border-gray-200 animate-fade-in-up">
                        <div class="relative md:w-1/2 overflow-hidden">
                            <img src="<?= base_url($promo['image']) ?>" alt="<?= esc($promo['title']) ?>" class="w-full h-64 md:h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-primary-coffee to-transparent opacity-60"></div>
                        </div>
                        <div class="p-8 flex flex-col justify-center text-left md:w-1/2">
                            <h3 class="text-3xl font-bold mb-3 text-primary-coffee group-hover:text-accent-gold transition duration-300"><?= esc($promo['title']) ?></h3>
                            <p class="text-gray-700 mb-6 leading-relaxed line-clamp-4"><?= nl2br(esc($promo['description'])) ?></p>
                            <a href="#contact" class="bg-accent-gold text-primary-coffee hover:bg-secondary-beige hover:text-primary-coffee
                                font-bold py-3 px-8 rounded-full text-lg transition duration-300 self-start
                                transform hover:translate-y-1 shadow-md">
                                Klaim Promo Sekarang!
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-gray-600 text-xl py-10">Tidak ada promo yang tersedia saat ini. Pantau terus penawaran menarik kami!</p>
        <?php endif; ?>
    </div>
</section>

<section id="reviews" class="py-20 bg-secondary-beige">
    <div class="container mx-auto px-8 text-center">
        <h2 class="text-5xl font-bold mb-16 text-primary-coffee relative pb-4">
            <span class="relative z-10">Apa Kata Pelanggan Kami?</span>
            <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-accent-gold rounded-full"></span>
        </h2>
        <?php if (!empty($reviews)): ?>
            <div class="carousel-container relative max-w-5xl mx-auto rounded-2xl shadow-3xl bg-white p-10 border border-gray-200">
                <div class="carousel-track flex">
                    <?php foreach ($reviews as $review): ?>
                        <div class="carousel-slide flex-shrink-0 w-full text-center px-4">
                            <p class="text-2xl md:text-3xl italic text-gray-700 mb-8 leading-snug">
                                <span class="text-accent-gold text-5xl mr-2">&#8220;</span><?= esc($review['content']) ?><span class="text-accent-gold text-5xl ml-2">&#8221;</span>
                            </p>
                            <p class="text-xl font-bold text-primary-coffee">- <?= esc($review['author']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <p class="text-gray-600 text-xl py-10">Belum ada ulasan yang ditampilkan.</p>
        <?php endif; ?>
    </div>
</section>

<section id="submit-review" class="py-20 bg-primary-coffee text-text-light">
    <div class="container mx-auto px-8 text-center">
        <h2 class="text-5xl font-bold mb-16 relative pb-4">
            <span class="relative z-10">Berikan Ulasan Anda</span>
            <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-accent-gold rounded-full"></span>
        </h2>

        <?php if (session()->getFlashdata('review_success')): ?>
            <div class="flash-message bg-green-600 text-white p-4 rounded-lg mb-6 max-w-lg mx-auto border-2 border-green-700">
                <?= session()->getFlashdata('review_success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('review_error')): ?>
            <div class="flash-message bg-red-600 text-white p-4 rounded-lg mb-6 max-w-lg mx-auto border-2 border-red-700">
                <?= session()->getFlashdata('review_error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('review_errors')): ?>
            <div class="flash-message bg-red-600 text-white p-4 rounded-lg mb-6 max-w-lg mx-auto text-left border-2 border-red-700">
                <strong class="font-bold">Gagal Mengirim Ulasan:</strong>
                <ul class="list-disc list-inside mt-2">
                    <?php foreach (session()->getFlashdata('review_errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('reviews/submit') ?>" method="post" class="max-w-xl mx-auto bg-white p-10 rounded-2xl border-2 border-gray-200 text-text-dark">
            <div class="mb-6 text-left">
                <label for="author" class="block text-gray-800 text-base font-semibold mb-2">Nama Anda:</label>
                <input type="text" id="author" name="author" value="<?= old('author') ?>"
                    class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                              focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                    placeholder="Masukkan nama Anda" required>
            </div>
            <div class="mb-8 text-left">
                <label for="content" class="block text-gray-800 text-base font-semibold mb-2">Ulasan Anda:</label>
                <textarea id="content" name="content" rows="7"
                    class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                                 focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                    placeholder="Berikan ulasan Anda di sini..." required><?= old('content') ?></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-accent-gold text-primary-coffee hover:bg-secondary-beige hover:text-primary-coffee
                            font-bold py-4 px-10 rounded-full text-xl
                            transition duration-300 transform hover:scale-105 border-2 border-primary-coffee">
                    Kirim Ulasan <span class="ml-2">&#x27A4;</span>
                </button>
            </div>
        </form>
    </div>
</section>


<section id="contact" class="py-20 bg-primary-coffee text-text-light">
    <div class="container mx-auto px-8 text-center">
        <h2 class="text-5xl font-bold mb-16">Hubungi Kami</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="flash-message bg-green-600 text-white p-4 rounded-lg mb-6 max-w-lg mx-auto border-2 border-green-700">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="flash-message bg-red-600 text-white p-4 rounded-lg mb-6 max-w-lg mx-auto border-2 border-red-700">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="flash-message bg-red-600 text-white p-4 rounded-lg mb-6 max-w-lg mx-auto text-left border-2 border-red-700">
                <strong class="font-bold">Gagal Mengirim Pesan:</strong>
                <ul class="list-disc list-inside mt-2">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('contact') ?>" method="post" class="max-w-xl mx-auto bg-white p-10 rounded-2xl border-2 border-gray-200 text-text-dark">
            <div class="mb-6 text-left">
                <label for="name" class="block text-gray-800 text-base font-semibold mb-2">Nama Lengkap:</label>
                <input type="text" id="name" name="name" value="<?= old('name') ?>"
                    class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                              focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                    placeholder="Masukkan nama lengkap Anda" required>
            </div>
            <div class="mb-6 text-left">
                <label for="email" class="block text-gray-800 text-base font-semibold mb-2">Email:</label>
                <input type="email" id="email" name="email" value="<?= old('email') ?>"
                    class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                              focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                    placeholder="namaanda@contoh.com" required>
            </div>
            <div class="mb-8 text-left">
                <label for="message" class="block text-gray-800 text-base font-semibold mb-2">Pesan Anda:</label>
                <textarea id="message" name="message" rows="7"
                    class="appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight
                                 focus:outline-none focus:ring-4 focus:ring-accent-gold focus:border-transparent transition duration-300"
                    placeholder="Tulis pesan Anda di sini..." required><?= old('message') ?></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-primary-coffee text-text-light hover:bg-accent-gold hover:text-primary-coffee
                            font-bold py-4 px-10 rounded-full text-xl
                            transition duration-300 transform hover:scale-105 border-2 border-primary-coffee">
                    Kirim Pesan <span class="ml-2">&#x27A4;</span>
                </button>
            </div>
        </form>
    </div>
</section>

<?php $this->endSection(); ?>