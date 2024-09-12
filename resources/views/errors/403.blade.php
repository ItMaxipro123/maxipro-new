<!DOCTYPE html>
<html>

<head>
    <title>Access Denied</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS file -->
</head>

<body>
    <div class="container">
        <h1>Access Denied</h1>
        <p>{{ $message ?? 'You do not have permission to access this page.' }}</p>
        <a href="{{ route('admin.dashboard') }}">Go to Dashboard</a>
    </div>
</body>

</html>