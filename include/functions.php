<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');//set timezone

// Tạo slug cho bài viết
function createSlug($title)
{
    // $pattern
    $search = array(
        // xét cả hoa/thường
        '/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/i',
        '/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/i',
        '/ì|í|ị|ỉ|ĩ/i',
        '/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/i',
        '/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/i',
        '/ỳ|ý|ỵ|ỷ|ỹ/i',
        '/đ/i',
        "/[\ \_]/",//dấu cách và '_' sẽ thành '-'
        "/[^a-zA-Z0-9\-]/",/* các ký tự khác không nằm trong a-z A-Z 0-9, dấu '-' sẽ bị loại bỏ' */
        
    );
    // $replacement
    $replace = array(
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd',
        '-',
        ''
    );
    $string = preg_replace($search, $replace, $title);//thay thế chữ tiếng việt có dấu,etc...
    $string = preg_replace('/(-)+/', '-', $string);//chuyển nhiều '-' thành 1 dấu '-'
    $string = trim($string, '-');//loại bỏ các ký tự '-' dư ở đầu và cuối
    $string = strtolower($string);//chữ thường
    return $string;
}
//END tạo slug cho bài viết
