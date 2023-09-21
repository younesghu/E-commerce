<h1>
    {{$heading}}
</h1>

@unless (count($products) == 0)
    @foreach ($products as $product)
    <h2>
        {{$product['title']}}
    </h2>
    <p>
        {{$product['description']}}
    </p>
    @endforeach

    @else
    <p>No Products found</p>

@endunless
