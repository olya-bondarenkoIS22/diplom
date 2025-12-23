<?php
require_once 'includes/session.php';
require_once 'includes/functions.php';

if (!isLoggedIn()) {
    header("Location: account_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль - Антикварный магазинчик</title>
    <link rel="stylesheet" href="assets/css/shared.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/personal_account.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/menu.css">

    <script src="assets/js/show_menu.js"></script>

    <link rel="icon" href="assets/images/logo_2.png" type="image/png">
</head>
<body class="site-container">
    <?php include 'model/header.php'; ?>

    <main class="profile-wrapper">
        <div class="profile-main-content">
            <section class="account-card">
                <div class="account-avatar-side">
                    <div class="avatar-wrapper">
                        <img src="assets/images/avatar/image_menu_ava.png" alt="Аватар">
                        <div class="status-plus">+</div>
                    </div>
                </div>
                <div class="account-info-side">
                    <h2 class="nickname"><?php echo htmlspecialchars($_SESSION['user_login']); ?></h2>
                    <p><strong>Краткая информация:</strong> текст текст текст....</p>
                    <p><strong>Дата регистрации:</strong> <?php echo htmlspecialchars($_SESSION['user_date_registration']); ?></p>
                    <div class="rating-row">
                        <span>Оценка:</span>
                        <span class="stars">★★★★★</span>
                        <span class="rating-num">5/5</span>
                    </div>
                </div>
                <div class="account-buttons-side">
                    <button class="btn-beige">Редактировать</button>
                    <a href="logout.php" class="btn-beige logout">Выйти</a>
                    <button class="btn-purple">Написать сообщение</button>
                    <button class="btn-purple">Показать телефон</button>
                </div>
            </section>

            <section class="blog-card-container">
                <?php
                $database = new Database();
                $db = $database->getConnection();

                $id_user = $_SESSION['user_id'];

                $query = "SELECT id, id_user, blog_name, created_date, description, image FROM blogs WHERE id_user = :id_user";
                $stmt = $db->prepare($query);
                $stmt->bindParam(":id_user", $id_user);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="blog-card">';
                    echo '<img src="' . htmlspecialchars($row['image']) . '" alt="фотография блога">';
                    echo '<div class="blog-text-details">';
                    echo '<h3>Название: "' . htmlspecialchars($row['blog_name']) . '"</h3>';
                    echo '<p>Количество записей: 0</p>';
                    echo '<p>Оставшиеся антиквариаты: 0</p>';
                    echo '</div>';
                    echo '<div class="blog-btns-column">';
                    echo '<button class="btn-purple">Редактировать информацию в блоге</button>';
                    echo '<button class="btn-purple">Перейти в блог</button>';
                    echo '</div>';
                    echo '</div>';
                }

                ?>
                <!-- <div class="blog-card">
                    <div class="blog-image-placeholder">
                        <span>фотография блога</span>   
                    </div>
                    <div class="blog-text-details">
                        <h3>Название: "Абракадабра"</h3>
                        <p>Количество записей: 8</p>
                        <p>Оставшиеся антиквариаты: 4</p>
                    </div>
                    <div class="blog-btns-column">
                        <button class="btn-purple-light">Редактировать информацию в блоге</button>
                        <button class="btn-purple-light">Перейти в блог</button>
                    </div>
                </div>
                <div class="blog-card">
                    <div class="blog-image-placeholder">
                        <span>фотография блога</span>   
                    </div>
                    <div class="blog-text-details">
                        <h3>Название: "Абракадабра"</h3>
                        <p>Количество записей: 8</p>
                        <p>Оставшиеся антиквариаты: 4</p>
                    </div>
                    <div class="blog-btns-column">
                        <button class="btn-purple-light">Редактировать информацию в блоге</button>
                        <button class="btn-purple-light">Перейти в блог</button>
                    </div>
                </div> -->
            </section>

            <a href="create_blog.php" class="add-blog-bar">
                <span class="plus-icon">+</span> Создать новый блог
            </a>
        </div>

        <aside class="subscriptions-sidebar-new">
            <h3>Подписки</h3>
            <hr>
            <div class="sub-list">
                <div class="sub-card">
                    <div class="sub-avatar-black">фото блога</div>
                    <div class="sub-data">
                        <p><strong>Название:</strong> "Что-то"</p>
                        <p><strong>Автор:</strong> Дядя Игорь</p>
                        <p>Оценка: <span class="stars">★★★★☆</span> 10/5</p>
                    </div>
                </div>
                </div>
        </aside>
    </main>

    <?php include 'model/footer.php'; ?>
</body>
</html>