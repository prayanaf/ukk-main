<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="/image.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lapor PKL - SMKN 2 Depok Sleman</title>
    <meta name="description" content="Sistem monitoring pengajuan Praktik Kerja Lapangan (PKL) untuk siswa SMKN 2 Depok Sleman. Pantau status pengajuan PKL Anda secara real-time dan efisien." />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-[#F2F2F2] font-sans">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <i class="fas fa-school text-[#500073] text-3xl"></i>
                        <span class="ml-2 text-xl font-bold text-[#500073]">Lapor PKL</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="/login" class="px-4 py-2 text-[#500073] hover:text-[#2A004E] font-medium">Login</a>
                        <a href="/register" class="px-4 py-2 bg-[#500073] text-white rounded-md hover:bg-[#2A004E] transition duration-300 font-medium">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Login spacing -->
        <div class="h-14.5 hidden lg:block"></div>

        <!-- Hero Section -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:flex lg:items-center lg:justify-between">
                    <div class="lg:w-1/2">
                        <h1 class="text-4xl font-extrabold text-[#500073] sm:text-5xl mb-8">
                            <span class="block">Monitoring</span>
                            <span class="block">Pengajuan PKL</span>
                        </h1>
                        <style>
                            .animated-bg {
                                background: linear-gradient(270deg, #2A004E, #500073, #F14A00);
                                background-size: 300% 300%;
                                animation: gradientAnimation 15s ease infinite;
                                padding: 8px; /* Perkecil padding agar tidak terlalu besar */
                            }
                            @keyframes gradientAnimation {
                                0% { background-position: 0% 50%; }
                                50% { background-position: 90% 50%; } /* Kurangi jarak animasi */
                                100% { background-position: 0% 50%; }
                            }
                        </style>
                        <div class="animated-bg py-8 text-center text-white rounded-lg shadow-lg">
                            <h2 class="text-3xl font-bold">Pantau Status PKL dengan Mudah!</h2>
                            <p class="mt-4 text-md">Sistem ini memudahkanmu untuk mengetahui progres pengajuan PKL secara real-time.</p>
                        </div>
                        <p class="mt-4 text-lg text-gray-600 max-w-lg">
                            Platform digital untuk memantau status pengajuan PKL siswa SMKN 2 Depok Sleman. Mudah, cepat, dan transparan.
                        </p>
                        <div class="mt-6 flex items-center space-x-6">
                            <div class="text-center">
                                <i class="fas fa-check-circle text-[#500073] text-3xl"></i>
                                <p class="text-sm text-gray-600 mt-1">Pengajuan Diterima</p>
                            </div>
                            <div class="text-center">
                                <i class="fas fa-file-alt text-[#500073] text-3xl"></i>
                                <p class="text-sm text-gray-600 mt-1">Dokumen Lengkap</p>
                            </div>
                            <div class="text-center">
                                <i class="fas fa-graduation-cap text-[#500073] text-3xl"></i>
                                <p class="text-sm text-gray-600 mt-1">PKL Disetujui</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="mt-10 lg:mt-0 lg:w-1/2 ml-6 lg:ml-12">
                        <div class="bg-gradient-to-r from-[#2A004E] via-[#500073] to-[#F14A00] p-1 rounded-lg">
                            <div class="bg-white rounded-lg overflow-hidden">
                                <img src="https://media.licdn.com/dms/image/v2/C4E1BAQEnfLQVe-3W_w/company-background_10000/company-background_10000/0/1608756732736/smk_n_2_depok_sleman_yogyakarta_cover?e=2147483647&v=beta&t=7pQyPfZNOvssIcwYq5Q7jk3eVXGqwOyBNOaMQKlG9zg" alt="SMKN 2 Depok Sleman" class="w-full h-auto" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-16 bg-[#EDE4F4]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-[#500073]">Fitur Sistem</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                        Pantau proses pengajuan PKL Anda dengan mudah
                    </p>
                </div>

                <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-[#EDE4F4]">
                        <div class="w-12 h-12 bg-[#EDE4F4] rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-[#500073]">
                                <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="16" y1="13" x2="8" y2="13"/>
                                <line x1="16" y1="17" x2="8" y2="17"/>
                                <line x1="10" y1="9" x2="8" y2="9"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-[#500073]">Status Pengajuan</h3>
                        <p class="mt-2 text-gray-600">
                            Pantau status pengajuan PKL secara real-time
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-[#EDE4F4]">
                        <div class="w-12 h-12 bg-[#EDE4F4] rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-[#500073]">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-[#500073]">Timeline</h3>
                        <p class="mt-2 text-gray-600">
                            Lihat timeline proses pengajuan PKL
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-[#EDE4F4]">
                        <div class="w-12 h-12 bg-[#EDE4F4] rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-[#500073]">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                <polyline points="22 4 12 14.01 9 11.01"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-[#500073]">Notifikasi</h3>
                        <p class="mt-2 text-gray-600">
                            Dapatkan update status pengajuan otomatis
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-[#EDE4F4]">
                        <div class="w-12 h-12 bg-[#EDE4F4] rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-[#500073]">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                <path d="m9 12 2 2 4-4"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-[#500073]">Dokumen Digital</h3>
                        <p class="mt-2 text-gray-600">
                            Kelola dokumen pengajuan secara digital
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-[#2A004E] text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <div class="flex items-center">
                            <i class="fas fa-school text-[#500073] text-3xl"></i>
                            <span class="ml-2 text-xl font-bold">Lapor PKL</span>
                        </div>
                        <p class="mt-4 text-white/70">
                            Sistem monitoring pengajuan PKL SMKN 2 Depok Sleman
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-medium">Menu</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-white/70 hover:text-white">Beranda</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white">Panduan Pengajuan</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="mt-12 pt-8 border-t border-white/10 text-center text-white/70">
                    <p>© 2025 Lapor PKL - SMKN 2 Depok Sleman. by Rhenaff-UKK.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>