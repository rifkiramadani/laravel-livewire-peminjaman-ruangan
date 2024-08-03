<?php

namespace App\Livewire\Rooms;

use App\Models\Room;
use Livewire\Component;

class RoomList extends Component
{
    #[Title('Room List')]

    public function render()
    {
        return view('livewire.rooms.room-list', [
            'rooms' => Room::all(),
        ]);
    }
}
