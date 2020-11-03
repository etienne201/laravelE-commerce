@extends('layouts.app')
@section('content')
@if (Session::has('errors'))
		<div class="alert alert-danger">
			<div>
				@foreach ($errors->all() as $error)
				<p>{{ $error }}</p>
				@endforeach
			</div>
		</div>
	@endif
	@if (Session::has('success'))
	<div class="alert alert-success">
		<div>
			<p>{{ Session::get('success') }}</p>
		</div>
	</div>
	@endif

	<div class="container">
<div class="col-md-8 col-md-offset-2">
	<form method="POST" action="{{ url('photos') }}"  enctype="multipart-/frmodata ">

  
                {{ csrf_field() }}
				<div class="form-group">
                <label>Name:</label>
                <input type="text" name="product_name" class="form-control" placeholder="Name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
			<div class="form-group">
                <label>Color:</label>
                <input type="color" name="color" class="form-control" placeholder="Colors">
                @if ($errors->has('color'))
                    <span class="text-danger">{{ $errors->first('color') }}</span>
                @endif
            </div>
			<div class="form-group">
                <label>Alternative Text:</label>
                <input type="alt" name="alt" class="form-control" placeholder="Alternative Text">
                @if ($errors->has('alt'))
                    <span class="text-danger">{{ $errors->first('alt') }}</span>
                @endif
            </div>
			 
			<div class="form-group">
           <label for="exampleFormControlFile1"> fileimages</label>
           <input type="file" class="form-control-file" name="url">
                 </div>
	         <button type="submit" class="btn btn-info">Submit</button>
        </form>
	</div>
	</div>
@endsection

 
 