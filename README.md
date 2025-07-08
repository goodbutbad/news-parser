# Laravel News Parser — Kaktus.media

Простой Laravel-парсер новостей с сайта [Kaktus.media](https://kaktus.media).  
Реализована фильтрация по дате и поиск по заголовкам.

Репозиторий проекта: https://github.com/goodbutbad/news-parser

---

## Установка

1. Клонировать репозиторий:

```bash
git clone https://github.com/goodbutbad/news-parser.git
cd news-parser
```
 2. Установить зависимости:
```cmd
composer install
```
 3. Запустить локальный сервер:
```cmd
php artisan serve
```

Откройте в браузере:
```Browser
http://127.0.0.1:8000/
```

---

Функциональность
 • Парсинг новостей с главной страницы Kaktus.media
 • Фильтрация новостей по дате
 • Поиск по заголовкам новостей

---

Стек технологий
 • Laravel 10
 • PHP 8.2
 • GuzzleHTTP
 • Symfony DomCrawler

---

Структура проекта
 • App\Services\NewsParserService — логика парсинга
 • App\Http\Controllers\NewsController — обработка запросов
 • resources/views/news/index.blade.php — отображение новостей

---

