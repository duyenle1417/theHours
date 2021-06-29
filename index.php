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
                        <a href="<?php echo BASE_URL . 'article.php?id=' . $post['id']?>">
                            <img src="<?php echo $post['image_path'] ?>" alt="" class="main-news__picture--img">
                        </a>
                    </div>
                    <div class="main-news__label">
                        <a
                            href="<?php echo BASE_URL . 'article.php?id=' . $post['id']?>"><?php echo $post['title'] ?></a>
                    </div>
                    <div class="main-news__action">
                        <div class="main-news__view">
                            <i class="far fa-eye"></i>
                            <span class="main-news__view-label"><?php echo $post['views'] ?></span>
                        </div>
                        <div class="main-news__comment">
                            <i class="far fa-comment"></i>
                            <span
                                class="main-news__comment-label"><?php echo getCommentsNumberOfPost($post['id']); ?></span>
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
                            <span
                                class="tab-content__time"><?php echo $mysqldate = date('H:i d/m/y', strtotime($post['create_date'])); ?></span>
                            <a href="<?php echo BASE_URL . "article.php?id=" . $post['id']; ?>"
                                class="tab-content__link"><?php echo $post['title'] ?></a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="tab-content" id="doc-nhieu" style="display: none;">
                        <?php foreach ($tab_most_view as $post) { ?>
                        <div class="tab-content__item">
                            <span
                                class="tab-content__time"><?php echo $mysqldate = date('H:i d/m/y', strtotime($post['create_date'])); ?></span>
                            <a href="<?php echo BASE_URL . "article.php?id=" . $post['id']; ?>"
                                class="tab-content__link"><?php echo $post['title'] ?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- END TAB -->
            </div>


            <?php $topics_parent = getParentTopics();
            foreach ($topics_parent as $topic) {
                // get post
                $post_main = GetPostsByTopicLimit($topic['id'], 0, 1);
                $post_sub = GetPostsByTopicLimit($topic['id'], 1, 3);
                
                if (count($post_main)>=1) {
                    ?>
            <!-- begin TOPIC -->
            <div class="category">
                <!-- heading category -->
                <h2 class="category__heading"><a href="category.php?id=<?php echo $topic['id'] ?>"
                        style="text-decoration: none;"><?php echo getTopicNameByID($topic['id']) ?></a></h2>
                <div class="category__content">
                    <!-- main new -->
                    <div class="grid__column-6 main-category">
                        <div class="main-news__picture">
                            <a href="<?php echo BASE_URL . 'article.php?id=' . $post_main[0]['id']?>">
                                <img src="<?php echo $post_main[0]['image_path']; ?>" alt=""
                                    class="main-news__picture--img">
                            </a>
                        </div>
                        <div class="main-news__label">
                            <a href="<?php echo BASE_URL . 'article.php?id=' . $post_main[0]['id']?>">
                                <?php echo $post_main[0]['title'] ?>
                            </a>
                        </div>
                        <div class="main-news__action">
                            <div class="main-news__view">
                                <i class="far fa-eye"></i>
                                <span class="main-news__view-label"><?php echo $post_main[0]['views'] ?></span>
                            </div>
                            <div class="main-news__comment">
                                <i class="far fa-comment"></i>
                                <span
                                    class="main-news__comment-label"><?php echo getCommentsNumberOfPost($post_main[0]['id']); ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- main new end -->

                    <!-- SUB NEW LIST -->
                    <div class="grid__column-6 sub-category__list">
                        <?php
                        foreach ($post_sub as $post) { ?>
                        <div class="sub-category__item" href="#">
                            <div class="sub-news__picture">
                                <a href="<?php echo BASE_URL . 'article.php?id=' . $post['id']?>">
                                    <img src="<?php echo $post['image_path'] ?>" alt="" class="sub-news__picture--img">
                                </a>
                            </div>
                            <div class="sub-news__info">
                                <div class="sub-news__label">
                                    <a href="<?php echo BASE_URL . 'article.php?id=' . $post['id']?>">
                                        <?php echo $post['title'] ?>
                                    </a>
                                </div>
                                <div class="sub-news__action">
                                    <div class="sub-news__view">
                                        <i class="far fa-eye"></i>
                                        <span class="sub-news__view-label"><?php echo $post['views'] ?></span>
                                    </div>
                                    <div class="sub-news__comment">
                                        <i class="far fa-comment"></i>
                                        <span
                                            class="sub-news__comment-label"><?php echo getCommentsNumberOfPost($post['id']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        } ?>
                    </div>
                    <!-- end TOPIC -->

                </div>
            </div>
            <?php
                }
            }
            ?>

        </div>

        <!-- BEGIN footer.php -->
        <?php include(ROOT_PATH . '/include/footer.php') ?>
        <!-- END footer.php -->
    </div>
</body>

</html>