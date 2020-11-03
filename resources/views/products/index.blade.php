@extends('layouts.app')
@section('content')
<div class="container p-5">
    <table id="customers">
        <tr>
          <th>Name</th>
          <th>Marque</th>
          <th>Ram</th>
          <th>Rom</th>
          <th>Cpu</th>
          <th>Seller Price</th>
          <th>Supplier Price</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->marque}}</td>
                <td>{{$product->ram}}</td>
                <td>{{$product->rom}}</td>
                <td>{{$product->cpu}}</td>
                <td>{{$product->seller_price}}</td>
                <td>{{$product->supplier_price}}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection