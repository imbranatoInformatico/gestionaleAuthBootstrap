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
        <h3>Seleziona la classifica che vuoi visualizzare </h3>

        <div class="row pt-2  pe-3">
            <div class="col-md-6">
                <label for="">Classifiche</label>
                <select class="form-select"  name="classificaPunti" id="selectRankId" >
                    <option value="0" @selected(true)>seleziona la classifica</option>
                 @foreach ($rankings as $ranking)
                     <option value="{{ $ranking->id }}">{{ $ranking->nome }}</option>
                 @endforeach
                </select>
            </div>
        </div>
        <div class="row pt-2  pe-3">
            <div id="tableReactRankings" class="col-md-12"></div>
        </div>
    </div>
</div>


</div>
</div>

@endsection