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
        <h3>Lista piloti prenotati </h3>
    </div>
</div>
{{-- @livewire('filtro-piloti-reservation', ['eventDash' => $eventDash]) --}}
<div class="row pt-2 mb-1">
    <div class="col-md-4">
        <label class="labelForm" for="">Filtra il pilota </label>
        <input class="form-input-text " id="ricerca" name="ricerca"   type="text" placeholder="Cerca il pilota.." value="" onkeyup="cerca()">
    </div>
    
   
    <div class="col-md-4  ">
        <label class="labelForm" for="">Race_id </label>
        <input class="form-input-text " id="raceID" name=""  type="number" placeholder="" value="{{$race}}" >

    </div>
</div>
<div class="row">
    <div class="col-md-6 contenitoreTable">
        @if (!empty($pilotList))
        <table id="tablePilotList" class="table table-responsive overflow-auto">
            <thead class="">
              <tr class="text-center table-dark">
                  <td>ID</td>
                  <td>AVATAR</td>
                  <td>NOME</td>
                  <td>COGNOME</td>
                  <td>CATEGORIA</td>
                  <td>PRESENZA</td>
                  <td>ELIMINA</td>
              </tr>
            </thead>
            <tbody class="table-light tbodyListPrenotati">
    
                @foreach ($pilotList as $pilot)
                <tr id="rigaPrenotati"class="text-center">
                    <td>{{$pilot->id}}</td>
                    @if (!empty($pilot->img))
                        <td><img class="img-fluid" src="{{Storage::url($pilot->img)}}" alt="" height="65px" width="59px"></td>
                    @else 
                       <td><i class="las la-user" style="font-size: 35px"></i></td>
                    @endif
                    <td>{{$pilot->nome}}</td>
                    <td>{{$pilot->cognome}}</td>
                    <td>{{$pilot->nomeCategoria}}</td>
                    <td>
                         @if (is_null($pilot->partecipazione) || $pilot->partecipazione == 0)
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-{{$pilot->id}}">
                            CHECK IN
                        </button>  
                        @else 
                       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-{{$pilot->id}}" disabled>
                            CHECK IN
                        </button>    
                        @endif
                                                
                          <!-- Modal -->
                          <div class="modal fade" id="modal-{{$pilot->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">MODULO CHECK IN</h5>
                                        <button type="button" id="btnCheck"class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-6">
                                                <form method="post" action="{{url('pilotCheck/'.$pilot->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}} 
                                                    <label class="labelForm" for="">Race_id </label>
                                                    <input class="form-input-text " id="raceID" name="race_id"  type="number" placeholder="" value="{{$race}}" >
                                                    <label class="labelForm" for="">codiceEvento </label>
                                                    <input class="form-input-text " name="codiceEvento" type="number" placeholder="{{ $eventDash->codiceEvento }}" value="{{ $eventDash->codiceEvento }}" >
                                                    <label class="labelForm" for="">pilota_id </label>
                                                    <input class="form-input-text " name="pilota_id" type="number" placeholder="{{ $pilot->id }}" value="{{ $pilot->id }}" >
                                                    <label class="labelForm" for="">Incasso </label>
                                                    <input class="form-input-text " name="incasso" type="number" placeholder="" value="" >
                                                    <label class="labelForm" for="">Note </label>
                                                    <textarea class="form-input-text " name="note" id="" cols="30" rows="10"></textarea>
                                                    <input class="form-submit-button" type="submit" value="Salva">
    
                                                </form>
                                                
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <!---FINE MODAL ---->
                        </td>
                    <td>
                        @if (is_null($pilot->partecipazione) || $pilot->partecipazione == 0)
                        <form method="post" action="{{url('deletPilotPresence',['codiceEvento'=> $eventDash->codiceEvento,'id'=> $pilot->id,'race_id'=> $race])}}">
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-outline-danger">ANNULLA PRENOTAZIONE</button>
                        </form>
                        @else 
                        <form method="post" action="{{url('deletPilotPresence',['codiceEvento'=> $eventDash->codiceEvento,'id'=> $pilot->id,'race_id'=> $race])}}">
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-outline-danger" disabled>ANNULLA PRENOTAZIONE</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table> 
        @else
        <table id="tablePilot" class="table table-responsive">
            <thead class="table-dark">
              <tr class="text-center">
                  <td>AVATAR</td>
                  <td>NOME</td>
                  <td>COGNOME</td>
                  <td>CATEGORIA</td>
                  <td>PRENOTA</td>
                  <td>ELIMINA</td>
              </tr>
            </thead>
            <tbody class="table-light">
                <td colspan="9" class="text-center">Nessun pilota trovato nelle prenotazioni!</td>
            </tbody>
        </table> 
        @endif
    </div>
    
    <div id="tableReact" class="col-md-6">

    </div>
</div>


</div>
</div>
@livewireScripts

@endsection