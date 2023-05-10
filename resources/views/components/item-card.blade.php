<div class="flex transition-all shadow-lg hover:shadow-2xl bg-sky-600 rounded-xl wow fadeInUp col-span-full sm:col-span-1"
    data-wow-duration="2s"
    x-show="(type=='{{ $type }}'||type=='Semua') && (region=='{{ $region }}'||region=='Semua')">
    <div class="w-full bg-white h-[95%] border border-gray-200 shadow-lg pb-3 rounded-xl overflow-hidden">
        <a href="{{ route('destination.show', $id) }}" class="inline-block w-full overflow-hidden h-60">
            {{-- <img class="rounded-t-lg" src="{{ asset('storage/'.$image) }}" alt="" /> --}}
            <img class="w-full rounded-t-lg" src="{{ asset('storage/' . $image) }}" alt="" />

        </a>
        <div class="px-5 pb-3">
            <a href="{{ route('destination.show', $id) }}" class="inline-block mb-2">
                <h5 class="text-2xl font-bold tracking-tight text-gray-900">{{ $name }}</h5>
                <span class="text-base font-semibold text-slate-500"><span class="type">{{ $type }}</span> |
                    <span class="region">{{ $region }}</span></span>
            </a>
            <p class="h-12 mb-2 font-normal text-gray-700">{{ $desc }}</p>
            <div class="flex items-center justify-between my-2">
                {{-- <span class="inline-flex justify-start text-base font-bold text-slate-800">
                    <svg class="w-8 h-8" fill="yellow" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>

                    <svg class="w-8 h-8" fill="yellow" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>

                    <svg class="w-8 h-8" fill="yellow" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>

                    <svg class="w-8 h-8" fill="none" stroke="yellow" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>

                    <svg class="w-8 h-8" fill="none" stroke="yellow" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                </span> --}}
                <a href="{{ route('destination.show', $id) }}"
                    class="items-center inline-block px-3 py-3 text-sm font-medium text-center text-white rounded-md bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Selengkapnya
                </a>
                <a href="{{ $maps }}"
                    class="px-3 py-2 text-xl text-white transition bg-blue-600 rounded-md hover:bg-blue-800"><i
                        class="fa-solid fa-map-location-dot"></i></a>
            </div>
        </div>
    </div>
</div>
