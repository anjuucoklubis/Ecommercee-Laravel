<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Responsive Login and Signup Form </title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/auth/authcss.css') }}">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Masuk</header>
                <form action="/sesi/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label"> email </label>
                        <input type="email" name="email" placeholder="email" class="form-control" value="{{ Session::get('email') }}">
                    </div>
                    @error('email')
                    <small>{{ $message }} </small>
                    @enderror
                    <div class="mb-3">
                        <label for="password" class="form-label"> password </label>
                        <input type="password" name="password" placeholder="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    @error('password')
                    <small>{{ $message }} </small>
                    @enderror

                    <div class="form-link">
                        <a href="#" class="forgot-pass">Lupa Kata sandi ?</a>
                    </div>

                    <div class="mb-3 d-grid">
                        <button name="submit" type="submit">Masuk</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Belum punya akun? <a href="/register" class="">Daftar</a></span>
                </div>
            </div>

            <!-- <div class="line"></div>

            <div class="media-options">
                <a href="#" class="field facebook">
                    <i class='bx bxl-google facebook-icon'></i>
                    <span>Login with Google</span>
                </a>
            </div> -->
            <br>

            <div>
                <small>
                    <p class="mt-2 mb-5 text-muted">&copy; 2024 | Botong Shop - All Rights Reserved</p>
                </small>
            </div>
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