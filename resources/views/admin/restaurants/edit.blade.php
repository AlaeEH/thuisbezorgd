@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="card">
                    <h5 class="card-header bg-orange">Wijzig restaurant gegevens.</h5>
                    <div class="card-body">

                        <form enctype="multipart/form-data" method="post" action="{{ route('admin.restaurants.update', $restaurants->id) }}">
                     	    @method('PATCH')
                            @csrf

                            {{-- <div class="form-group">
                                <img class="foto" src="{{ asset('storage/' . $restaurants->image) }}">
                                <input type="file" name="image" accept="image/*">
                            </div> --}}
                            <div class="form-group">
                                <label for="name">Naam</label>
                                <input type="text" class="form-control" name="title" value={{ $restaurants->title }} />
                            </div>
                            <div class="form-group">
                                <label for="description">Beschrijving</label>
                                <input type="text" class="form-control" name="description" value={{ $restaurants->description }} />
                            </div>
                            <div class="form-group">
                                <label for="delivery_time">Bezorgtijd:</label>
                                <input min="0" max="45" type="number" class="form-control" name="delivery_time" value={{ $restaurants->delivery_time }} />
                            </div>
                            <div class="form-group">
                                <label for="open_time">Openingstijd:</label>
                                <input type="time" class="form-control" name="open_time" value={{ $restaurants->open_time }} />
                            </div>
                            <div class="form-group">
                                <label for="closed_time">Sluitingstijd:</label>
                                <input type="time" class="form-control" name="closed_time" value={{ $restaurants->closed_time }} />
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" value={{ $restaurants->email }} />
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" name="address" value={{ $restaurants->address }} />
                            </div>
                            <div class="form-group">
                                <label for="zipcode">Zipcode:</label>
                                <input type="text" class="form-control" name="zipcode" value={{ $restaurants->zipcode }} />
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Telefoonnummer:</label>
                                <input type="text" class="form-control" name="phone_number" value={{ $restaurants->phone_number }} />
                            </div>

                            <div class="form-group">
                                <label for="city">Stad:</label>
                                <select type="text" class="form-control" name="city">
                                    <option value="1" @if($restaurants->city == 1) selected @endif>Amsterdam</option>
                                    <option value="2" @if($restaurants->city == 2) selected @endif>Den Haag</option>
                                    <option value="3" @if($restaurants->city == 3) selected @endif>Rotterdam</option>
                                    <option value="4" @if($restaurants->city == 4) selected @endif>Utrecht</option>
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