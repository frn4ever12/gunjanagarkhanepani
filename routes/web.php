<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TariffController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\OfficialController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\ImportantLinkController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\HomepageSectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Authentication
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    // Protected Routes
    Route::middleware('auth')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

        // Menus
        Route::resource('menus', MenuController::class);
        Route::prefix('menus/{menu}')->name('menus.')->group(function () {
            Route::get('items/create', [MenuItemController::class, 'create'])->name('items.create');
            Route::post('items', [MenuItemController::class, 'store'])->name('items.store');
        });
        Route::prefix('menu-items')->name('menu-items.')->group(function () {
            Route::get('{menuItem}/edit', [MenuItemController::class, 'edit'])->name('edit');
            Route::put('{menuItem}', [MenuItemController::class, 'update'])->name('update');
            Route::delete('{menuItem}', [MenuItemController::class, 'destroy'])->name('destroy');
        });

        // Sliders
        Route::resource('sliders', SliderController::class);

        // Pages
        Route::resource('pages', PageController::class);

        // Notices
        Route::resource('notices', NoticeController::class);

        // News
        Route::resource('news', NewsController::class);

        // Services
        Route::resource('services', ServiceController::class);

        // Tariffs
        Route::resource('tariffs', TariffController::class);

        // Downloads
        Route::resource('downloads', DownloadController::class);

        // Gallery
        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/', [GalleryController::class, 'index'])->name('index');
            Route::get('create-album', [GalleryController::class, 'createAlbum'])->name('create-album');
            Route::post('albums', [GalleryController::class, 'storeAlbum'])->name('store-album');
            Route::get('albums/{album}/edit', [GalleryController::class, 'editAlbum'])->name('edit-album');
            Route::put('albums/{album}', [GalleryController::class, 'updateAlbum'])->name('update-album');
            Route::delete('albums/{album}', [GalleryController::class, 'destroyAlbum'])->name('destroy-album');
            Route::get('albums/{album}/upload', [GalleryController::class, 'uploadImages'])->name('upload-images');
            Route::post('albums/{album}/images', [GalleryController::class, 'storeImages'])->name('store-images');
            Route::delete('images/{image}', [GalleryController::class, 'destroyImage'])->name('destroy-image');
        });

        // Videos
        Route::resource('videos', VideoController::class);

        // Officials
        Route::resource('officials', OfficialController::class);

        // FAQs
        Route::resource('faqs', FAQController::class);

        // Important Links
        Route::resource('important-links', ImportantLinkController::class);

        // Statistics
        Route::resource('statistics', StatisticController::class);

        // Contact Messages
        Route::prefix('contact-messages')->name('contact-messages.')->group(function () {
            Route::get('/', [ContactMessageController::class, 'index'])->name('index');
            Route::get('{message}', [ContactMessageController::class, 'show'])->name('show');
            Route::post('{message}/reply', [ContactMessageController::class, 'reply'])->name('reply');
            Route::post('{message}/resolve', [ContactMessageController::class, 'markResolved'])->name('resolve');
            Route::delete('{message}', [ContactMessageController::class, 'destroy'])->name('destroy');
        });

        // Homepage Sections
        Route::prefix('homepage')->name('homepage.')->group(function () {
            Route::get('/', [HomepageSectionController::class, 'index'])->name('index');
            Route::post('/', [HomepageSectionController::class, 'update'])->name('update');
        });
    });
});

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', function() {
    return redirect()->route('admin.login');
})->name('login');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// About Routes
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/board-of-directors', [HomeController::class, 'boardOfDirectors'])->name('board-of-directors');
Route::get('/organizational-structure', [HomeController::class, 'organizationalStructure'])->name('organizational-structure');
Route::get('/staff', [HomeController::class, 'staff'])->name('staff');
Route::get('/office-hours', [HomeController::class, 'officeHours'])->name('office-hours');
Route::get('/citizen-charter', [HomeController::class, 'citizenCharter'])->name('citizen-charter');

// Services Routes
Route::get('/services', [HomeController::class, 'indexServices'])->name('services');
Route::get('/services/new-connection', [HomeController::class, 'servicesNewConnection'])->name('services.new-connection');
Route::get('/services/transfer', [HomeController::class, 'servicesTransfer'])->name('services.transfer');
Route::get('/services/maintenance', [HomeController::class, 'servicesMaintenance'])->name('services.maintenance');
Route::get('/services/water-quality', [HomeController::class, 'servicesWaterQuality'])->name('services.water-quality');
Route::get('/services/information', [HomeController::class, 'servicesInformation'])->name('services.information');

// E-Services Routes
Route::get('/e-services/forms', [HomeController::class, 'eServicesForms'])->name('e-services.forms');
Route::get('/complaint', [HomeController::class, 'complaint'])->name('complaint');

// Resources Routes
Route::get('/downloads', [HomeController::class, 'downloads'])->name('downloads');
Route::get('/forms', [HomeController::class, 'forms'])->name('forms');
Route::get('/annual-reports', [HomeController::class, 'annualReports'])->name('annual-reports');
Route::get('/rules-regulations', [HomeController::class, 'rulesRegulations'])->name('rules-regulations');
Route::get('/policies', [HomeController::class, 'policies'])->name('policies');
Route::get('/publications', [HomeController::class, 'publications'])->name('publications');

// Notices Routes
Route::get('/notices', [HomeController::class, 'indexNotices'])->name('notices');
Route::get('/news', [HomeController::class, 'indexNews'])->name('news');
Route::get('/press-releases', [HomeController::class, 'pressReleases'])->name('press-releases');
Route::get('/public-notices', [HomeController::class, 'publicNotices'])->name('public-notices');
Route::get('/notice-archive', [HomeController::class, 'noticeArchive'])->name('notice-archive');

// Vacancy Routes
Route::get('/vacancy', [HomeController::class, 'vacancy'])->name('vacancy');
Route::get('/vacancy/notices', [HomeController::class, 'vacancyNotices'])->name('vacancy.notices');
Route::get('/vacancy/exam-schedule', [HomeController::class, 'vacancyExamSchedule'])->name('vacancy.exam-schedule');
Route::get('/vacancy/results', [HomeController::class, 'vacancyResults'])->name('vacancy.results');

// Contact Route
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Additional Routes
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/videos', [HomeController::class, 'videos'])->name('videos');
Route::get('/important-links', [HomeController::class, 'importantLinks'])->name('important-links');
Route::get('/sitemap', [HomeController::class, 'sitemap'])->name('sitemap');

// Public Content Routes
Route::get('/news/{slug}', [HomeController::class, 'showNews'])->name('news.show');
Route::get('/notice/{id}', [HomeController::class, 'showNotice'])->name('notice.show');
Route::get('/service/{id}', [HomeController::class, 'showService'])->name('service.show');
Route::get('/page/{slug}', [HomeController::class, 'showPage'])->name('page.show');
