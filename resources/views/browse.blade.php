@extends('layouts.app')
@section('content')
    <div class="w-full px-3 py-4 sm:px-6">
        @include('components.filter')
        <span class="block mt-8 mb-4 text-xl font-bold text-slate-600">Hasil Pencarian Destinasi Wisata</span>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
            @forelse ($destinations as $key => $data)
                <div class="flex items-center justify-between w-full shadow-lg">
                    <div class="flex flex-col items-start w-full bg-white rounded-md shadow xl:flex-row lg:items-center">
                        <div class="w-full h-64 overflow-hidden xl:w-3/5">
                            <img src="{{ asset('storage/' . $data->images[0]->url) }}" alt=""
                                class="object-cover object-center w-full h-64">
                        </div>
                        <div
                            class="flex flex-col justify-between w-full px-2 py-3 border-t bg-emerald-600 h-fit sm:px-4 xl:w-2/5 xl:h-64 xl:border-t-0 xl:border-r xl:border-l xl:rounded-r">
                            <div class="">

                                <span class="block font-bold text-white md:text-lg lg:text-xl">{{ $data->name }}</span>
                                <div class="flex mt-1 text-sm text-white sm:text-base">
                                    <i class="mr-2 fa-solid fa-mountain-sun"></i>{{ $data->destType->name }}
                                </div>
                                <div class="flex mt-1 text-sm text-white sm:text-base">
                                    <i class="mr-2 fa-solid fa-map-location-dot"></i>{{ $data->address }}
                                </div>

                            </div>
                            <div
                                class="flex items-center justify-between mt-4 gap-x-3 sm:flex-col 2xl:flex-row sm:items-start">
                                <div class="flex items-center aspect-auto w-fit">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $data->rate)
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <title>{{ $i }} star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                        @else
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <a href="{{ route('destination.show', $data->id) }}"
                                    class="block font-semibold text-white underline">Selengkapnya <i
                                        class="ml-2 text-sm fa-solid fa-up-right-from-square"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <span class="text-sm italic font-semibold text-gray-500 col-span-full">Tidak Ada Destinasi Ditemukan</span>
            @endforelse
        </div>
    </div>
@endsection
