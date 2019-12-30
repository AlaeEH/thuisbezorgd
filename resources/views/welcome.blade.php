@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-11">
        	<div class="md-form active-pink active-pink-2 mb-3 mt-0">
		 		<form action="{{ route('restaurants.index') }}" method="get">
		 			<div class="input-group">
		 				<input type="search" name="search" class="form-control">
		 				<span class="input-group-prepend">
		 					<button type="submit" class="btn bg-orange">Search</button>
		 				</span>
		 			</div>
		 		</form>
			</div>
	 		@foreach($restaurants as $restaurant)
		        <div class="container">
				    <div class="row border rounded p-3 mb-2 bg-white">
			        	<div class="col-sm-offset-2 col-sm-2">
			        		<img class="card-img-top" style="width: 9rem;" src="{{ asset('storage/' . $restaurant->image) }}">
			        	</div>

						<div class="col-sm-7">
							<h4><strong>{{ $restaurant->title }}</strong></h4>
							<p>{{ $restaurant->description }}</p>
							<p><strong>Bezorgtijd: </strong> ca. {{ $restaurant->delivery_time }}min</p>
							@if($currentTime >= $restaurant->open_time && $currentTime <= $restaurant->closed_time)
								<p class="text-success">Open</p>
							@else
								<p class="text-danger">Gesloten</p>
							@endif
						</div>

						<div class="col-sm-offset-7 col-sm-3">	
							@if($currentTime >= $restaurant->open_time && $currentTime <= $restaurant->closed_time)
								<a class="btn bg-orange" href="{{ route('restaurants.show', $restaurant->id) }}">Bestel</a>
							@else
								<p>Oh snap, je bent net telaat! Maar wees niet getreurd. Het restaurant is morgen weer geopend vanaf: {{ $restaurant->open_time }} </p>
								<a class="btn bg-orange disabled" href="{{ route('restaurants.show', $restaurant->id) }}">Bestel</a> 
							@endif
							
							@if($restaurant->user_id == Auth::id())
								<a class="btn bg-orange" href="{{ route('consumables.index', ['restaurant_id' => $restaurant->id]) }}">menu items</a>
							@endif
						</div>
				    </div>
				</div>
				</br>
	 		@endforeach
        </div>
    </div>
</div>
@endsection