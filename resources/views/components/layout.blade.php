<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/icon.png" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#cfe2f3",
                        },
                    },
                },
            };
        </script>
        <title>Electronics Store</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="{{asset('images/logo2.png')}}" alt="" class="logo"/>
            </a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <a class="btn btn-outline-dark" href="{{ route('shopping.cart') }}">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</span>
                </a>
                <li>
                    <span class="text-sm uppercase">
                        Welcome
                        <span class="text-base font-bold">
                            {{auth()->user()->name}}
                        </span>
                    </span>
                </li>
                <li>
                    <a href="/products/manage" class="hover:text-laravel">
                        <i class="fa-solid fa-gear"></i>
                        Manage Products
                        </a>
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i>Logout
                        </button>
                    </form>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-laravel">
                        <i class="fa-solid fa-user-plus"></i>
                        Register
                    </a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login
                        </a>
                </li>
                @endauth
            </ul>
        </nav>
        <main>
            {{$slot}}
        </main>
        <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-16 mt-24 opacity-90 md:justify-center">
        <p class="ml-2 text-black">Copyright &copy; 2023, All Rights reserved</p>
        <a
            href="/products/create"
            class="absolute top-1/4 right-10 bg-black text-white py-2 px-5">
            Add A Product
        </a>
        </footer>
        <x-flash-message />
    </body>
</html>
