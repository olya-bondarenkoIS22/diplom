<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль - Антикварный магазинчик</title>
    <link rel="stylesheet" href="css\shared.css">
    <link rel="stylesheet" href="css\header.css">
    <link rel="stylesheet" href="css\menu.css">
    <link rel="stylesheet" href="css\personal_account.css">
    <link rel="stylesheet" href="css\footer.css">

    <script src="js/show_menu.js"></script>

    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="icon" href="images\logo_2.png" type="image/png">
</head>
<body>
    <?php
    include 'model/header.php';
    ?>

    <main class="main-content-profile">
        <!-- Левая колонка - информация профиля -->
        <div class="profile-sidebar">
            <div class="profile-header">
                <div class="profile-avatar">
                    <img src="..\images\avatar\image_menu_ava.png" alt="Аватар пользователя">
                </div>
                <h2 class="profile-nickname">Nickname</h2>
                <div class="profile-actions">
                    <button class="profile-btn edit-btn">Редактировать</button>
                    <button class="profile-btn logout-btn">Выйти</button>
                </div>
            </div>

            <div class="contact-actions">
                <button class="contact-btn message-btn">Написать сообщение</button>
                <button class="contact-btn phone-btn">Показать телефон</button>
            </div>

            <div class="profile-info">
                <h3>Краткая информация:</h3>
                <p>Дата регистрации: <span class="info-value"></span></p>
                <p>Оценка: <span class="info-value"></span></p>
            </div>

            <div class="blog-info">
                <h3>Название:</h3>
                <p>Количество записей: <span class="info-value"></span></p>
                <p>Оставшиеся антиквариаты: <span class="info-value"></span></p>
                
                <div class="blog-actions">
                    <button class="blog-btn edit-blog-btn">Редактировать информацию в блоге</button>
                    <button class="blog-btn go-to-blog-btn">Перейти в блог</button>
                </div>
            </div>

            <div class="subscriptions">
                <h3>Подписки</h3>
                <div class="subscriptions-list">
                    <div class="subscription-item">Пользователь 1</div>
                    <div class="subscription-item">Пользователь 2</div>
                    <div class="subscription-item">Пользователь 3</div>
                </div>
            </div>

            <button class="create-blog-btn">Создать новый блог</button>
        </div>

        <!-- Правая колонка - контент -->
        <div class="profile-content">
            <div class="content-section">
                <h3>ТОП-продаж</h3>
                <div class="items-grid">
                    <div class="item-card">
                        <div class="item-image"></div>
                        <div class="item-info">
                            <h4>Название, год</h4>
                            <p class="item-price">Цена</p>
                            <p class="item-date">Продано: число.месяц.год</p>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-image"></div>
                        <div class="item-info">
                            <h4>Название, год</h4>
                            <p class="item-price">Цена</p>
                            <p class="item-date">Продано: число.месяц.год</p>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-image"></div>
                        <div class="item-info">
                            <h4>Название, год</h4>
                            <p class="item-price">Цена</p>
                            <p class="item-date">Продано: число.месяц.год</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-section">
                <h3>НОВИНКИ</h3>
                <div class="activity-list">
                    <div class="activity-item">
                        <span class="activity-date">Опубликованно: Тогда-то</span>
                        <span class="activity-text">Название: Форфоровая кукла</span>
                    </div>
                    <div class="activity-item">
                        <span class="activity-date">Опубликованно: Тогда-то</span>
                        <span class="activity-text">Название: Еще что-то</span>
                    </div>
                    <div class="activity-item">
                        <span class="activity-date">Опубликованно: Тогда-то</span>
                        <span class="activity-text">Название: И еще</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    // Подключаем footer
    include 'model/footer.php';
    ?>
</body>
</html>