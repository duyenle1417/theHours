<?php
include("path.php");
require_once(ROOT_PATH . '/include/db-functions.php');
require_once(ROOT_PATH . '/admin/include/users_functions.php');

if (isset($_SESSION['user_id'])) {
    $user = getUserById($_GET['id']); ?>
?>

<?php
include(ROOT_PATH . '/include/head.php'); ?>
<title>Profile | TheHours</title>


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

        <!-- Begin MENU -->
        <?php include(ROOT_PATH . '/include/menu.php'); ?>
        <!-- End MENU -->

        <div class="admin-content">
            <div class="edit-user-form">
                <form action="" method="post" name="form" enctype="multipart/form-data">
                    <?php include(ROOT_PATH . '/include/message.php'); ?>
                    <!-- id -->
                    <input type="text" id="id" name="id" value="<?php echo $user['id']; ?>" hidden>

                    <!-- fullname -->
                    <div class="row">
                        <div class="col-25">
                            <label for="fullname">Fullname:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fullname" name="fullname" placeholder="Nguyễn Văn A..."
                                value="<?php echo $user['fullname'] ?>">
                        </div>
                    </div>

                    <!-- username -->
                    <div class="row">
                        <div class="col-25">
                            <label for="username">Username:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="username" name="username" placeholder="Type username here..."
                                disabled value="<?php echo $user['username'] ?>">
                        </div>
                    </div>

                    <!-- email -->
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Email:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="email" name="email" placeholder="Type your email here..."
                                value="<?php echo $user['email'] ?>">
                        </div>
                    </div>

                    <!-- role_id -->
                    <div class="row">
                        <div class="col-25">
                            <label for="role_id">Quyền:</label>
                        </div>
                        <div class="col-75">
                            <select name="role_id" id="role_id">
                                <option value="0" selected disabled>- Hãy chọn quyền tài khoản -</option>

                                <?php
                    $roles = GetAllRoles();
    foreach ($roles as $role) {
        if ($role['id'] === $user['role_id']) {
            ?>
                                <option value="<?php echo $role['id'] ?>" selected><?php echo $role['role'] ?></option>
                                <?php
        } else {?>
                                <option value="<?php echo $role['id'] ?>"><?php echo $role['role'] ?></option>
                                <?php
                    }
    } ?>
                            </select>
                        </div>
                    </div>

                    <!-- Button Submit -->
                    <div class="btn-group">
                        <input type="submit" value="Update" name="update-user-profile">
                    </div>
                </form>
                <div>
                <a href="change-password.php?id=<?php echo $_SESSION['user_id'] ?>" style="font-size: 16px; margin-top: 5px;">Đổi mật khẩu?</a>
            </div>
            </div>
            
            
        </div>
    </div>
</body>

</html>
<?php
} else {
        header('location: ' . BASE_URL);
    }?>

