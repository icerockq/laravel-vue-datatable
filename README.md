# laravel-vue-datatable

Clone repository
```bash
git clone https://github.com/icerockq/laravel-vue-datatable.git
```
Go to the project folder

Install dependencies
```bash
composer install
```
and
```bash
npm install
```
Run command to generate key
```bash
php artisan key:generate
```
in the .env file, substitute your data to connect to a database
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
Run the command to start migrations
```bash
php artisan migrate
```

Command to seed your database
```bash
php artisan db:seed
```

## Website preview

With command
```bash
php artisan serve
```
the project will launch php server

