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
      
            <h3>Crea nuova classifica </h3>
            
        </div>
    </div>
    <div class="rowpt-2 ps-3 pe-3">
        <div class="col-md-12 ">
            <div class="boxFormInserimento ps-3 pe-3 py-3">
                <form method="post" action="{{url('newScoreStore')}}">
                    @csrf
                    <label class="labelForm" for="">Classifica</label>
                            <select class="form-select"  name="classificaPunti" id="">
                                @foreach ($rankings as $ranking)
                                    <option value="{{ $ranking->id }}">{{ $ranking->nome }}</option>
                                @endforeach
                            </select>
                    <div class="row py-3">
                        <div class="col-md-3">
                            <button id="aggiungi" type="button" class="btn btn-success" >Aggiungi</button>
                            <button id="rimuovi" type="button" class="btn btn-danger" >Rimuovi</button>
                        </div>
                    
                    </div>
                    <div class="row" id="rigaBloccoPunti">
                        <div id="bloccoPunto1"class="col-md-4">
                        {{--     <label for="">Classifica Assegnata</label>
                            <input class="form-input-text " type="text" name="classificaPunti[]" value="1" placeholder="1"> --}}
                            <label class="labelForm" for="">Posizione </label>
                            <input class="form-input-text " name="posizione[]" type="number" placeholder="" value="" >
                            <label class="labelForm" for="">Valore punto </label>
                            <input class="form-input-text " name="valorePunto[]" type="number" placeholder="" value="" >
                        </div> 
                    </div>
                   
                    
                   
                    <input class="form-submit-button" type="submit" value="Salva">
                </form>
            </div>
        </div>    
    </div>
</div>
<script>
    var headers = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
    const aggiungi = document.getElementById("aggiungi");
    const rimuovi = document.getElementById("rimuovi");
    let counter = 1;
    aggiungi.addEventListener("click", function(){
        const div = document.getElementById('bloccoPunto1')
        clone = div.cloneNode(true);
        counter ++;
        clone.id = "bloccoPunto" + counter;
        
        document.getElementById("rigaBloccoPunti").appendChild(clone);

    })

    rimuovi.addEventListener("click", function(){
       const div = document.getElementById("rigaBloccoPunti");
       div.removeChild(div.lastChild);
    });
 
</script>
@endsection
