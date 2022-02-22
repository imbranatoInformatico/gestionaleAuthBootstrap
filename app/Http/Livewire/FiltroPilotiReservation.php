<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Pilot;
use App\Models\Event;
use App\Models\Category;
use App\Models\Team;
use App\Models\Race;

class FiltroPilotiReservation extends Component
{
    public $search;
    public $searchSelect = null;
    public $eventDash;
    public $categories;
    public $races;

    protected $queryString = ['searchSelect'];


    public function reservationPilotListIndex($codiceEvento)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $races = Race::where('idEvento',$codiceEvento)->get();
        //dd($races);
        $pilotList = "";

        return view('reservationPilotList', compact('eventDash', 'pilotList','races'));

    }

    public function render()
    {
        if($this->searchSelect > 0) {
            return view('livewire.filtro-piloti-reservation' , [
                'pilotList' => Race::find($this->searchSelect)->pilots()->paginate(10),
            ]);
        } else {
            return view('livewire.filtro-piloti-reservation');
        }
        
    }

    
}
