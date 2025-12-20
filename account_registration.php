<?php
require_once 'includes/session.php';
require_once 'includes/functions.php';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация - Антикварный магазинчик</title>
    <link rel="stylesheet" href="assets/css/shared.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/footer.css">

    <script src="assets/js/show_menu.js"></script>

    <link rel="icon" href="assets/images/logo_2.png" type="image/png">
</head>
<body>
    <?php
    include 'model/header.php';

    $error = '';
    $success = '';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = sanitizeInput($_POST['login']);
        $phone_number = sanitizeInput($_POST['phone_number']);
        $password = $_POST['password'];
        
        // Валидация
        if(empty($login) || empty($phone_number) || empty($password)) {
            $error = "Все поля обязательны для заполнения";
        } elseif(!validatePhone($phone_number)) {
            $error = "Введите корректный email";
        } elseif(!validatePassword($password)) {
            $error = "Пароль должен содержать минимум 8 символов, включая буквы и цифры";
        } elseif(checkUserExists($phone_number)) {
            $error = "Пользователь с таким email уже существует";
        } else {
            // Регистрация пользователя
            if(registerUser($login, $phone_number, $password)) {
                $success = "Регистрация успешна! Теперь вы можете войти.";
            } else {
                $error = "Ошибка при регистрации. Попробуйте еще раз.";
            }
        }
    }
    ?>
    <main class="main-content">
        <div class="container">
            <p class="subtitle">Пожалуйста, заполните все поля:</p>
            <?php if($error): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <?php if($success): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            <form class="login-form" action="" method="POST">
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
                    <input type="tel" id="phone_number" name="phone_number" required>
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