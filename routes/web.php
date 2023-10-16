<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;


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


Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/info', [InfoController::class, 'index'])->name('info');


Route::resource('admin', AdminController::class);
Route::resource('news', NewsController::class);
Route::resource('products', ProductController::class);
Route::prefix('/tin-tuc')->group (function () {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/chi-tiet-{id}', [NewsController::class, 'show'])->name('full-new');
});
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::prefix('/san-pham')->group (function () {
    Route::get('/', [ProductController::class, 'index'])->name('products');
    Route::get('/chi-tiet', [ProductController::class, 'show'])->name('full-product');
    Route::get('/cu-nhat', [ProductController::class, 'old2new'])->name('old2new');
    Route::get('/moi-nhat', [ProductController::class, 'new2old'])->name('new2old');
    Route::get('/gia-thap-den-cao', [ProductController::class, 'low2high'])->name('low2high');
    Route::get('/gia-cao-den-thap', [ProductController::class, 'high2low'])->name('high2low');
    Route::get('/danh-muc/{category}', [ProductController::class, 'showcate'])->name('showcate');

// Tương tự cho các phương thức khác

});
Route::get('/addProduct', [ProductController::class, 'create'])->name('products.create');
Route::post('/addProduct', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update'); // Xử lý cập nhật sản phẩm
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy'); // Xử lý xóa sản phẩm
Route::get('quan-ly-san-pham', [ProductController::class, 'quanli'])->name('admin.quanlisp');


// web.php

Route::get('/addNews', [NewsController::class,'create'])->name('news.create');
Route::post('/news', [NewsController::class,'store'])->name('news.store');
Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update'); // Xử lý cập nhật sản phẩm
Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy'); // Xử lý xóa sản phẩm
Route::get('quan-ly-news', [NewsController::class, 'quanli'])->name('admin.quanlinews');





Route::resource('contacts', ContactController::class);

Route::auth();
Route::get('/home', [HomeController::class,'index']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/verify', [VerificationController::class, 'verify'])->name('verify');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




