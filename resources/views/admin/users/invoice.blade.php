@extends('layouts.admin')

@section('content')
<div class="container">
	{{-- {{dd($user)}} --}}
	<a class="btn bg-orange" href="{{ route('admin.adminBesteldata', $user->id) }}">Terug</a>
	<div id="invoice">
	    <div class="invoice overflow-hidden">
	        <div style="min-width: 600px">
	            <header>
	                <div class="row">
	                    <div class="col">
	                        <a target="_blank">
	                            <img src="https://www.thuisbezorgd.nl/blog/wp-content/uploads/2016/01/House-Logo-Gmail.png" data-holder-rendered="true" />
	                            </a>
	                    </div>
	                    <div class="col company-details">
	                        <h2 class="name">
	                            <a target="_blank">
	                            	Thuisbezorgd
	                            </a>
	                        </h2>
	                        <div>Haarlemmerweg 34, 1028NA, Amsterdam</div>
	                        <div>+31 6 2189431</div>
	                        <div>thuisbezorgd@info.com</div>
	                    </div>
	                </div>
	            </header>
	            <main>
	                <div class="row contacts">
	                    <div class="col invoice-to">
	                    	{{-- {{dd($user)}} --}}
	                        <div class="text-gray-light">Factuur voor:</div>
	                        <h2 class="to">{{ $user->name }}</h2>
	                        <div class="address">
	                        	{{ $user->address }},
	                        	{{ $user->zipcode }}, 
	                        	@if($user->city == 1 ) Amsterdam @else @endif
	                        	@if($user->city == 2 ) Den Haag @else @endif
	                        	@if($user->city == 3 ) Utrecht @else @endif
	                        	@if($user->city == 4 ) Rotterdam @else @endif
	                        </div>
	                        <div class="email">{{ $user->email }}</div>
	                    </div>
	                    <div class="col invoice-details">
		                        <h1 class="invoice-id">Factuur {{ $orders->id}}</h1>
		                        <div class="date">Factuur aangemaakt op: {{ $orders->created_at}}</div>
	                    </div>
	                </div>
	            </br>
	                <table class="table table-striped" border="0" cellspacing="0" cellpadding="0">
	                    <thead>
	                        <tr>
	                            <th>BESCHRIJVING</th>
	                            <th>AANTAL</th>
	                            <th>PRIJS PER STUK</th>
	                            <th>TOTAAL</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach($cart->items as $item)
		        				<tr>
		                            <td>
		                            	<h3>
		                                	{{ $item['item']->title }}
		                                </h3>
		                            </td>
		                            <td>{{ $item['qty'] }}</td>
		                            <td>€{{ $item['item']->price }}</td>
		                            <td>€{{ $item['qty'] * $item['price'] }}</td>
		                        </tr>
		        			@endforeach
	                    </tbody>	
	                    <tfoot>
	                        <td><strong><h4>Totaal</h4></strong></td>
	                        <td></td>
	                        <td></td>
                            <td colspan="4">€{{ $cart->totalPrice }}</td>
	                    </tfoot>
	                </table>
	            </main>
	        	</br>
	            <footer>
	                <small>Dit is een automatisch gegenereerde factuur en is daarom niet ondertekend*</small>
	            </footer>
	        </div>
	    </div>
	</div>
</div>
@endsection