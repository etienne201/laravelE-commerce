@extends('layouts.app')
@section('title', $product->name)

@section('custom_style')
<link rel="stylesheet" href="{{asset('css/details.css')}}">
@endsection

@section('content')
    <!-- Product Details -->
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                    @foreach ($product->photos as $key => $photo)
                
                    <div class="carousel-item @if($key == 0)active @endif "> 
                        <img class="myimage d-block w-100" src="{{asset($photo->url)}}" data-zoom-image="{{asset($photo->url)}}" alt="{{asset($photo->alt)}}"> 
                    </div>
                
                @endforeach
            </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                </div>
            </div>

            <!-- zoom -->
            <div class="col-md-3">
                <div class="mt-5 myresult"></div>
            </div>
            <!-- Product info section -->
            <div class="col-md-4 detail-sec ">
                <div class="row mt-5"></div>
                <div class="row ">
                    <h1>{{$product->name}}</h1>
                </div>
                <div class="row">
                <h1>{{$product->seller_price}}<span>FCFA</span></h1>
                    &nbsp; &nbsp;
                    <h1 class="mr-2"><del>799</del></h1>

                    <h1 class="text-success">30% off</h1>
                </div>
                <div class="row">
                    <h4><strong>Product Details</strong></h4>
                </div>
                <div class="">
                    <p><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i><span><strong>Brand:</strong></span>{{$product->marque}}</p>
                    <p><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i><span><strong>Colors:</strong></span> {{$product->colors}}</p>
                    <p><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i><span><strong>Storage:</strong></span> {{$product->rom}}</p>
                    <p><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i><span><strong>Ram:</strong></span> {{$product->ram}}</p>
                    <p><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i><span><strong>Front Camera:</strong></span> {{$product->camera_front}}</p>
                    <p><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i><span><strong>Back Camera:</strong></span> {{$product->camera_back}}</p>
                    <p><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i><span><strong>Battery</strong></span> 1000W</p>
                </div>


                <div class="row mt-4">
                    <div class="col-md-4 d-flex align-items-center p-0 m-0">
                        <button class="btn btn-primary btn-sm whatsapp"><i class="fa fa-whatsapp"></i> Message us</button>
                    </div>
                    <div class="col-md-4 p-0 m-0">
                        <button class="btn btn-primary btn-sm bg-primary"><i class="fa fa-facebook-square">&nbsp;</i>Message us</button>
                    </div>
                    <div class="col-md-4 p-0 m-0">
                        <button class="btn btn-primary btn-sm contact"><i class="fa fa-phone">&nbsp;</i>Contact us</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Related Products -->
    <div class="mt-5">

        <div class="bg-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="p-0 m-0">Parameters</h5>

                        <div class="row d-flex property align-items-center mt-3 m-0">
                            <div class="col-md-5">
                                Processors:
                            </div>
                            <div class="col-md-7">
                                <strong>{{$product->cpu}}</strong>
                            </div>
                        </div>

                        <div class="row d-flex property align-items-center mt-3 m-0">
                            <div class="col-md-5">
                                Status:
                            </div>
                            <div class="col-md-7">
                                <strong>{{$product->status}}</strong>
                            </div>
                        </div>

                        <div class="row d-flex property align-items-center mt-3 m-0">
                            <div class="col-md-5">
                                Manifacturer Country:
                            </div>
                            <div class="col-md-7">
                                <strong>{{$product->manufacturer_country}}</strong>
                            </div>
                        </div>

                        <div class="row d-flex property align-items-center mt-3 m-0">
                            <div class="col-md-5">
                                Operating System:
                            </div>
                            <div class="col-md-7">
                                <strong>{{$product->version_os}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Features</h5>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <p><span class="icon"><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i></span> Two thunderbults 3 ports</p>
                                <p><span class="icon"><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i></span> Four USB3 ports</p>
                                <p><span class="icon"><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i></span> HDMI 2.0 port</p>
                                <p><span class="icon"><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i></span> Display port 1.4 port</p>
                                <p><span class="icon"><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i></span> Connect via class</p>
                            </div>
                            <div class="col-md-6">
                                <p><span class="icon"><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i></span> Blackmagic eGPU Pro</p>
                                <p><span class="icon"><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i></span> Thunderbults 3 cable (0.5m)</p>
                                <p><span class="icon"><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i></span> Power Cable</p>
                                <p><span class="icon"><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i></span> Quick start guide</p>
                                <p><span class="icon"><i class="text-primary fa fa-check-square-o" aria-hidden="true"></i></span> Warranty card</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
<script src="{{asset('js/zoom.js')}}"></script>
@endsection