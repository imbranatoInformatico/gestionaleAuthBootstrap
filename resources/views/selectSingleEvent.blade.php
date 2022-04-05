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
        <h3>Seleziona la gara per vedere la classifica di giornata </h3>

        <div class="row pt-2  pe-3">
            <div class="col-md-12 ">
                <div class="boxFormInserimento ps-3 pe-3 py-3">
                    <form method="post" action="{{url('showRankingSingoloEvento',['codiceEvento'=> $eventDash->codiceEvento])}}">
                        @csrf
                        <input class="form-input-text " name="codiceEvento" type="number" placeholder="{{$eventDash->codiceEvento}}" value="{{$eventDash->codiceEvento}}" hidden>
                        <label class="labelForm" for="">Gare</label>
                        <select class="form-select"  name="gara" id="">
                           <option value="0">Seleziona la gara..</option>
                           @foreach ($races as $race)
                               <option value="{{ $race->id }}">{{ $race->nome }}</option>
                           @endforeach
                        </select>
                        <input class="form-submit-button" type="submit" value="VAI">
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>


</div>
</div>

@endsection