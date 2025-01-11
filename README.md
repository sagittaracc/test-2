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

## API

Будет доступно по адресу `http://localhost:21080/requests`

- получение перечня заявок в системе (использует Basic Auth)

```
curl \
  --location \
  --request GET \
  'http://localhost:21080/requests' \
  --header 'Authorization: ******'
```

- создание заявки (доступно всем)

```
curl \
  --location 'http://localhost:21080/requests' \
  --header 'Content-Type: application/json' \
  --data-raw '{"name": "sagy", "email": "sagy@local.ru", "message": "this is my message"}'
```

- обновление заявки (использует Basic Auth)

```
curl \
  --location \
  --request PUT \
  'http://localhost:21080/requests/<id>' \
  --header 'Content-Type: application/json' \
  --header 'Authorization: *****' \
  --data '{"comment": "ok", "status": "resolved"}'
```
