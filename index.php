<?php
require_once 'includes/session.php';
require_once 'includes/functions.php';

// session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница - Антикварный магазинчик</title>
    <link rel="stylesheet" href="assets/css/shared.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/footer.css">

    <script src="assets/js/show_menu.js"></script>

    <link rel="icon" href="assets/images/logo_2.png" type="image/png">
</head>
<body>
    <?php
    include 'model/header.php';
    ?>

    <main class="main-content">
        <!-- <div class="search-container">
            <div class="search-section">
                <div class="search-group">
                    <input type="text" class="search-input" placeholder="Поиск">
                    <button type="submit" class="search-btn">Найти</button>
                </div>
            </div>
        </div> -->

        <div class="content-blocks">
            <div class="content-block">
                <h3>Блок 1</h3>
                <p>Содержимое первого блока</p>
            </div>
            <div class="content-block">
                <h3>Блок 2</h3>
                <p>Содержимое второго блока</p>
            </div>
            <div class="content-block">
                <h3>Блок 3</h3>
                <p>Содержимое третьего блока</p>
            </div>
            <div class="content-block">
                <h3>Блок 4</h3>
                <p>Содержимое четвортого блока</p>
            </div>
            <div class="content-block">
                <h3>Блок 5</h3>
                <p>Содержимое пятого блока</p>
            </div>
        </div>
    </main>

    <?php
    // Подключаем footer
    include 'model/footer.php';
    ?>
</body>
</html>