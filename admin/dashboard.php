<?php
include("../path.php");
require_once(ROOT_PATH . '/include/db-functions.php');
if (isset($_SESSION['user_id']) && $_SESSION['user_role_id'] !== 3) { ?>

<?php
include(ROOT_PATH . '/admin/include/head.php'); ?>
<title>Dashboard | TheHours</title>
<link rel="stylesheet" href="../assets/css/admin-style.css">

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

    <!-- Admin Page Wrapper -->
    <div class="admin-wrap">

        <?php include(ROOT_PATH . '/admin/include/sidebar.php'); ?>

        <!-- Admin Content -->
        <div class="admin-content">

            <h2 class="page-title">Dashboard</h2>

            
            <!-- // Admin Content -->
        </div>
        <!-- // Page Wrapper -->
</div>
</body>

</html>
<?php } else {
    header('location: ' . BASE_URL);
}?>