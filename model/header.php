<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/constants.php';
?>
<!-- Затемнение фона при открытом меню -->
<div class="overlay" id="overlay"></div>

<header class="header">
    <div class="header-content">
        <div class="header-left">
            <a href="index.php">
                <img src="assets/images/logo.png" alt="Логотип Archivirus" class="logo">
            </a>
        </div>
        <div class="header-center">
            <form action="search_results.php" method="GET" class="search-form">
                <input type="text" name="query" class="search-input" placeholder="Поиск антиквариата...">
                <button type="submit" class="search-btn">Поиск</button>
            </form>
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
                    <img src="assets/images/image_menu_category.png" alt="Категории" class="avatar">
                    <div class="icon-text">Категории</div>
                </div>
                <div class="icon-item">
                    <a href="../cart.php" class="icon-link">
                        <img src="assets/images/image_menu_card.png" alt="Корзина" class="avatar">
                        <div class="icon-text">Корзина</div>
                    </a>
                </div>
                <div class="icon-item">
                    <a href="../account_login.php" class="icon-link">
                        <img src="assets/images/image_menu_ava.png" alt="Аватар" class="avatar">
                        <?php if (isLoggedIn()): ?>
                            <div class="icon-text"><?php echo htmlspecialchars($_SESSION['user_login']); ?></div>
                        <?php else: ?>
                            <div class="icon-text">Вход</div>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<?php
include 'menu.php';
?>