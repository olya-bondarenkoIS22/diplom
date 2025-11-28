
<!-- Затемнение фона при открытом меню -->
<div class="overlay" id="overlay"></div>

<header class="header">
    <div class="header-content">
        <div class="header-left">
            <img href="index.php" src="images/logo.png" alt="Логотип Archivirus" class="logo">
        </div>
        <div class="header-right">
            <div class="header-icons">
                <!-- <div class="icon-item">
                    <a href="home.html" class="icon-link">
                        <img src="images/image_menu_return.png" alt="Вернуться" class="avatar">
                        <div class="icon-text">Вернуться</div>
                    </a>
                </div> -->
                <div class="icon-item" id="categories-btn">
                    <img src="images/image_menu_category.png" alt="Категории" class="avatar">
                    <div class="icon-text">Категории</div>
                </div>
                <div class="icon-item">
                    <a href="../cart.php" class="icon-link">
                        <img src="images/image_menu_card.png" alt="Корзина" class="avatar">
                        <div class="icon-text">Корзина</div>
                    </a>
                </div>
                <div class="icon-item">
                    <a href="../account_login.php" class="icon-link">
                        <img src="images/image_menu_ava.png" alt="Аватар" class="avatar">
                        <div class="icon-text">Вход</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<?php
include 'menu.php';
?>