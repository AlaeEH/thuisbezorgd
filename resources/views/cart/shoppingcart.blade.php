@extends('layouts.app')

@section('content')
</br>
	@if(session()->has('success'))
 		<div class="alert alert-success">{{ session()->get('success') }}</div>
	@endif	
<div class="container">
	<div class="row">
		<div class="col-sm-offset-2 col-sm-12">
		<div class="card">
			<div class="card-header bg-orange">Shoppingcart</div>

			<div class="card-body">
				@if(Session::has('cart'))
					<table class="table table-striped text-center">
						<thead>
							<tr>
								<th>Gerecht</th>
								<th>Hoeveelheid</th>
								<th>Prijs</th>
								<th>Actions</th>
							</tr>
						</thead>
						@foreach($consumables as $consumable)
							<tbody>
								<tr>
									<td>{{ $consumable['item']['title'] }}</td>
									<td>{{ $consumable['qty'] }}</td>
									<td>€{{ $consumable['price'] }}</td>
									<td>
										<a href="{{ route('reduce', ['id' => $consumable['item']['id']]) }}"><button type="button" class="btn btn-danger">-</button>
										&nbsp
										<a href="{{ route('addToCart', ['id' => $consumable['item']['id']]) }}"><button type="button" class="btn btn-danger">+</button></a>
										&nbsp
										<a href="{{ route('remove', ['id' => $consumable['item']['id']]) }}"><button type="button" class="btn btn-danger fas fa-trash-alt"></button></a>
									</td>
									
								</tr>
							</tbody>
						@endforeach
						<tfoot>
							<tr>
								<td class="border-top border-dark"><strong>Totaal prijs:</strong></td>
								<td class="border-top border-dark"></td>
								<td class="border-top border-dark"><strong>€{{ $totalPrice }}</strong></td>
								<td class="border-top border-dark"><a href="{{ route('checkout') }}" class="btn btn-success">Bestellen</a></td>
							</tr>
						</tfoot>
					</table>

				@else
					<div class="row">
						<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
							<h2>No Items in Cart!</h2>
						</div>
					</div>
				@endif
			</div>
		</div>	
		</div>
	</div>
</div>
@endsection