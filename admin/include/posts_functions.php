<?php
//delete post
if (isset($_GET['delete_id'])) {
    global $conn;
    $id=$_GET['delete_id'];
    $sql = "DELETE FROM posts WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: ' . BASE_URL . '/admin/article/index.php');
        exit(0);
    }
}

//add post
if (isset($_POST['add-post'])) {
    // adminOnly();
    global $conn;
    $errors = validatePost($_POST);

    if (!empty($_FILES['image_path']['name'])) {
        $image_name = time() . '_' . $_FILES['image_path']['name'];
        $destination = ROOT_PATH . "/uploads/cover/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image_path'] = $destination;//update path mới
        } else {
            array_push($errors, "Không thể tải ảnh lên máy chủ");
        }
    } else {
        array_push($errors, "Cần phải thêm ảnh cover cho bài viết");
    }

    if (count($errors) == 0) {
        unset($_POST['add-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['IsPublished'] = 1;
        $_POST['content'] = htmlentities($_POST['content']);
        $_POST['slug'] = createSlug($_POST['title']);
        $_POST['views']=0;
        
        $sql = "INSERT INTO posts (`user_id`, `topic_id`, `title`, `content`, `slug`, `image_path`, `IsPublished`, `views`) 
        VALUES ('".$_POST['user_id']."', '".$_POST['topic_id']."', '".$_POST['title']."', '".$_POST['content']."', '".$_POST['slug']."', '".$_POST['image_path']."', '".$_POST['IsPublished']."', '".$_POST['views']. "')";
        
        $result = mysqli_query($conn, $sql);
        header("location: " . BASE_URL . "/admin/article/index.php");
        exit();
    }
}

//update post
if (isset($_POST['update-post'])) {
    // adminOnly();
    global $conn;
    $errors = validatePost($_POST);
    $hasPicture = false;

    if (!empty($_FILES['image_path']['name'])) {
        $image_name = time() . '_' . $_FILES['image_path']['name'];
        $destination = ROOT_PATH . "/uploads/cover/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image_path'] = $destination;//update path mới
            $hasPicture = true;
        } else {
            array_push($errors, "Không thể tải ảnh lên máy chủ");
        }
    }

    if (count($errors) == 0) {
        unset($_POST['update-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['IsPublished'] = isset($_POST['IsPublished']) ? 1 : 0;//cho nút publish thêm ?IsPublished=
        $_POST['content'] = htmlentities($_POST['content']);
        $_POST['slug'] = createSlug($_POST['title']);

        if ($hasPicture) {
            $sql = "UPDATE topics SET `topic_id`"."='".$_POST['topic_id']."', `title`"."='".$_POST['title']."', `content`"."='".$_POST['content']."', `slug`"."='".$_POST['slug']."', `image_path`"."='".$_POST['image_path']."', `IsPublished`"."='".$_POST['IsPublished']."'  WHERE id='".$_POST['id']. "'";
        } else {
            $sql = "UPDATE topics SET `topic_id`"."='".$_POST['topic_id']."', `title`"."='".$_POST['title']."', `content`"."='".$_POST['content']."', `slug`"."='".$_POST['slug']."', `IsPublished`"."='".$_POST['IsPublished']."'  WHERE id='".$_POST['id']. "'";
        }
        
        $result = mysqli_query($conn, $sql);
        header("location: " . BASE_URL . "/admin/article/index.php");
        exit();
    }
}