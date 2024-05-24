<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="/images/logo.png">
    <title>Anju Shop</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- JavaScript Sweet Alert -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangani klik pada tautan halaman berikutnya
            document.addEventListener('click', function(e) {
                if (e.target.closest('.pagination a')) {
                    e.preventDefault(); // Menghentikan tindakan bawaan tautan

                    // Simpan posisi scroll saat ini
                    var scrollYBeforeLoad = window.scrollY;

                    // Mengambil URL dari atribut href tautan yang diklik
                    var nextPageUrl = e.target.closest('.pagination a').getAttribute('href');

                    // Memuat konten produk baru menggunakan AJAX
                    fetch(nextPageUrl)
                        .then(response => response.text())
                        .then(data => {
                            // Mengganti konten dalam div "produk-container"
                            document.getElementById('#produk-container').innerHTML = data;

                            // Mengatur ulang posisi scroll setelah memuat konten baru
                            window.scrollTo(0, scrollYBeforeLoad);
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        });
    </script>

    <script>
        function redirectTo(url) {
            window.location.href = url;
        }
    </script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('modules.front.layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            @include('modules.front.checkout')

        </main>
    </div>
</body>

</html>