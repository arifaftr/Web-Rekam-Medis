<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            .gradient-bg {
                background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            }
            
            .card-shadow {
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            }
            
            .input-focus:focus {
                border-color: #0ea5e9;
                box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
            }
            
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .animate-fade-in-up {
                animation: fadeInUp 0.6s ease-out;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex items-center justify-center gradient-bg py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8 animate-fade-in-up">
                <!-- Logo and Title -->
                <div class="text-center">
                    <div class="mx-auto h-20 w-20 bg-gradient-to-br from-sky-500 to-teal-500 rounded-2xl flex items-center justify-center shadow-xl mb-4">
                        <i class="fas fa-hospital-user text-4xl text-white"></i>
                    </div>
                    <h2 class="text-3xl font-extrabold text-slate-800 mb-2">
                        Sistem Rekam Medis
                    </h2>
                    <p class="text-slate-600 text-sm">
                        Silahkan login untuk melanjutkan
                    </p>
                </div>

                <!-- Card -->
                <div class="bg-white rounded-2xl card-shadow p-8">
                    {{ $slot }}
                </div>
                
                <!-- Footer -->
                <div class="text-center">
                    <p class="text-slate-500 text-sm">
                        © {{ date('Y') }} Sistem Rekam Medis. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
