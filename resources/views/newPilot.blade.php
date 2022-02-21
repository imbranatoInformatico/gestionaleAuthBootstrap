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
        </div>
    </div>
    <div class="row pt-2 mb-3 ps-3 pe-3">
        <div class="col-md-8">
            <h3>Registra nuovo pilota in {{ $eventDash->nome }} </h3>
        </div>
    </div>
    <div class="rowpt-2 ps-3 pe-3">
        <div class="col-md-12 ">
            <div class="boxFormInserimento ps-3 pe-3 py-3">
                <form method="post" action="{{ url('newPilotStore') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label class="labelForm" for="">IdAmministratore </label>
                            <input class="form-input-text " name="idAdmin" type="number" placeholder="{{ $eventDash->idAmministratore }}" value="{{ $eventDash->idAmministratore }}" >
                        </div>
                        <div class="col-md-6">
                            <label class="labelForm" for="">codiceEvento </label>
                            <input class="form-input-text " name="codiceEvento" type="number" placeholder="{{ $eventDash->codiceEvento }}" value="{{ $eventDash->codiceEvento }}" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="labelForm" for="">Nome </label>
                            <input class="form-input-text " name="nome" type="text" placeholder="" value="" >
                        </div>
                        <div class="col-md-6">
                            <label class="labelForm" for="">Cognome </label>
                            <input class="form-input-text " name="cognome" type="text" placeholder="" value="" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="labelForm" for="">Sesso</label>
                            <select class="form-select" name="sesso" id="">
                                <option value="uomo">Uomo</option>
                                <option value="donna">Donna</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="labelForm" for="">Categoria</label>
                            <select class="form-select" name="categoria" id="">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="labelForm" for="">Team</label>
                            <select class="form-select" name="team" id="">
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                
                    <label class="labelForm" for="">Mail </label>
                    <input class="form-input-text " name="mail" type="nutextmber" placeholder="" value="" >
                    <label class="labelForm" for="">Telfono </label>
                    <input class="form-input-text " name="telefono" type="nutextmber" placeholder="" value="" >
                    <div class="input-group pt-1 d-flex flex-column">
                        <label class="labelForm" for="inputGroupFile01">Foto</label>
                        <input type="file" class="" name="img" id="inputGroupFile01">
                      </div>
                    <input class="form-submit-button" type="submit" value="SALVA">
                </form>
            </div>
        </div>    
    </div>
</div>
@endsection
