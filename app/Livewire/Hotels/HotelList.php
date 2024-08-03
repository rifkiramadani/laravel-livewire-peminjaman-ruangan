<?php

namespace App\Livewire\Hotels;

use App\Models\Hotel;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class HotelList extends Component
{
    use WithPagination;

    #[Title('Hotels')]

    public $search;
    public function render()
    {
        return view('livewire.hotels.hotel-list',[
            'hotels' => Hotel::where('address','LIKE','%'.$this->search.'%')->paginate(10),
        ]);
    }

    public function delete($id) {
        $hotel = Hotel::find($id);
        $hotel->delete();
        return $this->redirect('/hotels', navigate:true);
    }

    public function updatingSearch() {
        // dd('test Updating');
        //untuk memperbaiki fitur search yang mancari di halaman itu sendiri
        $this->gotoPage(1);
    }
}
