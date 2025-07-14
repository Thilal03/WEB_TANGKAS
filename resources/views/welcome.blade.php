<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TANGKAS - Booking Lapangan Bulutangkis</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <style>
            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="bg-gray-50">
        <!-- Error Messages -->
        @if(session('error'))
            <div class="fixed top-4 right-4 z-50 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Navigation -->
        <nav class="bg-white shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <h1 class="text-2xl font-bold text-blue-600">TANGKAS</h1>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="#hero" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition">Beranda</a>
                            <a href="#features" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition">Fitur</a>
                            <a href="#about" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition">Tentang</a>
                            <a href="#contact" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition">Kontak</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition">Register</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="hero" class="bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">
                        Selamat Datang di <span class="text-yellow-400">TANGKAS</span>
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 text-blue-100">
                        Sistem Booking Lapangan Bulutangkis Terbaik di Indonesia
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('register') }}" class="bg-yellow-400 hover:bg-yellow-500 text-blue-900 px-8 py-4 rounded-lg font-semibold text-lg transition transform hover:scale-105">
                            Mulai Booking Sekarang
                        </a>
                        <a href="#features" class="border-2 border-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-lg font-semibold text-lg transition">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Mengapa Memilih TANGKAS?
                    </h2>
                    <p class="text-xl text-gray-600">
                        Kami menyediakan layanan booking lapangan bulutangkis terbaik dengan berbagai keunggulan
                    </p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center p-6 rounded-lg hover:shadow-lg transition">
                        <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-3xl">🏸</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-900">Lapangan Berkualitas</h3>
                        <p class="text-gray-600">Lapangan bulutangkis dengan standar internasional dan peralatan terbaik</p>
                    </div>
                    <div class="text-center p-6 rounded-lg hover:shadow-lg transition">
                        <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-3xl">📱</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-900">Booking Online</h3>
                        <p class="text-gray-600">Booking mudah dan cepat melalui sistem online 24/7</p>
                    </div>
                    <div class="text-center p-6 rounded-lg hover:shadow-lg transition">
                        <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-3xl">💰</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-900">Harga Terjangkau</h3>
                        <p class="text-gray-600">Harga bersaing dengan fasilitas dan layanan terbaik</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                            Tentang TANGKAS
                        </h2>
                        <p class="text-lg text-gray-600 mb-6">
                            TANGKAS adalah platform booking lapangan bulutangkis terdepan yang menghubungkan pemain dengan lapangan berkualitas tinggi. 
                            Kami berkomitmen untuk memberikan pengalaman bermain bulutangkis terbaik dengan sistem booking yang mudah dan efisien.
                        </p>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600 mb-2">1000+</div>
                                <div class="text-gray-600">Pemain Aktif</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600 mb-2">50+</div>
                                <div class="text-gray-600">Lapangan Tersedia</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-600 rounded-lg p-8 text-white">
                        <h3 class="text-2xl font-bold mb-4">Fitur Unggulan</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <span class="mr-3">✓</span>
                                Booking online 24/7
                            </li>
                            <li class="flex items-center">
                                <span class="mr-3">✓</span>
                                Konfirmasi via WhatsApp
                            </li>
                            <li class="flex items-center">
                                <span class="mr-3">✓</span>
                                Pembayaran mudah
                            </li>
                            <li class="flex items-center">
                                <span class="mr-3">✓</span>
                                Layanan pelanggan 24/7
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 bg-blue-600 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    Siap untuk Bermain?
                </h2>
                <p class="text-xl mb-8 text-blue-100">
                    Bergabunglah dengan ribuan pemain bulutangkis yang telah mempercayai TANGKAS
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="bg-yellow-400 hover:bg-yellow-500 text-blue-900 px-8 py-4 rounded-lg font-semibold text-lg transition transform hover:scale-105">
                        Daftar Sekarang
                    </a>
                    <a href="{{ route('login') }}" class="border-2 border-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-lg font-semibold text-lg transition">
                        Login
                    </a>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Hubungi Kami
                    </h2>
                    <p class="text-xl text-gray-600">
                        Ada pertanyaan? Tim kami siap membantu Anda
                    </p>
                </div>
                <div class="grid md:grid-cols-3 gap-8 text-center">
                    <div class="p-6">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">📧</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Email</h3>
                        <p class="text-gray-600">info@tangkas.com</p>
                    </div>
                    <div class="p-6">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">📱</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">WhatsApp</h3>
                        <p class="text-gray-600">+62 812-3456-7890</p>
                    </div>
                    <div class="p-6">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">📍</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Alamat</h3>
                        <p class="text-gray-600">Jl. Olahraga No. 123, Jakarta</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-2xl font-bold text-blue-400 mb-4">TANGKAS</h3>
                        <p class="text-gray-400">
                            Platform booking lapangan bulutangkis terbaik di Indonesia
                        </p>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Layanan</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white transition">Booking Lapangan</a></li>
                            <li><a href="#" class="hover:text-white transition">Pembayaran Online</a></li>
                            <li><a href="#" class="hover:text-white transition">Konfirmasi WhatsApp</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Perusahaan</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white transition">Tentang Kami</a></li>
                            <li><a href="#" class="hover:text-white transition">Kebijakan Privasi</a></li>
                            <li><a href="#" class="hover:text-white transition">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Ikuti Kami</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition">📘</a>
                            <a href="#" class="text-gray-400 hover:text-white transition">📷</a>
                            <a href="#" class="text-gray-400 hover:text-white transition">🐦</a>
                            <a href="#" class="text-gray-400 hover:text-white transition">📺</a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2024 TANGKAS. Thilal Said Zaidan</p>
                </div>
            </div>
        </footer>
    </body>
</html>
