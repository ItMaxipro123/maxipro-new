<!DOCTYPE html>
<html>

<head>
    <title>Access Denied</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS file -->
</head>

<body>
    <div class="container">
        <h1>Access Denied</h1>
        <p>{{ $message ?? 'Halaman Tidak Diizinkan, Anda Masih Belum Login.' }}</p>
        <a href="{{ route('admin.dashboard') }}">Go to Log In</a>
    </div>
</body>

</html>