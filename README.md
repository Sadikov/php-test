
# Тестовое задание для PHP разработчика

## Описание
Необходимо написать небольшой сайт - статейник. Макет не принципиален. Можно взять bootstrap или любой другой фреймворк. Так же можно использовать любые JS фреймворки. Главное, чтобы на страницах присутствовали все компоненты.

Среднее время выполнения: 4 часа.

Можно не реализовывать хранение изображений. Для заглушек можно юзать сервис [https://placeholder.com/](https://placeholder.com/) или подобный (чтобы не заморачиваться с нарезкой). Либо сделать 2 изображения (миниатюра и обычное) и переиспользовать их.

Всю логику реализуем встроенным функционалом Laravel.

Результат необходимо загрузить в публичный репозиторий GitHub.

## Стек
- PHP 7.2+
- Laravel 7+

## Разделы сайта
- Главная страница
- Каталог статей

## Страницы сайта
- Главная страница
Url: /
- Каталог статей
Url: /articles
- Страница статьи
Url: /articles/{slug}

## API методы
При реализации API методов учтите, что онлайн блога заранее не известен. 
Ваша реализация должна позволять избежать блокировок БД в случае огромного количества входящих запросов (допустим 1 млн входящих запрос на инкрементацию счетчика просмотров). Это требования необходимо вам для организации правильного хранения лайков и просмотров.
Ответ: application/json

### Инкрементирование счетчика лайка
Ответ: новое значение счетчика

### Инкрементирование счетчика просмотров
Ответ: новое значение счетчика

### Создание комментария
Вводные данные: Подразумеваем, что данный механизм очень медленный (100500 операций). Для тестов можно использовать sleep(10). Необходимо реализовать исполнение в фоновом режиме с возможностью повторного выполнения в случае ошибки исполнения (Exception).

Поля:
- subject. Varchar(255).
- body. LongText

Ответы: 
- ValidationException. Если не заполнено одно из полей.
- Success. Любой, главное чтобы с 200 кодом.

## Компоненты

### Навигационное меню
Меню должно генерироваться. В меню должен быть помечен текущий раздел сайта.

### Последние статьи
6 добавленных статей. LIFO.

### Пейджинация
Стандартная пейджинация Laravel ([https://laravel.com/docs/7.x/pagination#introduction](https://laravel.com/docs/7.x/pagination#introduction))

### Миниатюра статьи
Блок состоит из следующих элементов:
- миниатюра обложки статьи
- заголовок статьи
- краткое описание статьи

### Тег статьи
Ссылка. Состоит из url и label. 

### Счетчик лайков статьи
Элемент является кнопкой, на которой в качестве label написано число.
При клике на кнопку отправляется AJAX запрос, инкрементирующий счетчик. В ответе на запрос 
возвращается новое значение, которое необходимо отобразить в label.

### Счетчик просмотров статьи
Текстовый элемент, отображающие текущий счетчик просмотров. Через 5 секунд после открытия статьи отправляется запрос, инкрементирующий счетчик. В ответе на запрос возвращается новое значение, которое необходимо отобразить в элементе.

### Форма комментария
Форма, состоящая из 2х полей:
- Тема сообщения
- Текст сообщения

При нажатии на кнопку "Отправить" отправляется AJAX запрос. При успешной обработке форма заменяется на плашку "Ваше сообщение успешно отправлено".

## Описание страниц
### Главная страница
Компоненты:
- Навигационное меню. Активный пункт "Главная страница".
- Последние статьи

### Каталог статей
Компоненты:
- Навигационное меню. Активный пункт "Каталог статей".
- Листинг статей. LIFO. 10 миниатюр статей на страницу
- Пейджинация

### Статья
Компоненты:

- Навигационное меню. Активный пункт "Каталог статей".
- Обложка статьи
- Текст статьи
- Теги статьи
- Счетчик лайков статьи
- Счетчик просмотров статьи
- Форма коментария

## Развертывание
Развертывание должно производиться через стандартные механизмы:
- git clone ...
- php artisan migrate
- php artisan db:seed
- php artisan serve

То есть никакие импорты SQL файлов \ загрузка zip архивов - не приемлемы.

## Тестирование
- ArticleSeed. Должен сгенерировать 20 статей с рандомной датой и рандомным текстом. Используем Faker.
- ArticleTagSeed. Должен сгенерировать некоторое количество тегов, чтобы хотя бы 1 был в каждой статье.

## Примерный вид интерфейсов
- Главная страница
![Главная страница](https://www.dropbox.com/s/3wcj4aitpvz1hyr/3.jpg?dl=1)
- Каталог статей 
![Каталог статей](https://www.dropbox.com/s/76zfly76uq44j1p/4.jpg?dl=1)
![Каталог статей](https://www.dropbox.com/s/y3pva2q3xu4de28/2.jpg?dl=1)
- Статья 
![Статья](https://www.dropbox.com/s/2iwky1si2mjrixp/1.jpg?dl=1)
![Статья](https://www.dropbox.com/s/2iwky1si2mjrixp/5.jpg?dl=1)
