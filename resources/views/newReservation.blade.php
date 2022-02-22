@extends('layouts.dashApp')

@section('content')
@include('layouts.aside')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row pt-2 mb-3 ps-3 pe-3">
    <div class="col-md-8">
        <h3>Prenotazione nuovo pilota  </h3>
    </div>
</div>
<div class="row pt-2 ps-3 pe-3">
    <div class="col-md-12 ">
        <div class="boxFormInserimento ps-3 pe-3 py-3" style="background-color: #fff; box-shadow: 0 0 22px 0 rgb(0 0 0 / 16%);">
            <form method="post" action="{{ url('reservationPilotStore') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label class="labelForm" for="">Codice pilota </label>
                        <input class="form-input-text " name="codicePilota" type="number" placeholder="{{ $pilot[0]->id }}" value="{{ $pilot[0]->id }}" >
                    </div>
                    <div class="col-md-4">
                        <label class="labelForm" for="">IdAmministratore </label>
                        <input class="form-input-text " name="idAdmin" type="number" placeholder="{{ $eventDash->idAmministratore }}" value="{{ $eventDash->idAmministratore }}" >
                    </div>
                    <div class="col-md-4">
                        <label class="labelForm" for="">codiceEvento </label>
                        <input class="form-input-text " name="codiceEvento" type="number" placeholder="{{ $eventDash->codiceEvento }}" value="{{ $eventDash->codiceEvento }}" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="labelForm" for="">Nome </label>
                        <input class="form-input-text " name="nome" type="text" placeholder="{{$pilot[0]->nome}}" value="{{$pilot[0]->nome}}" >
                    </div>
                    <div class="col-md-6">
                        <label class="labelForm" for="">Cognome </label>
                        <input class="form-input-text " name="cognome" type="text" placeholder="{{$pilot[0]->cognome}}" value="{{$pilot[0]->cognome}}" >
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-6">
                        <label class="labelForm" for="">Scegli la gara </label>
                        <select class="form-select" name="idGara" id="">
                            @foreach ($races as $race)
                                <option value="{{$race->id}}">{{$race->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>             
               
                <input class="form-submit-button" type="submit" value="PRENOTA GARA">
            </form>
        </div>
    </div>    
</div>
</div>
@endsection