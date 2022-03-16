<div>
    <div class="row pt-2 mb-1">
        <div class="col-md-6">
            <label class="labelForm" for="">Filtra il pilota </label>
            <input class="form-input-text " name="" wire:model="search" type="search" placeholder="Cerca il pilota.." value="" >
        </div>
      
        <div class="col-md-6">
            <label class="labelForm" for="">Paginazione</label>
            {{$pilotList->links()}}
        </div>
    </div>
   
    <table id="tablePilot" class="table table-responsive">
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
                <td>{{$pilot->nomeCategoria}}</td>
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
