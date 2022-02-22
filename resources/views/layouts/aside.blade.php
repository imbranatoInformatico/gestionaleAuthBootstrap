<aside>
    <div class="asideBlocco">
        <div class="bloccoTitolo" data-bs-toggle="collapse" href="#collapseExample"  aria-expanded="false" aria-controls="collapseExample">
            <div class="row">
                <div class="col-md-7">
                    <span class="las la-user"></span>
                    <span class="title">Piloti</span>
                </div>
                <div class="col-md-5">
                    <span class="arrow las la-angle-down" ></span>
                </div>
            </div>
            
        </div> 
        <div class="bloccoMenu collapse" id="collapseExample">
            <ul>
                <li class="item"><a href="{{ route('newCategory',['codiceEvento'=> $eventDash->codiceEvento])}}">Aggiungi categoria</a></li>
                <li class="item"><a href="{{ route('newPilot',['codiceEvento'=> $eventDash->codiceEvento])}}">Aggiungi pilota</a></li>
                <li class="item"><a href="{{ route('pilotList',['codiceEvento'=> $eventDash->codiceEvento])}}">Lista piloti</a></li>
                <li class="item"><a href="{{ route('categoryList',['codiceEvento'=> $eventDash->codiceEvento])}}">Lista categorie</a></li>
            </ul>
        </div>
    </div>
    <div class="asideBlocco">
        <div class="bloccoTitolo" data-bs-toggle="collapse" href="#collapseExample2"  aria-expanded="false" aria-controls="collapseExample2">    
            <div class="row">
                <div class="col-md-7">
                    <span class="las la-user-friends"></span>
                    <span class="title">Team</span>
                </div>
                <div class="col-md-5">
                    <span class="arrow las la-angle-down" ></span>
                </div>
            </div>
        </div> 
        <div class="bloccoMenu collapse" id="collapseExample2">
            <ul>
                <li class="item"><a href="{{ route('newTeam',['codiceEvento'=> $eventDash->codiceEvento])}}">Aggiungi team</a></li>
                <li class="item">Lista team</li>
            </ul>
        </div>
    </div>
    <div class="asideBlocco">
        <div class="bloccoTitolo" data-bs-toggle="collapse" href="#collapseExample3"  aria-expanded="false" aria-controls="collapseExample3">                 
            <div class="row">
                <div class="col-md-7">
                    <span class="las la-road"></span>
                    <span class="title">Gara</span>
                </div>
                <div class="col-md-5">
                    <span class="arrow las la-angle-down" ></span>
                </div>
            </div>
        </div> 
        <div class="bloccoMenu collapse" id="collapseExample3">
            <ul>
                <li class="item"><a href="{{ route('newRace',['codiceEvento'=> $eventDash->codiceEvento])}}">Aggiungi gara</a></li>
                <li class="item">Lista gare</li>
            </ul>
        </div>
    </div>
    <div class="asideBlocco">
        <div class="bloccoTitolo" data-bs-toggle="collapse" href="#collapseExample4"  aria-expanded="false" aria-controls="collapseExample4">                 
            <div class="row">
                <div class="col-md-7">
                    <span class="las la-ticket-alt"></span>
                    <span class="title">Prenota</span>
                </div>
                <div class="col-md-5">
                    <span class="arrow las la-angle-down" ></span>
                </div>
            </div>
        </div> 
        <div class="bloccoMenu collapse" id="collapseExample4">
            <ul>
                <li class="item"><a href="{{ route('reservationPilotList',['codiceEvento'=> $eventDash->codiceEvento])}}">Lista prenotati</a></li>
            </ul>
        </div>
    </div>
    <div class="asideBlocco">
        <div class="bloccoTitolo">
            <span class="las la-cog"></span>
            <span class="title"><a href="{{ route('impostazioniIndex') }}">Impostazioni</a> </span>
        </div> 
    </div>
</aside>