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
      
            <h3> </h3>
            
        </div>
    </div>
    <div class="rowpt-2 ps-3 pe-3">
        <div class="col-md-12 ">
            <div class="boxFormInserimento ps-3 pe-3 py-3">
                <form method="post" action="{{url('newResultSecondStep')}}">
                    {{csrf_field()}}
                    <input class="form-input-text " name="codiceEvento" type="number" placeholder="{{ $eventDash->codiceEvento }}" value="{{ $eventDash->codiceEvento }}" hidden>

                    <label class="labelForm" for="">Classifica</label>
                            <select class="form-select"  name="classificaPunti" id="">
                                @foreach ($rankings as $ranking)
                                    <option value="{{ $ranking->id }}">{{ $ranking->nome }}</option>
                                @endforeach
                            </select>
                    <label class="labelForm" for="">Gara</label>
                            <select class="form-select"  name="gara" id="">
                                @foreach ($races as $race)
                                    <option value="{{ $race->id }}">{{ $race->nome }}</option>
                                @endforeach
                            </select>
                    <input class="form-submit-button" type="submit" value="vai">
                </form>
            </div>
        </div>    
    </div>
</div>

@endsection
