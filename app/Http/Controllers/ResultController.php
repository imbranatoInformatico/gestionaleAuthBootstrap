<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Ranking;
use App\Models\Category;
use App\Models\Pilot;
use App\Models\Race;
use App\Models\Score;





class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($codiceEvento)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $rankings = Ranking::where('idEvento',$codiceEvento)->get();


        return view('showPilotsRankings',compact('eventDash','rankings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($codiceEvento)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $rankings = Ranking::where('idEvento',$codiceEvento)->get();
        $races = Race::where('idEvento',$codiceEvento)->get();

        return view('newResultFirstStep',compact('eventDash','rankings','races'));
    }

    public function createSecondStep(Request $request)
    {
       // dd($request->all());
        $eventDash = Event::where('codiceEvento',$request->codiceEvento)->first();
        $ranking = $request->classificaPunti;

        $rankingCategory = Ranking::where('id',$ranking)->get();
        $race = $request->gara;
      //vecchia versione per singola classifica
      /*$pilots= DB::table('race_pilot')
                    ->join('pilots','race_pilot.pilot_id','=','pilots.id')
                    ->join('categories','categories.id','=','pilots.idCategoria')
                    ->where('partecipazione',1)
                    ->where('race_id',$request->gara)
                    ->where('categories.id',$rankingCategory[0]['idCategory'])
                    ->select('pilots.id','pilots.nome','pilots.cognome','categories.nome as nomeCategoria')
                    ->get();*/
        //NUOVA VERSIONE DI QUERY CHE STAMPA IL PILOTA IN DIVERSE CLASSIFICHE
        $pilots = DB::table('categories_pilots')
                    ->join('pilots','categories_pilots.pilot_id','=','pilots.id')
                    ->join('categories','categories_pilots.category_id','=','categories.id')
                    ->join('race_pilot','race_pilot.pilot_id','=','pilots.id')
                    ->where('partecipazione',1)
                    ->where('race_id',$request->gara)
                    ->where('categories_pilots.category_id',$rankingCategory[0]['idCategory'])
                    ->select('pilots.id','pilots.nome','pilots.cognome','categories.nome as nomeCategoria')
                    ->get(); 
        //dd($rankingCategory[0]['idCategory']);

       $scores = Score::where('idRank',$ranking)->get();
      // dd($scores);
        return view('newResultSecondStep', compact('eventDash', 'pilots','scores','ranking','race'));
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
            "idRank" => 'required',
            "race_id" => 'required',
            "pilot" => 'required',
            "puntoPole" => 'required',
            "puntoPoleCat" => 'required',
            "puntoPresenza" => 'required',    
            "posizioneGara1" => 'required',
            "puntoGara1" => 'required',    
            "posizioneGara2" => 'required',
            "puntoGara2" => 'required' 
        ]);

        try {
            
            $parametri = [ 
            "ranking_id" => $request->idRank,
            "pilot_id" => $request->pilot,
            "race_id" => $request->race_id,
            "posizioneQualifica" => $request->posizioneQaulifica,
            "posizioneGara1" => $request->posizioneGara1,
            "posizioneGara2" => $request->posizioneGara2,
            "puntoGara1" => $request->puntoGara1,    
            "puntoGara2" => $request->puntoGara2,
            "puntoPole" => $request->puntoPole,
            "puntoPoleCategoria" => $request->puntoPoleCat,
            "puntoPresenza" => $request->puntoPresenza   
            ];

            $pilot = Pilot::find($request->pilot);
            //dd($pilot);
          $pilot->rankings()->attach(1,$parametri);

            return redirect()->route('newResultFirstStep',$request->codiceEvento)->with('message','Prenotazione pilota avvenuta con successo');
        }
        catch(\Exception $ex){
            return redirect()->route('newResultFirstStep',$request->codiceEvento)->with('message', 'Mi spiace qualcosa è andato storto'.$ex);       

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
