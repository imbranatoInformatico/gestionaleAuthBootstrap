<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Event;



class RankingPilot extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rankId)
    {
      $pilotsRanking = DB::table('ranking_pilot')
                        ->join('pilots','ranking_pilot.pilot_id','=','pilots.id')
                        ->join('rankings','rankings.id','=','ranking_pilot.ranking_id')
                        ->where('ranking_id',$rankId)
                        ->select('pilots.nome','pilots.cognome', 'rankings.nome as nomeClassifica', 'pilots.img', 'rankings.colore as coloreRank',
                                    DB::raw('SUM(ranking_pilot.puntoGara1) as puntiGare1'),
                                    DB::raw('SUM(ranking_pilot.puntoGara2) as puntiGare2'),
                                    DB::raw('SUM(ranking_pilot.puntoPole) as puntiPole'),
                                    DB::raw('SUM(ranking_pilot.puntoPoleCategoria) as puntiPoleCategoria'),
                                    DB::raw('SUM(ranking_pilot.puntoPresenza) as puntiPresenza'),
                                    DB::raw('SUM(ranking_pilot.puntoGara1 + ranking_pilot.puntoGara2 + ranking_pilot.puntoPresenza + ranking_pilot.puntoPole + ranking_pilot.puntoPoleCategoria) as totale'))
                        ->groupBy('pilots.id')
                        ->orderByDesc('totale')
                        ->get(); 
                        
        return response()->json($pilotsRanking);
    }

    public function eventoSingolo($rankId,$race_id){
       
        $pilotsRanking = DB::table('ranking_pilot')
                        ->join('pilots','ranking_pilot.pilot_id','=','pilots.id')
                        ->join('rankings','rankings.id','=','ranking_pilot.ranking_id')
                        ->where('ranking_id',$rankId)
                        ->where('race_id',$race_id)
                        ->select('pilots.nome','pilots.cognome','rankings.nome as nomeClassifica', 'rankings.colore as coloreRank','ranking_pilot.puntoGara1','ranking_pilot.puntoGara2','ranking_pilot.puntoPresenza','ranking_pilot.puntoPole','ranking_pilot.puntoPoleCategoria',
                                    DB::raw('SUM(ranking_pilot.puntoGara1 + ranking_pilot.puntoGara2) as puntiGaraGiornata'),
                                    DB::raw('SUM(ranking_pilot.puntoGara1 + ranking_pilot.puntoGara2 + ranking_pilot.puntoPresenza + ranking_pilot.puntoPole + ranking_pilot.puntoPoleCategoria) as totale'))
                        ->groupBy('pilots.id')
                        ->orderByDesc('totale')
                        ->get(); 
        
                        return response()->json($pilotsRanking);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
