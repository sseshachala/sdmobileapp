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

$router->group(['prefix' => 'sdmobile/api'], function () use ($router) {
    $router->get('millets',  ['uses' => 'sdmobileapp\MilletController@showAllMillets']);

    $router->get('millet/{id}', ['uses' => 'sdmobileapp\MilletController@showOneMillet']);

    $router->get('generalNotes',  ['uses' => 'sdmobileapp\GeneralNoteController@showAllNotes']);

    $router->get('generalNote/{id}', ['uses' => 'sdmobileapp\GeneralNoteController@showOneNote']);

    $router->get('kidsNotes',  ['uses' => 'sdmobileapp\KidsNoteController@showAllNotes']);

    $router->get('kidsNote/{id}', ['uses' => 'sdmobileapp\KidsNoteController@showOneNote']);

    $router->get('diseaseMilletDiet', ['uses' => 'sdmobileapp\MilletDietForDiseaseController@showAllMilletDiet']);
    $router->get('cancerMilletDiet', ['uses' => 'sdmobileapp\MilletDietForCancerController@showAllMilletDiet']);

});


//$router->group(['prefix' => 'sdmobile/api', 'middleware' => 'auth'], function () use ($router) {
//    $router->get('millets',  ['uses' => 'sdmobileapp\MilletController@showAllMillets']);

//    $router->get('millet/{id}', ['uses' => 'sdmobileapp\MilletController@showOneMillet']);
//});