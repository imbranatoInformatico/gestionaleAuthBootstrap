@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="loginWrap col-12">
                <form class="form-gest "" action="firstStep.html">
                    <label for="">Eventi esistenti </label>
                    <select class="form-select" name="selectEventi" id="">
                       @foreach ($events as $event)
                           <option value="">{{ $event->nome }}</option>
                       @endforeach
                    </select>
                    <input class="form-submit-button " type="submit" value="Conferma">
                    <hr>
                    <label for="">Crea un nuovo campionato o evento</label>
                    <a href="nuovoEvento.html">
                        <input class="form-submit-button " type="submit" value="Nuovo">
                    </a>
                </form>
            </section>
        </div>
    </div>
</div>
@endsection
