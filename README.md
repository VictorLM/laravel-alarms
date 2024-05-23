# Laravel Alarms App

### What is?

Registration and handling simple system equipment-related alarms.

* Equipment registration (CRUD)
* Alarm Registration (CRUD)
* Interface for handling alarms
* Interface for display the alarms actuations

### Made with
* Laravel (Full MVC)
* Bootstrap (CSS)
* MySQL (Database)

### TODOs
- [ ] Authentication
- [ ] Responsive design
- [ ] Pagination
- [ ] Activity log (https://docs.spatie.be/laravel-activitylog)
- [ ] Errors handling (try-catches)
- [ ] Translate validation errors
- [ ] Whitespace visual litle bug in "edit" buttons
- [ ] Ask for confirmation (modal) before delete
- [ ] Use more the icons within buttons and stuff

________________________________________________

### Step-by-step setup

**Requires Docker & Docker Compose.**

Clone the repo:
```sh
git clone https://github.com/VictorLM/laravel-alarms.git
```


Get into the project folder:
```sh
cd laravel-alarms
```


Create the Laravel project .env file:
```sh
cp .env.example .env
```


Update the envienvironment variables into .env file:
```dosini
APP_NAME="Laravel-Alarms"
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
docker compose up -d
```

Access the Laravel App container:
```sh
docker compose exec app bash
```

Install the project dependencies:
```sh
composer install
```

Generate the Laravel project key:
```sh
php artisan key:generate
```

Migrate the Laravel project DB tables:
```sh
php artisan migrate
```

Seed the Laravel project DB tables with example data:
```sh
php artisan db:seed
```

Access the Laravel project on:
[http://localhost:8989](http://localhost:8989)

### Preview

<img src="https://i.imgur.com/hn0OT64.gif" alt="Preview" />
