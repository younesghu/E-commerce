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
                <a href="{{ route('addproduct.to.cart', $product->id) }}" class="hover:text-laravel">
                    <i class="fa-solid fa-cart-plus"></i>
                    Add to cart
                </a>
        </div>
    </div>
</x-card>
