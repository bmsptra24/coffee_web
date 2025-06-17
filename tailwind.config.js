// tailwind.config.js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './app/Views/**/*.php', // Semua file view CodeIgniter Anda
    './public/**/*.html',
    './public/**/*.js',
  ],
  theme: {
    extend: {
      fontFamily: {
        inter: ['Inter', 'sans-serif'], // Mendefinisikan font Inter
      },
      colors: {
        'primary-coffee': '#8B4513', // Coklat kopi
        'secondary-beige': '#F5F5DC', // Beige lembut
        'accent-gold': '#FFD700', // Emas aksen
        'text-dark': '#333333',
        'text-light': '#F8F8F8',
      },
    },
  },
  plugins: [],
}
