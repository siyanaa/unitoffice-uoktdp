<?php

use App\Models\Message;
use App\Models\ContactUs;
use App\Models\Information;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MvcController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InstaController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\YouthController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RenderController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\ContextController;
use App\Http\Controllers\FaviconController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\OrgchartController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\OtherPostController;
use App\Http\Controllers\CoverImageController;
use App\Http\Controllers\DocContextController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\CommitteeDetailController;
use App\Http\Controllers\ExecutiveDetailController;

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

// Route::group(['prefix' => '{locale}'], function (){
//     Route::get('/', [HomeController::class, 'index'])->middleware('setLocale')->name('home');

// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/faq', [HomeController::class, 'faq'])->name('FAQ');

// Route::get('/single/{slug}', [SingleController::class, 'index']);




Route::get('login', function(){
    return view('auth.login');
})->name('login');

Route::get('signup', function(){
    return view('auth.signup');
})->middleware('auth');

Route::get('/change-password', [AdminController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [AdminController::class, 'updatePassword'])->name('update-password');

Route::post('login', [LoginController::class, 'save']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::post('signup', [SignupController::class, 'save']);

Route::get('admin', [AdminController::class, 'index'])->middleware(['web', 'auth'])->name('admin.index');
Route::get('dashboard', [AdminController::class, 'dashboard'])->middleware(['web', 'auth'])->name('admin.dashboard');


Route::as('Admin.')->prefix('Admin')->middleware(['web', 'auth'])->group(function () {
// FOR COVER IMAGES

Route::as('Coverimage.')->prefix('Coverimage')->group(function () {
    Route::get('Index', [CoverImageController::class, 'index'])->name('Index');
    Route::get('Create', [CoverImageController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [CoverImageController::class, 'edit'])->name('Edit');
    Route::post('Update', [CoverImageController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [CoverImageController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [CoverImageController::class, 'store'])->name('Store');
});

Route::as('Committeedetails.')->prefix('Committeedetails')->group(function () {
    Route::get('Index', [CommitteeDetailController::class, 'index'])->name('Index');
    Route::get('Create', [CommitteeDetailController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [CommitteeDetailController::class, 'edit'])->name('Edit');
    Route::post('Update', [CommitteeDetailController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [CommitteeDetailController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [CommitteeDetailController::class, 'store'])->name('Store');
    Route::get('File-import-export', [CommitteeDetailController::class, 'fileImportExport'])->name('Committee.file');
    Route::post('File-import', [CommitteeDetailController::class, 'fileImport'])->name('File-import');
    Route::get('File-export', [CommitteeDetailController::class, 'fileExport'])->name('File-export');
});

Route::as('Executivedetails.')->prefix('Executivedetails')->group(function () {
    Route::get('Index', [ExecutiveDetailController::class, 'index'])->name('Index');
    Route::get('Create', [ExecutiveDetailController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [ExecutiveDetailController::class, 'edit'])->name('Edit');
    Route::post('Update', [ExecutiveDetailController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [ExecutiveDetailController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [ExecutiveDetailController::class, 'store'])->name('Store');
    Route::get('File-import-export-exe', [ExecutiveDetailController::class, 'fileImportExport'])->name('Executive.file');
    Route::post('File-import-exe', [ExecutiveDetailController::class, 'fileImport'])->name('File-import-exe');
    Route::get('File-export-exe', [ExecutiveDetailController::class, 'fileExport'])->name('File-export-exe');

});


Route::as('Posts.')->prefix('Posts')->group(function () {
    Route::get('Index', [PostController::class, 'index'])->name('Index');
    Route::get('Create', [PostController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [PostController::class, 'edit'])->name('Edit');
    Route::post('Update', [PostController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [PostController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [PostController::class, 'store'])->name('Store');
    Route::post('UploadImage', [PostController::class, 'uploadImage'])->name('UploadImage');
});

Route::as('Orgchart.')->prefix('Orgchart')->group(function () {
    Route::get('Index', [OrgchartController::class, 'index'])->name('Index');
    Route::get('Create', [OrgchartController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [OrgchartController::class, 'edit'])->name('Edit');
    Route::post('Update', [OrgchartController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [OrgchartController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [OrgchartController::class, 'store'])->name('Store');
});

Route::as('Categories.')->prefix('Categories')->group(function () {
    Route::get('Index', [CategoryController::class, 'index'])->name('Index');
    Route::get('Create', [CategoryController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [CategoryController::class, 'edit'])->name('Edit');
    Route::post('Update', [CategoryController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [CategoryController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [CategoryController::class, 'store'])->name('Store');
});

Route::as('Users.')->prefix('Users')->group(function () {
    Route::get('Index', [UserController::class, 'index'])->name('Index');

});

Route::as('Teams.')->prefix('Teams')->group(function () {
    Route::get('Index', [TeamController::class, 'index'])->name('Index');
    Route::get('Create', [TeamController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [TeamController::class, 'edit'])->name('Edit');
    Route::post('Update', [TeamController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [TeamController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [TeamController::class, 'store'])->name('Store');
    Route::get('/Reorder/Index', [TeamController::class, 'orderIndex'])->name('Orderindex');
    Route::post('Updateorder', [TeamController::class, 'UpdateOrder'])
    ->name('Updateorder');

});

Route::as('Sitesettings.')->prefix('Sitesettings')->group(function () {
    Route::get('Index', [SiteSettingController::class, 'index'])->name('Index');
    Route::get('Create', [SiteSettingController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [SiteSettingController::class, 'edit'])->name('Edit');
    Route::post('Update', [SiteSettingController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [SiteSettingController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [SiteSettingController::class, 'store'])->name('Store');
});


Route::as('Abouts.')->prefix('Abouts')->group(function () {
    Route::get('Index', [AboutController::class, 'index'])->name('Index');
    Route::get('Create', [AboutController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [AboutController::class, 'edit'])->name('Edit');
    Route::post('Update', [AboutController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [AboutController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [AboutController::class, 'store'])->name('Store');
});
// FOR MISSION VISION AND VALUES
Route::as('Mvc.')->prefix('Mvc')->group(function () {
    Route::get('Index', [MvcController::class, 'index'])->name('Index');
    Route::get('Create', [MvcController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [MvcController::class, 'edit'])->name('Edit');
    Route::post('Update', [MvcController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [MvcController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [MvcController::class, 'store'])->name('Store');
});

Route::as('Links.')->prefix('Links')->group(function () {
    Route::get('Index', [LinkController::class, 'index'])->name('Index');
    Route::get('Create', [LinkController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [LinkController::class, 'edit'])->name('Edit');
    Route::post('Update', [LinkController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [LinkController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [LinkController::class, 'store'])->name('Store');
});

Route::as('Videos.')->prefix('Videos')->group(function () {
    Route::get('Index', [VideoController::class, 'index'])->name('Index');
    Route::get('Create', [VideoController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [VideoController::class, 'edit'])->name('Edit');
    Route::post('Update', [VideoController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [VideoController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [VideoController::class, 'store'])->name('Store');
});

Route::as('Images.')->prefix('Images')->group(function () {
    Route::get('Index', [ImageController::class, 'index'])->name('Index');
    Route::get('Create', [ImageController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [ImageController::class, 'edit'])->name('Edit');
    Route::post('Update', [ImageController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [ImageController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [ImageController::class, 'store'])->name('Store');
});

Route::as('Informations.')->prefix('Informations')->group(function () {
    Route::get('Index', [InformationController::class, 'index'])->name('Index');
    Route::get('Create', [InformationController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [InformationController::class, 'edit'])->name('Edit');
    Route::post('Update', [InformationController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [InformationController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [InformationController::class, 'store'])->name('Store');
});

Route::as('Youth.')->prefix('Youth')->group(function () {
    Route::get('Index', [YouthController::class, 'index'])->name('Index');
    Route::get('Create', [YouthController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [YouthController::class, 'edit'])->name('Edit');
    Route::post('Update', [YouthController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [YouthController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [YouthController::class, 'store'])->name('Store');
});

Route::as('Message.')->prefix('Message')->group(function () {
    Route::get('Index', [MessageController::class, 'index'])->name('Index');
    Route::get('Create', [MessageController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [MessageController::class, 'edit'])->name('Edit');
    Route::post('Update', [MessageController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [MessageController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [MessageController::class, 'store'])->name('Store');
    Route::get('Show/{id}', [MessageController::class, 'show'])->name('Show');

});

Route::as('Insta.')->prefix('Insta')->group(function () {
    Route::get('Index', [InstaController::class, 'index'])->name('Index');
    Route::get('Create', [InstaController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [InstaController::class, 'edit'])->name('Edit');
    Route::post('Update', [InstaController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [InstaController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [InstaController::class, 'store'])->name('Store');


});

Route::as('Contactus.')->prefix('Contactus')->group(function () {
    Route::get('Index', [ContactUsController::class, 'index'])->name('Index');
    Route::post('Store', [ContactUsController::class, 'store'])->name('Store');
    Route::get('Destroy/{id}', [ContactUsController::class, 'destroy'])->name('Destroy');
    Route::get('Show/{id}', [ContactUsController::class, 'show'])->name('Show');

});

Route::as('Context.')->prefix('Context')->group(function () {
    Route::get('Index', [ContextController::class, 'index'])->name('Index');
    Route::get('Create', [ContextController::class, 'create'])->name('Create');
    Route::get('Edit/{id}', [ContextController::class, 'edit'])->name('Edit');
    Route::post('Update', [ContextController::class, 'update'])->name('Update');
    Route::get('Destroy/{id}', [ContextController::class, 'destroy'])->name('Destroy');
    Route::post('Store', [ContextController::class, 'store'])->name('Store');


});

Route::as('Favicons.')->prefix('Favicons')->group(function () {
    Route::get('Index', [FaviconController::class,'index'])->name('Index');
    Route::get('Create', [FaviconController::class,'create'])->name('Create');
    Route::get('Edit/{id}', [FaviconController::class,'edit'])->name('Edit');
    Route::post('Update', [FaviconController::class,'update'])->name('Update');
    Route::get('Destroy/{id}', [FaviconController::class,'destroy'])->name('Destroy');
    Route::post('Store', [FaviconController::class,'store'])->name('Store');
});



});

Route::get('about', [App\Http\Controllers\RenderController::class, 'render_about'])->name('About');
Route::get('team', [App\Http\Controllers\RenderController::class, 'render_team'])->name('Team');
Route::get('organizationalchart', [App\Http\Controllers\RenderController::class, 'render_chart'])->name('Orgchart');
Route::get('gallery', [App\Http\Controllers\RenderController::class, 'render_images'])->name('Images');
Route::get('gallery/{id}', [App\Http\Controllers\RenderController::class, 'render_image'])->name('Image');
Route::get('videos', [App\Http\Controllers\RenderController::class, 'render_videos'])->name('Videos');

Route::get('contact_page', [App\Http\Controllers\RenderController::class, 'contact_page'])->name('Contact');
Route::get('information_page/{id}', [App\Http\Controllers\RenderController::class, 'singleinformation_page'])->name('information_page');
Route::get('context/{id}', [RenderController::class, 'singleinformation_page'])->name('context.information_page');


Route::get('/admin/faqs', [FaqController::class, 'index'])->name('admin.faqs.index');
Route::get('/admin/faqs/create', [FaqController::class, 'create'])->name('admin.faqs.create');
Route::post('/admin/faqs/store', [FaqController::class, 'store'])->name('admin.faqs.store');
Route::get('/admin/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('admin.faqs.edit');
Route::put('/admin/faqs/{id}', [FaqController::class, 'update'])->name('admin.faqs.update');
Route::delete('/admin/faqs/{id}/delete', [FaqController::class, 'destroy'])->name('admin.faqs.destroy');



// FOR CONTEXT CONTROLLER







