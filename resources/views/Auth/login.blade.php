<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-login">
        <div class="card-login">
            <div class="isi">
                <div class="text">
                    <h4>Selamat Datang</h4>
                    <h1>Login Untuk Masuk.</h1>
                    <h5>Belum Punya Akun? <a href="{{ route('register') }}">Register</a></h5>
                    @if (session()->has('sukses'))
                    <h4>{{ session()->get('sukses') }}</h4>
                    @endif
                </div>
                <form action="{{ route('store.login') }}" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                    <p class="eror">{{ $message }}</p>   
                    @enderror
                    <input type="password" name="password" placeholder="Password">
                    @error('password')
                    <p class="eror">{{ $message }}</p>   
                    @enderror
                    <div class="group">
                        <button class="buat" type="submit">Login</button>
                    </div>
                </form>

            </div>
         
        </div>
    </div>
</body>
</html>