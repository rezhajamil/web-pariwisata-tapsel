{{-- <div class="flex my-4">
    <div class="px-3 py-2 text-white rounded-md bg-emerald-600">

    </div>
</div> --}}

<div class="flex justify-start my-3">
    <form action="{{ route('browse') }}" method="GET"
        class="flex flex-col w-10/12 mx-auto border shadow-sm sm:mx-0 sm:flex-row rounded-xl md:w-1/3">
        <div class="flex-col p-3 border rounded-t border-emerald-600 gap-x-2">
            <label for="search"
                class="block py-2 mb-2 text-xs font-medium rounded text-emerald-600 sm:text-sm col-span-full sm:col-span-1 gap-y-1">
                Nama Destinasi
                <div class="flex">
                    <input type="text" id="search" placeholder="Nama Destinasi" name="name"
                        value="{{ request()->get('name') }}"
                        class="block w-full px-3 py-2 border rounded text-emerald-600 border-emerald-600 focus:ring-green-600 focus:border-green-600 placeholder:text-emerald-600/70">
                </div>
            </label>
            <div class="flex flex-col text-xs font-medium text-emerald-600 sm:text-sm gap-y-1">
                Kategori
                <div class="flex flex-wrap gap-2">
                    @foreach ($types as $key => $type)
                        <div class="w-fit">
                            <input type="checkbox" name="category[]" id="type{{ $key }}"
                                value="{{ $type->name }}" class="hidden peer"
                                {{ in_array($type->name, request()->get('category')) ? 'checked' : '' }}>
                            <label for="type{{ $key }}"
                                class="relative flex items-center justify-between px-3 py-2 overflow-hidden border rounded text-emerald-600 border-emerald-600 flex-nowrap peer-checked:bg-emerald-600 peer-checked:text-white">
                                <p class="leading-none whitespace-nowrap">
                                    {{ $type->name }}
                                </p>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex items-end col-span-full sm:col-span-1">
            <button type="submit"
                class="w-full px-3 py-2 text-xs font-bold text-white transition-all ease-in-out bg-emerald-600 sm:h-full h-fit sm:w-fit hover:bg-green-600"><i
                    class="mr-2 fa-solid fa-filter"></i>Filter</button>
        </div>
    </form>
</div>
