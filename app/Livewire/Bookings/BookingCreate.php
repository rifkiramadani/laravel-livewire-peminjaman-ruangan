<?php

namespace App\Livewire\Bookings;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Arr;
use App\Models\BookingDetail;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

class BookingCreate extends Component
{

    #[Title('Create Booking')]

    #[Validate('required', message:'Data Harus Di isi')]
    public $user_id;

    #[Validate('required', message:'Data Harus Di isi')]
    public $booking_date;

    public $details = [];

    public $availableRooms;

    public function render()
    {
        $bookedRooms = BookingDetail::whereDate('check_in_time',$this->booking_date)->get();
        //whereNotIn mengacu kepada data selain yang ada di parameter, dan pluck mengindikasikan mengambil collectionnya sedangkan toArray, Mengonversikannya menjadi array
        $this->availableRooms = Room::whereNotIn('id', $bookedRooms->pluck('room_id')->toArray())->get();
        // if($this->booking_date) {
        //     dd($availableRooms);
        // }

        if(!empty($this->details)) {
            $detailRooms = array_filter($this->details, function($detail) {
                return $detail['date'] == $this->booking_date;
            });

            $detailRooms = Arr::pluck($detailRooms, 'room_id');

            $this->availableRooms = $this->availableRooms->filter(function($room) use($detailRooms){
                return !in_array($room->id, $detailRooms);
            });
        }

        return view('livewire.bookings.booking-create', [
            'users' => User::all(),
            'availableRooms' => $this->availableRooms,
            'details' => $this->details,
        ]);
    }

    public function book($availableRooms) {
        // dd($availableRooms);
        $this->details[] = [
            'room_id' => $availableRooms['id'],
            'room_name' => $availableRooms['name'],
            'date' => $this->booking_date,
        ];
    }

    public function save() {
        $booking = Booking::create([
            'user_id' => $this->user_id,
            'booking_date' => Carbon::now(),
        ]);

        $detailDataToInsert = [];
        foreach($this->details as $key => $detail) {
            $detailDataToInsert[$key]['booking_id'] = $booking->id;
            $detailDataToInsert[$key]['room_id'] = $detail['room_id'];
            $detailDataToInsert[$key]['check_in_time'] = $detail['date'];
            $detailDataToInsert[$key]['check_out_time'] = $detail['date'];
        }
        $bookingDetails = BookingDetail::insert($detailDataToInsert);
        session()->flash('success', 'Booking Has Been Created');
        return $this->redirect('/bookings', navigate:true);

    }
}
