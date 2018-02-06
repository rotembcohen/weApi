## WeWork Property CRUD API Task ##

Implementing [User Story #2](https://github.com/WeConnect/physical-systems-api-test/blob/master/docs/stories.md) using [Laravel 5.5.33](https://laravel.com/).

### Prerequisites ###
* Composer
* Laravel
* Database (MySQL,SQLite,PostgreSQL or Microsoft SQL Server)

### Installation ###

* `git clone https://github.com/rotembcohen/weApi`
* `cd weApi`
* `composer install`
* `mv .env.example .env`
* `php artisan key:generate`
* Create a database and inform .env file
* `php artisan migrate --seed` to create and populate tables
* `php artisan serve` to start the app on http://localhost:8000/

### Available Endpoints ###

* **GET** /properties/
* **POST** /properties/
* **PUT** /properties/<property_id>
* **GET** /properties/<property_id>

### Still Missing ###

* Create/Update validation
* JWT token implementation
* Tests
* Expand the documentation
