
```dotenv
COMPOSE_PROJECT_NAME=bitrixdock  # Имя проекта. Используется для наименования контейнеров
PHP_VERSION=php82                # Версия php (php56, php71, php73, php74, php80, php81, php82, php83, php84, php85)
PHP_WORKSPACE_VERSION=8.2        # Версия PHP для workspace контейнера
NODE_VERSION=24.12.0             # Версия Node.js для workspace контейнера
WEB_SERVER_TYPE=nginx            # Веб-сервер nginx/apache
DB_SERVER_TYPE=mysql             # Сервер базы данных mysql/percona
MYSQL_DATABASE=bitrix            # Имя базы данных
MYSQL_USER=bitrix                # Пользователь базы данных
MYSQL_PASSWORD=123               # Пароль для доступа к базе данных
MYSQL_ROOT_PASSWORD=123          # Пароль для пользователя root от базы данных
INTERFACE=0.0.0.0                # На данный интерфейс будут проксироваться порты
SITE_PATH=./www                  # Путь к директории Вашего сайта
```

## Запуск и остановка bitrixdock
### Запуск
```shell
docker compose -p bitrixdock up -d
```

### Остановка
```shell
docker compose -p bitrixdock stop
```

### Полное удаление
```shell
docker compose -p bitrixdock down
```
## Как заполнять подключение к БД
![db](https://raw.githubusercontent.com/bitrixdock/bitrixdock/master/assets/db.png)

