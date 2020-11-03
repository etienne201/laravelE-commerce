@extends('layouts.dashboard')

@section('title','All Products')
@section('custom_styles')
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        .thumbnail-fit {
        width: 400px;
        float: left;
        }

        .thumb {
        /* margin: 50px; */
        margin: 5px;
        box-shadow: rgba(113, 135, 164, 0.65) 0px 0px 4px 3px;
        -webkit-box-shadow: rgba(113, 135, 164, 0.65) 0px 0px 4px 3px;
        -moz-box-shadow: rgba(113, 135, 164, 0.65) 0px 0px 4px 3px;
        }

        .box1 {
        width: 200px;
        height: 100px;
        }

        .box2 {
        width: 200px;
        height: 150px;
        }

        .box3 {
        width: 100px;
        height: 200px;
        }

        .box4 {
        width: 150px;
        height: 200px;
        }

        .box5 {
        width: 100px;
        height: 100px;
        }

        .img_td {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
       
        
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        {{-- <h4 class="c-grey-900 mT-10 mB-30">View all products</h4> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">{{__("Product listing")}}</h4>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Status</th>
                                <th>Supplier pr.</th>
                                <th>Seller pr.</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>name</th>
                                <th>Brand</th>
                                <th>Status</th>
                                <th>Supplier pr.</th>
                                <th>Seller pr.</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="img_td">
                                <div class="thumb thumbnail-fit box5">
                                    <img src="{{$product->media}}">
                                    </div>
                                </td>
                                <td class="td_vertical_center_flex">{{$product->product_name}}</td>
                                <td class="td_custom">{{$product->brand}}</td>
                                <td class="td_custom">{{$product->phone_status}}</td>
                                <td class="td_custom">{{$product->supplier_pr}}</td>
                                <td class="td_custom">{{$product->seller_pr}}</td>
                                <td class="td_custom">$320,800</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')
<script type="text/javascript" src="{{asset('js/admin/jquery-thumbnail-cut.js')}}"></script>
@endsection