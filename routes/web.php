 <?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LanguareController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
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

Route::get('/',[PageController::class,'main'])->name('main');
Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/project',[PageController::class,'project'])->name('project');
Route::get('/contact',[PageController::class,'contact'])->name('contact');
Route::get('/service',[PageController::class,'service'])->name('service');

Route::middleware('auth')->group(function(){
    Route::get('notifications/{notification}/read',[NotificationController::class,'read'])->name('notifications.read');
});
Route::get('languare/{locale}',[LanguareController::class,'change_locale'])->name('locale.change');

Route::resources([
    'posts'=>PostController::class,
    'comments'=>CommentController::class,
    'notifications'=>NotificationController::class,
]);


Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');
Route::get('register',[AuthController::class,'register'])->name('register');
Route::post('logout',[AuthController::class,'logout'])->name('logout');
Route::post('register',[AuthController::class,'register_store'])->name('register.store');



