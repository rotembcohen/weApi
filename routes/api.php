<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');

        $api->post('logout', 'App\\Api\\V1\\Controllers\\LogoutController@logout');
        $api->post('refresh', 'App\\Api\\V1\\Controllers\\RefreshController@refresh');
        $api->get('me', 'App\\Api\\V1\\Controllers\\UserController@me');
    });


    // Property CRUD endpoints, protected by JWT:
    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        
        $api->get('properties', 'App\\Api\\V1\\Controllers\\PropertyController@index');
        $api->get('properties/{id}', 'App\\Api\\V1\\Controllers\\PropertyController@show');
        $api->post('properties', 'App\\Api\\V1\\Controllers\\PropertyController@store');
        $api->put('properties/{id}', 'App\\Api\\V1\\Controllers\\PropertyController@update');
        //$api->delete('properties/{id}', 'PropertyController@delete');

    });

    
});
