<?php
require('config.php');
require('functions.php');

$errors = array();


// *************
// POST'S functions
// ************

function validatePost($post)
{
    $errors = array();
    if (empty($post['title'])) {
        array_push($errors, 'Phải nhập tiêu đề');
    }

    if (empty($post['content'])) {
        array_push($errors, 'Phải nhập nội dung');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'Hãy chọn topic cho bài viết');
    }

    //trùng title
    // $existingPost = selectOne('posts', ['title' => $post['title']]);
    // if ($existingPost) {
    //     if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
    //         array_push($errors, 'Post with that title already exists');
    //     }

    //     if (isset($post['add-post'])) {
    //         array_push($errors, 'Post with that title already exists');
    //     }
    // }
    return $errors;
}

function UpdateView($id, $views)
{
    global $conn;
    $sql = "UPDATE posts SET `views`"."=".$views."  WHERE id='".$id. "'";
    $result = mysqli_query($conn, $sql);
}

// get all post for admin
function GetAllPosts()
{
    global $conn;
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final = array();
    foreach ($posts as $post) {
        array_push($final, $post);
    }
    return $final;
}

// select post theo topic (nếu có topic con thì show luôn)
// cho category.php
// SELECT * FROM `posts` WHERE `posts`.`topic_id` IN
// (SELECT `topics`.`id` FROM `topics` WHERE `topics`.`id` = 4 OR `topics`.`parent_topic_id` = 4)
function GetPostsByTopic($topic_id)
{
    global $conn;
    $sql = "SELECT * FROM `posts` WHERE IsPublished = 1 AND `topic_id` IN 
    (SELECT `id` FROM `topics` WHERE `id` = " . $topic_id . " OR `topics`.`parent_topic_id` = " . $topic_id . ")";
    $result = mysqli_query($conn, $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final = array();
    foreach ($posts as $post) {
        array_push($final, $post);
    }
    return $final;
}

function GetPostsByTopicLimit($topic_id, $page_first_result, $results_per_page)
{
    global $conn;
    $sql = "SELECT * FROM `posts` WHERE IsPublished = 1 AND `topic_id` IN 
    (SELECT `id` FROM `topics` WHERE `id` = " . $topic_id . " OR `topics`.`parent_topic_id` = " . $topic_id . ") ORDER BY `id` DESC LIMIT " . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn, $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final = array();
    foreach ($posts as $post) {
        array_push($final, $post);
    }
    return $final;
}

function GetPostsByTopicTabRecent($topic_id, $results_number)
{
    global $conn;
    $sql = "SELECT * FROM `posts` WHERE IsPublished = 1 AND `topic_id` IN 
    (SELECT `id` FROM `topics` WHERE `id` = " . $topic_id . " OR `topics`.`parent_topic_id` = " . $topic_id . ") ORDER BY `id` DESC LIMIT " . $results_number;
    $result = mysqli_query($conn, $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final = array();
    foreach ($posts as $post) {
        array_push($final, $post);
    }
    return $final;
}

function GetPostsByTopicTabMostView($topic_id, $results_number)
{
    global $conn;
    $sql = "SELECT * FROM `posts` WHERE IsPublished = 1 AND `topic_id` IN 
    (SELECT `id` FROM `topics` WHERE `id` = " . $topic_id . " OR `topics`.`parent_topic_id` = " . $topic_id . ") ORDER BY `views` DESC LIMIT " . $results_number;
    $result = mysqli_query($conn, $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final = array();
    foreach ($posts as $post) {
        array_push($final, $post);
    }
    return $final;
}

function GetPostsTab($results_number, $orderby)
{
    global $conn;
    $sql = "SELECT * FROM `posts` WHERE IsPublished = 1 ORDER BY `" . $orderby . "` DESC LIMIT " . $results_number;
    $result = mysqli_query($conn, $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final = array();
    foreach ($posts as $post) {
        array_push($final, $post);
    }
    return $final;
}

// lấy 1 post mới nhất
function getPostHeadline()
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM `posts` WHERE IsPublished = 1 ORDER BY `id` DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    
    $final = mysqli_fetch_array($result);
    return $final;
}

// get a post by id for article.php
// SELECT * FROM posts WHERE IsPublished = 1 AND id = $id
function getPublishedPostById($id)
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM posts WHERE IsPublished = 1 AND id = $id";
    $result = mysqli_query($conn, $sql);
    
    $final = mysqli_fetch_array($result);
    return $final;
}

// get a post by id for edit post
// SELECT * FROM posts WHERE id = $id
function getPostById($id)
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    $final = mysqli_fetch_array($result);
    return $final;
}

function getPostsOfAuthor($user_id)
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM posts WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final = array();
    foreach ($posts as $post) {
        array_push($final, $post);
    }
    return $final;
}


