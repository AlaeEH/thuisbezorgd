@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-16">
        	<table class="table table-hover table-responsive">
        		<a class="btn bg-orange" href="{{ route('admin.restaurants.create') }}">Voeg restaurant toe</a>
			  	<thead>
				    <tr>
						<th>ID</th>
						<th>Eigenaar</th>
	        			<th>Restaurant logo</th>
	        			<th>Naam</th>
	        			<th>Adres</th>
	        			<th>Postcode</th>
	        			<th>Openingstijden</th>
	        			<th>Telefoonnummer</th>
	        			<th>Aangemaakt op</th>
	        			<th>Acties</th>
	        			<th>Acties</th>
	        			<th>Acties</th>
						{{-- <th><a class="btn bg-orange" href="#">Gebruiker toevoegen</a></th> --}}
				    </tr>
			  	</thead>
			 	<tbody>
			    	@foreach($restaurants as $restaurant)
			        	<tr>
			        		<td>{{ $restaurant->id }}</td>
			        		<td>{{ $restaurant->user_id }}</td>
			        		<td><img style="width: 6rem;" src="{{ asset('storage/' . $restaurant->image) }}"></img></td>
			        		<td>{{ $restaurant->title }}</td>
			        		<td>{{ $restaurant->address }}</td>
			        		<td>{{ $restaurant->zipcode }}</td>
			        		<td>{{ $restaurant->open_time }} - {{ $restaurant->closed_time }}</td>
			        		<td>{{ $restaurant->phone_number }}</td>
			        		<td>{{ $restaurant->created_at }}</td>
			        		
			        		<td>
			        			<a class="btn bg-orange" href="{{ url('admin/restaurants/'.$restaurant->id.'/edit') }}">Aanpassen <i class="fas fa-pen-alt"></i></a>
		        			</td>
		        			<td>
			        			<a class="btn bg-orange" href="{{ url('admin/restaurants/'.$restaurant->id.'/consumables') }}">Menukaart <i class="fas fa-hamburger"></i></i></a>
		        			</td>
		        			<td>
		        				<form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST">
				                    {{ csrf_field() }}
				                    
				      				<input type="hidden" name="_method" value="DELETE">
				                    <button type="submit" class="btn btn-danger">Verwijderen <i class="fas fa-trash-alt"></i></button>
			                	</form>
			        		</td> 
			        	</tr>
	        		@endforeach
				</tbody>

			</table>
		</div>
    </div>
</div>
@endsection