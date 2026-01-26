<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Register</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        input, button { display: block; margin: 10px 0; padding: 8px; width: 300px; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>

<h2>Test Register (Web)</h2>

@if(session('success'))
    <p class="success">{{ session('success') }}</p>
@endif

@if($errors->any())
    <div class="error">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('test.register.submit') }}">
    @csrf

    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

    <button type="submit">Register</button>
</form>

</body>
</html>
