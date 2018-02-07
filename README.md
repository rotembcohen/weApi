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
* Edit the .env file if you wish to test on other databases (currently supports MySQL, Microsoft SQL Server, Postgres and SQLite)

### Available Endpoints ###

* **POST** /api/auth/signup/ or **POST** /api/auth/login/

Register / log-in a new user. Returns JSON Web Token on success. Sample JSON body:
```
{
    "name": "John Doe",
    "email": "johnd@example.com",
    "password": "secret_with_at_least_8_chars"
}
```

Use Authentication header with the content "Bearer <JWT>" and replace <JWT> with supplied token.

Authentication endpoints supplied by [laravel-api-boilerplate-jwt](https://github.com/francescomalatesta/laravel-api-boilerplate-jwt). Refer to their README for full documentation.

*All properties endpoints require authentication*

* **GET** /api/properties/

Returns all available properties, ordered by name descending.

* **POST** /api/properties/

Inserts a new property. Sample JSON body:
```
{
    "name": "195 Broadway",
    "desks": 342,
    "Sf": 1230400,
    "address1": "195 Broadway, New York,  10007",
    "address2": null,
    "city": "Manhattan",
    "state": "NY",
    "postalCode": null,
    "latitude": "40.7108825",
    "longitude": "-74.0109063",
    "countryId": 3,
    "regionalCategory": 14,
    "marketId": 4,
    "submarketId": 20,
    "locationId": 3
}
```

The following parameters are required:
name, address1, city, state (as 2 letters), latitude, longitude.
Also countryId & marketId must be noted, of which exists an object for in the database.
Note that the database seeds 5 of each when initializes populating IDs 1-5.

* **PUT** /api/properties/<property_id>

Edits an existing property. Must still follow requirements as POST endpoint. Sample JSON body:
```
{
  "desks": 999,
}
```

* **GET** /api/properties/<property_id>

Retrieves an existing property.

## Codebase ##

* \app\Api\V1\Controllers\PropertyController:

Handles all property requests

* \app\Country, \app\Market, \app\Property:

Object models

* \database\factories & \database\seeds:

Seeds an initial database with dummy data

* \routes\api.php:

Handles routing

* \tests\Functional\Api\V1\Controllers\CrudPropertiesTest.php:

Unit tests