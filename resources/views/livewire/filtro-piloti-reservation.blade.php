<div>
    <div class="row pt-2 mb-1">
        <div class="col-md-4">
            <label class="labelForm" for="">Filtra il pilota </label>
            <input class="form-input-text " name="" wire:model="search" type="search" placeholder="Cerca il pilota.." value="" >
        </div>
        <div class="col-md-4">
                <label class="labelForm" for="">Gare</label>
                 <select class="form-select" wire:model="searchSelect" name="categoria" id="">
                    <option value="0">Seleziona la gara..</option>
                    @foreach ($races as $race)
                        <option value="{{ $race->id }}">{{ $race->nome }}</option>
                    @endforeach
                 </select>
        </div>
        <div class="col-md-4  ">
            <label class="labelForm" for="">Paginazione</label>
        @if (!empty($pilotList))
                {{$pilotList->links()}}
            @endif 

        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            @if (!empty($pilotList))
            <table id="tablePilot" class="table table-responsive">
                <thead class="table-dark">
                  <tr class="text-center">
                      <td>ID</td>
                      <td>AVATAR</td>
                      <td>NOME</td>
                      <td>COGNOME</td>
                      <td>CATEGORIA</td>
                      <td>PRESENZA</td>
                      <td>ELIMINA</td>
                  </tr>
                </thead>
                <tbody class="table-light">
        
                    @foreach ($pilotList as $pilot)
                    
                    <tr class="text-center">
                        <td>{{$pilot->id}}</td>
                        <td></td>
                        <td>{{$pilot->nome}}</td>
                        <td>{{$pilot->cognome}}</td>
                        <td>{{$pilot->nomeCategoria}}</td>
                        <td>
                            @if (is_null($pilot->partecipazione))
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
                                                    <form method="post" action="{{url('pilotPresence/'.$pilot->id)}}">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}} 
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
                            <button type="button" class="btn btn-outline-danger">ELIMINA</button>
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
