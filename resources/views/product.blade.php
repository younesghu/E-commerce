@extends('layout')

@section('content')
<h2>
    {{$product['name']}}
</h2>
<p>
    {{$product['description']}}
</p>
@endsection