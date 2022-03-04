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

    protected $queryString = ['search'];


    public function reservationPilotListIndex($codiceEvento)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $races = Race::where('idEvento',$codiceEvento)->get();
        //dd($races)%
        $pilotList = "";

        return view('reservationPilotList', compact('eventDash', 'pilotList','races'));

    }

    public function  checkListPilot($race_id){
        $checkList = Pilot::find(1)->races;
        dd($checkList);
    }

    public function render()
    {
        if($this->searchSelect > 0) {
            return view('livewire.filtro-piloti-reservation' , [
                'pilotList' => Race::find($this->searchSelect)->pilots()
                                ->join('teams','teams.id','=','pilots.idTeam')
                                ->join('categories','categories.id','=','pilots.idCategoria')
                                ->where('pilots.cognome', 'like', '%'.$this->search.'%')
                                ->select('pilots.id','pilots.nome','pilots.cognome','categories.nome as nomeCategoria', 'race_pilot.partecipazione')            
                                ->paginate(10),
            ]);
        } else {
            return view('livewire.filtro-piloti-reservation');
        }
        
    }

    
}
