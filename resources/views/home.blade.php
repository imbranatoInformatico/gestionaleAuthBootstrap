@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="loginWrap col-12">
                <form class="form-gest "" action="">
                    <label for="">Eventi esistenti </label>
                    <select class="form-select" name="selectEventi" id="">
                       @foreach ($events as $event)
                           <option value="">{{ $event->nome }}</option>
                       @endforeach
                    </select>
                    <input class="form-submit-button " type="submit" value="Conferma">
                    <hr>
                    <label for="">Crea un nuovo campionato o evento</label>
                  
                </form>
                <a href="{{ route('newEvent') }}" style="width:80%">
                    <input class="form-submit-button" type="submit" value="Nuovo">
                </a>
            </section>
        </div>
    </div>
</div>
@endsection
