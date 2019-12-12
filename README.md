# CRM

Сохранение информации о клиентах. 

# Методы API

####  Добавление пользователя
```
curl -X POST -H "Content-Type: application/x-www-form-urlencoded" -d "email=i@me.com&password=123123" localhost:8080/api/user/add/ 
```

####  Аутентификация
```
curl -X POST -H "Content-Type: application/x-www-form-urlencoded" -d "email=i@me.com&password=123123" localhost:8080/api/auth/ 
```

####  Добавление клиента
```
curl \
-X POST \
-H "X-AUTH-TOKEN: ff6efcd3103ceba4426fa67aed0d8320" \
-H "Content-Type: application/x-www-form-urlencoded" \
-d "name=Ivan&email=ivan@ivan.com&phone=+12345697"
localhost:8080/api/client/create/ 
```

#### TODO Изменение клиента
```
curl \
-X POST \
-H "X-AUTH-TOKEN: ff6efcd3103ceba4426fa67aed0d8320" \
-H "Content-Type: application/x-www-form-urlencoded" \
-d "email=i@me.com&password=123123" 
localhost:8080/api/auth/ 
```

#### TODO Получение клиента
```
curl \
-X POST \
-H "X-AUTH-TOKEN: ff6efcd3103ceba4426fa67aed0d8320" \
-H "Content-Type: application/x-www-form-urlencoded" \
-d "email=i@me.com&password=123123" localhost:8080/api/auth/ 
```

#### TODO Удаление клиента
```
curl \
-X POST \
-H "X-AUTH-TOKEN: ff6efcd3103ceba4426fa67aed0d8320" \
-H "Content-Type: application/x-www-form-urlencoded" \
-d "email=i@me.com&password=123123" \
localhost:8080/api/auth/ 
```
