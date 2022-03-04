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
        ->select('pilots.id','pilots.nome','pilots.cognome','categories.nome as nomeCategoria','teams.nome as nomeTeam')
        ->get();

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
        $categories = Category::all();
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
      // dd($request->all());
      $request->validate([
            "idAdmin" => 'required',
            "nome" => 'required',
            "cognome" => 'required',
            "sesso" => 'required',
            "categoria" => 'required',
            "team" => 'required',       
        ]);
    
        try {
            Pilot::create([
                        "idAmministratore" => $request->idAdmin,
                        "nome" => $request->nome,
                        "cognome" => $request->cognome,
                        "sesso" => $request->sesso,
                        "idCategoria" => $request->categoria,
                        "idTeam" => $request->team,
                        "mail" => $request->mail,
                        "telefono" => $request->telofono,
                        "img" => $request->img,
                    ])->events()->attach($request->codiceEvento);


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
    public function show($id)
    {
        //
    }

    public function reservation($codiceEvento, $id)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $races = Race::where('idEvento',$codiceEvento)->get();
        $pilot = Pilot::where('id',$id)->get();

        return view('newReservation', compact('eventDash','races','pilot'));
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

    public function presence(Request $request, $id)
    {
       // dd($request->all());
        try {
       
        $pilot = Pilot::find($request->pilota_id);

        $pilot->races()->update([
            'partecipazione' => 1,
            'incasso' => $request->incasso,
            'note' => $request->note
        ]);

        return redirect()->route('reservationPilotList',$request->codiceEvento)->with('message','Pilota creato con successo');
        }
        catch(\Exception $ex){
        return redirect()->route('reservationPilotList',$request->codiceEvento)->with('message','Mi spiace qualcosa è andato storto'.$ex);
        }

  

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
            $pilot->fill([
                        "idAmministratore" => $request->idAdmin,
                        "nome" => $request->nome,
                        "cognome" => $request->cognome,
                        "sesso" => $request->sesso,
                        "idCategoria" => $request->categoria,
                        "idTeam" => $request->team,
                        "mail" => $request->mail,
                        "telefono" => $request->telofono,
                        "img" => $request->img,
                        ])->save();


            return redirect()->route('pilotList/',$request->codiceEvento)->with('message','Pilota creato con successo');
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
    public function destroy($id)
    {
        //
    }
}
