## WeWork Property CRUD API Task ##

Implementing [User Story #2](https://github.com/WeConnect/physical-systems-api-test/blob/master/docs/stories.md) using [Laravel 5.5.33](https://laravel.com/).

### Prerequisites ###
* Composer
* Laravel 5.5.*

### Installation ###

* `git clone https://github.com/rotembcohen/weApi`
* `cd weApi`
* Run `./install.sh`

Afterwards:
* `vendor/bin/phpunit` to run unit tests (on dummy memory-only database)
* `php artisan serve` to start the app on http://localhost:8000/ (to use a remote RDS database)
* Edit the .env file if you wish to test locally

### Available Endpoints ###

* **GET** /properties/

examples???

* **POST** /properties/
* **PUT** /properties/<property_id>
* **GET** /properties/<property_id>

### Still Missing ###

* More tests
* Expand the documentation
