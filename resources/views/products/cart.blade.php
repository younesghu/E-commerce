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
        <table id="cart" class="">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Remove</th>
                <th>Total</th>
            </tr>
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    <tr class="" rownId="{{ $id }}">
                        <td class="">
                            {{ $details['name'] }}
                            <img src="{{$details['image'] ? asset('storage/' . $details['image']) : asset('images/no-image2.png')}}" class="card-img-top">
                        </td>
                        <td class="">
                            <p>${{ $details['price'] }}</p>
                        </td>
                        <td class="actions">
                            <a class="btn btn-outline-danger btn-sm delete-cart-product"><i class="text-red-500 fa-solid fa-trash"></i></a>                       </td>
                        <td class="">
                            <p></p>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </x-card>
</x-layout>

@section('scripts')
<script type="text/javascript">
    $(".delete-cart-product").click(function (e){
        e.preventDefault();

        var ele = $(this);
        if(confirm("Do you really want to delete?")){
            $.ajax({
            url: '{{ route('delete.cart.product') }}',
            method: "DELETE",
            data: {
                _token: '{{csrf_token() }}',
                id: ele.parents("tr").attr("rowId")
            },
            success: function (response) {
                window.location.reload();
            }
        })
        }
    });

</script>
@endsection