// *************
// TOPIC'S functions
// ************
function validateTopic($topic)
{
    $errors = array();
    if (empty($topic['name'])) {
        array_push($errors, 'Không được để trống tên topic');
    }

    if (empty($topic['parent_topic_id'])) {
        if (isset($topic['add-topic'])) {
            array_push($errors, 'Hãy chọn danh mục cha');
        }
    }

    $existingTopic = selectOne('topics', ['name' => $topic['name']]);
    if ($existingTopic) {
        if (isset($post['update-topic']) && $existingTopic['id'] != $topic['id']) {
            array_push($errors, 'Tên topic này đã có sẵn, vui lòng chọn tên khác');
        }

        if (isset($post['add-topic'])) {
            array_push($errors, 'Tên topic này đã có sẵn, vui lòng chọn tên khác');
        }
    }
    return $errors;
}

// GET TOPIC NAME by ID
function getTopicNameByID($id)
{
    if ($id !== null) {
        // use global $conn object in function
        global $conn;

        $sql = "SELECT `name` FROM topics WHERE `id`=$id";
        $result = mysqli_query($conn, $sql);

        $final = mysqli_fetch_array($result);
        return $final['name'];
    }
    // else{
    //     return 'NONE';
    // }
}

function getAllTopics()
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM topics";
    $result = mysqli_query($conn, $sql);

    $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final = array();
    foreach ($topics as $topic) {
        array_push($final, $topic);
    }
    return $final;
}

//select parent topic only
// SELECT * FROM `topics` WHERE `parent_topic_id` IS NULL;
function getParentTopics()
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM topics WHERE parent_topic_id IS NULL";
    $result = mysqli_query($conn, $sql);

    $topics = mysqli_fetch_all($result, MYSQLI_ASSOC) or die(mysqli_error($conn));

    $final = array();
    foreach ($topics as $topic) {
        array_push($final, $topic);
    }
    return $final;
}

// get a topic by id
function getTopicById($id)
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM topics WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    $final = mysqli_fetch_array($result);
    return $final;
}

//select sub topic of a parent topic
// SELECT * FROM `topics` WHERE `parent_topic_id` = '$id';
function getSubTopics($id)
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM topics WHERE parent_topic_id = '" .$id. "'";
    $result = mysqli_query($conn, $sql);

    $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final = array();
    foreach ($topics as $topic) {
        array_push($final, $topic);
    }
    return $final;
}

// *************
// USER'S functions
// ************

// get a user by id
function getUserById($id)
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    $final = mysqli_fetch_array($result);
    return $final;
}

// get all users for admin
function GetAllUsers()
{
    global $conn;
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final = array();
    foreach ($posts as $post) {
        array_push($final, $post);
    }
    return $final;
}

// get all users for admin
function GetAllRoles()
{
    global $conn;
    $sql = "SELECT * FROM roles";
    $result = mysqli_query($conn, $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final = array();
    foreach ($posts as $post) {
        array_push($final, $post);
    }
    return $final;
}

//get role of user
function getRoleById($id)
{
    // use global $conn object in function
    global $conn;
    $sql = "SELECT `role` FROM roles WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    $final = mysqli_fetch_array($result);
    return $final;
}

//validate dữ liệu nhập
function validateUser($user)
{
    $errors = array();

    if (empty($user['email'])) {
        array_push($errors, 'Email is required');
    }

    if (empty($user['fullname'])) {
        array_push($errors, 'Fullname is required');
    }

    if (!isset($user['update-user'])) {
        if (empty($user['username'])) {
            array_push($errors, 'Username is required');
        }
        if (empty($user['password'])) {
            array_push($errors, 'Password is required');
        }
        if ($user['passwordConf'] !== $user['password']) {
            array_push($errors, 'Password do not match');
        }
        $existingUser = selectOne('users', ['username' => $user['username']]);
        if ($existingUser) {
            if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
                array_push($errors, 'Username already exists');
            }

            if (isset($_POST['register-btn']) || isset($user['create-user'])) {
                array_push($errors, 'Username already exists');
            }
        }
    }
    // if (isset($user['update-user'])) {
    //     if (empty($user['password'])) {
    //         array_push($errors, 'Password is required');
    //     }
    //     if ($user['passwordConf'] !== $user['password']) {
    //         array_push($errors, 'Password do not match');
    //     }
    // }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email already exists');
        }

        if (isset($_POST['register-btn']) || isset($user['create-user'])) {
            array_push($errors, 'Email already exists');
        }
    }

    
    return $errors;
}

