<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Anju Shop</title>
    <link rel="shortcut icon" type="image/x-icon" href="/images/logo.png">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/sweetalert.js'])
    <!-- JavaScript Sweet Alert -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            /* Sesuaikan dengan nama font Bunny yang Anda gunakan */
        }

        #loading {
            position: fixed;
            top: 50%;
            left: 50%;
            /* transform: translate(-50%, -50%); */
        }
    </style>
</head>

<body>

    @include('layouts.navigation')

    <!-- Page Heading -->

    <div class="main">
        @if (isset($header))
        @include('sweetalert::alert')
        <header class="bg-white shadow">
            <div class="max-w-4xl mx-auto py-6 px-6 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif
        <main class="content max-w-4xl mx-auto py-6 px-6 sm:px-6 lg:px-8">
            {{ $slot }}

        </main>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <strong>Botong Shop</strong> &copy;
                        </p>
                    </div>
                </div>
            </div>
        </footer>4
    </div>


    <!-- Page Content -->
    <!-- <main class="pt-2 px-1 sm:px-1 lg:px-5">
        
        {{ $slot }}
    </main> -->


    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if($message = Session::get('success'))
    <script>
        Swal.fire('{{ $message }}');
    </script>
    @endif
    @if($message = Session::get('failed'))
    <script>
        Swal.fire('{{ $message }}');
    </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if($message = Session::get('success'))
    Swal.fire({
    icon: 'success',
    title: '{{ $message }}',
    });
    @endif

  @include('sweetalert::alert')
</body>

<script>
    // Tampilkan spinner loading selama 3 detik
    window.onload = function() {
        // Tampilkan spinner loading
        document.getElementById('loading').style.display = 'block';

        // Semua konten dashboard akan disembunyikan selama 3 detik
        document.querySelector('.container-fluid').style.display = 'none';

        // Tunggu 3 detik, kemudian sembunyikan spinner loading dan tampilkan konten dashboard
        setTimeout(function() {
            document.getElementById('loading').style.display = 'none';
            document.querySelector('.container-fluid').style.display = 'block';
        }, 1000); // Waktu loading (dalam milidetik)
    };
</script>
<script 
</html>