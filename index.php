<?php
session_start();
include("path.php");

?>

<?php
include(ROOT_PATH . '/include/head.php');
?>
<title>Trang chủ | TheHours</title>

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
        <?php require_once("controllers/MenuController.php"); ?>
        <!-- End MENU -->

        <div class="app__container">
            <!-- begin HEADLINE -->
            <div class="headlines-section">
                <!-- MAINNEW BEGIN -->
                <?php require_once("controllers/HeadlinesController.php"); ?>
                <!-- MAINNEW END -->

                <!-- BEGIN TAB -->
                <?php require_once("controllers/HomeTabController.php"); ?>
                <!-- END TAB -->
            </div>
            <!-- end HEADLINE -->

            <!-- BEGIN CATEGORY LIST -->
            <?php require_once("controllers/HomeCategoryListController.php"); ?>
            <!-- END CATEGORY LIST -->

        </div>

        <!-- BEGIN footer.php -->
        <?php include(ROOT_PATH . '/include/footer.php') ?>
        <!-- END footer.php -->
    </div>
</body>

</html>

