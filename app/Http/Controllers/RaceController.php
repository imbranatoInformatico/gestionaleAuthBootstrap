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
    public function index($codiceEvento)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $races = Race::where('idEvento',$codiceEvento)->get();

        return view('raceList', compact('eventDash', 'races'));
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
    public function edit($codiceEvento,$id)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $race = Race::where('id',$id)->first();

        return view('editRace', compact('eventDash', 'race'));
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
        try {
            $race = Race::find($id);
            $race->fill([
                        "nome" => $request->nome,
                        "circuito" => $request->circuito,
                        "costoGara" => $request->costo,
                        "dataGara" => $request->data,
                        ])->save();


            return redirect()->route('raceList',$request->codiceEvento)->with('message','Race modificato con successo');
        }
        catch(\Exception $ex){
            return redirect()->route('raceList',$request->codiceEvento)->with('message','Mi spiace qualcosa è andato storto'.$ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Race::find($id)->delete();

            return redirect()->back()->with('message', 'Team cancellato con successo');   
           }
       catch(\Exception $ex){

           return redirect()->back()->with('message', 'Mi spiace qualcosa è andato storto'.$ex);   

       }
    }
}
