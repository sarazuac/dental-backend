<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/timestamp', [
    'uses' => 'TimestampController@getTimestamps'
]);
$router->get('/timestamp/user/{user_id}', [
    'uses' => 'TimestampController@getTimestampsByUser'
]);

$router->post('/timestamp/clockin', [
    'uses' => 'TimestampController@postClockIn'
]);
$router->put('/timestamp/lunchin/{id}', [
    'uses' => 'TimestampController@postLunchIn'
]);
$router->put('/timestamp/lunchout/{id}', [
    'uses' => 'TimestampController@postLunchOut'
]);
$router->put('/timestamp/clockout/{id}', [
    'uses' => 'TimestampController@postClockOut'
]);
$router->delete('/timestamp/{id}', [
    'uses' => 'TimestampController@deleteTimestamp'
]);

