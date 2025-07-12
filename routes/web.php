<?php

use App\Http\Controllers\CropController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
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
// ICT CMS DOnes

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Route::get('/adminpage', [HomeController::class, 'adminpage'])->middleware(['auth','admin'])->name('adminpage');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/New/Uploads', [PDFController::class, 'Upload'])->name('new.uploads');
Route::post('/pdf-upload', [PDFController::class, 'store'])->name('pdf.upload');
Route::get('/Uploads', [PDFController::class, 'uploads_files'])->name('uploads');
Route::get('/pdfs/{id}/edit', [PDFController::class, 'edit'])->name('pdfs.edit');
Route::put('/pdfs/{id}', [PDFController::class, 'update'])->name('pdfs.update');
Route::delete('/pdfs/{id}', [PDFController::class, 'destroy'])->name('pdfs.destroy');

Route::get('/New/category/Uploads', [CropController::class, 'Category'])->name('new.category.uploads');
Route::post('/category/upload', [CropController::class, 'category_store'])->name('category.upload');
Route::get('/categories-list', [CropController::class, 'categories_crops'])->name('categories-list');
Route::get('/categories/{id}/edit', [CropController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CropController::class, 'update'])->name('categories.update');


Route::get('/New/Crops/Uploads', [CropController::class, 'Crops'])->name('new.Crops.uploads');
Route::post('/Crops/upload', [CropController::class, 'Crops_store'])->name('Crops.upload');
Route::get('/Crops', [CropController::class, 'uploads_crops'])->name('Crops');
Route::get('/crops/edit/{id}', [CropController::class, 'crop_edit'])->name('Crops.edit');
Route::post('/crops/update/{id}', [CropController::class, 'crop_update'])->name('Crops.update');
Route::get('/Crops/Managements', [CropController::class, 'crops_managements'])->name('Crops.Managements');
Route::get('/get-crops/{id}', [CropController::class, 'getByCategory'])->name('Crops.getByCategory');
Route::post('/crops-management/upload', [CropController::class, 'Crops_Management_store'])->name('Crops.Management.upload');
Route::get('/crops-management', [CropController::class, 'uploads_crops_management'])->name('crops-management');
Route::get('edit-crops-management/{id}', [CropController::class, 'edit_crops_managements'])->name('edit.Crops.Managements');


Route::get('/Diseases-management', [CropController::class, 'uploads_Diseases_management'])->name('Diseases-management');
Route::post('/Diseases/upload', [CropController::class, 'Diseases_upload'])->name('Diseases.upload');
Route::get('/crops-Diseases', [CropController::class, 'crops_Diseases'])->name('crops-Diseases');
Route::get('/crops-Diseases/edit/{id}', [CropController::class, 'crops_Diseases_edit'])->name('crops-Diseases-edit');

Route::get('/Diseases-type-management', [CropController::class, 'Diseases_type_management'])->name('Diseases-type-management');
Route::post('/get-disease-types', [CropController::class, 'getDiseaseTypes'])->name('get.disease.types');
Route::post('/crop-disease-subtypes/store', [CropController::class, 'storesubtypes'])->name('crop.disease.subtypes.store');
Route::get('/crop-disease-subtypes/edit/{id}', [CropController::class, 'Diseases_sub_type_edit'])->name('Disease.ssub.type.edit');
Route::get('/crops-Diseases-subtypes', [CropController::class, 'crops_Diseases_subtypes'])->name('crops-Diseases-subtypes');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
