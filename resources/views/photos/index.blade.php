@extends('layouts.app')
@section('content')
<div class="container p-5">
    <div class="row">
        @foreach ($images as $p)
        <div class="col-md-3">
            <div class="card">
            <img src="{{asset($p->url)}}" alt="{{$p->alt}}" class="card-img-top">
                <div class="card-body border-top">
                    <div class="card-title">
                        {{$p->product_name}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection