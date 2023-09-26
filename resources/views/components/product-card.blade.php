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
                <ul class="flex space-x-6 mr-6 text-base">
                    <li>
                        <a href="/" class="hover:text-laravel text-">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </a>
                    </li>
                </ul>
        </div>
    </div>
</x-card>
