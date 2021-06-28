<?php
// PHP include/require
include("path.php");
require_once(ROOT_PATH . '/include/db-functions.php');

// kiểm tra url hợp lệ
if (isset($_GET['id'])) {
    // get post info
    $post = getPostById($_GET['id']);
    if (count($post) >0) {
        // get post's topic info
        $topic = getTopicById($post['topic_id']);
        // get user info
        $user = getUserById($post['user_id']); 
        //update views
        $views = $post['views'] + 1;
        UpdateView($post['id'], $views);
        ?>

<?php
include(ROOT_PATH . '/include/head.php'); ?>
<title><?php echo $post['title']; ?> | TheHours</title>
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

        <div class="app__container">
            <div class="path-library">
                <a href="<?php echo BASE_URL ?>">Home</a>
                <!-- topic path -->
                <?php if ($topic['parent_topic_id'] !== null) {
            echo '<span>/</span>';
            $parent = getTopicById($topic['parent_topic_id']); ?>
                <a href="<?php echo BASE_URL . 'category.php?id=' . $parent['id']; ?>"><?php echo $parent['name'] ?></a>
                <?php
        } ?>
                <span>/</span>
                <a href="<?php echo BASE_URL . 'category.php?id=' . $topic['id']; ?>"><?php echo $topic['name'] ?></a>
                <!-- post path <= title -->
                <span>/ <?php echo $post['title'] ?></span>
            </div>

            <div class="content">
                <!-- topic_id -->
                <div class="content__category"><?php echo $topic['name'] ?></div>

                <!-- title -->
                <h2 class="content__title"><?php echo $post['title']; ?></h2>

                <!-- user_id =>author & create_date -->
                <div class="content__author-view-date">
                    <div class="content__author-comment">
                        <div class="content__author">
                            <span><i class="fas fa-user"></i></span>
                            <?php echo $user['fullname']; ?>
                        </div>

                        <div class="content__comment">
                        <span><i class="far fa-comment"></i></span>
                        <?php echo getCommentsNumberOfPost($post['id']); ?>
                    </div>
                    </div>
                    
                    <div class="content__view-date">
                        <div class="content__date">
                            <span><i class="fas fa-clock"></i></span>
                            <?php echo $mysqldate = date('H:i:s d/m/Y', strtotime($post['create_date'])); ?>
                        </div>

                        <div class="content__views">
                            <span><i class="far fa-eye"></i></span>
                            <?php echo $post['views'] + 1; ?>
                        </div>
                    </div>
                </div>

                <!-- image_path -->
                <div class="content__illustration">
                    <img src="<?php echo $post['image_path'] ?>" alt="">
                </div>

                <!-- content -->
                <div class="content__main">
                    <?php echo html_entity_decode($post['content']) ?>
                </div>
            </div>


            <div class="recent">
                <div class="recent__title">Gần đây</div>
                <div class="grid__row">
                    <div class="grid__column-4">
                        <img src="./assets/img/Huyện Chương Mỹ.jpg" alt="" class="recent__img">
                        <div class="recent__label">Huyện Chương Mỹ dùng đá dăm lấp hố "tử thần"</div>
                        <div class="recent__action">
                            <div class="recent__view">
                                <i class="far fa-eye"></i>
                                <span class="recent__view-label">100</span>
                            </div>
                            <div class="recent__comment">
                                <i class="far fa-comment"></i>
                                <span class="recent__comment-label">100</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid__column-4">
                        <img src="./assets/img/Huyện Chương Mỹ.jpg" alt="" class="recent__img">
                        <div class="recent__label">Huyện Chương Mỹ dùng đá dăm lấp hố "tử thần"</div>
                        <div class="recent__action">
                            <div class="recent__view">
                                <i class="far fa-eye"></i>
                                <span class="recent__view-label">100</span>
                            </div>
                            <div class="recent__comment">
                                <i class="far fa-comment"></i>
                                <span class="recent__comment-label">100</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid__column-4">
                        <img src="./assets/img/Huyện Chương Mỹ.jpg" alt="" class="recent__img">
                        <div class="recent__label">Huyện Chương Mỹ dùng đá dăm lấp hố "tử thần"</div>
                        <div class="recent__action">
                            <div class="recent__view">
                                <i class="far fa-eye"></i>
                                <span class="recent__view-label">100</span>
                            </div>
                            <div class="recent__comment">
                                <i class="far fa-comment"></i>
                                <span class="recent__comment-label">100</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="comment">
                <div class="grid__row">
                    <div class="grid__column-12">
                        <div class="comment__title">Bình luận</div>
                        <div class="comment__area">
                            <i class="fas fa-user comment__avt"></i>
                            <input type="text" placeholder="Bình luận của bạn..." class="comment__input">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- BEGIN footer.php -->
        <?php include(ROOT_PATH . '/include/footer.php') ?>
        <!-- END footer.php -->
    </div>
</body>

</html>

<?php
    }
    else{
        //redirect về home nếu id không có thực
        header("Location: ". BASE_URL);
    }
}//END IF
else
{
    //redirect về home nếu không có id
    header("Location: ". BASE_URL);
}?> 