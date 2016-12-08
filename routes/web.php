<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomePageController@index')->name('HomePage.index');

Route::get('homepage', 'HomePageController@index')->name('HomePage.index');

Route::post('homepage/login', 'HomePageController@login')->name('HomePage.login');

Route::post('homepage/register', 'HomePageController@register')->name('HomePage.register');

Route::get('posts/create', 'PostsController@create')->name('Posts.create');

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});


Route::post('loremipsumgenerator/generate', 'LoremIpsumGeneratorController@generate')->name('LoremIpsumGenerator.generate');

Route::get('loremipsumgenerator', 'LoremIpsumGeneratorController@index')->name('LoremIpsumGenerator.index');

Route::post('randomusergenerator/generate', 'RandomUserGeneratorController@generate')->name('RandomUserGenerator.generate');

Route::get('randomusergenerator', 'RandomUserGeneratorController@index')->name('RandomUserGenerator.index');

Route::post('passwordgenerator/generate', 'PasswordGeneratorController@generate')->name('PasswordGenerator.generate');

Route::get('passwordgenerator', 'PasswordGeneratorController@index')->name('PasswordGenerator.index');

