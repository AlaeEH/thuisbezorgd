@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-offset-2 col-sm-12">
			<div class="card">
				<div class="card-header bg-orange">Bestelgeschiedenis</div>
				<div class="card-body">
					<h2>Uw afgelopen bestellingen</h2>
					@foreach($orders as $order)
					    <div class="">
					        <table class="table bg-light table-striped custab">
					            <thead>
					                <tr>
					                    <th>Gerecht</th>
					                    <th>Aantal</th>
					                    <th>Restaurant</th>
					                    <th>Adres</th>
					                    <th>Postcode</th>
					                    <th>Prijs per stuk</th>
					                </tr>
					            </thead>
					            @foreach($order->cart->items as $item)
					                <tr>
					                    {{-- {{dd($order)}} --}}
					                    <td>{{$item['item']->title }}</td>
					                    <td>{{$item['qty']}}</td>
					                    <td>{{$order->restaurant_id}}</td>
					                    <td>{{$order->address }}</td>
					                    <td>{{$order->zipcode }}</td>
					                    <td>€{{$item['item']->price }}</td>
					                </tr>
					            @endforeach
					                <tfoot>
					                    <tr>
					                        <td><strong>Totaal prijs</strong></td>
					                        <td class="border-top border-dark"></td>
					                        <td class="border-top border-dark"></td>
					                        <td class="border-top border-dark"></td>
					                        <td class="border-top border-dark"></td>
					                        <td class="border-top border-dark"><strong>€{{$order->cart->totalPrice }}</strong></td>
					                    </tr>
					                </tfoot>
					        </table>
        			@endforeach
					
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection