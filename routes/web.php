<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EsewaPaymentController;
use App\Http\Controllers\FrontendController\AboutFrController;
use App\Http\Controllers\FrontendController\BookedTableController;
use App\Http\Controllers\FrontendController\BookingFrController;
use App\Http\Controllers\FrontendController\CartFrController;
use App\Http\Controllers\FrontendController\ContactFrController;
use App\Http\Controllers\FrontendController\IndexFrController;
use App\Http\Controllers\FrontendController\MenuFrController;
use App\Http\Controllers\FrontendController\NotFoundController;
use App\Http\Controllers\FrontendController\OrderController;
use App\Http\Controllers\FrontendController\ReservationsController;
use App\Http\Controllers\FrontendController\TeamFrController;
use App\Http\Controllers\FrontendController\TestimonialFrController;
use App\Http\Controllers\FrontendController\UserFrController;
use App\Http\Controllers\PaymentFailedController;
use App\Http\Controllers\PaymentSuccessController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\ReservationController;

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


Route::get('/', IndexFrController::class)->name('/');
Route::get('/team', TeamFrController::class)->name('team');
Route::get('/testimonial', TestimonialFrController::class)->name('testimonial');
Route::get('/contact', ContactFrController::class)->name('contact');
Route::get('/about', AboutFrController::class)->name('about');
Route::get('/cart', CartFrController::class)->name('cart');
Route::get('/menu', MenuFrController::class)->name('menu');
Route::get('/booked-table', BookedTableController::class)->name('booked-table');
Route::get('/order', OrderController::class)->name('order');
Route::get('/payment-failed', PaymentFailedController::class)->name('payment-failed');
Route::get('/qr-page', QRCodeController::class)->name('qr-page');
Route::get('/404', NotFoundController::class)->name('404');
Route::get('/user-password', [UserFrController::class, 'passwordChange'])->name('change.password');
Route::get('/user-info', [UserFrController::class, 'index'])->name('user-info');
Route::post('/user/update/{id}', [UserFrController::class, 'update'])->name('userfr.update');
Route::post('/carts', [CartController::class, 'index'])->name('cart.store');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/booking', [BookingFrController::class, 'index'])->name('booking');
Route::post('/booking/table', [BookingFrController::class, 'book'])->name('booking.table');

Route::get('/booking/table', function () {
    // Redirect to a 404 page or handle it as needed
    return redirect('404');
});

// Route::post('esewa/pay', [EsewaPaymentController::class, 'pay'])->name('esewa.pay');
// Route::get('esewa/check', [EsewaPaymentController::class, 'check'])->name('esewa.check');



Route::post('/khalti/payment/verify',[CartController::class,'verifyPayment'])->name('khalti.verifyPayment');

Route::post('/khalti/payment/store',[CartController::class,'storePayment'])->name('khalti.storePayment');


Route::get('reservation/{id}/cancel', [ReservationController::class, 'cancel'])->name('reservation.cancel');

Route::resource('/newsletter', 'App\Http\Controllers\NewsletterController');
Route::prefix('/admin')->group(function () {
    Route::resource('/reservation', 'App\Http\Controllers\ReservationController');
    Route::resource('/contacts', 'App\Http\Controllers\ContactController');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'checkRole'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('/admin')->group(function () {
        Route::resource('/', 'App\Http\Controllers\DashboardController');
        Route::resource('/fileManager', 'App\Http\Controllers\FileController');
        Route::resource('/carousels', 'App\Http\Controllers\carouselController');
        Route::resource('/foods', 'App\Http\Controllers\FoodController');
        Route::resource('/abouts', 'App\Http\Controllers\AboutController');
        Route::resource('/about_features', 'App\Http\Controllers\AboutFeatureController');
        Route::resource('/admins', 'App\Http\Controllers\AdminController');
        Route::resource('/users', 'App\Http\Controllers\UserController');
        Route::resource('/staffs', 'App\Http\Controllers\StaffController');
        Route::resource('/testimonials', 'App\Http\Controllers\TestimonialController');
        Route::resource('/team_members', 'App\Http\Controllers\TeamController');
        Route::resource('/settings', 'App\Http\Controllers\SiteConfigController');

        Route::resource('/payments', 'App\Http\Controllers\PaymentController');
        Route::resource('/tables', 'App\Http\Controllers\TableController');
        Route::resource('/orders', 'App\Http\Controllers\OrderController');
    });
});

require __DIR__ . '/auth.php';
