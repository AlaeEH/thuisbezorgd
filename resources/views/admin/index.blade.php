@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-11">
        	HALLO ADMIN
        	<a class="btn bg-orange" href="{{ route('admin.users.index') }}">Alle users bekijken</a>
        	<a class="btn bg-orange" href="{{ route('admin.restaurants.index') }}">Alle restaurants bekijken</a>
        </div>
    </div>
</div>
@endsection