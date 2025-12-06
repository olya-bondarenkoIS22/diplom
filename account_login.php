<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в аккаунт - Антикварный магазинчик</title>
    <link rel="stylesheet" href="css\shared.css">
    <link rel="stylesheet" href="css\header.css">
    <link rel="stylesheet" href="css\login.css">
    <link rel="stylesheet" href="css\menu.css">
    <link rel="stylesheet" href="css\footer.css">

    <script src="js/show_menu.js"></script>

    <link rel="icon" href="..\images\logo_2.png" type="image/png">
</head>
<body>
    <?php
    include 'model/header.php';
    ?>

    <main class="main-content">
        <div class="container">
            <p class="subtitle">Пожалуйста, введите данные:</p>
            
            <form class="login-form" action="process_login.php" method="POST">
                <div class="input-group">
                    <label for="login">Логин</label>
                    <input type="text" id="login" name="login" required>
                </div>
                
                <div class="input-group">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <div class="links">
                    <a href="#">Не могу войти</a>
                    <a href="account_registration.php">Зарегистрироваться</a>
                </div>
                
                <button type="submit" class="btn">Войти</button>

                <div class="back-button-container">
                    <a href="home.html" class="back-button">
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