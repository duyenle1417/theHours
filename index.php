<?php
require('./include/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - TheHours</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.min.css">
</head>
<body>
    <div class="app">
        <!-- BEGIN header.php -->
        <header class="header">
            <div class="grid">
                <div class="header__home">
                    <a href="" class="header__home-left header__home-left--separate">TheHours</a>
                    <a href="" class="header__home-right">Tin tức nhanh nhất</a>
                </div>
    
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">Thời sự</a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">Thế giới</a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">Kinh doanh</a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">Đời sống</a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">Văn hóa</a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">Giải trí</a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">Giáo dục</a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">Thể thao</a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">Sức khỏe</a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">Du lịch</a>
                        </li>
                        <a href="" class="header__navbar-icon">
                            <i class="fas fa-search"></i>
                        </a>
                    </ul>
                </nav>
            </div>
        </header>
        <!-- END header.php -->

        <div class="app__container">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-8">
                        <div class="main-news">
                            <div class="main-news__picture">
                                <img src="./assets/img/Huyện Chương Mỹ.jpg" alt="" class="main-news__picture--img">
                                <a href="" class="main-news__picture--link"></a>
                            </div>
                            <h3 class="main-news__label">Huyện Chương Mỹ dùng đá dăm lấp hố "tử thần"</h3>
                            <div class="main-news__action">
                                <div class="main-news__view">
                                    <i class="far fa-eye"></i>
                                    <span class="main-news__view-label">100</span>
                                </div>
                                <div class="main-news__comment">
                                    <i class="far fa-comment"></i>
                                    <span class="main-news__comment-label">100</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid__column-4">
                        <div class="tabs">
                            <button class="nav-tabs">Tin mới</button>
                            <button class="nav-tabs">Đọc nhiều</button>
                            <div class="tab-content">
                                <div class="tab-content__item">
                                    <span class="tab-content__time">13:15</span>
                                    <a href="" class="tab-content__link">Fan phấn khích khi nghe tin BTS rục rịch trở lại</a>
                                </div>
                                <div class="tab-content__item">
                                    <span class="tab-content__time">13:20</span>
                                    <a href="" class="tab-content__link">Thí sinh không nên mất nhiều thời gian vào việc đăng kí nguyện vọng lần đầu?</a>
                                </div>
                                <div class="tab-content__item">
                                    <span class="tab-content__time">13:15</span>
                                    <a href="" class="tab-content__link">Fan phấn khích khi nghe tin BTS rục rịch trở lại</a>
                                </div>
                                <div class="tab-content__item">
                                    <span class="tab-content__time">13:20</span>
                                    <a href="" class="tab-content__link">Thí sinh không nên mất nhiều thời gian vào việc đăng kí nguyện vọng lần đầu?</a>
                                </div>
                                <div class="tab-content__item">
                                    <span class="tab-content__time">13:15</span>
                                    <a href="" class="tab-content__link">Fan phấn khích khi nghe tin BTS rục rịch trở lại</a>
                                </div>
                                <div class="tab-content__item">
                                    <span class="tab-content__time">13:20</span>
                                    <a href="" class="tab-content__link">Thí sinh không nên mất nhiều thời gian vào việc đăng kí nguyện vọng lần đầu?</a>
                                </div>
                                <div class="tab-content__item">
                                    <span class="tab-content__time">13:15</span>
                                    <a href="" class="tab-content__link">Fan phấn khích khi nghe tin BTS rục rịch trở lại</a>
                                </div>
                                <div class="tab-content__item">
                                    <span class="tab-content__time">13:20</span>
                                    <a href="" class="tab-content__link">Thí sinh không nên mất nhiều thời gian vào việc đăng kí nguyện vọng lần đầu?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="category">
                    <h2 class="category__heading">THỜI SỰ</h2>
                    <div class="grid__row">
                        <div class="grid__column-6 main-category">
                            <div class="main-news__picture">
                                <img src="./assets/img/Huyện Chương Mỹ.jpg" alt="" class="main-news__picture--img">
                                <a href="" class="main-news__picture--link"></a>
                            </div>
                            <h3 class="main-news__label">Huyện Chương Mỹ dùng đá dăm lấp hố "tử thần"</h3>
                            <div class="main-news__action">
                                <div class="main-news__view">
                                    <i class="far fa-eye"></i>
                                    <span class="main-news__view-label">100</span>
                                </div>
                                <div class="main-news__comment">
                                    <i class="far fa-comment"></i>
                                    <span class="main-news__comment-label">100</span>
                                </div>
                            </div>           
                        </div>
    
                        <div class="grid__column-6 sub-category__list">
                            <div class="sub-category__item">
                                <div class="sub-news__picture">
                                    <img src="./assets/img/đề xuất quy hoạch.jpg" alt="" class="sub-news__picture--img">
                                    <a href="" class="sub-news__picture--link"></a>
                                </div>
                                <div class="sub-news__info">
                                    <h3 class="sub-news__label">Đề xuất quy hoạch 42 tuyến cao tốc"</h3>
                                    <div class="sub-news__action">
                                        <div class="sub-news__view">
                                            <i class="far fa-eye"></i>
                                            <span class="sub-news__view-label">100</span>
                                        </div>
                                        <div class="sub-news__comment">
                                            <i class="far fa-comment"></i>
                                            <span class="sub-news__comment-label">100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="sub-category__item">
                                <div class="sub-news__picture">
                                    <img src="./assets/img/6 ô tô tông liên hoàn.jpg" alt="" class="sub-news__picture--img">
                                    <a href="" class="sub-news__picture--link"></a>
                                </div>
                                <div class="sub-news__info">
                                    <h3 class="sub-news__label">6 ô tô tông liên hoàn trên quốc lộ 1"</h3>
                                    <div class="sub-news__action">
                                        <div class="sub-news__view">
                                            <i class="far fa-eye"></i>
                                            <span class="sub-news__view-label">100</span>
                                        </div>
                                        <div class="sub-news__comment">
                                            <i class="far fa-comment"></i>
                                            <span class="sub-news__comment-label">100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="sub-category__item">
                                <div class="sub-news__picture">
                                    <img src="./assets/img/trở về từ Lào.png" alt="" class="sub-news__picture--img">
                                    <a href="" class="sub-news__picture--link"></a>
                                </div>
                                <div class="sub-news__info">
                                    <h3 class="sub-news__label">Trở về từ Lào sau lễ bốc mả, 11 người Pa Ko bị cách ly</h3>
                                    <div class="sub-news__action">
                                        <div class="sub-news__view">
                                            <i class="far fa-eye"></i>
                                            <span class="sub-news__view-label">100</span>
                                        </div>
                                        <div class="sub-news__comment">
                                            <i class="far fa-comment"></i>
                                            <span class="sub-news__comment-label">100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="category">
                    <h2 class="category__heading">THẾ GIỚI</h2>
                    <div class="grid__row">
                        <div class="grid__column-6 main-category">
                            <div class="main-news__picture">
                                <img src="./assets/img/Huyện Chương Mỹ.jpg" alt="" class="main-news__picture--img">
                                <a href="" class="main-news__picture--link"></a>
                            </div>
                            <h3 class="main-news__label">Huyện Chương Mỹ dùng đá dăm lấp hố "tử thần"</h3>
                            <div class="main-news__action">
                                <div class="main-news__view">
                                    <i class="far fa-eye"></i>
                                    <span class="main-news__view-label">100</span>
                                </div>
                                <div class="main-news__comment">
                                    <i class="far fa-comment"></i>
                                    <span class="main-news__comment-label">100</span>
                                </div>
                            </div>           
                        </div>
    
                        <div class="grid__column-6 sub-category__list">
                            <div class="sub-category__item">
                                <div class="sub-news__picture">
                                    <img src="./assets/img/đề xuất quy hoạch.jpg" alt="" class="sub-news__picture--img">
                                    <a href="" class="sub-news__picture--link"></a>
                                </div>
                                <div class="sub-news__info">
                                    <h3 class="sub-news__label">Đề xuất quy hoạch 42 tuyến cao tốc"</h3>
                                    <div class="sub-news__action">
                                        <div class="sub-news__view">
                                            <i class="far fa-eye"></i>
                                            <span class="sub-news__view-label">100</span>
                                        </div>
                                        <div class="sub-news__comment">
                                            <i class="far fa-comment"></i>
                                            <span class="sub-news__comment-label">100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="sub-category__item">
                                <div class="sub-news__picture">
                                    <img src="./assets/img/6 ô tô tông liên hoàn.jpg" alt="" class="sub-news__picture--img">
                                    <a href="" class="sub-news__picture--link"></a>
                                </div>
                                <div class="sub-news__info">
                                    <h3 class="sub-news__label">6 ô tô tông liên hoàn trên quốc lộ 1"</h3>
                                    <div class="sub-news__action">
                                        <div class="sub-news__view">
                                            <i class="far fa-eye"></i>
                                            <span class="sub-news__view-label">100</span>
                                        </div>
                                        <div class="sub-news__comment">
                                            <i class="far fa-comment"></i>
                                            <span class="sub-news__comment-label">100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="sub-category__item">
                                <div class="sub-news__picture">
                                    <img src="./assets/img/trở về từ Lào.png" alt="" class="sub-news__picture--img">
                                    <a href="" class="sub-news__picture--link"></a>
                                </div>
                                <div class="sub-news__info">
                                    <h3 class="sub-news__label">Trở về từ Lào sau lễ bốc mả, 11 người Pa Ko bị cách ly</h3>
                                    <div class="sub-news__action">
                                        <div class="sub-news__view">
                                            <i class="far fa-eye"></i>
                                            <span class="sub-news__view-label">100</span>
                                        </div>
                                        <div class="sub-news__comment">
                                            <i class="far fa-comment"></i>
                                            <span class="sub-news__comment-label">100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="category">
                    <h2 class="category__heading">KINH DOANH</h2>
                    <div class="grid__row">
                        <div class="grid__column-6 main-category">
                            <div class="main-news__picture">
                                <img src="./assets/img/Huyện Chương Mỹ.jpg" alt="" class="main-news__picture--img">
                                <a href="" class="main-news__picture--link"></a>
                            </div>
                            <h3 class="main-news__label">Huyện Chương Mỹ dùng đá dăm lấp hố "tử thần"</h3>
                            <div class="main-news__action">
                                <div class="main-news__view">
                                    <i class="far fa-eye"></i>
                                    <span class="main-news__view-label">100</span>
                                </div>
                                <div class="main-news__comment">
                                    <i class="far fa-comment"></i>
                                    <span class="main-news__comment-label">100</span>
                                </div>
                            </div>           
                        </div>
    
                        <div class="grid__column-6 sub-category__list">
                            <div class="sub-category__item">
                                <div class="sub-news__picture">
                                    <img src="./assets/img/đề xuất quy hoạch.jpg" alt="" class="sub-news__picture--img">
                                    <a href="" class="sub-news__picture--link"></a>
                                </div>
                                <div class="sub-news__info">
                                    <h3 class="sub-news__label">Đề xuất quy hoạch 42 tuyến cao tốc"</h3>
                                    <div class="sub-news__action">
                                        <div class="sub-news__view">
                                            <i class="far fa-eye"></i>
                                            <span class="sub-news__view-label">100</span>
                                        </div>
                                        <div class="sub-news__comment">
                                            <i class="far fa-comment"></i>
                                            <span class="sub-news__comment-label">100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="sub-category__item">
                                <div class="sub-news__picture">
                                    <img src="./assets/img/6 ô tô tông liên hoàn.jpg" alt="" class="sub-news__picture--img">
                                    <a href="" class="sub-news__picture--link"></a>
                                </div>
                                <div class="sub-news__info">
                                    <h3 class="sub-news__label">6 ô tô tông liên hoàn trên quốc lộ 1"</h3>
                                    <div class="sub-news__action">
                                        <div class="sub-news__view">
                                            <i class="far fa-eye"></i>
                                            <span class="sub-news__view-label">100</span>
                                        </div>
                                        <div class="sub-news__comment">
                                            <i class="far fa-comment"></i>
                                            <span class="sub-news__comment-label">100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="sub-category__item">
                                <div class="sub-news__picture">
                                    <img src="./assets/img/trở về từ Lào.png" alt="" class="sub-news__picture--img">
                                    <a href="" class="sub-news__picture--link"></a>
                                </div>
                                <div class="sub-news__info">
                                    <h3 class="sub-news__label">Trở về từ Lào sau lễ bốc mả, 11 người Pa Ko bị cách ly</h3>
                                    <div class="sub-news__action">
                                        <div class="sub-news__view">
                                            <i class="far fa-eye"></i>
                                            <span class="sub-news__view-label">100</span>
                                        </div>
                                        <div class="sub-news__comment">
                                            <i class="far fa-comment"></i>
                                            <span class="sub-news__comment-label">100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN footer.php -->
        <footer class="footer">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-8">
                        <button class="log-in">
                            Đăng nhập
                        </button>
                        <div class="footer-social">
                            <i class="footer-social__icon fab fa-facebook"></i>
                            <i class="footer-social__icon fab fa-twitter"></i>
                            <i class="footer-social__icon fab fa-youtube"></i>
                        </div>
                    </div>

                    <div class="grid__column-4">
                        <ul class="footer-list">
                            <li class="footer-item">Trang chủ</li>
                            <li class="footer-item">Mới nhất</li>
                            <li class="footer-item">Xem nhiều</li>
                            <li class="footer-item">Tin nóng</li>
                            <li class="footer-item">Liên hệ</li>
                            <li class="footer-item">Quảng cáo</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END footer.php -->
    </div>
</body>
</html>