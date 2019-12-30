@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="card">
                    <h5 class="card-header bg-orange">Account van {{ $user->name }}</h5>
                    <div class="card-body">
                        <h5 class="card-title">Wijzig account gegevens.</h5>

                        <form enctype="multipart/form-data" method="post" action="{{ route('admin.users.update', $user->id) }}">
                     	    @method('PATCH')
                            @csrf

                            <div class="form-group">
                                <label for="name">Naam:</label>
                                <input type="text" class="form-control" name="name" value={{ $user->name }} />
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" value={{ $user->email }} />
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" name="address" value={{ $user->address }} />
                            </div>
                            <div class="form-group">
                                <label for="zipcode">Zipcode:</label>
                                <input type="text" class="form-control" name="zipcode" value={{ $user->zipcode }} />
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Telefoonnummer:</label>
                                <input type="text" class="form-control" name="phone_number" value={{ $user->phone_number }} />
                            </div>

                            <div class="form-group">
                                <label for="city">Stad:</label>
                                <select type="text" class="form-control" name="city">
                                    <option value="1" @if($user->city == 1) selected @endif>Amsterdam</option>
                                    <option value="2" @if($user->city == 2) selected @endif>Den Haag</option>
                                    <option value="3" @if($user->city == 3) selected @endif>Rotterdam</option>
                                    <option value="4" @if($user->city == 4) selected @endif>Utrecht</option>
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