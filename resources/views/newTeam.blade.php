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
            <h3>Crea nuovo team </h3>
            
        </div>
    </div>
    <div class="rowpt-2 ps-3 pe-3">
        <div class="col-md-12 ">
            <div class="boxFormInserimento ps-3 pe-3 py-3">
                <form method="post" action="{{url('newTeamStore')}}">
                    @csrf
                    <label class="labelForm" for="">Codice evento </label>
                    <input class="form-input-text " name="codiceEvento" type="number" placeholder="{{$eventDash->codiceEvento}}" value="{{$eventDash->codiceEvento}}" >
                    <label class="labelForm" for="">Nome </label>
                    <input class="form-input-text " name="nome" type="nutextmber" placeholder="" value="" >
                    <label class="labelForm" for="">logo </label>
                    <div class="input-group pt-1 d-flex flex-column">
                        <label class="labelForm" for="inputGroupFile01">Foto</label>
                        <input type="file" name="img" class="" id="inputGroupFile01">
                    </div>
                    <input class="form-submit-button" type="submit" value="Salva">
                </form>
            </div>
        </div>    
    </div>
</div>
@endsection
