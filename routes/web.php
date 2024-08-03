<?php

use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\Rooms\RoomList;
use App\Livewire\Hotels\HotelEdit;
use App\Livewire\Hotels\HotelList;
use App\Livewire\Rooms\RoomCreate;
use App\Livewire\Hotels\HotelCreate;
use Illuminate\Support\Facades\Route;
use App\Livewire\Bookings\BookingList;
use App\Http\Controllers\TestController;
use App\Livewire\Bookings\BookingCreate;

Route::get('/', function () {
    return view('welcome');
});

// HOTELS CRUD
Route::get('/dashboard', Dashboard::class);
Route::get('/hotels', HotelList::class);
Route::get('/hotels/create', HotelCreate::class);
Route::get('/hotels/{id}/edit', HotelEdit::class);

// AUTH
Route::get('/login', Login::class);

// ROOMS
Route::get('/rooms', RoomList::class);
Route::get('/rooms/create', RoomCreate::class);

// BOOKINGS
Route::get('/bookings', BookingList::class);
Route::get('/bookings/create', BookingCreate::class);