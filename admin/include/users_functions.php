<?php

//update user
if (isset($_POST['update-user'])) {
    global $conn;
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-user']);
        $sql = "UPDATE users SET `fullname`"."='".$_POST['fullname']."', email = '".$_POST['email']."', role_id = '".$_POST['role_id']."' WHERE id='".$_POST['id']. "'";
        
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('Location: ' . BASE_URL . 'admin/user/');
            exit(0);
        }
        // echo $sql;
        // exit(0);
    }
}

// delete user
if (isset($_GET['delete_id'])) {
    global $conn;
    $id=$_GET['delete_id'];
    $sql = "DELETE FROM users WHERE id=$id";
    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: ' . BASE_URL . 'admin/user/');
        exit(0);
    }
}
