@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-12">
            <div class="card">
                <div class="card-header bg-orange">Afrekenen</div>
                @if (!empty($fail))
                    <h1 class="bg-danger">{{$fail}}</h1>
                @endif

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif

                <div class="card-body">
                    <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                        <h2>Waar wil je dat je bestelling bezorgd wordt?</h2>
                        <div class="form-group">
                            <label for="address">Straatnaam en huisnummer *</label>
                            <input type="text" class="form-control" required name="address" value="{{$user->address}}">    
                        </div>
                        <div class="form-group">
                            <label for="zipcode">Postcode *</label>
                            <input type="text" class="form-control" required name="zipcode" value="{{$user->zipcode}}">
                        </div>

                        <h2>Hoe ben je te bereiken?</h2>
                        <div class="form-group">
                            <label for="name">Naam *</label>
                            <input type="text" class="form-control" required name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Telefoonnummer *</label>
                            <input type="text" class="form-control" required name="phone_number" value="{{$user->phone_number}}">    
                        </div>
                        <div class="form-group">
                            <label for="email">E-mailadres *</label>
                            <input type="text" class="form-control" required name="email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="company_name">Bedrijfsnaam</label>
                            <input type="text" class="form-control" name="company_name">
                        </div>
                        
                        <h2>Hoe laat wil je het eten ontvangen?</h2>
                        <div class="form-group">
                            <label for="delivery_time">Bezorgtijd *</label>
                            <input id="delivery_time" type="time" min="{{ $currentTime }}" class="form-control" name="delivery_time" value="{{ $currentTime }}" required autocomplete="delivery_time" autofocus>
                        </div>
                        
                        <h4 name="price">Totaal Prijs: €{{ $total }}</h4>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success">Reken af!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/checkout.js') }}"></script>

@endsection