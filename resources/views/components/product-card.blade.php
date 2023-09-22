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
            <ul class="flex">
                <li class="bg-laravel text-black rounded-xl px-3 py-1 mr-2 mb-3">
                    <a href="#">{{$product->categories}}</a>
                </li>
            </ul>
        </div>
    </div>
</x-card>
