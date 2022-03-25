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
      
            <h3>Registra risultato per la classifica  </h3>
            
        </div>
    </div>
    <div class="rowpt-2 ps-3 pe-3">
        <div class="col-md-12 ">
            <div class="boxFormInserimento ps-3 pe-3 py-3">
                <form  method="post" action="{{url('/resultStore')}}">
                    @csrf

                    <input class="form-input-text " name="codiceEvento" type="number" placeholder="{{ $eventDash->codiceEvento }}" value="{{ $eventDash->codiceEvento }}" hidden>
                    <input class="form-input-text " name="idRank" type="number" placeholder="{{ $ranking }}" value="{{ $ranking }}" hidden>
                    <input class="form-input-text " name="race_id" type="number" placeholder="{{ $race }}" value="{{ $race }}" hidden>

                    <label class="labelForm" for="">Pilota</label>
                    <select class="form-select"  name="pilot" id="">
                        @foreach ($pilots as $pilot)
                            <option value="{{ $pilot->id }}">{{ $pilot->nome }} {{ $pilot->cognome }}</option>
                        @endforeach
                    </select>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="labelForm" for="">Qualifica</label>
                            <input class="form-input-text " name="posizioneQaulifica" type="number" placeholder="" value="" >
                        </div>
                        <div class="col-md-3">
                            <label class="labelForm" for="">Punto pole position</label>
                            <input class="form-input-text " name="puntoPole" type="number" placeholder="" value="" >
                        </div>
                        <div class="col-md-3">
                            <label class="labelForm" for="">Punto pole Categoria</label>
                            <input class="form-input-text " name="puntoPoleCat" type="number" placeholder="" value="" >
                        </div>
                        <div class="col-md-3">
                            <label class="labelForm" for="">Punto presenza</label>
                            <input class="form-input-text " name="puntoPresenza" type="number" placeholder="" value="" >
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-md-6">
                            <label class="labelForm" for="">Gara 1</label>
                            <br>
                            <label class="labelForm" for="">posizione</label>
                            <input class="form-input-text " name="posizioneGara1" type="number" placeholder="" value="" >
                            <label class="labelForm" for="">Punto</label>
                            <select class="form-select"  name="puntoGara1" id="">
                                @foreach ($scores as $score)
                                    <option value="{{ $score->valorePunto }}">{{ $score->posizione }}° {{ $score->valorePunto }} Punti</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="labelForm" for="">Gara 2</label>
                            <br>
                            <label class="labelForm" for="">posizione</label>
                            <input class="form-input-text " name="posizioneGara2" type="number" placeholder="" value="" >
                            <label class="labelForm" for="">Punto</label>
                            <select class="form-select"  name="puntoGara2" id="">
                                @foreach ($scores as $score)
                                    <option value="{{ $score->valorePunto }}">{{ $score->posizione }}° {{ $score->valorePunto }} Punti</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <input class="form-submit-button" type="submit" value="Salva">
                </form>
            </div>
        </div>    
    </div>
</div>

@endsection
