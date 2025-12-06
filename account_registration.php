<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация - Антикварный магазинчик</title>
    <link rel="stylesheet" href="css\shared.css">
    <link rel="stylesheet" href="css\header.css">
    <link rel="stylesheet" href="css\login.css">
    <link rel="stylesheet" href="css\menu.css">
    <link rel="stylesheet" href="css\footer.css">

    <script src="js/show_menu.js"></script>

    <link rel="icon" href="images\logo_2.png" type="image/png">
</head>
<body>
    <?php
    include 'model/header.php';
    ?>

    <main class="main-content">
        <div class="container">
            <p class="subtitle">Пожалуйста, заполните все поля:</p>
            
            <form class="login-form" action="process_registration.php" method="POST">
                <div class="input-group">
                    <label for="login">Логин:</label>
                    <input type="text" id="login" name="login" required>
                </div>
                
                <div class="input-group">
                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <div class="input-group">
                    <label for="phone">Номер телефона:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                
                <button type="submit" class="btn">Зарегистрироваться</button>
                <div class="back-button-container">
                    <a href="account_login.php" class="back-button">
                        ← Вернуться назад
                    </a>
                </div>
            </form>
        </div>
    </main>

    <?php
    // Подключаем footer
    include 'model/footer.php';
    ?>
</body>
</html>