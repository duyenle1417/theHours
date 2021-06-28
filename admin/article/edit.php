<?php
include("../../path.php");
require_once(ROOT_PATH . '/include/db-functions.php');
require_once(ROOT_PATH . '/admin/include/posts_functions.php');

//check if user's role is ADMIN OR AUTHOR else redirect to unauthorized page
if (isset($_SESSION['user_id']) && $_SESSION['user_role_id'] !== 3) {
    //get post value
    $post = getPostById($_GET['id']);

    // condition if the user role is author
    if ($_SESSION['user_role_id'] === 2) {
        // check if the user is the author of this post else redirect
        if ($_SESSION['user_id'] !== $post['user_id']) {
            header('location: ' . BASE_URL . 'admin/article/');
            exit(0);
        }
    } ?>

<?php
include(ROOT_PATH . '/admin/include/head.php'); ?>
    <title>Thêm bài viết | Admin TheHours</title>
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
        <p>Chỉnh sửa bài viết</p>
    </div>

    <div class="edit-post-form">
        <form action="" method="post" name="form" enctype="multipart/form-data">
        <?php include(ROOT_PATH . '/include/message.php'); ?>
        <input type="text" id="id" name="id"value="<?php echo $post['id']; ?>" hidden>
            <!-- title -->
            <div class="row">
                <div class="col-25">
                    <label for="title">Tiêu đề:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="title" name="title"
                        placeholder="" value="<?php echo $post['title']; ?>">
                </div>
            </div>
            
            <!-- content -->
            <div class="row">
                <div class="col-25">
                    <label for="content">Nội dung:</label>
                </div>
                <div class="col-75">
                    <textarea id="content" name="content"
                        placeholder="Enter text here">
                        <?php echo html_entity_decode($post['content']); ?>
                    </textarea>
                </div>
            </div>

            <!-- image_path -->
            <div class="row">
                <div class="col-25">
                    <label for="image_path">Ảnh bìa:</label>
                </div>
                <div class="col-75">
                    <input type="file" id="image_path" name="image_path">
                </div>
            </div>

            <!-- topic_id -->
            <div class="row">
                <div class="col-25">
                    <label for="topic_id">Danh mục:</label>
                </div>
                <div class="col-75">
                <select name="topic_id" id="topic_id">
                    <option value="0" disabled>- Hãy chọn danh mục -</option>
                    <?php
                        $parent_topics = getParentTopics();
                        foreach ($parent_topics as $parent_topic) {
                            $sub_topics = getSubTopics($parent_topic['id']);
                            if ($sub_topic['id'] === $post['topic_id']) { ?>
                                    <option value="<?php echo $parent_topic['id'] ?>" selected><?php echo $parent_topic['name'] ?></option>
                                <?php
                                } else { ?>
                                    <option value="<?php echo $parent_topic['id'] ?>"><?php echo $parent_topic['name'] ?></option>
                                <?php } ?>
                            
                            <?php
                            // if the parent topic has subtopic => arrow
                            // and list all subtopic
                            if (count($sub_topics)>0) {
                                foreach ($sub_topics as $sub_topic) {
                                    if ($sub_topic['id'] === $post['topic_id']) { ?>
                                        <option value="<?php echo $sub_topic['id'] ?>" selected>
                                        <?php echo $parent_topic['name'] . ' >> ' . $sub_topic['name'] ?>
                                    </option>
                                    <?php
                                    } else { ?>
                                        <option value="<?php echo $sub_topic['id'] ?>">
                                        <?php echo $parent_topic['name'] . ' >> ' . $sub_topic['name'] ?>
                                    </option>
                                    <?php } ?>
                                    
                            <?php
                                }
                            }
                            } ?>
                </select>
                </div>
            </div>

            <!-- user_id -->
            <!-- get from $_SESSION -->


            <!-- IsPublished -->
            

            <!-- Button Submit -->
            <div class="btn-group">
                <input type="submit" value="Update" name="update-post">
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
        exit(0);
    }?>