@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-sm-offset-8 col-sm-2">
    		<a class="btn bg-orange" href="{{ route('admin.consumables.create') }}">Voeg gerecht toe!</a>
    	</div>
        <div class="col-sm-offset-1 col-sm-12">
        	<div class="card">
			 	<div class="card-header bg-orange">
					Hoofdgerechten
			 	</div>

		        <div class="container">
				    <div class="row p-3 mb-2 bg-white">
				    	@foreach($restaurant->consumable as $consumable)
				    		@if($consumable->category == 3)
					        	<div class="col-sm-offset-2 col-sm-2">
					        		<img class="card-img-top" style="width: 9rem;" src="{{ asset('storage/' . $consumable->image) }}">
					        	</div>

								<div class="col-sm-7">
									<h4><strong>{{ $consumable->title }}</strong></h4>
									<p>{{ $consumable->description }}</p>
									</br>
									</br>
									<p><strong>Prijs per stuk: </strong> €{{ $consumable->price }}</p>
								</div>

								<div class="col-sm-offset-7 col-sm-3">
									<div class="col-sm-4">
									</div>
									<a class="btn bg-orange" href="{{ route('admin.consumables.edit', $consumable->id)}}">Aanpassen</a>
									<form action="{{ route('admin.consumables.destroy', $consumable->id) }}" method="POST">
					                    {{ csrf_field() }}
					                    
					      				<input type="hidden" name="_method" value="DELETE">
				                    	<button type="submit" class="btn btn-danger">Verwijderen <i class="fas fa-trash-alt"></i></button>
			                		</form>
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
				    	@foreach($restaurant->consumable as $consumable)
				    		@if($consumable->category == 2)
					        	<div class="col-sm-offset-2 col-sm-2">
					        		<img class="card-img-top" style="width: 9rem;" src="{{ asset('storage/' . $consumable->image) }}">
					        	</div>

								<div class="col-sm-7">
									<h4><strong>{{ $consumable->title }}</strong></h4>
									<p>{{ $consumable->description }}</p>
									</br>
									</br>
									<p><strong>Prijs per stuk: </strong> €{{ $consumable->price }}</p>
								</div>

								<div class="col-sm-offset-7 col-sm-3">
									<div class="col-sm-4">
										
									</div>
									<a class="btn bg-orange" href="{{ route('admin.consumables.edit', $consumable->id)}}">Aanpassen</a>
									<form action="{{ route('admin.consumables.destroy', $consumable->id) }}" method="POST">
					                    {{ csrf_field() }}
					                    
					      				<input type="hidden" name="_method" value="DELETE">
				                    <button type="submit" class="btn btn-danger">Verwijderen <i class="fas fa-trash-alt"></i></button>
			                	</form>
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
				    	@foreach($restaurant->consumable as $consumable)
				    		@if($consumable->category == 1)
					        	<div class="col-sm-offset-2 col-sm-2">
					        		<img class="card-img-top" style="width: 9rem;" src="{{ asset('storage/' . $consumable->image) }}">
					        	</div>

								<div class="col-sm-7">
									<h4><strong>{{ $consumable->title }}</strong></h4>
									<p>{{ $consumable->description }}</p>
									</br>
									</br>
									<p><strong>Prijs per stuk: </strong> €{{ $consumable->price }}</p>
								</div>

								<div class="col-sm-offset-7 col-sm-3">
									<div class="col-sm-4">
										
									</div>
									<a class="btn bg-orange" href="{{ route('admin.consumables.edit', $consumable->id)}}">Aanpassen</a>
									<form action="{{ route('admin.consumables.destroy', $consumable->id) }}" method="POST">
					                    {{ csrf_field() }}
					                    
					      				<input type="hidden" name="_method" value="DELETE">
				                    <button type="submit" class="btn btn-danger">Verwijderen <i class="fas fa-trash-alt"></i></button>
			                	</form>
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