// valdate khi login
function validateLogin($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password is required');
    }

    return $errors;
}

if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);
    if (count($errors) === 0) {
        $user = selectOne('users', ['username' => $_POST['username'], 'IsActivated' => 1]);

        if ($user && md5($_POST['password']) === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_username'] = $user['username'];
            $_SESSION['user_role_id'] = $user['role_id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_fullname'] = $user['fullname'];

            // if ($_SESSION['user_role_id'] !==3 && isset($_SESSION['user_role_id'])) {
            //     header('location: ' . BASE_URL . 'admin/dashboard.php');
            // } else {
            //     header('location: ' . BASE_URL);
            // }
            
            header('location: ' . BASE_URL);
            exit();
        } elseif ($user) {
            array_push($errors, 'Sai thông tin đăng nhập');
        } else {
            array_push($errors, 'Tài khoản không tồn tại hoặc chưa được xác thực');
        }
    }
}

// register user
if (isset($_POST['register-btn']) || isset($_POST['create-user'])) {
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        unset($_POST['passwordConf']);
        $_POST['password'] = md5($_POST['password']);
        $_POST['verification_hash'] = md5(time());
        
        if (isset($_POST['create-user'])) {
            $sql = "INSERT INTO users (`email`, `username`, `password`, `fullname`, `role_id`, `verification_hash`, `IsActivated`) 
            VALUES ('".$_POST['email']."', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['fullname']."', '".$_POST['role_id']."', '".$_POST['verification_hash']."', 1)";
        
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('location: ' . BASE_URL . '/admin/user/index.php');
                exit();
            }
        }
        if (isset($_POST['register-btn'])) {
            $_POST['role_id'] = 3;
            $sql = "INSERT INTO users (`email`, `username`, `password`, `fullname`, `role_id`, `verification_hash`, `IsActivated`) 
            VALUES ('".$_POST['email']."', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['fullname']."', '".$_POST['role_id']."', '".$_POST['verification_hash']."', 1)";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // send mail not working beacause cannot ssetup mail server
                SendMailRegister($_POST);

                $user = selectOne('users', ['username' => $_POST['username']]);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_username'] = $user['username'];
                $_SESSION['user_role_id'] = $user['role_id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_fullname'] = $user['fullname'];
            
                header('location: ' . BASE_URL);
                exit();
            }
        }
    }
}

function SendMailRegister($user)
{
    $to = $_POST['email'];
    $subject = 'Signup Verification - TheHours';
    $message = '
  
    Cảm ơn '.$user['fullname'].' đã đăng ký tài khoản trên TheHours!
    Tài khoản của bạn đã được tạo, vui lòng truy cập đường link sau để xác thực tài khoản
    
    ------------------------
    Username: '.$user['username'].'
    Fullname: '.$user['fullname'].'
    ------------------------
    
    
';
    $headers = 'From: noreply@thehours.com';
    mail($to, $subject, $message, $headers);
    // Link:'. BASE_URL. 'verify.php?username=' .$user['username'].'&verification_hash='.$user['verification_hash'].'
}

function getUserByUsername($username)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE username = $username";
    $result = mysqli_query($conn, $sql);
    
    $final = mysqli_fetch_array($result);
    return $final;
}
// *************
// COMMENT'S functions
// ************
function getCommentsByPostId($id)
{
    global $conn;
    $sql = "SELECT * FROM comments WHERE post_id = $id";
    $result = mysqli_query($conn, $sql);
    
    $final = mysqli_fetch_array($result);
    return $final;
}

function getCommentsNumberOfPost($id)
{
    global $conn;
    $sql = "SELECT * FROM comments WHERE post_id = $id";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result);
}


/* Select custom */
function GetAll($table, $condition = [])//condition [key => value]
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
    return $final;
}

function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";

    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }

    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}

function executeQuery($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

function create($table, $data)
{
    global $conn;
    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    
    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}
