<?php

namespace App\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;

class BookingList extends Component
{

    #[Title('Booking List')]

    public function render()
    {
        return view('livewire.bookings.booking-list',[
            'bookings' => Booking::all(),
        ]);
    }
}
