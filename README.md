# CRM
Возможности:
1. Сохранение информации о клиентах: ФИО, телефон, email.
2. Добавление напоминания о соверешении какого-то действия для пользователя.

#### Сущность User (Пользователь)
Пользователь CRM, который может, при условии аутентификации, пользоваться всеми возможностями.
Характеризауется полями:
* Имя
* Email
* Пароль


#### Сущность Client (Клиент)

Добавляемый пользователем объект клиента.

* Имя
* Email
* Номер телефона

#### Сущность Reminder (Напоминание)
Напоминание добавляется пользователем для сообщения ему о необходимости совершить какие-либо действия с клиентом 
в определенную дату и/или время.

* Текст напоминания
* Дата напоминания
* Время напоминания
* Клиент
* Пользователь


# Работа с пользователями

Пользователь может воспользоваться всеми возможностями CRM.

#### Регистрация

Для добавления нового пользователя нужно пердать его имя, адрес электронной почты и пароль.

```
curl -X POST \
--header "Content-Type: application/json" \
--data '{"jsonrpc": "2.0", "method": "signup", "params": {"name": "Ivan Ivanov", "email": "i@me.com", "password": "123123"}}' \
localhost:8080/api/user/ 
```

__TODO:__
- [ ] сделать валидацию
####  Аутентификация


```
curl -X POST \
--header "Content-Type: application/json" \
--data '{"jsonrpc": "2.0", "method": "signin", "params": {"email": "i@me.com", "password": "123123"}}' \
localhost:8080/api/user/ 
```

# Работа с клиентами

####  Добавление клиента
```
curl \
-X POST \
-H "X-AUTH-TOKEN: ff6efcd3103ceba4426fa67aed0d832s0" \
--data '{"jsonrpc": "2.0", "method": "create_client", "params": {"name": "Ivan", "email": "ivan@ivan.com", "phone":"+12345697"}}' \
localhost:8080/api/crm/ 
```

####  Получение клиента
```
curl \
-X POST \
-H "X-AUTH-TOKEN: ff6efcd3103ceba4426fa67aed0d8320" \
--data '{"jsonrpc": "2.0", "method": "find_client", "params": {"field": "email", "value": "ivan@ivan.com"}}' \
localhost:8080/api/crm/ 
```

#### TODO Изменение клиента
#### TODO Удаление клиента

# Архитектура
![alt text](CRM.png)