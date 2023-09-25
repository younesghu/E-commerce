<x-layout>
    <div class="mx-4">
        <x-card>
            {{-- Edit Product link --}}
            <a href="/products/{{$product->id}}/edit">
                <i class="fa-solid fa-pencil mb-3" ></i> Edit
            </a>
            {{-- Delete Product link added to Manage Products --}}
            {{-- <form method="POST" action="/products/{{$product->id}}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash mt-3"></i> Delete</button>
            </form> --}}
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
                    <p>
                        {{$product->description}}
                    </p>

                <div class="border border-gray-200 w-full mb-6"></div>
                    <P>
                        Contact product owner :
                    </P>
                    <a
                        href="mailto:{{$product->user->email}}"
                        class="block bg-laravel text-black mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid text-black fa-envelope"></i> {{$product->user->email}}</a>
                    <a
                        href=""
                        class="block bg-laravel text-black mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid text-black fa-phone"></i> {{$product->user->phone}}
                    </a>

            </div>
        </x-card>
        {{-- <x-card class="mt-4 p-2 flex space-x-6"> --}}


        {{-- </x-card> --}}
    </div>
</x-layout>
