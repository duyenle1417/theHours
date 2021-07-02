<?php
include("../../path.php");
require_once(ROOT_PATH . '/include/db-functions.php');
require_once(ROOT_PATH . '/admin/include/topics_functions.php');

//check if user's role is ADMIN else redirect to unauthorized page
if (isset($_SESSION['user_id']) && $_SESSION['user_role_id'] === 1) {
    ?>

<?php
include(ROOT_PATH . '/admin/include/head.php'); ?>
<title>Quản lý danh mục | Admin TheHours</title>

</head>

<body>
    <!-- BEGIN HEADER -->
    <div class="admin-header">
        <div class="logo">
            <a href="<?php echo BASE_URL . "admin/dashboard.php"; ?>">ADMIN DASHBOARD</a>
        </div>

        <?php include(ROOT_PATH . '/admin/include/menu.php'); ?>
    </div>

    <!-- END HEADER -->

    <!-- Admin Page Wrapper -->
    <div class="admin-wrap">

        <?php include(ROOT_PATH . '/admin/include/sidebar.php'); ?>


        <!-- Admin Content -->
        <div class="admin-content">

            <h2 class="page-title">Topic's Dashboard</h2>

            <div class="btn"><a href="add.php" class="add-btn">Add</a></div>

            <div class="content">
                <div class="topic-table">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Topic</th>
                                <th>Topic cha</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>

                        <!-- lấy topic cha -->
                        <!-- tìm xem có topic con nào với topic cha trên -->

                        <tbody>
                            <?php
                        $topics = getAllTopics();
                        $STT = 1;
                        foreach ($topics as $topic) {?>

                            <tr>
                                <td><?php echo $STT; ?></td>
                                <td>
                                    <span style="font-weight: 500;"><?php echo $topic['name']; ?></span>
                                </td>
                                <td class="parent_topic_id">
                                    <?php echo(getTopicNameByID($topic['parent_topic_id']) === null ? '<span style="color: red;">null</span>' : '<span style="color: #2B54C1;">'.getTopicNameByID($topic['parent_topic_id']).'</span>'); ?>
                                </td>
                                <td class="thaotac">
                                    <div class="btn-group">
                                        <a href="edit.php?id=<?php echo $topic['id']; ?>" class="edit-btn">Edit</a>
                                        <a href="index.php?delete_id=<?php echo $topic['id']; ?>"
                                            class="delete-btn">Delete</a>
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
</body>

</html>
<?php
} else {
                            header('location: ' . BASE_URL);
                        }?>