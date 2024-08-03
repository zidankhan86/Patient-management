@extends('backend.master')

@section('content')
<div class="container">
        <div class="container">
            <div class="container">
<br>
<h4 class="text-success text-center">Order List</h4>
<br>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Full Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            
        </tr>
    </thead>
    <tbody>
        @php
        $id = 1;
        @endphp

        @foreach ($orders as $item)
        <tr>
            <th scope="row">{{ $id++ }}</th>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->price }} Tk.</td>
            <td>{{ $item->full_name }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->email }}</td>
           
            
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>

</div>

@endsection
