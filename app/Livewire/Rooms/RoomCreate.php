<?php

namespace App\Livewire\Rooms;

use App\Models\Room;
use App\Models\Hotel;
use Livewire\Component;
use App\Models\RoomType;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

class RoomCreate extends Component
{
    #[Title('Add Room')]

    #[Validate('required', message:'Field Harus Di isi')]
    public $name;

    #[Validate('required', message:'Field Harus Di isi')]
    public $room_type_id;

    #[Validate('required', message:'Field Harus Di isi')]
    public $hotel_id;

    #[Validate('required', message:'Field Harus Di isi')]
    public $price_per_night;    

    public function render()
    {
        return view('livewire.rooms.room-create',[
            'room_types' => RoomType::all(),
            'hotels' => Hotel::all(),
        ]);
    }

    public function create() {
        // dd($this->all());
        $this->validate();
        Room::create($this->all());

        session()->flash('success', 'Data Room Has Been Added');
        return $this->redirect('/rooms', navigate:true);

    }
}
