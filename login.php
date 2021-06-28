<?php
    include('path.php');
    require_once(ROOT_PATH . '/include/db-functions.php');
?>
<?php
include(ROOT_PATH . '/include/head.php');
?>
    <title>Login -TheHours</title>
</head>

<body>
    <div class="app">
        <!-- BEGIN header -->
        <div class="header">
            <a href="<?php echo BASE_URL ?>" class="thehours-logo">
                <span class="main-title">TheHours</span>
                <span class="sub-title">Tin tức nhanh nhất</span>
            </a>
        </div>
        <!-- END header -->
    </div>
    <div class="login-form">
        <div class="form-title">
            <p>Đăng nhập</p>
        </div>
        <form action="login.php" method="POST">
            <div class="row">
                <div class="form-label">
                    <label for="username">Username:</label>
                </div>
                <div class="form-input">
                    <i class="far fa-user"></i>
                    <input type="text" id="login-username" name="username" placeholder="Type your username">
                </div>
            </div>
            <div class="row">
                <div class="form-label">
                    <label for="password">Password:</label>
                </div>
                <div class="form-input">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="login-password" name="password" placeholder="Type your password">
                </div>
                <a href="#" style="float: right; font-size: 12px; margin-top: 5px;">Quên mật khẩu?</a>
            </div>

            <input type="submit" value="LOGIN" name="login-btn">

            <?php include('./include/message.php') ?>
        </form>
        <p style="text-align: center; margin-top: 80px; font-size: 14px;">Hoặc <a href="<?php echo BASE_URL . 'signup.php' ?>">đăng ký ngay</a></p>
    </div>
</body>

</html>