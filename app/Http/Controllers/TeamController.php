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
    public function index($codiceEvento)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $teams = Team::where('idEvento',$codiceEvento)->get();

        return view('teamsList', compact('eventDash', 'teams'));
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
            $name = $request->file('img')->getClientOriginalName();
            Team::create([
                'nome' => $request->nome, //lo converto per sicurezza in un int
                'img' => $request->file('img')->storeAs('images', $name),
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
    public function edit($codiceEvento,$id)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $team = Team::where('id',$id)->first();

        return view('editTeam', compact('eventDash', 'team'));
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
            $team = Team::find($id);
            $name = $request->file('img')->getClientOriginalName();
            $team->fill([
                        "nome" => $request->nome,
                        "img" => $request->file('img')->storeAs('images', $name),
                        ])->save();


            return redirect()->route('teamList',$request->codiceEvento)->with('message','Team modificato con successo');
        }
        catch(\Exception $ex){
            return redirect()->route('teamList',$request->codiceEvento)->with('message','Mi spiace qualcosa è andato storto'.$ex);
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
            Team::find($id)->delete();

            return redirect()->back()->with('message', 'Team cancellato con successo');   
           }
       catch(\Exception $ex){

           return redirect()->back()->with('message', 'Mi spiace qualcosa è andato storto'.$ex);   

       }
    }
}
