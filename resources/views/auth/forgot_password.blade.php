
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" type="text/css" href="styles/forgot.css">
    
</head>
<body>
    <div class="container">
        <!-- Form nhập email -->
        <?php if ($showEmailForm): ?>
        <h2>Đổi mật khẩu</h2>
        <form action="forgot_password.php" method="POST">
            <input type="email" name="email" placeholder="Nhập email của bạn" required>
            <button type="submit" name="submit_email">Gửi yêu cầu đổi mật khẩu</button>
        </form>
        <?php endif; ?>

        <!-- Form nhập mật khẩu mới (hiển thị chỉ sau khi gửi yêu cầu thành công) -->
        <?php if ($showPasswordForm && !$passwordChanged): ?>
        <h2>Nhập mật khẩu mới</h2>
        <form action="forgot_password.php" method="POST">
            <input type="password" name="new_password" placeholder="Nhập mật khẩu mới" required>
            <input type="password" name="confirm_password" placeholder="Xác nhận mật khẩu mới" required>
            <button type="submit" name="submit_new_password">Thay đổi mật khẩu</button>
        </form>
        <?php endif; ?>

        <!-- Hiển thị thông báo thay đổi mật khẩu thành công và nút quay lại đăng nhập -->
        <?php if ($passwordChanged): ?>
        <div class="success-message">
            <p>Mật khẩu của bạn đã được thay đổi thành công!</p>
            <a href="login.php">Quay lại trang đăng nhập</a>
        </div>
        <?php endif; ?>

        <!-- Hiển thị lỗi nếu có -->
        <?php if ($errorMessage): ?>
        <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
