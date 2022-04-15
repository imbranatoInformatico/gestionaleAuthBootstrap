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
            <h3>Crea nuova classifica </h3>
            
        </div>
    </div>
    <div class="rowpt-2 ps-3 pe-3">
        <div class="col-md-12 ">
            <div class="boxFormInserimento ps-3 pe-3 py-3">
                <form method="post" action="{{url('newRankingStore')}}">
                    @csrf
                    <label class="labelForm" for="">Codice evento </label>
                    <input class="form-input-text " name="codiceEvento" type="number" placeholder="{{$eventDash->codiceEvento}}" value="{{$eventDash->codiceEvento}}" >
                    <label class="labelForm" for="">Nome </label>
                    <input class="form-input-text " name="nome" type="text" placeholder="" value="" >
                    <label class="labelForm" for="">Descrizione </label>
                    <input class="form-input-text " name="descrizione" type="text" placeholder="" value="" >
                    <label class="labelForm" for="">Categoria</label>
                            <select class="form-select" name="categoria" id="">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nome }}</option>
                                @endforeach
                            </select>
                    <label class="labelForm" for="">Colore Ranking</label>
                        <select class="form-select" name="colore" id="">
                            @foreach ($categories as $category)
                                <option value="{{ $category->colore }}">{{ $category->nome }}</option>
                            @endforeach
                        </select>
                    
                   
                    <input class="form-submit-button" type="submit" value="Salva">
                </form>
            </div>
        </div>    
    </div>
</div>
@endsection
