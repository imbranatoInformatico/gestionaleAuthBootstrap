<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($codiceEvento)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();

        return view('categoryList', compact('eventDash'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($codiceEvento)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        return view('newCategory', compact('eventDash'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //verifichiamo i dati in arrivo con il validate
       $request->validate([
        'nome' => 'required | unique:categories',
        'descrizione' => 'required', 
        'codiceEvento' => 'required', 
        ]);

        try {
            Category::create([
                'nome' => $request->nome,
                'descrizione' => $request->descrizione,
                'idEvento' => $request->codiceEvento
            ]); 

            return redirect()->route('newCategory',$request->codiceEvento)->with('message','Categoria creata con successo');
        }
        catch(\Exception $ex){
            return redirect()->route('newCategory',$request->codiceEvento)->with('message','Mi spiace qualcosa è andato storto'.$ex);
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
