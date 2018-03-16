<?php

/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
*/

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
	DB::insert('insert into posts(title,content) values(?,?)',['PHP with Laravel','Laravel is the best']);
	});
//----------------------------------------------------------Read Data

Route::get('/read',function(){
	$results=DB::select ('select * from posts where id= ?',[1]);
	foreach($results as $post)
	{
		return $post->title;
	}
});
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





