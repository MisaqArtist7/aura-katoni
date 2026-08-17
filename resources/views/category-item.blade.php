<li class="category-item relative group flex items-center gap-x-2 text-sm rounded-lg px-4 py-3
           text-gray-600 hover:text-primary-500 cursor-pointer"
    data-category="{{ $category->id }}">

    @if($category->icon)
        <i class="{{ $category->icon }} text-lg"></i>
    @endif

    <a href="{{ route('category.single', ['id' => $category->id, 'slug' => $category->slug]) }}">
        {{ $category->name }}
    </a>

    @if($category->children->count())
        <ul class="absolute top-0 right-full mr-2 w-56 bg-white shadow-lg rounded-2xl p-3
                   opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 space-y-2">
            @foreach($category->children as $child)
                @include('category-item', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>
