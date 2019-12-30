@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-12">
        	
        	<div class="card">
			 	<div class="card-header bg-orange">
					Hoofdgerechten
			 	</div>

		        <div class="container">
				    <div class="row p-3 mb-2 bg-white">
				    	@foreach($restaurants->consumable as $consumable)
				    		@if($consumable->category == 3)
					        	<div class="col-sm-offset-2 col-sm-2">
					        		<img class="card-img-top" style="width: 9rem;" src="{{ asset('storage/' . $consumable->image) }}">
					        	</div>

								<div class="col-sm-7">
									<h4><strong>{{ $consumable->title }}</strong></h4>
									<p>{{ $consumable->description }}</p>
									</br>
									</br>
									<p><strong>Prijs per stuk: </strong> {{ $consumable->price }}</p>
								</div>

								<div class="col-sm-offset-7 col-sm-3">
									<div class="col-sm-4">
										{{-- <input id="delivery_time" min="0" type="number" class="form-control @error('delivery_time') is-invalid @enderror" name="delivery_time" value="{{ old('') }}" required autocomplete="delivery_time" autofocus> --}}
									</div>
									<a class="btn bg-orange" href="{{ route('addToCart', $consumable->id) }}">Voeg toe aan winkelmand</a>
								</div>
							@endif
						@endforeach
				    </div>
				</div>
			</div>
			</br>
			<div class="card">
			 	<div class="card-header bg-orange">
					Bijgerechten
			 	</div>

		        <div class="container">
				    <div class="row p-3 mb-2 bg-white">
				    	@foreach($restaurants->consumable as $consumable)
				    		@if($consumable->category == 2)
					        	<div class="col-sm-offset-2 col-sm-2">
					        		<img class="card-img-top" style="width: 9rem;" src="{{ asset('storage/' . $consumable->image) }}">
					        	</div>

								<div class="col-sm-7">
									<h4><strong>{{ $consumable->title }}</strong></h4>
									<p>{{ $consumable->description }}</p>
									</br>
									</br>
									<p><strong>Prijs per stuk: </strong> {{ $consumable->price }}</p>
								</div>

								<div class="col-sm-offset-7 col-sm-3">
									<div class="col-sm-4">
										{{-- <input id="delivery_time" min="0" type="number" class="form-control @error('delivery_time') is-invalid @enderror" name="delivery_time" value="{{ old('') }}" required autocomplete="delivery_time" autofocus> --}}
									</div>
									<a class="btn bg-orange" href="{{ route('addToCart', $consumable->id) }}">Voeg toe aan winkelmand</a>
								</div>
							@endif
						@endforeach
				    </div>
				</div>
			</div>
			</br>
			<div class="card">
			 	<div class="card-header bg-orange">
					Drinken
			 	</div>

		        <div class="container">
				    <div class="row p-3 mb-2 bg-white">
				    	@foreach($restaurants->consumable as $consumable)
				    		@if($consumable->category == 1)
					        	<div class="col-sm-offset-2 col-sm-2">
					        		<img class="card-img-top" style="width: 9rem;" src="{{ asset('storage/' . $consumable->image) }}">
					        	</div>

								<div class="col-sm-7">
									<h4><strong>{{ $consumable->title }}</strong></h4>
									<p>{{ $consumable->description }}</p>
									</br>
									</br>
									<p><strong>Prijs per stuk: </strong> {{ $consumable->price }}</p>
								</div>

								<div class="col-sm-offset-7 col-sm-3">
									<div class="col-sm-4">
										{{-- <input id="delivery_time" min="0" type="number" class="form-control @error('delivery_time') is-invalid @enderror" name="delivery_time" value="{{ old('') }}" required autocomplete="delivery_time" autofocus> --}}
									</div>
									<a class="btn bg-orange" href="{{ route('addToCart', $consumable->id) }}">Voeg toe aan winkelmand</a>
								</div>
							@endif
						@endforeach
				    </div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection