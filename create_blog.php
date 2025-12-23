<?php
require_once 'includes/session.php';
require_once 'includes/functions.php';

// Если не авторизован — перенаправляем на вход
if (!isLoggedIn()) {
    header("Location: account_login.php");
    exit();
}
// Логика сохранения данных
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // 1. Получаем данные из формы
    $title = trim($_POST['title']);
    $address = trim($_POST['address']);
    $content = trim($_POST['content']);
    $userId = $_SESSION['user_id']; // Предполагаем, что ID пользователя в сессии
    $imagePath = '';

    // 2. Обработка загрузки файла (улучшенная версия)
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $uploadDir = 'assets/uploads/blogs/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        // Генерируем уникальное имя файла
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $fileName = uniqid('blog_') . '.' . $extension;
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $imagePath = $targetPath;
        }
    }

    $userId = $_SESSION['user_id'];
    $blog = saveBlog($userId, $title, $address, $content, $imagePath);
    if ($blog) {
        header("Location: personal_account.php");
        exit();
    } else {
        // Обработка ошибки сохранения
        echo "Ошибка при сохранении блога.";
    }

    // Здесь должен быть ваш SQL запрос для сохранения в БД
    // Пример: saveBlog($title, $address, $content, $imagePath);
    
    // Перенаправление после успеха
    // header("Location: my_blogs.php?success=1");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Профиль - Антикварный магазинчик</title>
        <link rel="stylesheet" href="assets/css/shared.css">
        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/menu.css">
        <link rel="stylesheet" href="assets/css/footer.css">
        <link rel="stylesheet" href="assets/css/create_blog.css">

        <script src="assets/js/show_menu.js"></script>

        <link rel="icon" href="assets/images/logo_2.png" type="image/png">
    </head>
    <body>
        <?php include 'model/header.php'; ?>
        <div class="content">
            <div class="blog-form-container">
                <h1>Данные блога:</h1>
                
                <form action="create_blog.php" method="post" enctype="multipart/form-data">
                    <div class="form-main-section">
                        <div class="photo-upload-wrapper">
                            <div class="photo-placeholder" id="preview-circle">ФОТО</div>
                            <label for="image" class="btn-purple">Изменить</label>
                            <input type="file" id="image" name="image" accept="image/*" style="display:none;" onchange="previewImage(this, 'preview-circle')">
                        </div>

                        <div class="inputs-column">
                            <div class="form-group">
                                <label>Название блога:</label>
                                <input type="text" name="title" placeholder="Название" required>
                            </div>
                            <div class="form-group">
                                <label>Адрес:</label>
                                <input type="text" name="address" placeholder="Адрес" required>
                            </div>
                            <div class="form-group">
                                <label>Краткая информация:</label>
                                <textarea name="content" placeholder="текст текст текст...."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="blog-items-list">
                        <div class="blog-item">
                            <div class="item-photo" style="display: flex; align-items: center; justify-content: center; color: white;">ФОТО</div>
                            <div class="item-info">
                                <h3>Заголовок</h3>
                                <p><strong>Описание:</strong> Текст текст текст...</p>
                                <p><strong>Год: 1999</strong></p>
                            </div>
                            <div class="item-actions">
                                <button type="button" class="btn-purple">Изменить</button>
                                <button type="button" class="btn-purple" style="background-color: #6E2B4E;">Удалить</button>
                            </div>
                        </div>
                    </div> -->

                    <div style="text-align: center; margin-top: 20px;">
                        <input type="submit" class="btn-purple" value="Опубликовать" style="padding: 15px 40px; font-size: 18px;">
                    </div>
                </form>
            </div>
        </div>

        <!-- <div class="photo-upload-wrapper">
            <div class="photo-placeholder" id="preview-circle">ФОТО</div>
            <label for="image" class="btn-purple">Изменить</label>
            <input type="file" id="image" name="image" accept="image/*" style="display:none;" onchange="previewImage(this, 'preview-circle')">
        </div>

        <div class="blog-item">
            <div class="item-photo" id="preview-item-1" style="display: flex; align-items: center; justify-content: center; color: white;">ФОТО</div>
            <div class="item-info">
                <h3>Заголовок</h3>
                <p><strong>Описание:</strong> Текст текст текст...</p>
                <p><strong>Год: 1999</strong></p>
            </div>
            <div class="item-actions">
                <label class="btn-purple" style="cursor:pointer;">
                    Изменить
                    <input type="file" accept="image/*" style="display:none;" onchange="previewImage(this, 'preview-item-1')">
                </label>
                <button type="button" class="btn-purple">Удалить</button>
            </div>
        </div> -->

        <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Устанавливаем фон элемента как выбранное изображение
                    preview.style.backgroundImage = `url('${e.target.result}')`;
                    preview.style.backgroundSize = 'cover';
                    preview.style.backgroundPosition = 'center';
                    preview.textContent = ''; // Убираем текст "ФОТО"
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>

        <?php include 'model/footer.php'; ?>
    </body>
</html>