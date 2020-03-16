@extends('layout')

@section('headerlinks')
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection

@section('content')

	<div class="container">
		  <h2>ATG Form</h2>
		  <form method="POST" action="/form">
		  	@csrf
		  	@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			@isset($success)
   				<div class="alert alert-success">
					  <strong>Success!</strong>.
					</div>
			@endisset
			  		

		  		<div class="form-group">
			      <label for="name">Name:</label>
			      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value={{ old('name')}}>
			     	@if ($errors->has('name'))
				     		 <p class="text-danger font-weight-bold">{{ $errors->first('name') }}</p>
			      	@endif
			      <!-- value=$projects->name -->
			    </div>
			    <div class="form-group">
			      <label for="email">Email:</label>
			      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value={{ old('email')}}>
			      @if ($errors->has('email'))
				     		 <p class="text-danger font-weight-bold">{{ $errors->first('email') }}</p>
			      	@endif
			    </div>
			    <div class="form-group">
			      <label for="pin">Pincode:</label>
			      <input type="number" class="form-control" id="pin" placeholder="Enter pincode" name="pin" value={{ old('pin')}}>
			      @if ($errors->has('pin'))
				     		 <p class="text-danger font-weight-bold">{{ $errors->first('pin') }}</p>
			      	@endif
			    </div>
			    
			    <button type="submit" class="btn btn-default">Submit</button>
		  </form>
	</div>


@endsection