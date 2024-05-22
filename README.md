# Laravel Alarms App

### What is?

Registration and handling simple system equipment-related alarms.

* Equipment registration (CRUD)
* Alarm Registration (CRUD)
* Interface for handling alarms

### Made with
* Laravel (Full MVC)
* Bootstrap

### TODOs
- [ ] Authentication
- [ ] Responsive design

________________________________________________

### Step-by-step setup

**Requires Docker & Docker Compose.**

Clone the repo:
```sh
git clone https://github.com/victorlm/laravel-alarms.git
```


Get into the project folder:
```sh
cd laravel-alarmes
```


Create the Laravel project .env file:
```sh
cp .env.example .env
```


Update the envienvironment variables into .env file:
```dosini
APP_NAME="Laravel-Alarmes"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```

Initialize the project Docker containers:
```sh
docker-compose up -d
```

Access the Laravel App container:
```sh
docker-compose exec app bash
```

Install the project dependencies:
```sh
composer install
```

Generate the Laravel project key:
```sh
php artisan key:generate
```

Generate the Laravel project DB tables:
```sh
php artisan migrate
```

Access the Laravel project on:
[http://localhost:8989](http://localhost:8989)
