@props(['product'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$product->image_url ? asset('storage/' . $product->image_url) : asset('images/no-image2.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/products/{{$product->id}}">{{$product->name}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">${{$product->price}}</div>
            <x-product-categories :categoriesCsv="$product->categories"/>
            <form action="/addtocart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input class="bg-white text-black text-xs p-0.5 rounded border border-laravel-500" type="number" name="quantity" value="1">
                <button class="bg-black text-white text-xs p-0.5 rounded hover:text-laravel">
                    Add to Cart
                </button>
            </form>

        </div>
    </div>
</x-card>
