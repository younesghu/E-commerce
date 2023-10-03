<link rel="stylesheet" href="/css/style.css">
<x-layout>
    <x-card class="p-10">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Cart
            </h1>
        </header>

    @if(count($carts) > 0)
    <table id="cart" class="">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Remove</th>
        </tr>
            </thead>
            <tbody>
            @unless ($carts->isEmpty())
                @foreach($carts as $cart)
                    <tr>
                        <td class="">
                            <p>{{ $cart->product->name }}</p>
                            <img src="{{$cart->product->image_url ? asset('storage/' . $cart->product->image_url) : asset('images/no-image2.png')}}" class="card-img-top">
                        </td>
                        <td class="">
                            <p>
                                ${{ $cart->product->price }}
                            </p>
                        </td>
                        <td class="">
                            <p>
                                {{ $cart->quantity }}
                            </p>
                        </td>
                        <td>
                            ${{ $cart->product->price * $cart->quantity }}
                        </td>
                        <td class="actions">
                            <a class="btn btn-outline-danger btn-sm "><i class="text-red-500 fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300">
                        <p class="text-center">No Items found</p>
                    </td>
                </tr>
                @endif
            @endunless
        </table>
    </x-card>
</x-layout>
