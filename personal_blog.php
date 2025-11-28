<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Название блога</title>
    <link rel="stylesheet" href="css\shared.css">
    <link rel="stylesheet" href="css\header.css">
    <link rel="stylesheet" href="css\menu.css">
    <link rel="stylesheet" href="css\personal_blog.css">
    <link rel="stylesheet" href="css\footer.css">

    <link rel="icon" href="..\images\logo_2.png" type="image/png">

    <script src="js/show_menu.js"></script>
</head>
<body>
   <?php
    include 'model/header.php';
    ?>

     <main class="main-content">
        <div class="blog-header">
            <div class="blog-logo">
                <img src="..\images\avatar\image_menu_ava.png" alt="Аватар пользователя">
                <!-- Логотип блога -->
            </div>
            <div class="blog-info">
                <div class="blog-title">Название блога</div>
                <div class="blog-description">
                    Краткая информация о блоге: это уникальное собрание антикварных предметов, 
                    собранных с любовью и вниманием к деталям. Каждый экспонат имеет свою историю 
                    и прошел тщательную проверку на подлинность.
                </div>
                <div class="blog-details">
                    <div class="blog-detail-item">
                        <i>📅</i> Дата создания: 27.10.2025
                    </div>
                    <div class="blog-detail-item">
                        <i>👤</i> Автор: Тим Тимен
                    </div>
                    <div class="blog-detail-item rating">
                        <i>⭐</i> Оценка: ★★★★★ 5/5
                    </div>
                    <div class="blog-detail-item">
                        <i>📍</i> Адрес: улица Пушкина дом Колотушкина
                    </div>
                </div>
            </div>
        </div>
    
        <div class="products">
            <div class="product-card">
                <div class="product-title">Антикварная ваза XIX века</div>
                <div class="product-description">
                    <strong>Описание:</strong><br>
                    Роскошная антикварная ваза, созданная в середине XIX века. 
                    Изысканный дизайн с ручной росписью и позолотой. 
                    Идеально сохранилась до наших дней, что делает её ценным экземпляром для коллекционеров.
                </div>
                <div class="product-materials">
                    <strong>Материалы:</strong><br>
                    Фарфор высшего качества, позолота 24 карата, ручная роспись минеральными красками.
                </div>
                <div class="product-year">Год: 1855 г.</div>
                <div class="product-documents">
                    <strong>Подтверждающие документы:</strong> Сертификат подлинности, экспертиза антикварного общества.
                </div>
                <div class="product-price">15 000 руб.</div>
                <button class="buy-button">Купить</button>
                <button class="message-button">Личное сообщение</button>
            </div>

            <div class="product-card">
                <div class="product-title">Старинный письменный набор</div>
                <div class="product-description">
                    <strong>Описание:</strong><br>
                    Элегантный письменный набор начала XX века. 
                    Включает чернильницу, перьевую ручку и подставку для писем. 
                    Выполнен из ценных пород дерева с бронзовыми элементами.
                </div>
                <div class="product-materials">
                    <strong>Материалы:</strong><br>
                    Красное дерево, бронза, стекло, перо с позолотой.
                </div>
                <div class="product-year">Год: 1912 г.</div>
                <div class="product-documents">
                    <strong>Подтверждающие документы:</strong> Экспертное заключение, историческая справка.
                </div>
                <div class="product-price">30 000 руб.</div>
                <button class="buy-button">Купить</button>
                <button class="message-button">Личное сообщение</button>
            </div>
        
            <div class="product-card">
                <div class="product-title">Старинный письменный набор</div>
                <div class="product-description">
                    <strong>Описание:</strong><br>
                    Элегантный письменный набор начала XX века. 
                    Включает чернильницу, перьевую ручку и подставку для писем. 
                    Выполнен из ценных пород дерева с бронзовыми элементами.
                </div>
                <div class="product-materials">
                    <strong>Материалы:</strong><br>
                    Красное дерево, бронза, стекло, перо с позолотой.
                </div>
                <div class="product-year">Год: 1912 г.</div>
                <div class="product-documents">
                    <strong>Подтверждающие документы:</strong> Экспертное заключение, историческая справка.
                </div>
                <div class="product-price">30 000 руб.</div>
                <button class="buy-button">Купить</button>
                <button class="message-button">Личное сообщение</button>
            </div>

            <div class="product-card">
                <div class="product-title">Картина маслом "Осенний пейзаж"</div>
                <div class="product-description">
                    <strong>Описание:</strong><br>
                    Живописное полотно неизвестного художника конца XIX века. 
                    Изображает умиротворенный осенний пейзаж с рекой и старым мостом. 
                    Картина излучает теплоту и ностальгию по ушедшим временам.
                </div>
                <div class="product-materials">
                    <strong>Материалы:</strong><br>
                    Холст, масляные краски, деревянная рама ручной работы.
                </div>
                <div class="product-year">Год: 1890 г.</div>
                <div class="product-documents">
                    <strong>Подтверждающие документы:</strong> Заключение искусствоведа, рентгенограмма.
                </div>
                <div class="product-price">45 000 руб.</div>
                <button class="buy-button">Купить</button>
                <button class="message-button">Личное сообщение</button>
            </div>
        </div>
    </main>
    
    <?php
    // Подключаем footer
    include 'model/footer.php';
    ?>
</body>
</html>