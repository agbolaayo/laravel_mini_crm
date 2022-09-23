# Laravel Mini CRM

The project is Mini CRM built with Laravel 9 


## Included
* Laravel Auth:
* database user seeders
* CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.
* Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website
* Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone
* Create a User seeder to the first user record
* Use database migrations to create those schemas above
* Store companies' logos in storage/app/public folder and make them accessible from public
* Use basic Laravel resource controllers with default methods – index, create, store etc.
* Laravel’s validation function, using Request classes
* Laravel’s pagination for showing the Companies/Employees list, 10 entries per page
* You can use either Mysql, Sqlite or  Mongodb

## Installation

* Make sure you have `composer` installed in your machine and it is installed on (PHP 8.0.2) or above..
* Clone the repo: `git clone https://github.com/agbolaayo/laravel_mini_crm.git`.
* Navigate to {PROJECT-PATH} where {PROJECT-PATH} is the path where you cloned project.
* Run ``copy .env.example .env`` and after file `.env` is copied you need to set database credentials into `.env` file.
* Run ``composer install``.
* Run ``php artisan key:generate``.
* Run ``php artisan storage:link``.
* Run ``php artisan migrate --seed``.
* Run ``php artisan serve``.

## Login

You can login with:
- Email: `admin@admin.com`
- Password : `password`.
