<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ExpertiseController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HouseController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ToDoListController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Admin All Route 
    Route::controller(AdminController::class)->group(function () {

        //Change Profile Page
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');

        //Update Admin Password Page
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });


    Route::prefix('admin')->group(function () {




        // Admin Slider 
        Route::get('all/slider', [SliderController::class, 'AllSlider'])->name('all.slider');
        Route::get('add/slider', [SliderController::class, 'AddSlider'])->name('add.slider');
        Route::post('store/slider', [SliderController::class, 'StoreSlider'])->name('store.slider');
        Route::get('edit/slider/{id}', [SliderController::class, 'EditSlider'])->name('edit.slider');
        Route::post('update/slider', [SliderController::class, 'UpdateSlider'])->name('update.slider');
        Route::get('delete/slider/{id}', [SliderController::class, 'DeleteSlider'])->name('delete.slider');
        Route::get('slider/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
        Route::get('slider/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');



        // Admin About 
        Route::get('/edit/about', [AboutController::class, 'EditAbout'])->name('edit.about');
        Route::post('/update/about', [AboutController::class, 'UpdateAbout'])->name('update.about');

        // Admin Services 
        Route::get('all/service', [ServicesController::class, 'AllService'])->name('all.service');
        Route::get('add/service', [ServicesController::class, 'AddService'])->name('add.service');
        Route::post('store/service', [ServicesController::class, 'StoreService'])->name('store.service');
        Route::get('edit/service/{id}', [ServicesController::class, 'EditService'])->name('edit.service');
        Route::post('update/service', [ServicesController::class, 'UpdateService'])->name('update.service');
        Route::get('delete/service/{id}', [ServicesController::class, 'DeleteService'])->name('delete.service');
        Route::get('service/inactive/{id}', [ServicesController::class, 'ServiceInactive'])->name('service.inactive');
        Route::get('service/active/{id}', [ServicesController::class, 'ServiceActive'])->name('service.active');

        // Admin Blog Category 
        Route::get('all/blog/category', [BlogController::class, 'AllBlogCategory'])->name('all.blog.category');
        Route::get('add/blog/category', [BlogController::class, 'AddBlogCategory'])->name('add.blog.category');
        Route::post('store/blog/category', [BlogController::class, 'StoreBlogCategory'])->name('store.blog.category');
        Route::get('edit/blog/category/{id}', [BlogController::class, 'EditBlogCategory'])->name('edit.blog.category');
        Route::post('update/blog/category/{id}', [BlogController::class, 'UpdateBlogCategory'])->name('update.blog.category');
        Route::get('delete/blog/category/{id}', [BlogController::class, 'DeleteBlogCategory'])->name('delete.blog.category');


        // Admin Blog 
        Route::get('all/blog', [BlogController::class, 'AllBlog'])->name('all.blog');
        Route::get('add/blog', [BlogController::class, 'AddBlog'])->name('add.blog');
        Route::post('store/blog', [BlogController::class, 'StoreBlog'])->name('store.blog');
        Route::get('edit/blog/{id}', [BlogController::class, 'EditBlog'])->name('edit.blog');
        Route::post('update/blog', [BlogController::class, 'UpdateBlog'])->name('update.blog');
        Route::get('delete/blog/{id}', [BlogController::class, 'DeleteBlog'])->name('delete.blog');
        Route::get('blog/inactive/{id}', [BlogController::class, 'BlogInactive'])->name('blog.inactive');
        Route::get('blog/active/{id}', [BlogController::class, 'BlogActive'])->name('blog.active');



        // Admin House 
        Route::get('all/house', [HouseController::class, 'AllHouse'])->name('all.house');
        Route::get('add/house', [HouseController::class, 'AddHouse'])->name('add.house');
        Route::post('store/house', [HouseController::class, 'StoreHouse'])->name('store.house');
        Route::get('edit/house/{id}', [HouseController::class, 'EditHouse'])->name('edit.house');
        Route::post('update/house', [HouseController::class, 'UpdateHouse'])->name('update.house');
        Route::get('add/house/photo/{id}', [HouseController::class, 'AddHousePhoto'])->name('add.house.photo');
        Route::post('store/house/photo', [HouseController::class, 'StoreHousePhoto'])->name('store.house.photo');
        Route::get('delete/house/photo/{id}', [HouseController::class, 'DeleteHousePhoto'])->name('delete.house.photo');
        Route::get('delete/house/{id}', [HouseController::class, 'DeleteHouse'])->name('delete.house');
        Route::get('house/inactive/{id}', [HouseController::class, 'HouseInactive'])->name('house.inactive');
        Route::get('house/active/{id}', [HouseController::class, 'HouseActive'])->name('house.active');



        // Admin Client 
        Route::get('all/client', [ClientController::class, 'AllClient'])->name('all.client');
        Route::get('add/client', [ClientController::class, 'AddClient'])->name('add.client');
        Route::post('store/client', [ClientController::class, 'StoreClient'])->name('store.client');
        Route::get('edit/client/{id}', [ClientController::class, 'EditClient'])->name('edit.client');
        Route::post('update/client', [ClientController::class, 'UpdateClient'])->name('update.client');
        Route::get('delete/client/{id}', [ClientController::class, 'DeleteClient'])->name('delete.client');
        Route::get('client/inactive/{id}', [ClientController::class, 'ClientInactive'])->name('client.inactive');
        Route::get('client/active/{id}', [ClientController::class, 'ClientActive'])->name('client.active');


        // Admin Blog 
        Route::get('all/team', [TeamController::class, 'AllTeam'])->name('all.team');
        Route::get('add/team', [TeamController::class, 'AddTeam'])->name('add.team');
        Route::post('store/team', [TeamController::class, 'StoreTeam'])->name('store.team');
        Route::get('edit/team/{id}', [TeamController::class, 'EditTeam'])->name('edit.team');
        Route::post('update/team', [TeamController::class, 'UpdateTeam'])->name('update.team');
        Route::get('delete/team/{id}', [TeamController::class, 'DeleteTeam'])->name('delete.team');
        Route::get('team/inactive/{id}', [TeamController::class, 'TeamInactive'])->name('team.inactive');
        Route::get('team/active/{id}', [TeamController::class, 'TeamActive'])->name('team.active');

        // Admin Seetings 
        Route::get('settings/edit', [SettingsController::class, 'SettingsEdit'])->name('settings.edit');
        Route::post('settings/store', [SettingsController::class, 'SettingsStore'])->name('settings.store');



        // Admin Testimonial 
        Route::get('all/testimonial', [TestimonialController::class, 'AllTestimonial'])->name('all.testimonial');
        Route::get('add/testimonial', [TestimonialController::class, 'AddTestimonial'])->name('add.testimonial');
        Route::post('store/testimonial', [TestimonialController::class, 'StoreTestimonial'])->name('store.testimonial');
        Route::get('edit/testimonial/{id}', [TestimonialController::class, 'EditTestimonial'])->name('edit.testimonial');
        Route::post('update/testimonial', [TestimonialController::class, 'UpdateTestimonial'])->name('update.testimonial');
        Route::get('delete/testimonial/{id}', [TestimonialController::class, 'DeleteTestimonial'])->name('delete.testimonial');
        Route::get('testimonial/inactive/{id}', [TestimonialController::class, 'TestimonialInactive'])->name('testimonial.inactive');
        Route::get('testimonial/active/{id}', [TestimonialController::class, 'TestimonialActive'])->name('testimonial.active');


        // Admin Social 
        Route::get('all/social', [SocialController::class, 'AllSocial'])->name('all.social');
        Route::get('add/social', [SocialController::class, 'AddSocial'])->name('add.social');
        Route::post('store/social', [SocialController::class, 'StoreSocial'])->name('store.social');
        Route::get('edit/social/{id}', [SocialController::class, 'EditSocial'])->name('edit.social');
        Route::post('update/social', [SocialController::class, 'UpdateSocial'])->name('update.social');
        Route::get('delete/social/{id}', [SocialController::class, 'DeleteSocial'])->name('delete.social');
        Route::get('social/inactive/{id}', [SocialController::class, 'SocialInactive'])->name('social.inactive');
        Route::get('social/active/{id}', [SocialController::class, 'SocialActive'])->name('social.active');

        // All Icon
        Route::get('all/icon', [SocialController::class, 'AllIcon'])->name('all.icon');


        // Admin Gallery 
        Route::get('all/gallery', [GalleryController::class, 'AllGallery'])->name('all.gallery');
        Route::get('add/gallery', [GalleryController::class, 'AddGallery'])->name('add.gallery');
        Route::post('store/gallery', [GalleryController::class, 'StoreGallery'])->name('store.gallery');
        Route::get('edit/gallery/{id}', [GalleryController::class, 'EditGallery'])->name('edit.gallery');
        Route::post('update/gallery', [GalleryController::class, 'UpdateGallery'])->name('update.gallery');
        Route::get('delete/gallery/{id}', [GalleryController::class, 'DeleteGallery'])->name('delete.gallery');
        Route::get('gallery/inactive/{id}', [GalleryController::class, 'GalleryInactive'])->name('gallery.inactive');
        Route::get('gallery/active/{id}', [GalleryController::class, 'GalleryActive'])->name('gallery.active');

        // Admin Messages 
        Route::get('all/message', [MessagesController::class, 'AllMessage'])->name('all.message');
        Route::get('detail/message/{id}', [MessagesController::class, 'DetailMessage'])->name('detail.message');
        Route::get('delete/message/{id}', [MessagesController::class, 'DeleteMessage'])->name('delete.message');

        // Admin House Messages 
        Route::get('all/house/message', [MessagesController::class, 'AllHouseMessage'])->name('all.house.message');
        Route::get('detail/house/message/{id}', [MessagesController::class, 'DetailHouseMessage'])->name('detail.house.message');
        Route::get('delete/house/message/{id}', [MessagesController::class, 'DeleteHouseMessage'])->name('delete.house.message');


        // Admin Faq 
        Route::get('all/faq', [FaqController::class, 'AllFaq'])->name('all.faq');
        Route::get('add/faq', [FaqController::class, 'AddFaq'])->name('add.faq');
        Route::post('store/faq', [FaqController::class, 'StoreFaq'])->name('store.faq');
        Route::get('edit/faq/{id}', [FaqController::class, 'EditFaq'])->name('edit.faq');
        Route::post('update/faq', [FaqController::class, 'UpdateFaq'])->name('update.faq');
        Route::get('delete/faq/{id}', [FaqController::class, 'DeleteFaq'])->name('delete.faq');
        Route::get('faq/inactive/{id}', [FaqController::class, 'FaqInactive'])->name('faq.inactive');
        Route::get('faq/active/{id}', [FaqController::class, 'FaqActive'])->name('faq.active');



        // Admin Calendar 
        Route::get('calendar', [CalendarController::class, 'Calendar'])->name('calendar');
        Route::get('all/calendar', [CalendarController::class, 'AllCalendar'])->name('all.calendar');
        Route::post('store/calendar', [CalendarController::class, 'StoreCalendar'])->name('store.calendar');
        Route::get('edit/calendar/{id}', [CalendarController::class, 'EditCalendar'])->name('edit.calendar');
        Route::post('update/calendar', [CalendarController::class, 'UpdateCalendar'])->name('update.calendar');
        Route::get('delete/calendar/{id}', [CalendarController::class, 'DeleteCalendar'])->name('delete.calendar');
        // Route::post('store/calendar/mail', [CalendarController::class, 'CalendarMail'])->name('store.calendar.mail');


        // Admin To Do List 
        Route::get('todolist', [ToDoListController::class, 'ToDoList'])->name('todo');
        Route::post('store/todolist', [ToDoListController::class, 'StoreToDo'])->name('store.todo');
        Route::get('edit/todolist/{id}', [ToDoListController::class, 'EditToDo'])->name('edit.todo');
        Route::post('update/todolist', [ToDoListController::class, 'UpdateToDo'])->name('update.todo');
        Route::get('delete/todolist/{id}', [ToDoListController::class, 'DeleteToDo'])->name('delete.todo');
        Route::get('todolist/inactive/{id}', [ToDoListController::class, 'ToDoInactive'])->name('todo.inactive');
        Route::get('todolist/active/{id}', [ToDoListController::class, 'ToDoActive'])->name('todo.active');
    });
});

