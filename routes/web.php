<?php
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('home',['title' => 'Home']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::group(['prefix' => 'artikel', 'middleware' => ['auth']], function(){
    Route::get('/add', [ArtikelController::class, 'add'])->name("artikel.add");
    Route::post('/save',[ArtikelController::class, 'save'])->name('artikel.save');
    Route::delete('/{id}',[ArtikelController::class, 'delete'])->name('artikel.delete');
}   
);


// ROUTE KOMENTAR TANPA AUTH
Route::group(['prefix' => 'komentar'], function(){
    Route::post('/', [KomentarController::class, 'save'])->name('komentar.save');
});


// ROUTE KOMENTAR DENGAN AUTH
Route::group(['prefix' => 'komentar','middleware' => ['auth']], function(){
    Route::delete('/{id}', [KomentarController::class, 'delete'])->name('komentar.delete');
});

// ROUTE ARTIKEL TANPA AUTH
Route::group(['prefix' => 'artikel'], function(){
    Route::get('/', [ArtikelController::class, 'readAll'])->name('dashboard');
    Route::get('/{id}',[ArtikelController::class, 'read'])->name('artikel.detail');
});



require __DIR__.'/auth.php';
