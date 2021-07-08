<!-- COMMENT begin -->
<div class="comment">
    <div class="grid__row">
        <div class="grid__column-12">
            <div class="comment__title">Bình luận</div>

            <?php
                if (isset($_SESSION['user_id'])) {
                    ?>
                <div class="comment_form">
                    <form action="#comment-list" method="POST">
                        <input type="text" name="post_id" id="post_id" hidden value="<?php echo $post['id'] ?>">
                        <input type="text" name="user_id" id="user_id" hidden value="<?php echo $_SESSION['user_id']; ?>">

                        <textarea name="content" id="content" placeholder="Bình luận..."></textarea>
                        <input type="submit" name="add-comment" id="add-comment" value="Bình luận">
                    </form>
                </div>

            <?php
                } else {
                    echo '<p style="margin-bottom: 10px; font-size: 14px; color: red;">Đăng nhập để bình luận.</p>';
                }
            ?>            

            <!-- comment list -->
            <div class="comment-list" id="comment-list">
                <?php
                $parent_comments = $model->getParentCommentsOfPost($post['id']);
                if ($parent_comments) {
                    ?>
                <ul>
                    <?php foreach ($parent_comments as $parent) { ?>
                        <li>
                            <div class="comment-content">
                                <div class="logo">
                                    <span><i class="fas fa-comment-dots"></i></span> 
                                </div>
                                <p><?php echo $parent['content']; ?></p>
                            </div>
                            
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                ?>
                                <a href="#" class="reply-btn">Trả lời</a>
                                <div class="reply_form" style="display: none;">
                                    <form action="#comment-list" method="POST">
                                        <input type="text" name="post_id" id="post_id" hidden value="<?php echo $post['id'] ?>">
                                        <input type="text" name="user_id" id="user_id" hidden value="<?php echo $_SESSION['user_id']; ?>">
                                        <input type="text" name="parent_comment_id" id="parent_comment_id" hidden value="<?php echo $parent['id'] ?>">

                                        <textarea name="content" id="content" placeholder="Trả lời..."></textarea>
                                        <input type="submit" name="add-reply" id="add-reply" value="Trả lời">
                                    </form>
                                </div>
                            <?php
                            }?>

                            <?php
                                $replies = $model->getRepliesOfComment($parent['id']);
                                $model->ShowReplies($parent['id'], $replies, $post['id']);
                            ?>

                                
                        </li>
                    <?php
                    }
                }
                    ?>
                </ul>
            </div>
            
        </div>
    </div>
</div>
<!-- COMMENT end -->

<!-- Link trả lời => hiện form trả lời -->
<script>
    $(document).ready(function () {
        var showText = "Trả lời";
        var hideText = "Đóng";
        $(".reply-btn").click(function (e) {
            e.preventDefault();

            if ($(this).hasClass("isShown")) {
                $(this).html(showText);
                $(this).removeClass("isShown");
            }
            else {
                $(this).html(hideText);
                $(this).addClass("isShown");
            }
            $(this).next().toggle();
        })
    });
</script>
