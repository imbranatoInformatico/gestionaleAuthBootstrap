@extends('layouts.dashApp')

@section('content')
@include('layouts.aside')
<div class="dashCenter">
    <div class="row pt-2 ps-3 pe-3">
        <div class="col-md-12">
            <h3>Impostazioni </h3>
        </div>
    </div>
    <div class="rowpt-2 ps-3 pe-3">
        <div class="col-md-6">
            <form action="">
                <div class="formSwitch form-check form-switch py-4">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Attiva menu categorie</label>
                </div>
                <input type="submit" value="Salva">
            </form>
         
        </div>
    </div>
</div>
@endsection
