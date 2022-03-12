<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Pilot;
use App\Models\Event;
use App\Models\Category;
use App\Models\Team;
use App\Models\Race;
use Illuminate\Http\Request;



class FiltroPilotiReservation extends Component
{
    public $search;
    public $eventDash;
    public $categories;
    public $races;

    protected $queryString = ['search'];


    public function reservationPilotListIndex(Request $request)
    {
        //dd($request->all());
        $eventDash = Event::where('codiceEvento', $request->codiceEvento)->first();
     
     /*  //  $pilotList = DB::table('race_pilot')
                    ->join('pilots','race_pilot.pilot_id','=','pilots.id')
                    ->join('categories','categories.id','=','pilots.idCategoria')
                    ->where('race_id',$request->gara)
                    ->select('pilots.id','pilots.nome','pilots.cognome','categories.nome as nomeCategoria')
                    ->get(); */
        //dd($pilotList);
        $pilotList = "";

        return view('reservationPilotList', compact('eventDash', 'pilotList'));

    }

    /* public function  checkListPilot($race_id){
      //  $checkList = Pilot::find(3)->races;
        $checkList = DB::table('race_pilot')
                    ->join('pilots','race_pilot.pilot_id','=','pilots.id')
                    ->join('categories','categories.id','=','pilots.idCategoria')
                    ->where('race_id',$race_id)
                    ->select('pilots.id','pilots.nome','pilots.cognome','categories.nome as nomeCategoria')
                    ->get();
        dd($checkList);
    } */

    public function render()
    {
        if($this->search > 0) {
            return view('livewire.filtro-piloti-reservation' , [
                'pilotList' => Race::find($this->search)->pilots()
                                ->join('teams','teams.id','=','pilots.idTeam')
                                ->join('categories','categories.id','=','pilots.idCategoria')
                                ->where('pilots.cognome', 'like', '%'.$this->search.'%')
                                ->select('pilots.id','pilots.nome','pilots.cognome','categories.nome as nomeCategoria', 'race.id','race_pilot.partecipazione')            
                                ->paginate(10),

                        
            ]);
        } else {
            return view('livewire.filtro-piloti-reservation');
        }
        
    }

    
}
