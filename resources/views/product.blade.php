@extends('layout')

@section('content')
<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
            <img
                class="w-48 mr-6 mb-6"
                src="images/acme.png"
                alt=""
            />

            <h3 class="text-2xl font-bold mb-2">{{$product->name}}</h3>
            <div class="text-xl mb-4 ">${{$product->price}}</div>
            <ul class="flex">
                <li
                    class="bg-black text-white rounded-xl px-3 py-1 mr-2 mb-3"
                >
                    <a href="#">Category</a>
                </li>
            </ul>
            <div class="border border-gray-200 w-full mb-6"></div>

                <div class="text-lg space-y-6">
                    <p>
                        {{$product->description}}
                    </p>
                    <a
                        href="mailto:$user->email"
                        class="block bg-laravel text-black mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid text-black fa-envelope"></i>
                        Contact Seller</a
                    >
                </div>
        </div>
    </div>
</div>
@endsection
