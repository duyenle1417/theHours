<?php
include("../../path.php");
require_once(ROOT_PATH . '/include/db-functions.php');
require_once(ROOT_PATH . '/admin/include/users_functions.php');

//check if user's role is ADMIN else redirect to unauthorized page
if (isset($_SESSION['user_id']) && $_SESSION['user_role_id'] === 1) {
    $user = getUserById($_GET['id']); ?>

<?php
include(ROOT_PATH . '/admin/include/head.php'); ?>
    <title>Chỉnh sửa thông tin tài khoản | Admin TheHours</title>
</head>

<body>
<!-- BEGIN HEADER -->
<div class="admin-header">
    <div class="logo">
        <a href="<?php echo BASE_URL . "admin/dashboard.php"; ?>">ADMIN DASHBOARD</a>
    </div>

    <div class="menu">
        <ul id="main-menu">
            <li>
                <a href="<?php echo BASE_URL . "profile.php" ?>" style="text-transform: none;"><span><i class="fas fa-portrait"></i></span> <?php echo $_SESSION['user_username'] ?> <span><i class="fas fa-sort-down"></i></span></a>
                <div class="sub-menu">
                    <ul> 
                        <li>
                            <a href="<?php echo BASE_URL; ?>">
                            <span><i class="fas fa-home"></i></span> Home
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo BASE_URL . "admin/dashboard.php"; ?>">
                            Dashboard
                            </a>
                        </li>
                    
                        <li>
                            <a href="<?php echo BASE_URL . "logout.php" ?>">
                            <span><i class="fas fa-sign-out-alt"></i></span>Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    </div>

<!-- END HEADER -->


<!-- BEGIN SIDEBAR -->
<?php
    include(ROOT_PATH . '/admin/include/sidebar.php'); ?>
<!-- END SIDEBAR -->

<!-- BEGIN ADMIN CONTENT -->
<div class="admin-content">
    <div class="title">
        <p>Chỉnh sửa thông tin tài khoản</p>
    </div>

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
                    <input type="text" id="fullname" name="fullname"
                        placeholder="Nguyễn Văn A..." value="<?php echo $user['fullname'] ?>">
                </div>
            </div>

            <!-- username -->
            <div class="row">
                <div class="col-25">
                    <label for="username">Username:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="username" name="username"
                        placeholder="Type username here..." disabled value="<?php echo $user['username'] ?>">
                </div>
            </div>

            <!-- email -->
            <div class="row">
                <div class="col-25">
                    <label for="email">Email:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="email" name="email"
                        placeholder="Type your email here..." value="<?php echo $user['email'] ?>">
                </div>
            </div>

            <!-- password -->
            <!-- <div class="row">
                <div class="col-25">
                    <label for="password">Password:</label>
                </div>
                <div class="col-75">
                    <input type="password" id="password" name="password" placeholder="Type your password">
                </div>
            </div> -->

            <!-- password retype -->
            <!-- <div class="row">
                <div class="col-25">
                    <label for="passwordConf">Retype Password:</label>
                </div>
                <div class="col-75">
                    <input type="password" id="passwordConf" name="passwordConf" placeholder="Retype your password" >
                </div>
            </div> -->

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
                    } else{?>
                            <option value="<?php echo $role['id'] ?>"><?php echo $role['role'] ?></option>
                        <?php
                    }
                    } ?>
                </select>
                </div>
            </div>

            <!-- Button Submit -->
            <div class="btn-group">
                <input type="submit" value="Update" name="update-user">
            </div>
        </form>
    </div>
</div>
<!-- END ADMIN CONTENT -->

    
</body>
<script>
    var editor = CKEDITOR.replace('content',
        {
            height: 450,
            filebrowserBrowseUrl: '../../ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : '../../ckfinder/ckfinder.html?type=Images',
            filebrowserUploadUrl : '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserWindowWidth: '1000',
            filebrowserWindowHeight: '800'
        });
    CKFinder.setupCKEditor(editor);
</script>
</html>
<?php
} else {
        header('location: ' . BASE_URL);
    }?>