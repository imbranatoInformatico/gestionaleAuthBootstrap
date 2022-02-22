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
<div class="row pt-2 mb-1 ps-3 pe-3">
    <div class="col-md-8">
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <h3>Lista piloti iscritti a {{ $eventDash->nome }} </h3>
    </div>
</div>
@livewire('filtro-piloti', ['eventDash' => $eventDash, 'categories'=> $categories])


</div>
</div>
@livewireScripts

@endsection
