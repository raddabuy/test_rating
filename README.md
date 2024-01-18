Тестовый проект на Laravel 8 с Docker.

Все команды выполняются в контейнере app (i.e docker-compose exec app php artisan optimize)
Использована Swagger документация (пакет https://github.com/DarkaOnLine/L5-Swagger).
Для генерации необходимо выполнение команд:
php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
php artisan l5-swagger:generate


