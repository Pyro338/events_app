## Запросы api

### Реристрация пользователя

__Заголовки__

/api/v1/register

post

Content-Type application/json

__Запрос__
```
{
    "name":"name",
    "last_name":"last_name",
    "email":"bar@bar.baz",
    "login" : "bar@bar.baz",
    "birthday": "1970-01-01",
    "password": "12345678",
    "device_name" : "baz"
}
```
__Ответ__
```
{
    "error": null,
    "result": {
        "id": 4,
        "first_name": "name",
        "last_name": "last_name",
        "token": "3|m8vqx1nCJbVbUlRbuyokDzv4ho2DzzhWjElCnKe020ad605d"
    }
}
```
### Авторизация пользователя:
__Заголовки__

/api/v1/login

post

Content-Type application/json

__Запрос__
```
{
	"email" : "pyro338@gmail.com",
	"password" : "hpbot145",
	"device_name" : "foo"
}
```
__Ответ__
```
{
    "error": null,
    "result": {
        "id": 1,
        "first_name": "Anton",
        "last_name": "Shapoval",
        "token": "6|SwsBEDlgufii2ULzvcTyjihE5CDfv2Qt3aZojUSn3291badf"
    }
}
```
### Получения токена авторизованным пользователем:
__Заголовки__

/api/v1/token

post

Content-Type application/json

__Запрос__
```
{
	"last_name":"last_name",
	"email":"foo@bar.baz",
	"login" : "foo@bar.baz",
	"birthday": "1970-01-01",
	"password": "12345678",
	"device_name" : "baz"
}
```
__Ответ__
```
{
    "error": null,
    "result": {
        "id": 3,
        "first_name": "name",
        "last_name": "last_name",
        "token": "5|u7iV5QzYzwEO20nAmiyWWcc1YIzUnNOQtE43hcc3ebbfde38"
    }
}
```
### Создание события
__Заголовки__

/api/v1/event/create

post

Content-Type application/json

Authorization Bearer 1|yQhLAZe8XZEnKHErNLppaR4K0w0xD0kWBICcCGb0d74d1ba2

Accept application/json

__Запрос__
```
{
	"title":"lorem",
	"text":"ipsum",
	"date": "2023-12-12",
	"created_by": "3",
	"device_name" : "baz"
}
```
__Ответ__
```
{
    "error": null,
    "result": {
        "title": "lorem",
        "text": "ipsum",
        "date": "2023-12-12",
        "created_by": 3,
        "updated_at": "2023-09-22T16:36:05.000000Z",
        "created_at": "2023-09-22T16:36:05.000000Z",
        "id": 8
    }
}
```
### Получение списка событий
__Заголовки__

/api/v1/event/list

get

Content-Type application/json

Authorization Bearer 1|yQhLAZe8XZEnKHErNLppaR4K0w0xD0kWBICcCGb0d74d1ba2

Accept application/json

__Ответ__
```
{
    "error": null,
    "result": [
        {
            "id": 2,
            "title": "bar",
            "text": "baz",
            "created_by": 2,
            "date": "2023-09-22",
            "created_at": "2023-09-22T10:42:56.000000Z",
            "updated_at": "2023-09-22T10:42:56.000000Z"
        },
        {
            "id": 3,
            "title": "lorum",
            "text": "ipsum",
            "created_by": 1,
            "date": "2023-09-22",
            "created_at": "2023-09-22T10:57:46.000000Z",
            "updated_at": "2023-09-22T10:57:46.000000Z"
        },
        {
            "id": 4,
            "title": "4црпй4керйк3п",
            "text": "3йкпй3кпй3кпй3кп",
            "created_by": 2,
            "date": "2023-09-07",
            "created_at": "2023-09-22T12:09:08.000000Z",
            "updated_at": "2023-09-22T12:09:08.000000Z"
        }
}
```
### Подписка на событие
__Заголовки__

/api/v1/event/subscribe

post

Content-Type application/json

Authorization Bearer 1|yQhLAZe8XZEnKHErNLppaR4K0w0xD0kWBICcCGb0d74d1ba2

Accept application/json

__Запрос__
```
{
	"event_id":"8",
	"device_name" : "baz"
}
```
__Ответ__
```
{
    "error": null,
    "result": {
        "success": true
    }
}
```
### Отписка от события
__Заголовки__

/api/v1/event/unsubscribe

post

Content-Type application/json

Authorization Bearer 1|yQhLAZe8XZEnKHErNLppaR4K0w0xD0kWBICcCGb0d74d1ba2

Accept application/json

__Запрос__
```
{
	"event_id":"8",
	"device_name" : "baz"
}
```
__Ответ__
```
{
    "error": null,
    "result": {
        "success": true
    }
}
```
### Удаление события
__Заголовки__

/api/v1/event/delete

post

Content-Type application/json

Authorization Bearer 1|yQhLAZe8XZEnKHErNLppaR4K0w0xD0kWBICcCGb0d74d1ba2

Accept application/json

__Запрос__
```
{
	"event_id":"8",
	"device_name" : "baz"
}
```
__Ответ__
```
{
    "error": null,
    "result": {
        "success": true
    }
}
```
