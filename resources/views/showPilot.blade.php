@extends('layouts.dashApp')

@section('content')
@include('layouts.aside')
<div class="dashCenter">
    <div class="row pt-2 ps-3 pe-3">
       
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif            
        </div>
    </div>
 
    <div class="row pt-2 ps-3 pe-3">
        <div class="col-md-12 ">
            <div class="boxFormInserimento ps-3 pe-3 py-3">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="wrapAvatar">
                            @if (!empty($pilot->img))
                                <img class="img-fluid" src="{{Storage::url($pilot->img)}}" alt="">
                            @else
                                <td><i class="las la-user" style="font-size: 35px"></i></td>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center py-3">{{ $pilot->nome }} {{ $pilot->cognome}}</h3>
                    </div>       
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="text-center">Campionati</h4>
                    </div>
                    <div class="col-md-4">
                        <h4 class="text-center">Categorie</h4>
                    </div>
                    <div class="col-md-4">
                        <h4 class="text-center">Teams</h4>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection