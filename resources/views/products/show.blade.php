<x-layout>
    <div class="mx-4">
        <x-card>
            {{-- Edit Product link --}}
            <a href="/products/{{$product->id}}/edit">
                <i class="fa-solid fa-pencil mb-3" ></i> Edit
            </a>
            {{-- Delete Product link --}}
            <form method="POST" action="/products/{{$product->id}}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash mt-3"></i> Delete</button>
            </form>
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{$product->image_url ? asset('storage/' . $product->image_url) : asset('images/no-image2.png')}}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{$product->name}}</h3>
                <div class="text-xl font-bold mb-4 ">${{$product->price}}</div>

                    <x-product-categories :categoriesCsv="$product->categories"/>

                <div class="border border-gray-200 w-full mb-6"></div>

                    <div class="text-lg space-y-6">
                        <p>
                            {{$product->description}}
                        </p>
                        <p class="text-xm">

                        </p>
                        <a
                            href="mailto:$user->email"
                            class="block bg-laravel text-black mt-6 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid text-black fa-envelope"></i> Contact Seller by mail</a>
                        <a
                            href=""
                            class="block bg-laravel text-black mt-6 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid text-black fa-phone"></i> (+212) 770-983-062</a>
                    </div>
            </div>
        </x-card>
        {{-- <x-card class="mt-4 p-2 flex space-x-6"> --}}


        {{-- </x-card> --}}
    </div>
</x-layout>
