## SCHOOL CALENDER IN REACT NEXTJS AND LARAVEL BACKEND

School Calendar in React Next.js and Laravel Backend
Installation Instructions
Clone the Repository
git clone https://github.com/mandelashaban593/school-calendergradFrontEnd
git clone https://github.com/mandelashaban593/school-calendergradBackend

Backend Setup (Laravel)
Navigate to the backend directory:

cd school-calendergradBackend

Install PHP dependencies:

composer install

Copy the .env file:

cp .env.example .env

Set up your database details in .env:

dotenv

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

Generate application key:

php artisan key:generate

Run migrations and seeders (if needed):

php artisan migrate --seed

Start the Laravel server:
php artisan serve


Additional Laravel Commands
Create migration:
php artisan make:migration create_attendance_table

Create seeder:

php artisan make:seeder LessonsTableSeeder

Seed database with specific seeder:
php artisan db:seed --class=LessonsTableSeeder

Create factory:
php artisan make:factory UserFactory --model=User

Create controller:
php artisan make:controller UserController

Create request:

    php artisan make:request ClassRequest
    php artisan make:request RegisterRequest
    php artisan make:request LoginRequest
    php artisan make:request LessonRequest
    php artisan make:request SubjectRequest
    php artisan make:request UserRequest
    php artisan make:request ExamScoreRequest

Additional Notes

    For Passport installation and configuration, refer to Laravel's official documentation on setting up Passport for API authentication.
    To list all API routes within a specific path, use:

    bash

php artisan route:list --path=path



#### Install Packages

```
composer install
```

#### Copy .env file

```
cp .env.example .env
```

#### Set Database Detail

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

#### Start Laravel Project

```
php artisan serve

```

# Connect with Us

-   [github](https://github.com/mandelashaban593)
-   [Twitter](https://twitter.com/mandelashaban51)
-   [Facebook](https://facebook.com/mandela.shaban.1)
Sites github Links: https://github.com/mandelashaban593/school-calendergradFrontEnd for front end and https://github.com/mandelashaban593/school-calendergradBackend for backend

