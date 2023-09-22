@props(['product'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no-image2.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/products/{{$product->id}}">{{$product->name}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">${{$product->price}}</div>
            <x-product-categories :categoriesCsv="$product->categories"/>
        </div>
    </div>
</x-card>
