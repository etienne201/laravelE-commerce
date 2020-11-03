@extends('layouts.dashboard')

@section('title','Add new product')
@section('custom_styles')
    <link href="{{asset('css/admin/image-picker.css')}}" rel="stylesheet">
    <style>
        .save_product {
            text-transform: lowercase;
        }
        .save_product::first-letter {
            text-transform: capitalize;
        }
        .group_title {
            font-family: Roboto,-apple-system,system-ui,BlinkMacSystemFont,Segoe UI,Oxygen,Ubuntu,Cantarell,Droid Sans,Helvetica Neue,Arial,sans-serif;
            line-height: 1.5;
            letter-spacing: .5px;
            font-size: .875rem;
            font-weight: 500;
        }
        .hide_created_updated_at {
            display: none !important;
        }
        .date-at {
            display: flex;
            flex-direction: row;
        }
        .date-at, .date-at h6 {
            font-size: .8rem;
            letter-spacing: .5px;
            font-style: oblique;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        {{-- <h4 class="c-grey-900 mT-10 mB-30">View all products</h4> --}}
        <div class="row">

        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">{{ Request::is('products/create') ? 'Add new product' : '' }} </h4>
                    <form class="border border-light px-3" method="POST" action="{{ route('products.store') }}">
                        {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-8">
                                    <div class="md-form">
                                        {{-- is-valid is-invalid--}}
                                        <input type="text" id="productName" name="product_name" class="form-control" required>
                                        <label for="productName">Product name </label>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="md-form">
                                        {{-- is-valid is-invalid--}}
                                        <label for="materialLoginFormEmail">{{__("Product description * (max. 300ch)")}}</label>
                                        <textarea type="text" id="productDesc" name="product_desc" class="form-control md-textarea" rows="5" style="resize:none" required></textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="md-form">
                                                {{-- is-valid is-invalid--}}
                                                <input type="number" id="productRam" name="product_ram" class="form-control" required>
                                                <label for="productRam">{{__("Ram * (in GB)")}}</label>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="md-form">
                                                {{-- is-valid is-invalid--}}
                                                <input type="number" id="productRom" name="product_rom" class="form-control" required>
                                                <label for="productRom">{{__("Stockage * (in GB)")}}</label>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="md-form">
                                                {{-- is-valid is-invalid--}}
                                                <input type="text" id="productCpu" name="product_cpu" class="form-control">
                                                <label for="productCpu">{{__("CPU *")}}</label>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="md-form">
                                                {{-- is-valid is-invalid--}}
                                                <input type="text" id="productGpu" name="gpu" class="form-control">
                                                <label for="productGpu">{{__("GPU *")}}</label>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                             <div class="md-form">
                                                {{-- is-valid is-invalid--}}
                                                <input type="text" id="operatingSys" name="operating_sys" class="form-control" required>
                                                <label for="operatingSys">{{__("OS version *")}}</label>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="md-form">
                                                {{-- is-valid is-invalid--}}
                                                <input type="number" id="frontCam" name="front_cam" class="form-control" required>
                                                <label for="frontCam">{{__("Selfie camera * (in MP)")}}</label>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="md-form">
                                                {{-- is-valid is-invalid--}}
                                                <input type="number" id="backCam" name="back_cam" class="form-control" required>
                                                <label for="backCam">{{__("Main camera * (in MP)")}}</label>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group md-form">
                                                <h6>Accessories *</h6>
                                                <select class="custom-select" name="accessories[]" size="7" multiple>
                                                    <option value="USB Cable">USB Cable</option>
                                                    <option value="Charger" selected>Charger</option>
                                                    <option value="EarPods with Lightning Connector">EarPods Lightning Connector</option>
                                                    <option value="Lightning-to-USB cable" selected>Lightning-to-USB cable</option>
                                                    <option value="USB-C-to-Lightning cable">USB-C-to-Lightning cable</option>
                                                </select>
                                                <div class="invalid-feedback">Example invalid custom select feedback</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <select class="image-picker" name="media[]" data-limit='4' multiple required>
                                                <optgroup label="Select images * (max. 4)">
                                                    <option data-img-src="{{('/img/product01.png')}}" alt="" value="1">PlaceIMG 1</option>
                                                    <option data-img-src="{{('/img/product02.png')}}" value="2">PlaceIMG 2</option>
                                                    <option data-img-src="{{('/img/product03.png')}}" value="3">PlaceIMG 3</option>
                                                    <option data-img-src="{{('/img/product04.png')}}" value="4">PlaceIMG 4</option>
                                                    <option data-img-src="{{('/img/product05.png')}}" value="4">PlaceIMG 4</option>
                                                
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-md-1 col-md-3">
                                    <div class="form-group md-form">
                                        <div class="date-at {{ Request::is('products')? 'hide_created_updated_at':'' }}">
                                            <h6>Created at:</h6>&nbsp;{{__("2020-23-10 12:56:25")}}
                                        </div>
                                        <div class="date-at {{ Request::is('products')? 'hide_created_updated_at':'' }}" style="margin-bottom: 1.5rem;">
                                            <h6>Updated at:</h6>&nbsp;{{__("2020-23-10 12:56:25")}}
                                        </div>
                                        
                                        <h6>Brand *</h6>
                                        <select class="custom-select browser-default" name="brand" required>
                                            <option value="Apple">Apple</option>
                                            <option value="Samsung">Samsung</option>
                                            <option value="Xiaomi">Xiaomi</option>
                                        </select>
                                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                                    </div>
                                    <div class="form-group md-form">
                                        <h6>Manufacturing country *</h6>
                                        <select class="custom-select browser-default" name="manufacturing_country" required>
                                        <option value="USA">USA</option>
                                        <option value="China">China</option>
                                        <option value="Korea">Korea</option>
                                        </select>
                                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                                    </div>
                                    <div class="form-group md-form">
                                        <h6>Colors *</h6>
                                        <select class="custom-select" name="colors[]" size="5" multiple required>
                                            <option value="Dark grey" selected>Dark grey</option>
                                            <option value="Black" selected>Black</option>
                                            <option value="Red">Red</option>
                                            <option value="Gold" selected>Gold</option>
                                        </select>
                                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                                    </div>
                                    <div class="form-group md-form">
                                        <h6>Product condition *</h6>
                                        <select class="custom-select browser-default" id="phoneStatus" name="phone_status" required>
                                            <option value="New">New</option>
                                            <option value="Faily used">Faily used</option>
                                            <option value="Used">Used</option>
                                        </select>
                                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                                    </div>
                                    <div class="md-form">
                                        {{-- is-valid is-invalid--}}
                                        <input type="number" id="guarantyMonths" name="guaranty_months" class="form-control" required>
                                        <label for="guarantyMonths">{{__("Guaranty * (No. of months)")}}</label>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="form-group md-form">
                                        <h6>Supplier</h6>
                                        <select class="custom-select browser-default" id="supplier" name="supplier" >
                                            <option value="Johnson Clearence">3C Hub</option>
                                            <option value="Oscar">Oscar</option>
                                            <option value="Kalip">Kalip</option>
                                        </select>
                                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                                    </div>
                                    <div class="md-form">
                                        {{-- is-valid is-invalid--}}
                                        <input type="number" id="supplierPrice" name="supplier_pr" class="form-control" required>
                                        <label for="supplierPrice">{{__("Supplier price *")}}</label>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="md-form">
                                        {{-- is-valid is-invalid--}}
                                        <input type="number" id="sellerPrice" name="seller_pr" class="form-control" required>
                                        <label for="sellerPrice">{{__("Seller price *")}}</label>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="md-form" style="margin-top: 4rem">
                                        <button type="submit" id="submitBtn" class="btn btn-primary btn-block save_product">Save</button>
                                    </div>
                                </div>
                            </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')
    <script type="text/javascript" src="{{asset('js/admin/image-picker.min.js')}}"></script>
    <script>
    jQuery(function($){
        // Initialise the image picker for our media field
        $(".image-picker").imagepicker();

        // Add the active class to every input||textarea label field in case this one contains a value
        
        $('label[for="productName"]').addClass(function() {
            return ( $('#productName').val() != '' )? 'active':'';
        });

        $('label[for="productDesc"]').addClass(function() {
            return ( $('#productDesc').val() != '' )? 'active':'';
        });

        $('label[for="productRom"]').addClass(function() {
            return ( $('#productRom').val() != '' )? 'active':'';
        });

        $('label[for="productRam"]').addClass(function() {
            return ( $('#productRam').val() != '' )? 'active':'';
        });

        $('label[for="productCpu"]').addClass(function() {
            return ( $('#proproductCpuductDesc').val() != '' )? 'active':'';
        });

        $('label[for="productGpu"]').addClass(function() {
            return ( $('#productGpu').val() != '' )? 'active':'';
        });

        $('label[for="operatingSys"]').addClass(function() {
            return ( $('#operatingSys').val() != '' )? 'active':'';
        });

        $('label[for="frontCam"]').addClass(function() {
            return ( $('#frontCam').val() != '' )? 'active':'';
        });

        $('label[for="backCam"]').addClass(function() {
            return ( $('#backCam').val() != '' )? 'active':'';
        });

        $('label[for="guarantyMonths"]').addClass(function() {
            return ( $('#guarantyMonths').val() != '' )? 'active':'';
        });

        $('label[for="supplierPrice"]').addClass(function() {
            return ( $('#supplierPrice').val() != '' )? 'active':'';
        });

        $('label[for="sellerPrice"]').addClass(function() {
            return ( $('#sellerPrice').val() != '' )? 'active':'';
        });
    });
    </script>
@endsection