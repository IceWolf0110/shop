<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('styles/login.css') }}">
</head>
<body>
<div class="login-box">
    <h2>Đăng nhập tài khoản</h2>
    <?php if (isset($error)): ?>
        <div class="error">{{ $error }}</div>
    <?php endif; ?>

    <form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <button type="submit">Đăng nhập</button>
    </form>

    <div class="links">
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('forgot.password') }}">Quên mật khẩu?</a>    </div>
</div>
</body>
</html>
