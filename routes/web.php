<?php

use App\Models\KlienModel;
use App\Http\Middleware\Checkrole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Klien\TicketController as KlienTicketController;
use App\Http\Controllers\TicketController;
use App\Models\Klien;

// Route login
Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/login', [AuthController::class, 'login'])->name('login'); // untuk POST login
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Routes dashboard
Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('home', [HomeController::class, 'index'])->name('home');

    // Routes Kelola data
    Route::middleware(['checkrole:superadmin'])->prefix('kelola')->name('kelola.')->group(function () {
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

        // data klien
        Route::get('klien', [KlienController::class, 'index'])->name('klien.index');
        Route::post('klien/store', [KlienController::class, 'store'])->name('klien.store');
        Route::post('klien/update/{id}', [KlienController::class, 'update'])->name('klien.update');
        Route::get('klien/delete/{id}', [KlienController::class, 'delete'])->name('klien.delete');

        // data kategori
        Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::post('kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
        Route::post('kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::get('kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');
    });

    // Route List Ticket
    Route::prefix('ticket')->name('ticket.')->group(function () {
        Route::get('allticket', [TicketController::class, 'allticket'])->name('all')->middleware('checkrole:superadmin|supervisor1|supervisor2');
        Route::get('allticketajax', [TicketController::class, 'allticketajax'])->name('all.ajax');
        Route::get('added', [TicketController::class, 'added'])->name('added')->middleware('checkrole:superadmin|supervisor1');
        Route::get('added2', [TicketController::class, 'added2'])->name('added2')->middleware('checkrole:supervisor2');
        Route::get('handled', [TicketController::class, 'handled'])->name('handled')->middleware('checkrole:superadmin|supervisor1');
        Route::post('ajaxhandled', [TicketController::class, 'ajax_handled'])->name('handled.ajax');
        Route::get('handled2', [TicketController::class, 'handled2'])->name('handled2')->middleware('checkrole:supervisor2');
        Route::post('ajaxhandled2', [TicketController::class, 'ajax_handled2'])->name('handled2.ajax');
        Route::get('closed', [TicketController::class, 'closed'])->name('closed')->middleware('checkrole:superadmin|supervisor1');
        Route::get('finished', [TicketController::class, 'finished'])->name('finished')->middleware('checkrole:superadmin|supervisor1|supervisor2');
        Route::post('ajaxfinished', [TicketController::class, 'ajax_finished'])->name('finished.ajax');
    });
});

//Route Klien
Route::middleware(['checkrole:klien'])->prefix('klien')->name('klien.')->group(function () {
    Route::get('new-ticket', [KlienTicketController::class, 'new_ticket'])->name('new-ticket');
});




// // Routes klien
// Route::middleware(['checkrole:klien'])->group(function () {
//     // Ticket klien
    
//     Route::prefix('client-ticket')->name('client.ticket.')->group(function () {
//         Route::get('new-ticket', [KlienController::class, 'new_ticket'])->name('new-ticket');
//         Route::post('add-temp', [KlienController::class, 'add_temp'])->name('add-temp');
//         Route::get('edit-temp/{id_temp}', [KlienController::class, 'edit_temp'])->name('edit-temp');
//         Route::post('update-temp', [KlienController::class, 'update_temp'])->name('update-temp');
//         Route::post('delete-temp', [KlienController::class, 'delete_temp'])->name('delete-temp');
//         Route::get('preview/{id_temp}', [KlienController::class, 'preview'])->name('preview');
//         Route::post('upload', [KlienController::class, 'upload'])->name('upload');
//         Route::post('ajukan', [KlienController::class, 'ajukan'])->name('ajukan');
//         Route::get('added', [KlienController::class, 'added'])->name('added');
//         Route::get('handled', [KlienController::class, 'handled'])->name('handled');
//         Route::get('closed', [KlienController::class, 'closed'])->name('closed');
//         Route::get('finishded', [KlienController::class, 'finished'])->name('finished');
//         Route::get('/{ticket}/show', [KlienController::class, 'show'])->name('show');
//     });
// });

// //Route ticket
// Route::middleware(['checkrole:superadmin|supervisor1'])->prefix('ticket')->group(function () {
//     Route::get('allticket', [TicketController::class, 'allticket'])->name('ticket.all');
//     Route::get('allticketlist', [TicketController::class, 'allticketlist'])->name('ticket.all.data');
//     Route::get('added', [TicketController::class, 'added'])->name('ticket.added');
//     Route::get('handled', [TicketController::class, 'handled'])->name('ticket.handled');
//     Route::get('closed', [TicketController::class, 'closed'])->name('ticket.closed');
//     Route::get('finished', [TicketController::class, 'finished'])->name('ticket.finished');
// });
