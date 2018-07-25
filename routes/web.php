<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\News;

Route::get('/', function () {

    return view('welcome');
});

Route::get('/delete/{id}', function ($id) {

    $news = News::find($id);

    $news->delete();

    return redirect('/news');

});

Route::get('/create', function () {

    
    return view('create');

});

Route::get('/add/{name}/{description}/{path}', function ($name,$description, $path) {

    
    $news = new News();

    $news->name=$name;
    $news->description=$description;
    $news->datePublished=now();
    $news->avatar=$path;

    $news->save();

    return redirect('/news');

});

Route::get('/news', function () {

    $news = News::paginate(5);

    return view('news',compact('news'));
});

Route::get('/edit/{id}/{name}/{description}/{date}/{path}', function($id,$name,$description, $date, $path) {

	News::where('id',$id)->update(['name'=>$name, 'description'=>$description,'datePublished'=>$date,'avatar'=>$path]);

	return redirect('/news');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

