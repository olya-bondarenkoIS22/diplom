document.addEventListener('DOMContentLoaded', function() {
    // Элементы меню
    let categoriesBtn = document.getElementById('categories-btn');
    let categoriesMenu = document.getElementById('categories-menu');
    let closeMenu = document.getElementById('close-menu');
    let overlay = document.getElementById('overlay');

    // Проверяем, что элементы существуют
    if (!categoriesBtn || !categoriesMenu || !closeMenu || !overlay) {
        console.error('Не найдены необходимые элементы меню');
        return;
    }

    // Открытие меню
    categoriesBtn.addEventListener('click', function() {
        categoriesMenu.classList.add('active');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden'; // Блокируем скролл страницы
    });

    // Закрытие меню
    function closeCategoriesMenu() {
        categoriesMenu.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = ''; // Восстанавливаем скролл
    }

    closeMenu.addEventListener('click', closeCategoriesMenu);
    overlay.addEventListener('click', closeCategoriesMenu);

    // Закрытие меню при нажатии ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeCategoriesMenu();
        }
    });
});