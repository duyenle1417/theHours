<!-- HEADLINES CONTROLLER -->
<?php
// lấy dữ liệu từ post

// model topic
require_once('./models/PostModel.php');

// khai báo model menu
$model = new Post();

// view của menu
require_once("./views/HeadlinesView.php");
