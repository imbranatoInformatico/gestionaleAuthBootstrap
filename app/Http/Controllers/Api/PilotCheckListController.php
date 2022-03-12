<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pilot;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PilotCheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $listCheck = DB::table('race_pilot')
                        ->join('pilots','race_pilot.pilot_id','=','pilots.id')
                        ->join('categories','categories.id','=','pilots.idCategoria')
                        ->where('partecipazione',1)
                        ->where('race_id',$request->race_id)
                        ->select('pilots.id','pilots.nome','pilots.cognome','categories.nome as nomeCategoria')
                        ->get();
        return $listCheck;
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
        DB::table('race_pilot')->where('pilot_id', $id)->update(['partecipazione' => 0]);
        $listCheckUpdate = DB::table('race_pilot')->where('partecipazione',1);
    //    return DB::table('race_pilot')->where('partecipazione',0)->json_encode();
        return response()->json($listCheckUpdate);
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
