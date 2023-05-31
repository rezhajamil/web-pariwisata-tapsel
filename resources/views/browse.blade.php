@extends('layouts.app')
@section('content')
    <div class="w-full px-3 py-4 sm:px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
            @foreach ($destinations as $key => $data)
                <div class="flex items-center justify-between w-full shadow-lg">
                    <div class="flex flex-col items-start w-full bg-white rounded-md shadow lg:flex-row lg:items-center">
                        <div class="w-full h-64 overflow-hidden lg:w-3/5">
                            <img src="{{ asset('storage/' . $data->images[0]->url) }}" alt=""
                                class="object-cover object-center h-64">
                        </div>
                        <div
                            class="flex flex-col justify-between w-full h-24 px-2 py-3 border-t sm:px-4 bg-primary lg:w-2/5 lg:h-64 lg:border-t-0 lg:border-r lg:border-l lg:rounded-r">
                            <div class="">

                                <span class="block font-bold text-white md:text-lg lg:text-xl">{{ $data->name }}</span>
                                <span class="block mt-1 text-sm text-white">
                                    <i class="mr-2 fa-solid fa-mountain-sun"></i>{{ $data->destType->name }}
                                </span>

                            </div>
                            <div class="">
                                <div class="flex items-center px-2 py-1 my-3 bg-white rounded-full aspect-auto w-fit">
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
                                <a href="" class="block mt-2 font-semibold text-white underline">Selengkapnya <i
                                        class="ml-2 text-sm fa-solid fa-up-right-from-square"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
