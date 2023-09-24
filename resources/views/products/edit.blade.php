<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">

    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Edit: {{$product->name}}
        </h2>
    </header>

    <form method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">
                Product Name
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" placeholder="Name" value="{{$product->name}}"/>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="price" class="inline-block text-lg mb-2">
                Product Price
            </label>
            <input type="number" class="border border-gray-200 rounded p-2 w-full" name="price" placeholder="$00.00" value="{{$product->price}}"/>
            @error('price')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="price" class="inline-block text-lg mb-2">
                Product Quantity
            </label>
            <input type="number" class="border border-gray-200 rounded p-2 w-full" name="stock_quantity" placeholder="00" value="{{$product->stock_quantity}}"/>
            @error('stock_quantity')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="categories" class="inline-block text-lg mb-2">
                Product Category
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="categories" placeholder="Example: Apple, Samsung, HP.." value="{{$product->categories}}"/>
            @error('categories')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image_url" class="inline-block text-lg mb-2">
                Product Image
            </label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image_url"/>
            <img src="{{$product->image_url ? asset('storage/' . $product->image_url) : asset('images/no-image2.png')}}" alt="">
            @error('image_url')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">
                Product Description
            </label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Include product functionality, positive side, etc..">
                {{$product->description}}
            </textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Update Product
            </button>
            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>

    </x-card>
</x-layout>
