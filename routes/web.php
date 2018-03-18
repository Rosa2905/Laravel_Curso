<?php

/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
*/
use App\Post;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function () {
//     return "Hi about page";
// });

// Route::get('/post/{id}/{name}', function ($id,$name) {
//     return "This post number is". $id. " ". $name;
// });

// Route::get('admin/posts/example',array('as' => 'admin.home'	,function()
// 	 {
// 	$url=route('admin.home');
//     return "this url is ".$url;	
// }));

//Route::get('/post/{id}','PostsController@index');
//Route::resource('post','PostsController');
// Route::get('/contact','PostsController@contact');  //array
// Route::get('post/{id}/{name}/{password}','PostsController@show_post');


/*
|--------------------------------------------------------------------------
| Web Routes with DB
|--------------------------------------------------------------------------
|
*/
//--------------------------------------------------------Insert  DATA 
Route::get('/insert', function () {
	DB::insert('insert into posts(title,content) values(?,?)',['laravel','new insert in DB']);
	});
//----------------------------------------------------------Read Data

// Route::get('/read',function(){
// 	$results=DB::select ('select * from posts where id= ?',[1]);
// 	foreach($results as $post)
// 	{
// 		return $post->title;
// 	}
// });
//-----------------------------------------------------------Update Data
Route::get('/update',function(){
	$updated= DB::update('update posts set title="Update title" where id = ?',[1]);
	return $updated;

});
//-----------------------------------------------------------Delete Data
Route::get('/delete',function(){
	$delete=DB::delete('delete from posts where id=? ',[1]);
	return $delete;
});

/*
|--------------------------------------------------------------------------
| Eloquent
|--------------------------------------------------------------------------
|
*/

Route::get('/find',function(){
	$posts= Post::find(2);
	return $posts->title;

	// foreach ($posts as $post) {
	// 	return $post->title;
	// }

});

/*
|--------------------------------------------------------------------------
| Eloquent finding with contstract
|--------------------------------------------------------------------------
|
*/


Route::get('findwhere',function(){
	$post=Post::where('title','laravel')->orderBy('id','desc')->take(2)->get();
	return $post;
});





