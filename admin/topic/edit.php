<?php
include("../../path.php");
require_once(ROOT_PATH . '/include/db-functions.php');
require_once(ROOT_PATH . '/admin/include/topics_functions.php');

//check if user's role is ADMIN else redirect to unauthorized page
if (isset($_SESSION['user_id']) && $_SESSION['user_role_id'] === 1) {
    $topic = getTopicById($_GET['id']); ?>

<?php
include(ROOT_PATH . '/admin/include/head.php'); ?>
    <title>Chỉnh sửa danh mục | Admin TheHours</title>
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
        <p>Chỉnh sửa danh mục</p>
    </div>

    <div class="edit-topic-form">
        <form action="" method="post" name="form" enctype="multipart/form-data">
        <input type="text" id="id" name="id"value="<?php echo $topic['id']; ?>" hidden>
            <!-- name -->
            <div class="row">
                <div class="col-25">
                    <label for="name">Tên topic:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="name" name="name"
                        placeholder="Thời sự..." value="<?php echo $topic['name']; ?>">
                </div>
            </div>

            <!-- parent_topic_id -->
            <div class="row">
                <div class="col-25">
                    <label for="parent_topic_id">Danh mục cha:</label>
                </div>
                <div class="col-75">
                <select name="parent_topic_id" id="parent_topic_id">
                    <option value="#" disabled>- Hãy chọn danh mục cha -</option>
                    <option value="NULL">Trống</option>
                    <?php
                        $parent_topics = getParentTopics();
    foreach ($parent_topics as $parent_topic) {
        if ($parent_topic['id'] === $topic['parent_topic_id']) { ?>
                                <option value="<?php echo $parent_topic['id'] ?>" selected><?php echo $parent_topic['name'] ?></option>
                            <?php
                            } else { ?>
                                <option value="<?php echo $parent_topic['id'] ?>"><?php echo $parent_topic['name'] ?></option>
                            <?php } ?>
                        <?php
    } ?>
                </select>
                </div>
            </div>

            <!-- Button Submit -->
            <div class="btn-group">
                <input type="submit" value="Update" name="update-topic">
            </div>
            <?php include(ROOT_PATH . '/include/message.php'); ?>
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