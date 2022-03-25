<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RankingPilot extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rankId)
    {
       //trovare la query per stampare i riusltati in base al rankId
       $pilotsRanking = DB::table('ranking_pilot')
                        ->join('pilots','ranking_pilot.pilot_id','=','pilots.id')
                        ->join('categories','categories.id','=','pilots.idCategoria')
                        ->where('ranking_id',$rankId)
                        ->select('pilots.nome','pilots.cognome','categories.nome as nomeCategoria',
                                DB::raw('SUM(puntoGara1 + puntoGara2) as puntiGara'),
                                DB::raw('SUM(puntoPresenza) as puntiPresenza'), 
                                DB::raw('SUM(puntoPole) as puntiPole'),
                                DB::raw('SUM(puntoGara1 + puntoGara2 + puntoPresenza + puntoPole) as totale'))
                        ->get();

       // dd($pilotsRanking);
      return $pilotsRanking;
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
