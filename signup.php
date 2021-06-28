<?php
    include('path.php');
    require_once(ROOT_PATH . '/include/db-functions.php');
?>
<?php
include(ROOT_PATH . '/include/head.php');
?>
    <title>Signup -TheHours</title>
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
    <div class="signup-form">
        <div class="form-title">
            <p>Đăng ký</p>
        </div>
        <form action="signup.php" method="POST">
            <div class="row">
                <div class="form-label">
                    <label for="username">Username:</label>
                </div>
                <div class="form-input">
                    <i class="far fa-user"></i>
                    <input type="text" id="username" name="username" placeholder="Type your username">
                </div>
            </div>
            <div class="row">
                <div class="form-label">
                    <label for="email">Email:</label>
                </div>
                <div class="form-input">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Type your email">
                </div>
                
            </div>
            <div class="row">
                <div class="form-label">
                    <label for="password">Password:</label>
                </div>
                <div class="form-input">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Type your password">
                </div>
            </div>

            <div class="row">
                <div class="form-label">
                    <label for="passwordConf">Retype Password:</label>
                </div>
                <div class="form-input">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="passwordConf" name="passwordConf" placeholder="Retype your password">
                </div>
            </div>

            <div class="row">
                <div class="form-label">
                    <label for="fullname">Fullname:</label>
                </div>
                <div class="form-input">
                    <i class="fas fa-font"></i>
                    <input type="text" id="fullname" name="fullname" placeholder="Type your name">
                </div>
            </div>

            <input type="submit" value="Register" name="register-btn">

            <?php include('./include/message.php') ?>
        </form>
        <p style="text-align: center; margin-top: 80px; font-size: 14px;">Hoặc <a href="<?php echo BASE_URL . 'login.php' ?>">đăng nhập!</a></p>
    </div>
</body>

</html>
