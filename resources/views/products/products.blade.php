@extends('layouts.app')
@section('content')
     
    <div class="container p-5">
	@if (Session::has('success'))
	<div class="alert alert-success">
		<div>
			<p>{{ Session::get('success') }}</p>
		</div>
	</div>
	@endif

	{!! Form::open(array('route' => 'product.store', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('p_id', 'P_id:') !!}
			{!! Form::text('p_id') !!}
		</li>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('marque', 'Marque:') !!}
			{!! Form::text('marque') !!}
		</li>
		<li>
			{!! Form::label('ram', 'Ram:') !!}
			{!! Form::text('ram') !!}
		</li>
		<li>
			{!! Form::label('rom', 'Rom:') !!}
			{!! Form::text('rom') !!}
		</li>
		<li>
			{!! Form::label('cpu', 'Cpu:') !!}
			{!! Form::text('cpu') !!}
		</li>
		<li>
			{!! Form::label('camera_front', 'Camera_front:') !!}
			{!! Form::text('camera_front') !!}
		</li>
		<li>
			{!! Form::label('camera_back', 'Camera_back:') !!}
			{!! Form::text('camera_back') !!}
		</li>
		<li>
			{!! Form::label('version_os', 'Version_os:') !!}
			{!! Form::text('version_os') !!}
		</li>
		<li>
			{!! Form::label('status', 'Status:') !!}
			{!! Form::text('status') !!}
		</li>
		<li>
			{!! Form::label('manufacturer_country', 'Manufacturer_country:') !!}
			{!! Form::text('manufacturer_country') !!}
		</li>
		<li>
			{!! Form::label('description', 'Description:') !!}
			{!! Form::textarea('description') !!}
		</li>
		<li>
			{!! Form::label('guaranty', 'Guaranty:') !!}
			{!! Form::text('guaranty') !!}
		</li>
		<li>
			{!! Form::label('supplier_price', 'Supplier Price:') !!}
			{!! Form::text('supplier_price') !!}
		</li>
		<li>
			{!! Form::label('seller_price', 'Seller Price:') !!}
			{!! Form::text('seller_price') !!}
		</li>
		<li>
			{!! Form::label('colors', 'Colors:') !!}
			{!! Form::text('colors') !!}
		</li>
		<li>
			{!! Form::label('refurbished_status', 'Refurbished_status:') !!}
			{!! Form::text('refurbished_status') !!}
		</li>
		<input id="input_ids" type="hidden" name="image_ids" value="">
		<div class="my-3">
			<button id="add-photos" class="btn btn-success" type="button">
				Add Photos
			</button>
		</div>
		<div class="thumbnails"></div>

		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
	{!! Form::close() !!}
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body p-4">
				<div class="row">
					<select id="inserImages" multiple="multiple" data-limit='4' class="image-picker" id="images"></select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" id="save_images" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom_script')
<script type="text/javascript" src="{{asset('js/admin/image-picker.min.js')}}"></script>
<script>
	jQuery(function($){

    $('#save_images').on('click', function(){
			let images_id = "";
			let images_url = [];
			$("*[multiple=multiple]").find("option:selected").each(function(index, item){
				images_id += $(item).attr("value")+" ";
				images_url.push($(item).attr("data-img-src"));
			});
			$('#input_ids').val(images_id);

			let images_dom = ``;
			images_url.forEach(url => {
				images_dom += `<img src="${url}" alt="" height="40" style="margin: 20px; 20px 0">`;
			});
			$('.thumbnails').append(images_dom);
			
			$('#exampleModal').modal('hide');
		});

		$('#add-photos').on('click', function(){
			let el = $('#inserImages').empty();
			$.ajax({
				type: 'GET',
				url: "{{route('images')}}",
				data: {},
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				success: function(data){
					let el = $('#inserImages');
					data.forEach(element => {
						el.append($(`<option data-img-src="{{ asset('${element.url}') }}" data-img-class="responsive" value="${element.id}"></option>`));
					});
					el.imagepicker();
					
				},
				error: function(XMLHttpRequest) {
                	console.log('Something Went Wrong !');
            	}
			});
			$('#exampleModal').modal('show');
			
		})
    });
</script>
@endsection