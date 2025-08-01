<?php

use App\Http\Controllers\CropController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SubcenterController;
use App\Http\Controllers\HeadlinesController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\DirectorGeneralController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DistrictOfficeController;
use App\Http\Controllers\ProjectDocumentController;
use App\Http\Controllers\UpcomingTenderController;
use App\Http\Controllers\AllBannerController;
use App\Http\Controllers\GalleryController;

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
// ICT CMS DOnes fardeee
// fardeen 
// 
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

// news section 


Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
Route::post('/news/update/{news}', [NewsController::class, 'update'])->name('news.update');
Route::get('/news/delete/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
Route::get('/news/download/{news}', [NewsController::class, 'downloadPdf'])->name('news.download');



Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');
Route::post('/banners/store', [BannerController::class, 'store'])->name('banners.store');
Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');
Route::post('/banners/{id}/update', [BannerController::class, 'update'])->name('banners.update');
Route::get('/banners/{id}/delete', [BannerController::class, 'delete'])->name('banners.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('/departments/store', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::post('/departments/{id}/update', [DepartmentController::class, 'update'])->name('departments.update');
Route::get('/departments/{id}/delete', [DepartmentController::class, 'delete'])->name('departments.delete');

Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
Route::post('/videos/store', [VideoController::class, 'store'])->name('videos.store');
Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::post('/videos/{id}/update', [VideoController::class, 'update'])->name('videos.update');
Route::get('/videos/{id}/delete', [VideoController::class, 'delete'])->name('videos.delete');

Route::get('/subcenter', [SubcenterController::class, 'index'])->name('subcenter.index');
Route::get('/subcenter/create', [SubcenterController::class, 'create'])->name('subcenter.create');
Route::post('/subcenter/store', [SubcenterController::class, 'store'])->name('subcenter.store');
Route::get('/subcenter/edit/{id}', [SubcenterController::class, 'edit'])->name('subcenter.edit');
Route::post('/subcenter/update/{id}', [SubcenterController::class, 'update'])->name('subcenter.update');
Route::get('/subcenter/delete/{id}', [SubcenterController::class, 'delete'])->name('subcenter.delete');



Route::get('/headline', [HeadlinesController::class, 'index'])->name('headline.index');
Route::get('/headline/create', [HeadlinesController::class, 'create'])->name('headline.create');
Route::post('/headline/store', [HeadlinesController::class, 'store'])->name('headline.store');
Route::get('/headline/edit/{id}', [HeadlinesController::class, 'edit'])->name('headline.edit');
Route::post('/headline/update/{id}', [HeadlinesController::class, 'update'])->name('headline.update');
Route::get('/headline/delete/{id}', [HeadlinesController::class, 'delete'])->name('headline.delete');



Route::get('/extension', [ExtensionController::class, 'index'])->name("extension.index");
Route::get('/extension/create', [ExtensionController::class, 'create'])->name("extension.create");
Route::post('/extension/store', [ExtensionController::class, 'store'])->name("extension.store");
Route::get('/extension/edit/{id}', [ExtensionController::class, 'edit'])->name("extension.edit");
Route::post('/extension/update/{id}', [ExtensionController::class, 'update'])->name("extension.update");
Route::get('/extension/delete/{id}', [ExtensionController::class, 'delete'])->name("extension.delete");


Route::get('/director-general', [DirectorGeneralController::class, 'index'])->name('director-general.index');
Route::get('/director-general/create', [DirectorGeneralController::class, 'create'])->name('director-general.create');
Route::post('/director-general/store', [DirectorGeneralController::class, 'store'])->name('director-general.store');
Route::get('/director-general/{id}/edit', [DirectorGeneralController::class, 'edit'])->name('director-general.edit');
Route::post('/director-general/update', [DirectorGeneralController::class, 'update'])->name('director-general.update');
Route::get('/director-general/{id}/delete', [DirectorGeneralController::class, 'destroy'])->name('director-general.destroy');

route::get('contact',[ContactController::Class,'index'])->name('contact.index');
Route::get('/contact/delete/{id}', [ContactController::class, 'destroy'])->name('contact.delete');

Route::get('/d-general', function () {
    return view('admin_panel.director.create');
});

Route::get('/district', [DistrictOfficeController::class, 'index'])->name('district.index');
Route::get('/district/create', [DistrictOfficeController::class, 'create'])->name('district.create');
Route::post('/district/store', [DistrictOfficeController::class, 'store'])->name('district.store');
Route::get('/district/{id}/edit', [DistrictOfficeController::class, 'edit'])->name('district.edit');
Route::post('/district/update', [DistrictOfficeController::class, 'update'])->name('district.update');
Route::delete('/district/{id}/delete', [DistrictOfficeController::class, 'destroy'])->name('district.destroy');


Route::get('/documents', [ProjectDocumentController::class, 'index'])->name('documents.index');
Route::get('/documents/create', [ProjectDocumentController::class, 'create'])->name('documents.create');
Route::post('/documents', [ProjectDocumentController::class, 'store'])->name('documents.store');
Route::get('/documents/{id}/edit', [ProjectDocumentController::class, 'edit'])->name('documents.edit');
Route::put('/documents/{id}', [ProjectDocumentController::class, 'update'])->name('documents.update');
Route::delete('/documents/{id}', [ProjectDocumentController::class, 'destroy'])->name('documents.destroy');


Route::get('/upcomingtenders', [UpcomingTenderController::class, 'index'])->name('upcomingtenders.index');
Route::get('/upcomingtenders/create', [UpcomingTenderController::class, 'create'])->name('upcomingtenders.create');
Route::post('/upcomingtenders', [UpcomingTenderController::class, 'store'])->name('upcomingtenders.store');
Route::get('/upcomingtenders/{id}/edit', [UpcomingTenderController::class, 'edit'])->name('upcomingtenders.edit');
Route::put('/upcomingtenders/{id}', [UpcomingTenderController::class, 'update'])->name('upcomingtenders.update');
Route::delete('/upcomingtenders/{id}', [UpcomingTenderController::class, 'destroy'])->name('upcomingtenders.destroy');



Route::get('/allbanner', [AllBannerController::class, 'index'])->name('allbanner.index');
Route::get('/allbanner/create', [AllBannerController::class, 'create'])->name('allbanner.create');
Route::post('/allbanner/store', [AllBannerController::class, 'store'])->name('allbanner.store');
Route::get('/allbanner/edit/{id}', [AllBannerController::class, 'edit'])->name('allbanner.edit');
Route::post('/allbanner/update/{id}', [AllBannerController::class, 'update'])->name('allbanner.update');
Route::get('/allbanner/delete/{id}', [AllBannerController::class, 'destroy'])->name('allbanner.delete');


    Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::get('gallery/delete/{id}', [GalleryController::class, 'delete'])->name('gallery.delete');


require __DIR__ . '/auth.php';
