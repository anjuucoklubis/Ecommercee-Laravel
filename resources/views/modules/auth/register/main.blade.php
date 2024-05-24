<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/auth/authcss.css') }}">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <section class="container forms">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="form login">
            <div class="form-content">
                <header>Daftar Akun</header>
                <!-- View -->
                <form action="/sesi/create" method="POST">
                    @csrf
                    <div class="field input-field">
                        <input type="text" name="firstname" placeholder="Nama Depan" class="input" value="{{ old('firstname') }}">
                    </div>
                    @error('firstname')
                    <small>{{ $message }} </small>
                    @enderror
                    <div class="field input-field">
                        <input type="text" name="lastname" placeholder="Nama Belakang" class="input" value="{{ old('lastname') }}">
                    </div>
                    @error('lastname')
                    <small>{{ $message }} </small>
                    @enderror
                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Email" class="input" value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <small>{{ $message }} </small>
                    @enderror
                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Password" class="password" value="{{ old('password') }}">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>
                    @error('password')
                    <small>{{ $message }} </small>
                    @enderror

                    <div class="field button-field">
                        <button name="submit" type="submit">Daftar</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Sudah memiliki akun? <a href="/login" class="">Masuk</a></span>
                </div>
            </div>

            <!-- <div class="line"></div> -->

            <!-- <div class="media-options">
                <a href="#" class="field facebook">
                    <i class='bx bxl-google facebook-icon'></i>
                    <span>Daftar with Gmail</span>
                </a>
            </div> -->
            <br>
            
            <div>
                <small>
                    <p class="mt-2 mb-5 text-muted">&copy; 2024 | Botong Shop - All Rights Reserved</p>
                </small>
            </div>
        </div>

    </section>

    <!-- JavaScript -->
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
</body>

</html>