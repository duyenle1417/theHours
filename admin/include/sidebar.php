<div class="admin-sidebar">
    <ul>
        <li><a href="<?php echo BASE_URL . 'admin/article/'; ?>">Quản lý Bài viết</a></li>
        <?php if($_SESSION['user_role_id'] === 1){ ?>
            <li><a href="<?php echo BASE_URL . 'admin/user/'; ?>">Quản lý User</a></li>
            <li><a href="<?php echo BASE_URL . 'admin/topic/'; ?>">Quản lý Topic</a></li>
            <!-- <li><a href="<?php echo BASE_URL . 'admin/comment/'; ?>">Quản lý Bình luận</a></li> -->
        <?php } ?>
    </ul>
</div>