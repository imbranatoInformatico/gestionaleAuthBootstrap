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
          <td>AVATAR</td>
          <td>NOME</td>
          <td>MODIFICA</td>
          <td>ELIMINA</td>
      </tr>
    </thead>
    <tbody class="table-light">
       @foreach ($teams as $team)
            <tr class="text-center">
                <td>{{$team->id}}</td>
                    @if (!empty($team->img)) 
                        <td><img class="img-fluid" src="{{Storage::url($team->img)}}" alt="" height="65px" width="59px"></td>
                     @else
                        <td><i class="las la-user" style="font-size: 35px"></i></td>
                    @endif
                <td>{{$team->nome}}</td>
                <td>
                    <a href="{{ route('editTeam',['codiceEvento'=>$eventDash->codiceEvento, 'id'=> $team->id])}}">
                        <button type="button" class="btn btn-outline-warning">MODIFICA</button>
                    </a> 
                </td>
                <td>
                    <form method="post" action="{{url('deleteTeam',['id'=> $team->id])}}">
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

