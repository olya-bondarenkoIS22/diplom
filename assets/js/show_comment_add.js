document.addEventListener('DOMContentLoaded', function() {
    // Обработчик для кнопки "Написать отзыв"
    document.querySelector('.write-review-btn').addEventListener('click', function() {
        alert('Форма для написания отзыва будет открыта здесь!');
        // Здесь можно добавить логику для открытия модального окна с формой отзыва
    });

    // Обработчики для клика по изображениям в отзывах
    document.querySelectorAll('.comment-image').forEach(img => {
        img.addEventListener('click', function() {
            // Здесь можно добавить логику для открытия изображения в полноэкранном режиме
            console.log('Открыть изображение: ' + this.alt);
        });
    });
});