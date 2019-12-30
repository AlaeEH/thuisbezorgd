@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-12">
        	<table class="table table-hover table-responsive">
        		<tr>
        			<th>ID</th>
        			<th>Naam</th>
        			<th>Adres</th>
        			<th>Postcode</th>
        			<th>Telefoonnummer</th>
        			<th>Bedrijfsnaam</th>
        			<th>Bestelling afgeleverd om</th>
					<th>Besteld om</th>
					<th>Actie</th>
        		</tr>			        		
				
	        	@foreach($orders as $order)
	        		@if($order->user_id == $user->id)
	        		{{-- {{dd($order->id)}} --}}
			        	<tr>
			        		<td>{{ $order->id }}</td>
			        		<td>{{ $order->name }}</td>
			        		<td>{{ $order->address }}</td>
			        		<td>{{ $order->zipcode }}</td>
			        		<td>{{ $order->phone_number }}</td>
			        		<td>
			        			@if($order->company_name == null)
			        				Geen bedrijfsnaam
			        			@else
			        				{{ $order->company_name }}
		        				@endif
			        		</td>
			        		<td>{{ $order->delivery_time }}</td>
			        		<td>{{ $order->created_at }}</td>
			        		{{-- {{dd($order->id)}} --}}
			        		<td><a class="btn bg-orange" href="{{ route('admin.invoice', ['user_id' => $user->id, 'order_id' => $order->id])}}">Factuur bekijken</a></td>
			        	</tr>
		        	@endif
	        	@endforeach
        	</table>
        </div>
    </div>
</div>
@endsection