<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Team;

class TeamController extends Controller
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

        return view('newTeam', compact('eventDash'));
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
            'codiceEvento' => 'required', 
            'nome' => 'required',
        ]);
    
        try {
            Team::create([
                'nome' => $request->nome, //lo converto per sicurezza in un int
                'img' => $request->img,
                'idEvento' => $request->codiceEvento,
            ]); 

            return redirect()->route('newTeam',$request->codiceEvento)->with('message','Team creato con successo');
        }
        catch(\Exception $ex){
            return redirect()->route('newTeam',$request->codiceEvento)->with('message','Mi spiace qualcosa è andato storto'.$ex);
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
