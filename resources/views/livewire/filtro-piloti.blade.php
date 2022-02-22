<div>
    <div class="row pt-2 mb-1">
        <div class="col-md-4">
            <label class="labelForm" for="">Filtra il pilota </label>
            <input class="form-input-text " name="" wire:model="search" type="search" placeholder="Cerca il pilota.." value="" >
        </div>
        <div class="col-md-4">
                <label class="labelForm" for="">Categoria</label>
                 <select class="form-select" wire:model="searchSelect" name="categoria" id="">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nome }}</option>
                    @endforeach
                 </select>
        </div>
        <div class="col-md-4  ">
            <label class="labelForm" for="">Paginazione</label>
            {{$pilotList->links()}}
        </div>
    </div>
   
    <table id="tablePilot" class="table table-responsive">
        <thead class="table-dark">
          <tr class="text-center">
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
                <td></td>
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
                    <button type="button" class="btn btn-outline-success">SCHEDA</button></td>
                <td>
                   <a href="{{ route('editPilot',['codiceEvento'=>$eventDash->codiceEvento, 'id'=> $pilot->id])}}">
                        <button type="button" class="btn btn-outline-warning">MODIFICA</button>
                    </a> 
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger">ELIMINA</button>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>