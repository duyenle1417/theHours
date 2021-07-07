<!-- HEADLINES CONTROLLER -->
<?php
// lấy dữ liệu từ post

// model post
require_once('./models/PostModel.php');

// khai báo model post
$model = new Post();

// view của main new headlines
require_once("./views/HeadlinesView.php");
