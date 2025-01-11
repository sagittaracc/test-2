## Установка

`composer install`

`php init`

`docker compose up -d`

## Применение миграций

`docker exec -it test-2-backend-1 bash`

`php yii migrate`

## Подача заявки

Доступно будет по адресу `http://localhost:20080/`

## Административная панель

Чтобы управлять заявками нужно будет зарегистрироваться по адресу `http://localhost:20080/site/signup` и активировать регистрацию

После этого управлять заявками можно будет по адресу `http://localhost:20080/request` (доступно из главного меню)