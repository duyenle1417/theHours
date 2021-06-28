<?php
// add topic
if (isset($_POST['add-topic'])) {
    // adminOnly();
    global $conn;
    $errors = validateTopic($_POST);

    if (count($errors) === 0) {
        unset($_POST['add-topic']);
        global $conn;
        if ($_POST['parent_topic_id'] === 0) {
            $sql = "INSERT INTO topics (`name`) VALUES ('".$_POST['name']."')";
        } else {
            $sql = "INSERT INTO topics (`name`, parent_topic_id) VALUES ('".$_POST['name']."', '" .$_POST['parent_topic_id']. "')";
        }

        header('Location: ' . BASE_URL . '/admin/topic/index.php');
        exit();
    }
}

// update topic
if (isset($_POST['update-topic'])) {
    // adminOnly();
    global $conn;
    $errors = validateTopic($_POST);

    if (count($errors) === 0) {
        unset($_POST['update-topic']);
        global $conn;
        if ($_POST['parent_topic_id'] === 0) {
            $sql = "UPDATE topics SET `name`"."='".$_POST['name']."', parent_topic_id = NULL WHERE id='".$_POST['id']. "'";
        } else {
            $sql = "UPDATE topics SET `name`"."='".$_POST['name']."', parent_topic_id ='".$_POST['parent_topic_id']."' WHERE id='".$_POST['id']. "'";
        }

        $result = mysqli_query($conn, $sql);
        header('Location: ' . BASE_URL . '/admin/topic/index.php');
        exit();
    }
}

// delete topic
if (isset($_GET['delete_id'])) {
    global $conn;
    $id=$_GET['delete_id'];
    $sql = "DELETE FROM topics WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: ' . BASE_URL . '/admin/topic/index.php');
        exit(0);
    }
}