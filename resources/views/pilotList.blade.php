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
<script>
    function cerca() {
        var input, filter, table, tr, td, thead,i, txtValue;
        input = document.getElementById("ricerca");
        filter = input.value.toUpperCase();
        table = document.getElementById("tablePilotList");
        tr = table.getElementsByTagName("tr");
        thead = table.getElementsByTagName("thead");
    
      
        for (i = 0; i < tr.length; i++) {
          tdNome = tr[i].getElementsByTagName("td")[2];
          tdCognome = tr[i].getElementsByTagName("td")[3];
          if (tdNome) {
            txtValueNome = tdNome.textContent || tdNome.innerText;
            txtValueCognome = tdCognome.textContent || tdCognome.innerText;
            if (txtValueNome.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else if(txtValueCognome.toUpperCase().indexOf(filter) > -1){
              tr[i].style.display = "";
            }
            else {
              tr[i].style.display = "none";
            }
          }
        }
      }
    </script>
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
{{-- @livewire('filtro-piloti', ['eventDash' => $eventDash, 'categories'=> $categories]) --}}
<div class="row pt-2 mb-1">
    <div class="col-md-6">
        <label class="labelForm" for="">Filtra il pilota </label>
        <input class="form-input-text " id="ricerca" name="" type="search" placeholder="Cerca il pilota.." value="" onkeyup="cerca()">
    </div>
  
    
</div>

<table id="tablePilotList" class="table table-responsive">
    <thead class="table-dark">
      <tr class="text-center">
          <td>ID</td>
          <td>AVATAR</td>
          <td>NOME</td>
          <td>COGNOME</td>
          <td>CATEGORIA</td>
          <td>TEAM</td>
          <td>PRENOTA</td>
          <td>SCHEDA</td>
          <td>MODIFICA</td>
          <td>ELIMINA</td>
      </tr>
    </thead>
    <tbody class="table-light">
        @foreach ($pilotList as $pilot)
        <tr class="text-center">
            <td>{{$pilot->id}}</td>
                @if (!empty($pilot->img)) 
                    <td><img class="img-fluid" src="{{Storage::url($pilot->img)}}" alt="" height="65px" width="59px"></td>
                @else
                    <td><i class="las la-user" style="font-size: 35px"></i></td>
                @endif
            <td>{{$pilot->nome}}</td>
            <td>{{$pilot->cognome}}</td>
            <td><div  style="background-color: {{$pilot->colore}}; text-transform:uppercase;">{{$pilot->nomeCategoria}}</div></td>
            <td>{{$pilot->nomeTeam}}</td>
            <td>
                <a href="{{ route('pilotReservation',['codiceEvento'=>$eventDash->codiceEvento, 'id'=> $pilot->id])}}">
                    <button type="button" class="btn btn-outline-primary">PRENOTA</button></td> 
                </a>
            </td>
            <td>
                <a href="{{ route('showPilot',['codiceEvento'=>$eventDash->codiceEvento,'id'=> $pilot->id])}}">
                    <button type="button" class="btn btn-outline-success">SCHEDA</button></td>
                </a>
            <td>
               <a href="{{ route('editPilot',['codiceEvento'=>$eventDash->codiceEvento, 'id'=> $pilot->id])}}">
                    <button type="button" class="btn btn-outline-warning">MODIFICA</button>
                </a> 
            </td>
            <td>
                <form method="post" action="{{url('deletPilot',['id'=> $pilot->id])}}">
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
@livewireScripts

@endsection

