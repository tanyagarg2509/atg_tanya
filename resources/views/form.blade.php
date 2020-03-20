@extends('layout')

@section('headerlinks')
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	   
	   <meta name="csrf-token" content="{{ csrf_token() }}">
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection

@section('content')

	<div class="container">
		  <h2>ATG Form</h2>
		  <!-- <form method="POST" action="/form"> -->
		  <form id="myForm">
		  	@csrf
		  	<!-- @if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif -->
			<!-- @isset($success) -->
   				<!-- <div class="alert alert-success">
					  <strong>Success!</strong>.
					  <br>
					  @if(session('message'))
					  	<strong>{{ session('message') }}</strong>
					  @endif
				</div> -->
			<!-- @endisset -->
			  		
				<div class="alert alert-success" style="display:none"></div>
				<div class="alert alert-danger" id="dalert" style="display:none"></div>
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
			    
			    <button type="submit" id="ajaxSubmit" class="btn btn-default">Submit</button>
		  </form>
	</div>

<script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>
<script>
         jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });jQuery.ajax({
                  url: "{{ url('http://atg-tanya.herokuapp.com/form') }}",
                  method: 'post',

                  data: {

                     name: jQuery('#name').val(),
                     email: jQuery('#email').val(),
                     pin: jQuery('#pin').val()
                  },
                  success: function(result){
                  	// console.log(result);
		             jQuery('.alert').show();
		             $('#dalert').hide();
		             jQuery('.alert').html(result.success);
                    // console.log(result);
                  },
                  error: function(data){
         			    var errors = data.responseJSON;
		                console.log(errors);
						errorsHtml = '<ul>';

		                 $.each( errors.errors, function(key,value ) {
		                      errorsHtml += '<li>'+ value + '</li>'; //showing only the first error.
		                 });
		                 errorsHtml += '</ul>';
		    		
		    			console.log(errorsHtml);
		    			jQuery('.alert').hide();
		                 $('#dalert').show();
		               	 $( '#dalert' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form  
		                }
           			
              });
               });
            });
</script>
@endsection

