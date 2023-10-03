<link rel="stylesheet" href="/css/style.css">
<x-layout>
    <x-card class="p-10">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Shopping Cart
            </h1>
        </header>
        @unless ($carts->isEmpty())
            @foreach($carts as $cart)
                <table id="cart" class="">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
                    <tbody>
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
                                <form method="POST" action="/cart/{{$cart->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button>
                                        <a class="btn btn-outline-danger btn-sm "><i class="text-red-500 fa-solid fa-trash"></i></a>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300">
                            <p class="text-center">No Items found</p>
                        </td>
                    </tr>
                </tbody>
            @endunless
        </table>
    </x-card>
</x-layout>
