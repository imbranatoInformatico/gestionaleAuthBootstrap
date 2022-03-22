<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Score;
use App\Models\Event;
use App\Models\Ranking;




class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        return view('newScore', compact('eventDash','rankings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

        $ranking = $request->classificaPunti;
        $posizione = $request->posizione;
        $valorePunto = $request->valorePunto;

        for ($i=0; $i < count($posizione); $i++) { 
            $saveScore = [
                'idRank' => $ranking,
                'posizione' => $posizione[$i],
                'valorePunto' => $valorePunto[$i]
            ];

            DB::table('scores')->insert($saveScore);
        }
        return redirect()->back()->with('message', 'Punteggio creato con successo');   
        }
        catch(\Exception $ex){
            return redirect()->back()->with('message', 'Mi spiace qualcosa è andato storto'.$ex);       
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
