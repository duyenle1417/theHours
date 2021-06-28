<?php
include("path.php");
require_once(ROOT_PATH . '/include/db-functions.php');
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
        <?php include(ROOT_PATH . '/include/menu.php'); ?>
        <!-- End MENU -->
        

        <div class="app__container">
        <?php include(ROOT_PATH . '/include/message.php'); ?>

            <div class="headlines-section">
                <!-- HEADLINE BEGIN -->
                <div class="main-news">
                    <?php $post = $tab_recent = getPostHeadline(); ?>
                    <div class="main-news__picture">
                        <a href="#">
                            <img src="<?php echo $post['image_path'] ?>" alt="" class="main-news__picture--img">
                        </a>
                    </div>
                    <div class="main-news__label">
                        <a href="#"><?php echo $post['title'] ?></a>
                    </div>
                    <div class="main-news__action">
                        <div class="main-news__view">
                            <i class="far fa-eye"></i>
                            <span class="main-news__view-label"><?php echo $post['views'] ?></span>
                        </div>
                        <div class="main-news__comment">
                            <i class="far fa-comment"></i>
                            <span class="main-news__comment-label"><?php echo getCommentsNumberOfPost($post['id']); ?></span>
                        </div>
                    </div>
                </div>
                <!-- HEADLINE END -->
                <!-- BEGIN TAB -->
                <?php
                $tab_recent = GetPostsTab(15, 'id');
                $tab_most_view = GetPostsTab(15, 'views');
                ?>
                <div class="tabs">
                    <div class="tab-btn">
                        <button class="nav-tabs active" onclick="openTab(event, 'tin-moi')">Tin mới</button>
                        <button class="nav-tabs" onclick="openTab(event, 'doc-nhieu')">Đọc nhiều</button>
                    </div>
                    <div class="tab-content" id="tin-moi">
                    <?php foreach ($tab_recent as $post) { ?>
                        <div class="tab-content__item">
                            <span class="tab-content__time"><?php echo $mysqldate = date('H:i d/m/y', strtotime($post['create_date'])); ?></span>
                            <a href="<?php echo BASE_URL . "article.php?id=" . $post['id']; ?>" class="tab-content__link"><?php echo $post['title'] ?></a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="tab-content" id="doc-nhieu" style="display: none;">
                        <?php foreach ($tab_most_view as $post) { ?>
                        <div class="tab-content__item">
                            <span class="tab-content__time"><?php echo $mysqldate = date('H:i d/m/y', strtotime($post['create_date'])); ?></span>
                            <a href="<?php echo BASE_URL . "article.php?id=" . $post['id']; ?>" class="tab-content__link"><?php echo $post['title'] ?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- END TAB -->
            </div>

            <!-- BEGIN TOPIC -->
            <div class="category">
                <h2 class="category__heading">THỜI SỰ</h2>
                <div class="category__content">
                    <!-- main new -->
                    <div class="grid__column-6 main-category">
                        <div class="main-news__picture">
                            <a href="#">
                                <img src="./assets/img/Huyện Chương Mỹ.jpg" alt="" class="main-news__picture--img">
                            </a>
                        </div>
                        <div class="main-news__label">
                            <a href="#">
                                Huyện Chương Mỹ dùng đá dăm lấp hố "tử thần"
                            </a>
                        </div>
                        <div class="main-news__action">
                            <div class="main-news__view">
                                <i class="far fa-eye"></i>
                                <span class="main-news__view-label">100</span>
                            </div>
                            <div class="main-news__comment">
                                <i class="far fa-comment"></i>
                                <span class="main-news__comment-label">100</span>
                            </div>
                        </div>
                    </div>
                    <!-- main new end -->

                    <!-- SUB NEW LIST -->
                    <div class="grid__column-6 sub-category__list">
                        <div class="sub-category__item" href="#">
                            <div class="sub-news__picture">
                                <a href="#">
                                    <img src="./assets/img/đề xuất quy hoạch.jpg" alt="" class="sub-news__picture--img">
                                </a>
                            </div>
                            <div class="sub-news__info">
                                <div class="sub-news__label">
                                    <a href="#">Đề xuất quy hoạch 42 tuyến cao tốc</a>
                                </div>
                                <div class="sub-news__action">
                                    <div class="sub-news__view">
                                        <i class="far fa-eye"></i>
                                        <span class="sub-news__view-label">100</span>
                                    </div>
                                    <div class="sub-news__comment">
                                        <i class="far fa-comment"></i>
                                        <span class="sub-news__comment-label">100</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sub-category__item" href="#">
                            <div class="sub-news__picture">
                                <a href="#">
                                    <img src="./assets/img/đề xuất quy hoạch.jpg" alt="" class="sub-news__picture--img">
                                </a>
                            </div>
                            <div class="sub-news__info">
                                <div class="sub-news__label">
                                    <a href="#">Đề xuất quy hoạch 42 tuyến cao tốc</a>
                                </div>
                                <div class="sub-news__action">
                                    <div class="sub-news__view">
                                        <i class="far fa-eye"></i>
                                        <span class="sub-news__view-label">100</span>
                                    </div>
                                    <div class="sub-news__comment">
                                        <i class="far fa-comment"></i>
                                        <span class="sub-news__comment-label">100</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sub-category__item" href="#">
                            <div class="sub-news__picture">
                                <a href="#">
                                    <img src="./assets/img/đề xuất quy hoạch.jpg" alt="" class="sub-news__picture--img">
                                </a>
                            </div>
                            <div class="sub-news__info">
                                <div class="sub-news__label">
                                    <a href="#">Đề xuất quy hoạch 42 tuyến cao tốc</a>
                                </div>
                                <div class="sub-news__action">
                                    <div class="sub-news__view">
                                        <i class="far fa-eye"></i>
                                        <span class="sub-news__view-label">100</span>
                                    </div>
                                    <div class="sub-news__comment">
                                        <i class="far fa-comment"></i>
                                        <span class="sub-news__comment-label">100</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SUBNEW LIST END -->
                </div>
            </div>
            <!-- END TOPIC -->
        </div>

        <!-- BEGIN footer.php -->
        <?php include(ROOT_PATH . '/include/footer.php') ?>
        <!-- END footer.php -->
    </div>
</body>

</html>