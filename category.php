<?php
include("path.php");
require_once(ROOT_PATH . '/include/db-functions.php');

// kiểm tra url hợp lệ
if (isset($_GET['id'])) {
    //get topic info
    $topic = getTopicById($_GET['id']);
    if (count($topic) >0) {
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = intval($_GET['page']);
        }
        $results_per_page = 4;
        $page_first_result = ($page-1) * $results_per_page;
        $posts_temp = GetPostsByTopic($topic['id']);//tất cả post
        $number_of_result = count($posts_temp);
        $number_of_page = ceil($number_of_result / $results_per_page);

        //post của page thứ n
        $posts = GetPostsByTopicLimit($topic['id'], $page_first_result, $results_per_page);
        //check number of post
        $number_of_result_this_page = count($posts);
        //tab post
        $tab_most_view = GetPostsByTopicTabMostView($topic['id'], 10);
        $tab_recent = GetPostsByTopicTabRecent($topic['id'], 10); ?>

<?php include(ROOT_PATH . '/include/head.php'); ?>
<title><?php echo $topic['name'] ?> | TheHours</title>

</head>

<body>
    <div class="app">
        <!-- BEGIN header -->
        <div class="header">
            <a href="<?php echo BASE_URL . 'category.php?id=' . $topic['id']; ?>" class="thehours-logo">
                <span class="main-title"><?php echo $topic['name'] ?></span>
                <span class="sub-title">TheHours</span>
            </a>
        </div>
        <!-- END header -->

        <!-- Begin MENU -->
        <?php include(ROOT_PATH . '/include/menu.php') ?>
        <!-- End MENU -->

        <div></div>

        <div class="app__container">
            <div class="path-library">
                <a href="<?php echo BASE_URL ?>">Home</a>
                <?php if ($topic['parent_topic_id'] !== null) {
            echo '<span>/</span>';
            $parent = getTopicById($topic['parent_topic_id']); ?>
                <a href="<?php echo BASE_URL . 'category.php?id=' . $parent['id']; ?>"><?php echo $parent['name'] ?></a>
                <?php
        } ?>
                <span>/</span>
                <a href="<?php echo BASE_URL . 'category.php?id=' . $topic['id']; ?>"><?php echo $topic['name'] ?></a>
            </div>

            <?php
            if ($number_of_result_this_page >=1) { ?>
            <div class="category__with_tab">
                <div class="category__content wrap">
                    <!-- lấy post từ db -->
                    <!-- main new -->
                    <div class="main-category">
                        <div class="main-news__picture">
                            <a href="<?php echo BASE_URL . 'article.php?id=' . $posts[0]['id'] . "&slug=" . $posts[0]['slug']?>">
                                <img src="<?php echo $posts[0]['image_path'] ?>" alt="" class="main-news__picture--img">
                            </a>
                        </div>
                        <div class="main-news__label">
                            <a href="<?php echo BASE_URL . 'article.php?id=' . $posts[0]['id'] . "&slug=" . $posts[0]['slug']?>">
                                <?php echo $posts[0]['title'] ?>
                            </a>
                        </div>
                        <div class="main-news__action">
                            <div class="main-news__view">
                                <i class="far fa-eye"></i>
                                <span class="main-news__view-label"><?php echo $posts[0]['views'] ?></span>
                            </div>
                            <div class="main-news__comment">
                                <i class="far fa-comment"></i>
                                <span
                                    class="main-news__comment-label"><?php echo getCommentsNumberOfPost($posts[0]['id']); ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- main new end -->

                    <!-- sub new -->
                    <?php if ($number_of_result_this_page >=2) {?>
                    <div class="sub-category__list">
                        <?php for ($i=1; $i < count($posts); $i++) {
                ?>
                        <div class="sub-category__item">
                            <div class="sub-news__picture">
                                <a href="<?php echo BASE_URL . 'article.php?id=' . $posts[$i]['id'] . "&slug=" . $posts[$i]['slug']; ?>">
                                    <img src="<?php echo $posts[$i]['image_path'] ?>" alt="" class="sub-news__picture--img">
                                </a>
                                
                            </div>
                            <div class="sub-news__info">
                                <div class="sub-news__label">
                                    <a href="<?php echo BASE_URL . 'article.php?id=' . $posts[$i]['id'] . "&slug=" . $posts[$i]['slug']; ?>">
                                        <?php echo $posts[$i]['title']; ?>
                                    </a>
                                </div>
                                <div class="sub-news__action">
                                    <div class="sub-news__view">
                                        <i class="far fa-eye"></i>
                                        <span class="sub-news__view-label"><?php echo $posts[$i]['views']; ?></span>
                                    </div>
                                    <div class="sub-news__comment">
                                        <i class="far fa-comment"></i>
                                        <span
                                            class="sub-news__comment-label"><?php echo getCommentsNumberOfPost($posts[$i]['id']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
            } ?>
                    </div>
                    <!-- sub new end -->
                    <?php }?>

                </div>

                <!-- TABS -->
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
                            <a href="<?php echo BASE_URL . "article.php?id=" . $post['id'] . "&slug=" . $post['slug']; ?>"
                                class="tab-content__link"><?php echo $post['title'] ?></a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="tab-content" id="doc-nhieu" style="display: none;">
                        <?php foreach ($tab_most_view as $post) { ?>
                        <div class="tab-content__item">
                            <span
                                class="tab-content__time"><?php echo $mysqldate = date('H:i d/m/y', strtotime($post['create_date'])); ?></span>
                            <a href="<?php echo BASE_URL . "article.php?id=" . $post['id'] . "&slug=" . $post['slug']; ?>"
                                class="tab-content__link"><?php echo $post['title'] ?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- TABS END -->
            </div>

            <!-- page pagination -->
            <div class="nav-pagination">
                <!-- Prev btn -->
                <?php if ($page >= 2) { ?>
                <a
                    href="<?php echo BASE_URL . "category.php?id=" . $topic['id'] . "&page=" . ($page-1);?>">Prev</a>
                <?php } ?>

                <!-- Number btn & Next btn -->
                <?php if ($page < $number_of_page) {
                $temp = $page + 1;
                for ($i=(($page-1)===0 ? $page : $page-1); $i <= $temp; $i++) {
                    if ($i === $page) {?>
                        <a class="active"
                            href="<?php echo BASE_URL . "category.php?id=" . $topic['id'] . "&page=" . ($i);?>"><?php echo $i; ?></a>
                        <?php } else { ?>
                        <a
                            href="<?php echo BASE_URL . "category.php?id=" . $topic['id'] . "&page=" . ($i);?>"><?php echo $i; ?></a>
                        <?php } ?>
                        <?php
                } ?>
                        <a
                            href="<?php echo BASE_URL . "category.php?id=" . $topic['id'] . "&page=" . ($page+1); ?>">Next</a>
                        <?php
            } else {
                $temp = $page;
                for ($i=(($page-1)===0 ? $page : $page-1); $i <= $temp; $i++) {
                    if ($i === $page) {?>
                        <a class="active"
                            href="<?php echo BASE_URL . "category.php?id=" . $topic['id'] . "&page=" . ($i);?>"><?php echo $i; ?></a>
                        <?php } else { ?>
                        <a
                            href="<?php echo BASE_URL . "category.php?id=" . $topic['id'] . "&page=" . ($i);?>"><?php echo $i; ?></a>
                        <?php } ?>
                        <?php
                } ?>
                        <?php
            } ?>
                    </div>
                    <!-- page pagination end -->


            <?php } else {
                //nếu topic không có post nào sẽ hiện default hoặc direct về home
                echo 'no post';
            } ?>
        </div>

        <!-- BEGIN footer.php -->
        <?php include(ROOT_PATH . '/include/footer.php') ?>
        <!-- END footer.php -->
    </div>
</body>

</html>

<?php
    } else {
        //redirect về home nếu id không có thực
        header("Location: ". BASE_URL);
    }
}//END IF
else {
    //redirect về home nếu không có id
    header("Location: ". BASE_URL);
}?>