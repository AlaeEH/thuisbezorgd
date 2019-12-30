@extends('layouts.admin')


@section('content')
<body>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header bg-orange">{{ __('Registreer restaurant') }}</div>

	                <div class="card-body">
	                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.restaurants.store') }}">
	                        @csrf

							<div class="form-group row">
	                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Restaurants logo') }}</label>

	                            <div class="col-md-6">
                                	<input type="file" name="image">

	                                @error('image')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant naam') }}</label>

	                            <div class="col-md-6">
	                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

	                                @error('title')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant bescrhijving') }}</label>

	                            <div class="col-md-6">
	                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

	                                @error('description')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="delivery_time" class="col-md-4 col-form-label text-md-right">{{ __('Geschatte bezorgtijd in minuten') }}</label>

	                            <div class="col-md-6">
	                                <input id="delivery_time" min="0" max="45" type="number" class="form-control @error('delivery_time') is-invalid @enderror" name="delivery_time" value="{{ old('delivery_time') }}" required autocomplete="delivery_time" autofocus>

	                                @error('delivery_time')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label class="col-md-4 col-form-label text-md-right">{{ __('Openingstijden') }}</label>

	                            <div class="col-md-6">
	                            	Van:
	                                <input id="open_time" type="time" value="12:00" class="form-control @error('open_time') is-invalid @enderror" name="open_time" value="{{ old('open_time') }}" required autocomplete="open_time" autofocus>
	                                Tot:
	                                <input id="closed_time" type="time" value="22:00" class="form-control @error('closed_time') is-invalid @enderror" name="closed_time" value="{{ old('closed_time') }}" required autocomplete="closed_time" autofocus>

	                                @error('open_time')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror

	                                @error('closed_time')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Adres') }}</label>

	                            <div class="col-md-6">
	                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

	                                @error('address')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="zipcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

	                            <div class="col-md-6">
	                                <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ old('zipcode') }}" required autocomplete="zipcode" autofocus>

	                                @error('zipcode')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Stad') }}</label>

	                            <div class="col-md-6">

	                                <select id="city" type="city" class="form-control @error('city') is-invalid @enderror" name="city" required autocomplete="city">
	                                    <option value="1">Amsterdam</option>
	                                    <option value="2">Den Haag</option>
	                                    <option value="3">Rotterdam</option>
	                                    <option value="4">Utrecht</option>
	                                </select>

	                                @error('city')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Telefoonnummer') }}</label>

	                            <div class="col-md-6">
	                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

	                                @error('phone_number')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Adres') }}</label>

	                            <div class="col-md-6">
	                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

	                                @error('email')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row mb-0">
	                            <div class="col-md-6 offset-md-4">
	                                <button type="submit" class="btn bg-orange">
	                                    {{ __('Maak zakelijk account aan!') }}
	                                </button>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</body>
@endsection