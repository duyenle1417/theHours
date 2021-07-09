README.TXT

1. Tải thư mục về đặt vào folder /xampp/htdocs

2. Chỉnh sửa nội dung file path.php
Dựa theo cấu hình của Xampp Apache mà sửa lại đường dẫn BASE_URL
VD: http://localhost:8080/thehours/ hay http://localhost/thehours/

3. Tạo một database tên thehours và nhập file dữ liệu có đuôi là .sql vào
Nếu bạn có sẵn một remote mysql thì vào /include/config.php để chỉnh sửa thông tin kết nối database

4. Cấu hình sendmail.ini
Điền trường như hướng dẫn sau https://meetanshi.com/blog/send-mail-from-localhost-xampp-using-gmail/
Lưu ý: đối với email sử dụng nên bật chế độ  'allow less secure apps to access your account' => https://myaccount.google.com/lesssecureapps



