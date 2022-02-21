@extends('layouts.dashApp')

@section('content')
@include('layouts.aside')

<div class="container">
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
<div class="row pt-2 mb-3 ps-3 pe-3">
    <div class="col-md-8">
        <h3>Lista piloti iscritti a {{ $eventDash->nome }} </h3>
    </div>
</div>

@livewire('filtro-piloti', ['pilotList' => $pilotList, 'eventDash' => $eventDash])


</div>
</div>
@livewireScripts

@endsection

