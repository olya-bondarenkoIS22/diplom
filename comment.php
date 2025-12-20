<?php
require_once 'includes/session.php';
require_once 'includes/functions.php';

session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы о продавце</title>
    <link rel="stylesheet" href="assets/css/shared.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/comment.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    
    <script src="assets/js/show_menu.js"></script>
    <scrips src="assets/js/show_comment_add.js"></scrips>
    <link rel="icon" href="assets/images/logo_2.png" type="image/png">
    <style>
        
    </style>
</head>
<body>
    <?php
    include 'model/header.php';
    ?>

    <div class="container">
        <!-- Левая колонка с комментариями -->
        <div class="comments-section">
            <h2>Отзывы покупателей</h2>
            
            <div class="comment">
                <div class="comment-header">
                    <span class="comment-author">Анна Петрова</span>
                    <span class="comment-date">15.12.2023</span>
                </div>
                <div class="comment-rating">★ ★ ★ ★ ★</div>
                <p class="comment-text">
                    Отличный продавец! Товар соответствует описанию, доставка быстрая. 
                    Очень довольна покупкой, буду рекомендовать друзьям.
                </p>
                <div class="comment-images">
                    <img src="https://placehold.co/100" alt="Фото товара 1" class="comment-image">
                    <img src="https://placehold.co/100" alt="Фото товара 2" class="comment-image">
                </div>
            </div>

            <div class="comment">
                <div class="comment-header">
                    <span class="comment-author">Иван Сидоров</span>
                    <span class="comment-date">10.12.2023</span>
                </div>
                <div class="comment-rating">★ ★ ★ ★ ☆</div>
                <p class="comment-text">
                    Хороший товар, но была небольшая задержка с доставкой. 
                    Продавец вежливый, отвечает быстро. В целом впечатления положительные.
                </p>
                <div class="comment-images">
                    <img src="https://placehold.co/100" alt="Фото товара" class="comment-image">
                </div>
            </div>

            <div class="comment">
                <div class="comment-header">
                    <span class="comment-author">Мария Иванова</span>
                    <span class="comment-date">05.12.2023</span>
                </div>
                <div class="comment-rating">★ ★ ★ ★ ★</div>
                <p class="comment-text">
                    Прекрасное качество! Все как на фото. Продавец очень помог с выбором размера. 
                    Спасибо за отличный сервис!
                </p>
                <div class="comment-images">
                    <!-- Без изображений -->
                </div>
            </div>
        </div>

        <!-- Правая колонка с информацией о продавце -->
        <div class="seller-section">
            <div class="seller-header">
                <img src="https://placehold.co/100" alt="Аватар продавца" class="seller-avatar">
                <div class="seller-name">Александр Прохоров</div>
            </div>

            <div class="seller-rating">
                <div class="rating-stars">★ ★ ★ ★ ☆</div>
                <div class="rating-value">4.7/5</div>
            </div>

            <div class="seller-stats">
                <div class="stat-item">
                    <span>На площадке:</span>
                    <span>3 года</span>
                </div>
                <div class="stat-item">
                    <span>Отзывов:</span>
                    <span>156</span>
                </div>
                <div class="stat-item">
                    <span>Положительных:</span>
                    <span>94%</span>
                </div>
                <div class="stat-item">
                    <span>Доставка вовремя:</span>
                    <span>98%</span>
                </div>
            </div>

            <button class="write-review-btn">Написать отзыв</button>
        </div>
    </div>

    <?php
    // Подключаем footer
    include 'model/footer.php';
    ?>
</body>
</html>