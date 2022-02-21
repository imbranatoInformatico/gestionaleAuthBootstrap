<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Race;

class RaceController extends Controller
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

        return view('newRace', compact('eventDash'));
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
            "codiceEvento" => 'required',
            "nome" => 'required',
            "circuito" => 'required',
            "costo" => 'required',
            "data" => 'required',
        ]);
    
        try {
            Race::create([
                        "nome" => $request->nome,
                        "circuito" => $request->circuito,
                        "costoGara" => $request->costo,
                        "dataGara" => $request->data,
                        "idEvento" => $request->codiceEvento,
            ])->events()->attach($request->codiceEvento);


            return redirect()->route('newRace',$request->codiceEvento)->with('message','Gara creata con successo');
        }
        catch(\Exception $ex){
            return redirect()->route('newRace',$request->codiceEvento)->with('message','Mi spiace qualcosa è andato storto'.$ex);
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
