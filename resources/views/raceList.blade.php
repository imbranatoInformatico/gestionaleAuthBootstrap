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
        <h3>Lista team di {{ $eventDash->nome }} </h3>
    </div>
</div>
{{-- @livewire('filtro-piloti', ['eventDash' => $eventDash, 'categories'=> $categories]) --}}


<table  class="table table-responsive">
    <thead class="table-dark">
      <tr class="text-center">
          <td>ID</td>
          <td>NOME</td>
          <td>CIRCUITO</td>
          <td>COSTO</td>
          <td>DATA</td>
          <td>MODIFICA</td>
          <td>ELIMINA</td>
      </tr>
    </thead>
    <tbody class="table-light">
       @foreach ($races as $race)
            <tr class="text-center">
                <td>{{$race->id}}</td>
                <td>{{$race->nome}}</td>
                <td>{{$race->circuito}}</td>
                <td>{{$race->costoGara}} €</td>
                <td>{{$race->dataGara}}</td>
                <td>
                    <a href="{{ route('editRace',['codiceEvento'=>$eventDash->codiceEvento, 'id'=> $race->id])}}">
                        <button type="button" class="btn btn-outline-warning">MODIFICA</button>
                    </a> 
                </td>
                <td>
                    <form method="post" action="{{url('deleteRace',['id'=> $race->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">ELIMINA</button>
                    </form>
                </td>
            </tr>
       @endforeach
    </tbody>
</table>

</div>
</div>

@endsection

