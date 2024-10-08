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

## Запросы
### Получить токен
```
curl --location --request POST 'http://localhost/login?email=admin%40admin.com&password=password' \
--header 'Accept: application/json'
```
### Добавить Product
```
curl --location 'http://localhost/products' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ' \
--data '{
    "name": "name",
    "category_id": 1,
    "country_id": 1,
    "status_id": 1,
    "description": ""
}'
```
### Редактировать Product
```
curl --location --request PATCH 'http://localhost/products/1' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ' \
--data '{
    "name": "name 1",
    "category_id": 2,
    "country_id": 2,
    "status_id": 1,
    "description": "description"
}'
```
### Список Product
```
curl --location 'http://localhost/products' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer '
```
### Обновление Product
```
curl --location --request PATCH 'http://localhost/products/1' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer ' \
--data '{
"status_id": 2
}'
```
### Список Product status = approved
```
curl --location 'http://localhost/products/dropdown' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer '
```
## Pusher
### Изменить `BROADCAST_DRIVER`
```
BROADCAST_DRIVER=reverb
```
### Собрать `Assets`
```
./vendor/bin/sail npm i
./vendor/bin/sail npm run build
```
### Запустить pusher `Reverb`
```
./sail php artisan reverb:start
```
События выводятся в консоль http://localhost

