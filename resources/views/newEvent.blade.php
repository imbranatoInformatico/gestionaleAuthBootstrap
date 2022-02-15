@extends('layouts.app')

@section('content')
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="loginWrap col-12">
                <form class="form-gest " method="post" action="{{url('newEventStore')}}">
                    @csrf
                    <label for="">IdAmministratore </label>
                    <input class="form-input-text " name="idAdmin" type="number" placeholder="{{ $idAdmin }}" value="{{ $idAdmin}}" >
                    <label for="">Codice evento </label>
                    <input class="form-input-text " name="codiceEvento"type="number" placeholder="inserisci un tuo codice identificativo">
                    <label for="">Nome </label>
                    <input class="form-input-text " name="nome"type="text" placeholder="Inserisci il nome dell'evento">
                    <label for="">Tipo</label>
                    <select class="form-select" name="tipo" id="">
                        <option value="Campionato Sprint">Campionato Sprint</option>
                        <option value="Campionato Endurance">Campionato Endurance</option>
                        <option value="Gara sprint">Gara sprint</option>
                        <option value="Gara endurance">Gara endurance</option>
                        <option value="Evento aziendale">Evento aziendale</option>
                    </select>
                    <label for="">Descrizione</label>
                    <input class="form-input-text " name="descrizione" type="text" placeholder="Inserisci il motto">
                    <input class="form-submit-button " type="submit" value="Salva">

                </form>
            </section>
        </div>
    </div>
</div>
@endsection

