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
        $categories = Category::where('idEvento',$codiceEvento)->get();

        return view('categoryList', compact('eventDash','categories'));

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
        //dd($request->all());
        //verifichiamo i dati in arrivo con il validate
       $request->validate([
        'nome' => 'required ',
        'codiceEvento' => 'required', 
        ]);

        try {
            Category::create([
                'nome' => $request->nome,
                'descrizione' => $request->descrizione,
                'idEvento' => $request->codiceEvento,
                'colore' => $request->colore
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
    public function edit($codiceEvento,$id)
    {
        $eventDash = Event::where('codiceEvento',$codiceEvento)->first();
        $category = Category::where('id',$id)->first();

        return view('editCategory', compact('eventDash', 'category'));
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
            $category = Category::find($id);
            $category->fill([
                        "nome" => $request->nome,
                        "descrizione" => $request->descrizione,
                        "colore" => $request->colore        
                        ])->save();


            return redirect()->route('categoryList',$request->codiceEvento)->with('message','Pilota modificato con successo');
        }
        catch(\Exception $ex){
            return redirect()->route('categoryList',$request->codiceEvento)->with('message','Mi spiace qualcosa è andato storto'.$ex);
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
            Category::find($id)->delete();

            return redirect()->back()->with('message', 'Categoria cancellata con successo');   
           }
       catch(\Exception $ex){

           return redirect()->back()->with('message', 'Mi spiace qualcosa è andato storto'.$ex);   

       }
    }
}
