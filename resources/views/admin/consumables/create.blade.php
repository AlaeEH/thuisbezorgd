@extends('layouts.admin')

@section('content')
<body>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header bg-orange">	
	   				Gerecht toevoegen
	   				<a class="btn btn-primary" href="{{ route('admin.consumables.index', ['restaurant_id' => $restaurant_id]) }}">Terug naar het menu</a>
	                </div>

	                <div class="card-body">
	                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.consumables.store') }}">
	                        @csrf

                            <div class="form-group row">
	                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Gerecht foto') }}</label>

	                            <div class="col-md-6">
	                                <img class="foto" src="">
                                	<input type="file" name="image">

	                                @error('image')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Gerecht naam') }}</label>

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
	                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Beschrijving') }}</label>

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
	                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prijs per stuk') }}</label>

	                            <div class="col-md-6">
	                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

	                                @error('price')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Categorie') }}</label>

	                            <div class="col-md-6">

	                                <select id="category" type="category" class="form-control @error('category') is-invalid @enderror" name="category" required autocomplete="category">
	                                    <option value="1">Dranken</option>
	                                    <option value="2">Bijgerecht</option>
	                                    <option value="3">Hoofdgerecht</option>
	                                </select>

	                                @error('category')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div> 
	                        </div>

	                        <div class="form-group row mb-0">
	                            <div class="col-md-6 offset-md-4">
	                                <button type="submit" class="btn bg-orange">
	                                    {{ __('Voeg gerecht toe') }}
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
