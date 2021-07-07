<?php
// lấy posts từ db
$tab_most_view = $post_model->GetPostsByTopicTab($topic['id'], 10, 'views');
$tab_recent = $post_model->GetPostsByTopicTab($topic['id'], 10, 'id');
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