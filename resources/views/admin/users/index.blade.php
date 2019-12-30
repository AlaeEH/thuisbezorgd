@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-16">
        	<table class="table table-hover table-responsive">
        		<thead><a class="btn bg-orange" href="{{ route('admin.users.create')}}">Gebruiker toevoegen</a></thead>
        		<tr>
        			<th>ID</th>
        			<th>Naam</th>
        			<th>Admin</th>
        			<th>Adres</th>
        			<th>Postcode</th>
        			<th>Stad</th>
        			<th>Telefoonnummer</th>
        			<th>E-mail</th>
        			<th>Aangemaakt op</th>
					<th>Acties</th>
					<th>Acties</th>
					<th>Acties</th>
        		</tr>
	        	@foreach($user as $user)
		        	<tr>
		        		<td>{{ $user->id }}</td>
		        		<td>{{ $user->name }}</td>
		        		<td>
		        			@if($user->is_admin === 1)
		        				ja
		        			@else
		        				nee
		        			@endif
		        		</td>
		        		<td>{{ $user->address }}</td>
		        		<td>{{ $user->zipcode }}</td>
		        		<td>
		        			@if($user->city == 1) Amsterdam @endif
		        			@if($user->city == 2) Den Haag @endif
		        			@if($user->city == 3) Rotterdam @endif
		        			@if($user->city == 4) Utrecht @endif
                        </td>
		        		<td>{{ $user->phone_number }}</td>
		        		<td>{{ $user->email }}</td>
		        		<td>{{ $user->created_at }}</td>
		        		<td><a class="btn bg-orange" href="{{ url('admin/users/'.$user->id.'/edit') }}">Aanpassen <i class="fas fa-pen-alt"></i></a></td>
		        		<td><a class="btn bg-orange" href="{{ url('admin/users/'.$user->id.'/besteldata') }}">Besteldata <i class="fas fa-history"></i></a></td>
		        		<td>
		        			<form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
			                    {{ csrf_field() }}
			                    
			      				<input type="hidden" name="_method" value="DELETE">
			                    <button type="submit" class="btn btn-danger">Verwijderen <i class="fas fa-trash-alt"></i></button>
		                	</form>
		            	</td>

		        	</tr>
	        	@endforeach
        	</table>
        </div>
    </div>
</div>
@endsection