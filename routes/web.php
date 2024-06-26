<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;

use App\Http\Controllers\ContactController ;
use App\Http\Controllers\Theme;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(Theme::class)->name('theme.')->group(function(){
    Route::get('/','index')->name("index");
    Route::get('/category/{id}','category')->name("category");
    Route::get('/contact','contact')->name("contact");
    //Route::get('/single-blog','singleBlog')->name("singleBlog");
    // Route::get('/login','login')->name("login");
    
    // Route::get('/register','register')->name("register");

}
);

Route::post('/subscriber/register',[SubscriberController::class,'store'])->name('subscriber.store');
Route::post('/contact/register',[ContactController::class,'store'])->name('contact.store');

// Route::get('/', function () {
//     return view('welcome');
// });

//blog routes
Route::get('my-blog',[BlogController::class,'myBlogs'])->name("blogs.my-blogs");
Route::resource('blogs',BlogController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});
//comment routs
Route::post('/comment/store',[CommentController::class,'store'])->name('comments.store');



require __DIR__.'/auth.php';
