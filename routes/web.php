<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\FrontEndController ;
use App\Models\User;
use App\Models\Tag;
use App\Models\Profile;





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
Route::get('/post/{id}/{slug}', [FrontEndController::class, 'singlePost'])->name('single.post');
Route::get('/',[ FrontEndController ::class,'index'])->name('frontEnd');
Route::get('/category/{id}', [FrontEndController::class, 'singleCategory'])->name('single.category');
Route::get('/search-post', [FrontEndController::class, 'searchPost'])->name('search.post');
Route::get('/tag/{id}', [FrontEndController::class, 'tag'])->name('tag.single');

// Route::get('/test', function(){
//     $posts = App\Models\Post::find(53)->tags;
//     return $posts;
// });
Route::get('/test', function(){
    return Tag::find(1)->posts;
});
Route::group(['prefix'=>'admin','middleware'=> ['auth:sanctum',config('jetstream.auth_session'),'verified']] ,function(){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    
                        /*====>route for category<====*/
    Route::get('/all-category', [CategoriesController::class, 'index'])->name('category.all');
    Route::get('/add-category', [CategoriesController::class, 'create'])->name('category.add');
    Route::get('/edit-category/{id}', [CategoriesController::class, 'edit'])->name('category.edit');
    Route::post('/update-category/{id}', [CategoriesController::class, 'update'])->name('category.update');
    Route::get('/destroy-category/{id}', [CategoriesController::class, 'destroy'])->name('catgory.destroy');
    Route::post('/store-category', [CategoriesController::class, 'store'])->name('category.store');

                       /*====>route for posts<====*/

    Route::get('/post/create', [PostsController::class, 'create'])->name('post.create')->middleware('admin');
    Route::post('/post/store', [PostsController::class, 'store'])->name('post.store');
    Route::get('/post/index', [PostsController::class, 'index'])->name('post.index');
    Route::get('/post/delete/{id}', [PostsController::class, 'destroy'])->name('post.delete');
    Route::get('/post/trash', [PostsController::class, 'trash'])->name('post.trash');
    Route::get('/post/restore/{id}', [PostsController::class, 'restore'])->name('post.restore');
    Route::get('/post/kill/{id}', [PostsController::class, 'kill'])->name('post.kill');
    Route::get('/post/edit/{id}', [PostsController::class, 'edit'])->name('post.edit');
    Route::post('/post/update/{id}', [PostsController::class, 'update'])->name('post.update');
    Route::post('/post/subscribe', [PostsController::class, 'subscribe'])->name('post.subscribe');
 
                       /*====>route for tags<====*/

    Route::get('/tag/create', [TagsController::class, 'create'])->name('tag.create');
    Route::post('/tag/store', [TagsController::class, 'store'])->name('tag.store');
    Route::get('/tag/all', [TagsController::class, 'index'])->name('tag.all');
    Route::get('/tag/delete/{id}', [TagsController::class, 'destroy'])->name('tag.delete');
    Route::get('/tag/edit/{id}', [TagsController::class, 'edit'])->name('tag.edit');
    Route::post('/tag/update/{id}', [TagsController::class, 'update'])->name('tag.update');

                         /*========> User <========  */
    Route::get('/users', [UsersController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('user.create');
    Route::post('/users/store', [UsersController::class, 'store'])->name('user.store');
    Route::get('/users/admin/{id}', [UsersController::class, 'admin'])->name('user.admin');
    Route::get('/users/not-admin/{id}', [UsersController::class, 'notAdmin'])->name('user.not.admin');
    Route::get('/users/not-admin/{id}', [UsersController::class, 'notAdmin'])->name('user.not.admin');
    Route::get('/my/profile',[UsersController::class,'myProfile'])->name('my.profile');
    Route::get('/my/change/profile',[UsersController::class,'changeProfile'])->name('change.profile')->middleware('admin');
    Route::post('/my/update/profile/{id}',[UsersController::class,'updateProfile'])->name('update.profile');
                              /*========> settings <========  */
    Route::get('/setting/index',[ SettingsController::class,'index'])->name('setting.index');
    Route::get('/setting/edit/{id}',[ SettingsController::class,'edit'])->name('setting.edit');
    Route::post('/setting/update/{id}',[SettingsController::class,'update'])->name('setting.update');






});
