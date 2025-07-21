<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/uploads-pdfs', [APIController::class, 'uploads_pdfs'])->name('uploads-pdfs');
Route::get('/crops-categories', [APIController::class, 'crops_categories'])->name('crops-categories');
Route::get('/crops', [APIController::class, 'getCrops'])->name('crops');
Route::get('/crop-management', [APIController::class, 'getCropManagement'])->name('crop-management');
Route::get('/crop-disease-types', [APIController::class, 'getCropDiseaseTypes'])->name('crop-disease-types');
Route::get('/crop-disease-sub-types', [APIController::class, 'getCropDiseaseSubTypes'])->name('crop-disease-sub-types');

Route::get('/uploads-news',[APIController::class, 'news'])->name('uploads-news');
Route::get('/header-top',[APIController::class, 'header'])->name('uploads-header');
Route::get('/banner',[APIController::class, 'banner'])->name('banner');
Route::get('/videos',[APIController::class, 'video'])->name('video');
Route::get('/subcenter',[APIController::class, 'subcenter'])->name('subcenter');
Route::get('/extension',[APIController::class, 'extension'])->name('extension');
Route::get('/director',[APIController::class, 'director'])->name('director');
Route::get('/headlines',[APIController::class, 'headlines'])->name('headlines');


// contact ict website information store

Route::post('/contact/store', [APIController::class, 'store']);
Route::get('/contact/info', [APIController::class, 'contact']);
Route::get('/district', [APIController::class, 'district']);
Route::get('/UpcomingTender', [APIController::class, 'UpcomingTender']);
Route::get('/ProjectDocument', [APIController::class, 'ProjectDocument']);
Route::get('/allbanner', [APIController::class, 'allbanner']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
