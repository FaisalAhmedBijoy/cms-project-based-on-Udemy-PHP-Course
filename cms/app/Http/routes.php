<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Admin;
use App\Post ;
use App\User;
use App\Country;

Route::get('/', function () {
    return view('welcome');
    
});



//
//Route::get('/insert',function (){
//
//    DB::insert('insert into admin(title,body)VALUES (?,?)',['PHP','Laravel']);
//});
//
//
//Route::get('/read',function (){
//
//  $results =  DB::select('select * from admin where id =? ',[1]);
//
// // return  var_dump($results);
//        foreach ($results as $post)
//        {
//            return $post->title;
//            //echo $results->body();
//        }
//
//});
//

Route::get('/read',function (){

   $posts=Admin::all();

   foreach ($posts as $post)
   {
       return $post->title;
   }
});



Route::get('/find',function (){
  $post=Admin::find(2) ;
  return $post->title;
});

Route:: get('/findwhere',function (){

    $admin=Admin::where('id',3)->orderBy('id','desc')->take(1)->get();
    return $admin;
});


Route:: get('/findmore',function (){
  //  $admin=Admin::findOrFail(2);

    //return $admin;

    $admin=Admin::where('id','<',50)->firstOrFail();
    return $admin;
});


Route::get('/basicInsert',function (){
    $admin =new Admin();
    $admin->title="Hello title PHP";
    $admin->body="Hello Body laravel";
    $admin->save();
});

Route::get('/basicInsert2',function (){
    $admin = Admin::find(2);
    $admin->title=" laravel is awesome";
    $admin->body="i like laravel laravel";

    $admin->save();
});

Route::get('/create',function (){

    Admin::create(['title'=>'Python' ,'body'=>'anaconda']);
});

Route::get('/update',function (){
    Admin::where('id',2)->where('is_status',0)->update(['title'=>'Edwin' ,'body'=>'i love my instructor']);
});

Route::get('/delete',function (){
    $admin =Admin::find(2) ;
    $admin->delete();
});

Route::get('/delete2',function (){
    Admin::destroy(3);
});

Route::get('/delete3',function (){
    Admin::where('is_status',0)->delete();
});


Route::get('/softdelete',function (){
    Admin::find(6)->delete();
});

Route::get('/readsoftdelete',function (){
   // $admin =Admin::find(6);
    //return $admin;

    return Admin::onlyTrashed('id',6)->get();
});

Route::get('/restore',function (){
    Admin::withTrashed()->where('is_status',0)->restore();
});


Route::get('/forcedelete',function (){
    Admin::onlyTrashed()->where('is_status',0)->forceDelete();
});
//Route::get('/update',function (){
//
//    $update=DB::update('update admin set title="Faisal " where id =? ',[1]);
//    return $update;
//});
//
//
//Route::get('/delete',function (){
//    $delete = DB::delete('delete from admin where id =?',[1]) ;
//    return $delete;
//});
//// Route::get('post','PostControl@index') ;
//Route::resource('posts','PostControl');
//Route::get('/contact','PostControl@contact') ;
//Route::get('/post/{id}/{name}/{age}','PostControl@show_post');

// Route::get('/post', function () {
//    // return view('welcome');
//     return "This is post Page" ;
// });



// Route::get('/post/{id}/{name}', function ($id,$name) {
//   //  return view('welcome');
// 	return "This is Number : ".$id ."Name : ".$name;
    
// });

// Route::get('admin/posts/example',array('as'=>'admin.home' , function(){
	
// 	$Url=route('admin.home') ;
// 	return "Url link : ".$Url;
// } ) );


//One to one Relationship
Route::get('/user/{id}/admin',function ($id){
    return User::find($id)->email;
});

Route::get('/admin/{id}/user',function ($id){
    return User::find($id)->name ;
});

//One to Many
Route::get('/admins',function (){
    $user=User::find(1);
    return $user;

});

//Many to many

Route::get('/user/{id}/role' ,function ($id){
    return User::find($id);
});

Route::get('user/pivot',function (){
    return User::find(1)->created_at;
});


Route::get('user/country',function (){
 return Country::find(1)->name;
});

Route::resource('/posts','PostControl');