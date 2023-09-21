@extends('layout')

@section('content')
<h1>
    {{$heading}}
</h1>

@unless (count($products) == 0)
    @foreach ($products as $product)
    <h2>
        <a href="/products/{{$product['id']}}">{{$product['name']}}</a>
    </h2>
    <p>
        {{$product['description']}}
    </p>
    @endforeach

    @else
    <p>No Products found</p>

@endunless

@endsection
