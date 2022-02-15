@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="loginWrap col-12">
                <form class="form-gest " action="">
                    <label for="">IdAmministratore </label>
                    <input class="form-input-text " type="text" placeholder="Inserisci il nome dell'evento">
                    <label for="">Nome </label>
                    <input class="form-input-text " type="text" placeholder="Inserisci il nome dell'evento">
                    <label for="">Motto</label>
                    <input class="form-input-text " type="text" placeholder="Inserisci il motto">
                    <label for="">Tipo</label>
                    <select class="form-select" name="selectTipoEvento" id="">
                        <option value="0">Campionato Sprint</option>
                        <option value="1">Campionato Endurance</option>
                        <option value="2">Gara sprint</option>
                        <option value="3">Gara endurance</option>
                        <option value="4">Evento aziendale</option>
                    </select>
                    <input class="form-submit-button " type="submit" value="Salva">

                </form>
            </section>
        </div>
    </div>
</div>
@endsection

