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

Route::get('posts/view', 'PostsController@view')->name('Posts.view')->middleware('auth');

Route::get('posts/create', 'PostsController@create')->name('Posts.create')->middleware('auth');

Route::post('posts/save', 'PostsController@save')->name('Posts.save')->middleware('auth');

Route::get('posts/edit/{id}', 'PostsController@edit')->name('Posts.edit')->middleware('auth');

Route::put('posts/update/{id}', 'PostsController@update')->name('Posts.update')->middleware('auth');

Route::post('posts/delete', 'PostsController@delete')->name('Posts.delete')->middleware('auth');

Route::post('posts/claim', 'PostsController@claim')->name('Posts.claim')->middleware('auth');

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

Auth::routes();

Route::get('/logout','Auth\LoginController@logout')->name('logout'); //override logout

Route::get('/home', 'HomePageController@index');
