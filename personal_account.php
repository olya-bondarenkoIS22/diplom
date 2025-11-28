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
    <!-- Затемнение фона при открытом меню -->
    <div class="overlay" id="overlay"></div>

    <header class="header">
        <div class="header-content">
            <div class="header-left">
                <img src="images\logo.png" alt="Логотип Archivirus" class="logo">
            </div>
            <div class="header-right">
                <div class="header-icons">
                    <div class="icon-item" id="categories-btn">
                        <img src="images\image_menu_category.png" alt="Категории" class="avatar">
                        <div class="icon-text">Категории</div>
                    </div>
                    <div class="icon-item">
                        <img src="images\image_menu_card.png" alt="Корзина" class="avatar">
                        <div class="icon-text">Корзина</div>
                    </div>
                    <div class="icon-item">
                        <div class="icon-link profile-menu">
                            <img src="images\image_menu_ava.png" alt="Аватар" class="avatar">
                            <div class="icon-text">Профиль</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Боковое меню категорий -->
    <div class="categories-menu" id="categories-menu">
        <div class="menu-header">
            <h2>Категории</h2>
            <button class="close-btn" id="close-menu">×</button>
        </div>
        <div class="menu-content">
            <ul class="categories-list">
                <li><a href="#" class="category-link">Мебель</a></li>
                <li><a href="#" class="category-link">Искусство</a></li>
                <li><a href="#" class="category-link">Книги и манускрипты</a></li>
                <li><a href="#" class="category-link">Посуда и фарфор</a></li>
                <li><a href="#" class="category-link">Ювелирные изделия</a></li>
                <li><a href="#" class="category-link">Монеты и награды</a></li>
                <li><a href="#" class="category-link">Предметы быта и обихода</a></li>
                <li><a href="#" class="category-link">Текстиль</a></li>
                <li><a href="#" class="category-link">Оружие</a></li>
                <li><a href="#" class="category-link">Иконы</a></li>
            </ul>
        </div>
    </div>

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

    <footer class="footer">
        <div class="contact-info">
            <p>email: archivirus@shop.ru</p>
            <p>Телефон: +7(800) 555-35-35</p>
        </div>
    </footer>
</body>
</html>