<?php
include("../../path.php");
require_once(ROOT_PATH . '/include/db-functions.php');
require_once(ROOT_PATH . '/admin/include/posts_functions.php');

//check if user's role is ADMIN OR AUTHOR else redirect to unauthorized page
if (isset($_SESSION['user_id']) && $_SESSION['user_role_id'] !== 3) {
    ?>

<?php
include(ROOT_PATH . '/admin/include/head.php'); ?>
    <title>Quản lý bài viết | Admin TheHours</title>
    
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

            <h2 class="page-title">Post's Dashboard</h2>

            <div class="btn"><a href="add.php" class="add-btn">Add</a></div>

            <div class="content">
                <div class="post-table">
                
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Title</th>
                                <th>Topic</th>
                                <?php if ($_SESSION['user_role_id'] === 1) { ?>
                                <th>Author</th>
                                <?php } ?>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if ($_SESSION['user_role_id'] ===1) {
                                $posts = GetAllPosts();
                            } else {
                                $posts = getPostsOfAuthor($_SESSION['user_id']);
                            }
    $STT = 1;
    foreach ($posts as $post) {?>

                            <tr>
                                <td><?php echo $STT; ?></td>
                                <!-- title -->
                                <td class="post_title">
                                    <span style="font-weight: 500;"><?php echo $post['title']; ?></span>
                                </td>
                                <!-- topic -->
                                <td class="topic_name">
                                    <?php echo getTopicNameByID($post['topic_id']); ?>
                                </td>
                                <!-- author -->
                                <?php if ($_SESSION['user_role_id'] === 1) {
        $user = getUserById($post['user_id']); ?>
                                    <td class="author">
                                    <?php echo $user['username']. ' - ' . $user['fullname']; ?>
                                    </td>
                                <?php
    }; ?>
                                <!-- thao tác -->
                                <td class="thaotac">
                                    <div class="btn-group">
                                        <a href="edit.php?id=<?php echo $post['id']; ?>" class="edit-btn">Edit</a>
                                        <a href="index.php?delete_id=<?php echo $post['id']; ?>"
                                            class="delete-btn">Delete</a>
                                        <a href="index.php?PublishToggleId=<?php echo $post['id']; ?>&IsPublished=<?php echo($post['IsPublished'] ? 0 : 1) ?>" class="publish-btn">
                                        <?php echo(!$post['IsPublished'] ? 'published' : 'unpublished') ?>
                                        </a>
                                    </div>
                                </td>

                            </tr>
                            <?php
                        $STT++;
                        }; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            
        </div>
        <!-- // Admin Content -->
    </div>
    <!--// Admin Page Wrapper -->
    <div class="admin">
        hello
    </div>
</body>
</html>
<?php
} else {
                            header('location: ' . BASE_URL);
                        }?>