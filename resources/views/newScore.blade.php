@extends('layouts.dashApp')

@section('content')
@include('layouts.aside')

<div class="dashCenter">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <div class="row pt-2 ps-3 pe-3">
       
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <script>
            var aggiungi = document.getElementById("aggiungi");
            var rimuovi = document.getElementById("rimuovi");
    
            function add() {
               var contenitore = document.getElementById("rigaBloccoPunti");
               var bloccoDiv = document.getElementById("bloccoPunto1");
            /*    /* clone = bloccoDiv.cloneNode(true);
               clone.id = "some_id"; */
             //  document.getElementById("rigaBloccoPunti").appendChild(clone); 
             if(contenitore.firstChild){
                 console.log("ciao");
                 contenitore.parentNode.insertBefore(bloccoDiv, element);
             }
            }
            function remove(){
                document.getElementById("rigaBloccoPunti").remove(clone);
            }
            
        </script>
            <h3>Crea nuova classifica </h3>
            
        </div>
    </div>
    <div class="rowpt-2 ps-3 pe-3">
        <div class="col-md-12 ">
            <div class="boxFormInserimento ps-3 pe-3 py-3">
                <form method="post" action="{{url('newRankingStore')}}">
                    @csrf
                    <label class="labelForm" for="">Classifica</label>
                            <select class="form-select" name="categoria" id="">
                                @foreach ($rankings as $ranking)
                                    <option value="{{ $ranking->id }}">{{ $ranking->nome }}</option>
                                @endforeach
                            </select>
                    <div class="row py-3">
                        <div class="col-md-3">
                            <button id="aggiungi" type="button" class="btn btn-success" onclick="add()">Aggiungi</button>
                            <button id="rimuovi" type="button" class="btn btn-danger" onclick="remove()">Rimuovi</button>
                        </div>
                    
                    </div>
                    <div class="row" id="rigaBloccoPunti">
                        <div id="bloccoPunto1"class="col-md-12">
                            <label class="labelForm" for="">Posizione </label>
                            <input class="form-input-text " name="posizione" type="text" placeholder="" value="" >
                            <label class="labelForm" for="">Valore punto </label>
                            <input class="form-input-text " name="valorePunto" type="number" placeholder="" value="" >
                        </div> 
                    </div>
                   
                    
                   
                    <input class="form-submit-button" type="submit" value="Salva">
                </form>
            </div>
        </div>    
    </div>
</div>
@endsection
