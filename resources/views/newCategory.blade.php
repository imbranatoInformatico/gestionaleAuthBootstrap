@extends('layouts.dashApp')

@section('content')
@include('layouts.aside')
<div class="dashCenter">
    <div class="row pt-2 ps-3 pe-3">
       
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
             <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
            
            <h3>Crea nuova categoria </h3>
            
        </div>
    </div>
    <div class="rowpt-2 ps-3 pe-3">
        <div class="col-md-12 ">
            <div class="boxFormInserimento ps-3 pe-3 py-3">
                <form method="post" action="{{url('newCategoryStore')}}">
                    @csrf
                    <label class="labelForm" for="">Codice evento </label>
                    <input class="form-input-text " name="codiceEvento" type="number" placeholder="{{$eventDash->codiceEvento}}" value="{{$eventDash->codiceEvento}}" >
                    <label class="labelForm" for="">Nome </label>
                    <input class="form-input-text " name="nome" type="text" placeholder="" value="" >
                    <label class="labelForm" for="">Descrizione </label>
                    <input class="form-input-text " name="descrizione" type="text" placeholder="" value="" >
                    <label class="labelForm" for="" style="display:block;">Colore </label>
                    <input class="form-input-text" type="text" name="colore" data-coloris>

                    <input class="form-submit-button" type="submit" value="Nuovo">

                   
                </form>
            </div>
        </div>    
    </div>
</div>
@endsection
