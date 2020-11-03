@extends('layouts.app')

@section('title', 'Supplier List')

@section('content')
<div class="container p-5">
    <table id="customers">
        <tr>
          <th>key_contact_name</th>
          <th>company_name</th>
          <th>email</th>
          <th>city</th>
          <th>adress</th>
          <th>phone</th>
          <th>whatsapp</th>
          <th>cni</th>
          <th>numero_contribuable</th>
        </tr>
        @foreach ($suppliers as $supplier)
            <tr>
                <td>{{$supplier->key_contact_name}}</td>
                <td>{{$supplier->company_name}}</td>
                <td>{{$supplier->email}}</td>
                <td>{{$supplier->city}}</td>
                <td>{{$supplier->address}}</td>
                <td>{{$supplier->phone}}</td>
                <td>{{$supplier->whatsapp}}</td>
                <td>{{$supplier->cni}}</td>
                <td>{{$supplier->numero_contribuable}}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection