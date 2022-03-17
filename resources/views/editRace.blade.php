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
            <h3>Modifica la gara {{$race->nome}} di {{$eventDash->nome}}</h3>
            
        </div>
    </div>
    <div class="rowpt-2 ps-3 pe-3">
        <div class="col-md-12 ">
            <div class="boxFormInserimento ps-3 pe-3 py-3">
                <form method="post" action="{{url('updateRace/'.$race->id )}}">
                    @csrf
                    @method('PUT')
                    <label class="labelForm" for="">Codice evento </label>
                    <input class="form-input-text " name="codiceEvento" type="number" placeholder="{{$eventDash->codiceEvento}}" value="{{$eventDash->codiceEvento}}" >
                    <label class="labelForm" for="">Nome </label>
                    <input class="form-input-text " name="nome" type="text" placeholder="{{$race->nome}}" value="" >
                    <label class="labelForm" for="">Circuito </label>
                    <input class="form-input-text " name="circuito" type="text" placeholder="{{$race->circuito}}" value="" >
                    <label class="labelForm" for="">Costo gara </label>
                    <input class="form-input-text " name="costo" type="number" placeholder="{{$race->costoGara}}" value="" >
                    <label class="labelForm" for="">Data </label>
                    <input class="form-input-text " name="data" type="date" placeholder="{{$race->dataGara}}" value="" >
                   
                    <input class="form-submit-button" type="submit" value="Salva">
                </form>
            </div>
        </div>    
    </div>
</div>
@endsection
