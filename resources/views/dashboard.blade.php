@extends('layouts.dashApp')

@section('content')
@include('layouts.aside')
<div class="dashCenter">
    <!-- info generali campionato -->
    <div class="row pt-2 ps-3 pe-3">
        <div class="col-md-6">
            <div class="boxNomeEvento">
                <p class="ps-3">Nome evento</p>
                <h2 class="ps-3 nomeCampionato">{{ $eventDash->nome}}</h2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="boxNomeOrganizzatore">
                <p class="ps-3">Nome organizzatore</p>
                <h2 class="ps-3 nomeOrganizzatore">{{ $eventDash->name}}</h2>
            
            </div>
        </div>
    </div>
    <!--****************************-->
    <!-- info stats base campionato -->
    <div class="row pt-4 ps-3 pe-3">
        <div class="col-md-4 col-12">
            <div class="boxNomeEvento">
                <p class="ps-3">Piloti iscritti</p>
                <h2 class="ps-3 "></h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="boxNomeEvento">
                <p class="ps-3">Team iscritti</p>
                <h2 class="ps-3 "></h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="boxNomeEvento">
                <p class="ps-3">Kartoromi aderenti</p>
                <h2 class="ps-3 "></h2>
            </div>
        </div>
    </div>
    <!--****************************-->


</div>
@endsection
