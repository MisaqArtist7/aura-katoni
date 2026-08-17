@foreach($items as $item)
    <tr class="border-b hover:bg-gray-50 transition-colors">
        <td class="py-3 px-4 text-right">
            <div class="flex items-center">

                {{-- فاصله برای زیرمجموعه‌ها --}}
                @if($level > 0)
                    <span class="text-gray-400 ml-2">{{ str_repeat('— ', $level) }}</span>
                @endif

                <i class="{{ $item->icon ?? 'fas fa-folder' }} text-indigo-500 ml-3 text-lg w-6 text-center"></i>

                <div>
                    <span class="font-medium text-gray-800">{{ $item->title }}</span>
                    <span class="text-gray-500 text-sm block ltr">({{ $item->name }})</span>
                </div>

            </div>
        </td>

        <td class="py-3 px-4 text-right text-gray-600">
            {{ $item->products_count ?? 0 }} محصول
        </td>

        <td class="py-3 px-4 text-right">
            <div class="flex items-center space-x-reverse space-x-2">
                <a href="{{ route('admin.category.edit', $item->id) }}"
                   class="flex items-center justify-center w-9 h-9 bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200 transition-all duration-200"
                   title="ویرایش">
                    <i class="fas fa-pencil-alt text-sm"></i>
                </a>

                <form action="{{ route('admin.category.destroy', $item->id) }}" method="POST"
                      onsubmit="return confirm('آیا از حذف این دسته مطمئن هستید؟');">
                    @csrf
                    <button type="submit"
                            class="flex items-center justify-center w-9 h-9 bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition-all duration-200"
                            title="حذف">
                        <i class="fas fa-trash-alt text-sm"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>

    {{-- اگر زیر دسته دارد --}}
    @if($item->children && $item->children->count())
        @include('Admin.partials.category-row', [
            'items' => $item->children,
            'level' => $level + 1
        ])
    @endif

@endforeach

