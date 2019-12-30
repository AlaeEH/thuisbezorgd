@extends('layouts.app')

@section('content')
{{-- <img src="{{ url('storage/banner.jpg')}}" style="width: 80%;"> --}}
<div class="container">

    <div class="row">
    	{{-- @if(Auth::user()->hasMany('App\Restaurant'))

    		LOOOLL
    	@else
	        <div class="col-sm-offset-3 col-sm-4"><p>Thuisbezorgd.nl Zakelijk is speciaal ontwikkeld voor (middel-)grote BV's, NV's en overheidsinstellingen die hun medewerkers op rekening van het bedrijf eten willen laten bestellen. Heel handig als er bijvoorbeeld overgewerkt moet worden. Met een Thuisbezorgd.nl Zakelijk account kan vooraf worden betaald door een krediet te storten op het account of achteraf onder bepaalde voorwaarden via maandelijkse facturatie.</p></div>
	        <div class="col-sm-4"><p>Op rekening van je baas bestellen bij Thuisbezorgd.nl? Dat kan! Meld je baas aan voor Thuisbezorgd.nl Zakelijk en je kunt voortaan bij alle restaurants met het Thuisbezorgd.nl Zakelijk-logo bestellingen plaatsen op kosten van de zaak. Klik hier om je kosteloos aan te melden bij Thuisbezorgd.nl Zakelijk, om je werknemers maaltijden aan te kunnen bieden tijdens bijvoorbeeld overwerk. Aan het goedkeuringsproces zijn voorwaarden verbonden.</p></div>
        @endif --}}
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-4"><a class="btn btn-warning" href="{{ route('restaurants.create') }}">Zakelijk account aanmelden!</a></div>
    </div>
</div>

@endsection