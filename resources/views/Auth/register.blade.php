<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-login">
        <div class="card-login">
            <div class="isi">
                <div class="text">
                    <h4>Mulai Baru</h4>
                    <h1>Buat Akun Baru.</h1>
                    <h5>Sudah Punya Akun? <a href="{{ route('login') }}">Login</a></h5>
                </div>
                <form action="{{ route('store.register') }}" method="POST">
                    @csrf
                    <div class="group gas">
                        <div  class="ig">
                        <input type="text" name="first_name" autocomplete="off" placeholder="First Name" value="{{ old('first_name') }}">
                        @error('first_name')
                          <p class="eror">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="ig">
                        <input type="text" name="last_name" autocomplete="off" placeholder="Last Name" value="{{ old('last_name') }}">
                        @error('last_name')
                          <p class="eror">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                    <p class="eror">{{ $message }}</p>
                    @enderror
                    <input type="password" name="password" placeholder="Password">
                    @error('password')
                    <p class="eror">{{ $message }}</p>
                    @enderror
                    <div class="group">
                        <button type="reset">Reset</button>
                        <button class="buat" type="submit">Buat Akun</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</body>
</html>
