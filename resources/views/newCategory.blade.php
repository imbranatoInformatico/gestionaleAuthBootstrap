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
                    <input class="form-input-text " name="nome" type="nutextmber" placeholder="" value="" >
                    <label class="labelForm" for="">Descrizione </label>
                    <input class="form-input-text " name="descrizione" type="nutextmber" placeholder="" value="" >
                    <input class="form-submit-button" type="submit" value="Nuovo">

                </form>
            </div>
        </div>    
    </div>
</div>
@endsection
