### Тестовое задание:
После старта запускаются миграции и сидер что бы создать в базе одного тестового пользователя
• Email: admin@admin.com
• Pass: password
Далее сидер создает таблицы
• Categories – (структура: id, name)
• Countries – (структура: id, name)
• Statuses – (структура: id, name) pending, approved, declined
Заполняет тестовыми данными
Из возможностей сервиса необходимо реализовать API в котором будет возможность
Аутентификация
После ввода логина и пароля пользователя endpoint возвращает API токен

CRUD раздела продукты
Все endpoint -ы закрыты аутентификацией
Поля раздела
• Id
• Name
• Description
• User_id
• Category_id
• Country_id
• Status_id
• Created_at
• Updated_at

| Метод | Endpoint               | Описание                                                                                                                   |
|-------|------------------------|----------------------------------------------------------------------------------------------------------------------------|
| POST  | /products              | пейлод проверяется на валидность всех полей                                                                                |
| PUT   | /products/{product}    |                                                                                                                            |
| PATCH | /products/{product}    |                                                                                                                            |
| GET   | /products              | Возвращает список продуктов с полями: Id, Name, Category, Created_at.                                                      |
| GET   | /products/{product}    | Возвращает информацию о продукте с полями: Id, Name, Description, User, Category, Country, Status, Created_at, Updated_at. |
| GET   | /products/dropdown     | Возвращает только продукты со статусом "approved" с полями: Id, Name.                                                      |

## Запуск:
```git clone ...```
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```
```
cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
```
