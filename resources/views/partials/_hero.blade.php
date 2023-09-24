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
<section
class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
>
<div
    class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
    style="background-image: url('images/laravel-logo.png')"
></div>

<div class="z-10">
    <h1 class="text-6xl font-bold uppercase text-white">
        MYStore<span class="text-black">Electronics</span>
    </h1>
    <p class="text-2xl text-black-200 font-bold my-4">
        Find or add an Electronical product
    </p>
    <div>
        <a
            href=""
            class="inline-block border-2 border-black text-black py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
            >Sign Up to a Product</a
        >
    </div>
</div>
</section>
