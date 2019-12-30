@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
                <div class="card">
        		<h5 class="card-header bg-orange">Wijzig gerecht.</h5>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post" action="{{ route('admin.consumables.update', $consumables->id) }}">
                     	    @method('PATCH')
                            @csrf

                            <div class="form-group row">
	                            <div class="col-md-6">
	                                <img class="w3-round" src="{{ asset('storage/' . $consumables->image) }}">
                                	<input type="file" name="image" value="{{ asset('storage/' . $consumables->image) }}">
	                            </div>
	                        </div>
                            <div class="form-group">
                                <label for="name">Naam</label>
                                <input type="text" class="form-control" name="title" value={{ $consumables->title }} />
                            </div>
                            <div class="form-group">
                                <label for="zipcode">Beschrijving</label>
                                <input type="text" class="form-control" name="description" value={{ $consumables->description }} />
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Prijs</label>
                                <input type="text" class="form-control" name="price" value={{ $consumables->price }} />
                            </div>

                            <div class="form-group">
                                <label for="category">Categorie</label>
                                <select type="text" class="form-control" name="category">
                                    <option value="1" @if($consumables->category == 1) selected @endif>Dranken</option>
                                    <option value="2" @if($consumables->category == 2) selected @endif>Bijgerecht</option>
                                    <option value="3" @if($consumables->category == 3) selected @endif>Hoofdgerecht</option>
                                </select>
                            </div>

                            <button type="submit" class="btn bg-orange">Update</button>
                        </form>
                    </div>
                </div>
		</div>
    </div>
</div>
@endsection