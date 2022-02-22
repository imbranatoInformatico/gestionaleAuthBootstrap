<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Pilot;
use App\Models\Event;
use App\Models\Category;
use App\Models\Team;

class FiltroPiloti extends Component
{
    public $search;
    public $searchSelect;
    public $eventDash;
    public $categories;

 
    protected $queryString = ['search'];

    public function pilotListIndex($codiceEvento)
    {

        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $pilotList = DB::table('pilots')
        ->join('teams','teams.id','=','pilots.idTeam')
        ->join('categories','categories.id','=','pilots.idCategoria')
        ->select('pilots.id','pilots.nome','pilots.cognome','categories.nome as nomeCategoria','teams.nome as nomeTeam')
        ->get();
        //dd($pilotList);
        //dd($categories);
        $categories = Category::where('idEvento',$codiceEvento)->get();

        return view('pilotList', compact('eventDash', 'pilotList','categories'));

    }

  


    public function render()
    {
        return view('livewire.filtro-piloti', [
            'pilotList' => Pilot::join('teams','teams.id','=','pilots.idTeam')
                                ->join('categories','categories.id','=','pilots.idCategoria')
                                ->where('pilots.nome', 'like', '%'.$this->search.'%')
                                ->orWhere('pilots.cognome', 'like', '%'.$this->search.'%')
                                ->select('pilots.id','pilots.nome','pilots.cognome','categories.nome as nomeCategoria','teams.nome as nomeTeam')
                                ->paginate(10),

        ]);
    }
}