// Frontend 
Route::get('/', [IndexController::class, 'index'])->name('/');
Route::get('/about', [IndexController::class, 'HomeAbout'])->name('home.about');

Route::get('/blog/details/{slug}', [IndexController::class, 'BlogDetails'])->name('blog.details');
Route::get('/blog', [IndexController::class, 'BlogPage'])->name('home.blog');

Route::get('/house/details/{slug}', [IndexController::class, 'HouseDetails'])->name('house.details');
Route::get('/houses', [IndexController::class, 'AllHouse'])->name('home.house');
Route::post('/store/house/message', [IndexController::class, 'StoreHouseMesseage'])->name('store.house.message');

Route::post('/search/house', [IndexController::class, 'SearchHouse'])->name('search.house');

Route::get('/client', [IndexController::class, 'Client'])->name('home.client');

Route::get('/service', [IndexController::class, 'ServicePage'])->name('home.service');
Route::get('/service/details/{id}', [IndexController::class, 'ServiceDetails'])->name('service.details');

Route::get('/contact', [IndexController::class, 'ContactPage'])->name('home.contact');
Route::post('/store/message', [IndexController::class, 'StoreMesseage'])->name('store.message');

Route::post('/store/subscriber', [IndexController::class, 'StoreSubscriber'])->name('store.subscriber');


Route::get('/faq', [IndexController::class, 'FaqPage'])->name('home.faq');

Route::get('/gallery', [IndexController::class, 'GalleryPage'])->name('home.gallery');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
