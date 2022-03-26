<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Category;
use App\Models\Team;
use App\Models\Pilot;
use App\Models\Race;


class PilotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($codiceEvento)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $pilotList = DB::table('pilots')
        ->join('teams','teams.id','=','pilots.idTeam')
        ->join('categories','categories.id','=','pilots.idCategoria')
        ->join('event_pilot','event_pilot.pilot_id','=', 'pilots.id')
        ->where('event_pilot.event_id',$codiceEvento)
        ->select('pilots.id','pilots.nome','pilots.cognome','pilots.img','categories.nome as nomeCategoria','categories.colore as colore','teams.nome as nomeTeam')
        ->get(); 
       // $pilotList = Event::find($codiceEvento)->pilots()->get();

        //dd($pilotList);
        $categories = Category::where('idEvento',$codiceEvento)->get();

        return view('pilotList', compact('eventDash', 'pilotList','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($codiceEvento)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $categories = Category::where('idEvento',$codiceEvento)->get();
        $teams = Team::all();
        //dd($categories);

        return view('newPilot', compact('eventDash','categories','teams'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //dd($request->all());
      $request->validate([
            "idAdmin" => 'required',
            "nome" => 'required',
            "cognome" => 'required',
            "sesso" => 'required',
            "categoria" => 'required',
            "team" => 'required',    
            "img" => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'   
        ]);
    
        try {
     
      /* HO MODIFICATO LA CREAZIONE DEL PILOTA ORA SALVA ANCHE IN DUE TABELE PIVOT 
      (MANY TO MANY, categories_pilots e events_pilots) */

                   $name = $request->file('img')->getClientOriginalName();

                    $pilot = new Pilot();
                    $pilot->idAmministratore = $request->idAdmin;
                    $pilot->nome = $request->nome;
                    $pilot->cognome = $request->nome;
                    $pilot->sesso = $request->nome;
                    $pilot->idCategoria = 1;
                    $pilot->idTeam = $request->team;
                    $pilot->mail = $request->mail;
                    $pilot->telefono = $request->telofono;
                    $pilot->img = $request->file('img')->storeAs('images', $name);
                    
                    $pilot->save();

                    $pilot->categoriesMany()->attach($request->categoria);
                    $pilot->events()->attach($request->codiceEvento);





            return redirect()->route('newPilot',$request->codiceEvento)->with('message','Pilota creato con successo');
        }
        catch(\Exception $ex){
            return redirect()->route('newPilot',$request->codiceEvento)->with('message','Mi spiace qualcosa è andato storto'.$ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codiceEvento, $id)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();

        $pilot = Pilot::find($id);

        return view('showPilot', compact('pilot','eventDash'));
    }

    public function reservation($codiceEvento, $id)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $races = Race::where('idEvento',$codiceEvento)->get();
        $pilot = Pilot::where('id',$id)->first();
        $race_prenotate =  DB::table('race_pilot')
        ->where('pilot_id',$id)
        ->select('race_pilot.race_id')
        ->get(); 
       // dd($race_prenotate);

        return view('newReservation', compact('eventDash','races','pilot','race_prenotate'));
    }

    public function reservationStore(Request $request)
    {
        //dd($request->all());
        try { 

            $request->validate([
                "codicePilota" => 'required',
                "idGara" => 'required',    
            ]);

        $pilot = Pilot::find($request->codicePilota);
        
        $pilot->races()->attach($request->idGara);

        
        return redirect()->route('pilotList',$request->codiceEvento)->with('message','Prenotazione pilota avvenuta con successo');
        }
        catch(\Exception $ex){
            return redirect()->route('pilotList',$request->codiceEvento)->with('message','Mi spiace qualcosa è andato storto'.$ex);
        }
        


    }
    //funzione per checkare la presenza del pilota durante la gara (check in)
    public function check(Request $request, $id)
    {
       //dd($request->all());
        try {
       
        $pilot = Pilot::find($request->pilota_id);

        $pilot->races()->update([
            'partecipazione' => 1,
            'incasso' => $request->incasso,
            'note' => $request->note
        ]);

        return redirect()->route('reservationPilotList',array('codiceEvento' => $request->codiceEvento, 'gara' => $request->race_id))->with('message','Pilota creato con successo');
        }
        catch(\Exception $ex){
        return redirect()->route('reservationPilotList',array('codiceEvento' => $request->codiceEvento, 'gara' => $request->race_id))->with('message','Mi spiace qualcosa è andato storto'.$ex);
        }

  

    }
    //cancello la prenotazione del pilota dalla gara
    public function destroyPresence($codiceEvento, $id, $race_id)
    {
        try {
         DB::table('race_pilot')->where('pilot_id', $id)->delete();
         return redirect()->route('reservationPilotList',array('codiceEvento' => $codiceEvento, 'gara' => $race_id))->with('message','Hai annulato la prenotazione');

        }
        catch(\Exception $ex){
         return redirect()->route('reservationPilotList',array('codiceEvento' => $codiceEvento, 'gara' => $race_id))->with('message','Mi spiace qualcosa è andato storto'.$ex);
        }


    }

    public function raceSelectIndex($codiceEvento){
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $races = Race::where('idEvento',$codiceEvento)->get();
        return view("raceSelectionReservation", compact('eventDash','races'));


    }

    public function reservationPilotListIndex(Request $request) {
        
        $eventDash = Event::where('codiceEvento',$request->codiceEvento)->first();
        $race = $request->gara;
        $pilotList = DB::table('race_pilot')
                    ->join('pilots','race_pilot.pilot_id','=','pilots.id')
                    ->join('categories','categories.id','=','pilots.idCategoria')
                    ->where('race_id',$request->gara)
                    ->select('pilots.id','pilots.nome','pilots.cognome','pilots.img','categories.nome as nomeCategoria','race_pilot.partecipazione')
                    ->get();
                   // dd($pilotList);
                    
        return view("reservationPilotList", compact('eventDash','pilotList','race'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codiceEvento,$id)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();

        $pilot = DB::table('pilots')
        ->join('teams','teams.id','=','pilots.idTeam')
        ->join('categories','categories.id','=','pilots.idCategoria')
        ->select('pilots.id','pilots.nome','pilots.cognome','pilots.mail','pilots.telefono','categories.id as idCategoria','categories.nome as nomeCategoria','teams.id as idTeam','teams.nome as nomeTeam')
        ->where('pilots.id', '=', $id)
        ->get();

        //dd($pilot);

        $categories = Category::where('idEvento',$codiceEvento)->get();
        //dd($categories);
        $teams = Team::where('idEvento',$codiceEvento)->get();
        return view('editPilot', compact('eventDash','pilot','categories','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       // dd($request->all());
        try {
            $pilot = Pilot::find($id);
            $name = $request->file('img')->getClientOriginalName();
            $pilot->fill([
                        "idAmministratore" => $request->idAdmin,
                        "nome" => $request->nome,
                        "cognome" => $request->cognome,
                        "sesso" => $request->sesso,
                        "idCategoria" => $request->categoria,
                        "idTeam" => $request->team,
                        "mail" => $request->mail,
                        "telefono" => $request->telofono,
                        "img" => $request->file('img')->storeAs('images', $name),
                        ])->save();


            return redirect()->route('pilotList',$request->codiceEvento)->with('message','Pilota modificato con successo');
        }
        catch(\Exception $ex){
            return redirect()->route('pilotList',$request->codiceEvento)->with('message','Mi spiace qualcosa è andato storto'.$ex);
        }


           /* $pilot->idAmministratore = $request->idAdmin;
            $pilot->nome = $request->nome;
            $pilot->cognome = $request->cognome;
            $pilot->sesso = $request->sesso;
            $pilot->idCategoria = $request->categoria;
            $pilot->idTeam = $request->team;
            $pilot->mail = $request->mail;
            $pilot->telefono = $request->telofono;
            $pilot->img = $request->img;

            $pilot->update();

            return redirect()->route('editPilot',$request->codiceEvento)->with('message','Pilota modificato con successo');*/
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
     /***** */
    public function destroy($id)
    {
        try {
             Pilot::find($id)->delete();

             return redirect()->back()->with('message', 'Pilota cancellato con successo');   
            }
        catch(\Exception $ex){

            return redirect()->back()->with('message', 'Mi spiace qualcosa è andato storto'.$ex);   

        }
    }
}
