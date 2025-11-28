<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина - Антикварный магазинчик</title>
    
    <link rel="stylesheet" href="css\shared.css">
    <link rel="stylesheet" href="css\cart.css">
    <link rel="stylesheet" href="css\header.css">
    <link rel="stylesheet" href="css\menu.css">
    <link rel="stylesheet" href="css\footer.css"> 

    <link rel="icon" href="images/logo_2.png" type="image/png">
</head>
<body> 
    <?php
    include 'model/header.php';
    ?>
    <main class="cart-main-content">
        <!-- Левая колонка - товары в корзине -->
        <div class="cart-items-section">
            <div class="cart-controls">
                <div class="select-all">
                    <input type="checkbox" id="select-all">
                    <label for="select-all">Выбрать все</label>
                </div>
                <button class="delete-selected">Удалить выбранные</button>
            </div>

            <div class="cart-items">
                <!-- Товар 1 -->
                <div class="cart-item">
                    <div class="item-checkbox">
                        <input type="checkbox" class="item-select">
                    </div>
                    <div class="item-image">
                        Изображение товара
                    </div>
                    <div class="item-details">
                        <h3 class="item-title">Антикварная ваза, 1890</h3>
                        <p class="item-author">Продавец: Иванов А.</p>
                        <p class="item-price">30 000 руб.</p>
                    </div>
                    <div class="item-actions">
                        <button class="remove-item">Удалить</button>
                    </div>
                </div>

                <!-- Товар 2 -->
                <div class="cart-item">
                    <div class="item-checkbox">
                        <input type="checkbox" class="item-select">
                    </div>
                    <div class="item-image">
                        Изображение товара
                    </div>
                    <div class="item-details">
                        <h3 class="item-title">Старинная икона, 18 век</h3>
                        <p class="item-author">Продавец: Петрова М.</p>
                        <p class="item-price">20 000 руб.</p>
                    </div>
                    <div class="item-actions">
                        <button class="remove-item">Удалить</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Правая колонка - итоговая информация -->
        <div class="cart-summary">
            <h2 class="summary-title">Ваш заказ</h2>
            
            <div class="summary-row summary-count">
                <span>Товары, 2шт.</span>
                <span>50 000 руб.</span>
            </div>
            
            <div class="summary-row summary-discount">
                <span>Скидка</span>
                <span>0</span>
            </div>
            
            <div class="summary-row summary-total">
                <span>Итого</span>
                <span>0 руб.</span>
            </div>
            
            <button class="buy-button">Купить</button>
        </div>
    </main>

    <script>
        // Элементы меню
        const categoriesBtn = document.getElementById('categories-btn');
        const categoriesMenu = document.getElementById('categories-menu');
        const closeMenu = document.getElementById('close-menu');
        const overlay = document.getElementById('overlay');

        document.addEventListener('DOMContentLoaded', function() {
            SummCalc();
        });

        // Открытие меню
        categoriesBtn.addEventListener('click', function() {
            categoriesMenu.classList.add('active');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        // Закрытие меню
        function closeCategoriesMenu() {
            categoriesMenu.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        closeMenu.addEventListener('click', closeCategoriesMenu);
        overlay.addEventListener('click', closeCategoriesMenu);

        // Закрытие меню при нажатии ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeCategoriesMenu();
            }
        });

        // Функционал корзины
        const selectAllCheckbox = document.getElementById('select-all');
        const itemCheckboxes = document.querySelectorAll('.item-select');
        const deleteSelectedBtn = document.querySelector('.delete-selected');
        const removeItemBtns = document.querySelectorAll('.remove-item');

        // Выделить все товары
        selectAllCheckbox.addEventListener('change', function() {
            itemCheckboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });

        // Удаление выбранных товаров
        deleteSelectedBtn.addEventListener('click', function() {
            const selectedItems = document.querySelectorAll('.item-select:checked');
            selectedItems.forEach(checkbox => {
                const item = checkbox.closest('.cart-item');
                item.remove(); // Удаляем элемент из DOM полностью
            });
            
            // Сбросить "Выбрать все"
            selectAllCheckbox.checked = false;
            
            // Пересчитать сумму после удаления
            SummCalc();
        });

        // Удаление отдельных товаров
        removeItemBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const item = this.closest('.cart-item');
                item.remove(); // Удаляем элемент из DOM полностью
                
                // Пересчитать сумму после удаления
                SummCalc();
            });
        });

        function SummCalc() {
            // Находим только ВИДИМЫЕ элементы с ценой товаров
            const visibleItems = document.querySelectorAll('.cart-item:not([style*="display: none"])');
            
            let totalSum = 0;
            let itemsCount = 0;
            
            // Проходим по всем видимым элементам и суммируем их цены
            visibleItems.forEach(item => {
                const priceElement = item.querySelector('.item-price');
                if (priceElement) {
                    // Получаем текст цены, убираем "руб." и пробелы, преобразуем в число
                    const priceText = priceElement.textContent.replace('руб.', '').replace(/\s/g, '');
                    const price = parseInt(priceText);
                    
                    // Проверяем, что цена - валидное число
                    if (!isNaN(price)) {
                        totalSum += price;
                        itemsCount++;
                    }
                }
            });
            
            // Форматируем сумму с пробелами для тысяч
            const formattedSum = totalSum.toLocaleString('ru-RU') + ' руб.';
            const formattedItemsSum = totalSum.toLocaleString('ru-RU') + ' руб.';
            
            // Находим элемент для отображения итоговой суммы
            const totalElement = document.querySelector('.summary-total span:last-child');
            
            // Обновляем текст с итоговой суммой
            if (totalElement) {
                totalElement.textContent = formattedSum;
            }
            
            // Обновляем блок с количеством товаров и их суммой
            const summaryCountElement = document.querySelector('.summary-count');
            if (summaryCountElement) {
                const spans = summaryCountElement.querySelectorAll('span');
                if (spans.length >= 2) {
                    spans[0].textContent = `Товары, ${itemsCount}шт.`;
                    spans[1].textContent = formattedItemsSum;
                }
            }
            
            return totalSum;
        }
    </script>

    <?php
    // Подключаем footer
    include 'model/footer.php';
    ?>
</body>
</html>
