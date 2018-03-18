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

Route::get('/create',function(){
	Post::create(['title'=>'the create method','content'=>'WOW look here']);
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


/*
|--------------------------------------------------------------------------
| Eloquent to retrieve data(if dont exit send a message 404)
|--------------------------------------------------------------------------
*/

Route::get('/findmore',function(){  
	 $post=Post::findOrFail(3);
	  return $post;
	//$posts=Post::where('id','<',50)->firstOrFail();
});


/*
|--------------------------------------------------------------------------
| Insert AND Update
|--------------------------------------------------------------------------
*/
Route::get('/basicinsert',function(){
	//$post = new Post; ----------------------------   FOR A NEW INSERT 
	$post = Post::find(2); //FOR AN UPDATE 
	$post->title = 'New Eloquent title insertUpdate2';
	$post->content = 'Look the new contectUpdate2';
	$post->save();
});

/*
|--------------------------------------------------------------------------
| Create
|--------------------------------------------------------------------------
*/
Route::get('/create',function(){
	Post::create(['title'=>'the create method','content'=>'WOW look here']);
});

/*
|--------------------------------------------------------------------------
| Update2 
|--------------------------------------------------------------------------
*/
Route::get('/Update2',function(){
	Post::where('id',2)->where('is_admin',0)->update(['title'=>'New PHP title','content'=>'I have a good instructor']);
	//this dont have to return and make a variable;
});






