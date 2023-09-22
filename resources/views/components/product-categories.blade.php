@props(['categoriesCsv'])

@php
    $categories = explode(',', $categoriesCsv);
@endphp
<ul class="flex">
    @foreach ($categories as $category)
    <li class="bg-laravel text-black rounded-xl px-3 py-1 mr-2 mb-3">
        <a href="/?category={{$category}}">{{$category}}</a>
    </li>
    @endforeach
</ul>
