@extends('layouts.app')
@section('content')
    <section class="flex justify-center jumbotron">
        <div class="w-full relative h-72 overflow-hidden sm:h-[400px] md:h-[600px]">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://picsum.photos/700/800"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://picsum.photos/800/800"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://picsum.photos/800/800"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://picsum.photos/750/800"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://picsum.photos/720/800"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div
                    class="absolute z-30 flex px-3 py-2 space-x-3 -translate-x-1/2 rounded-full bottom-5 left-1/2 bg-secondary/60">
                    <button type="button" class="w-3 h-3 rounded-full bg-primary" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-primary" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-primary" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-primary" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-primary" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 bg-white rounded-full sm:w-10 sm:h-10 bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-primary sm:w-6 sm:h-6" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 bg-white rounded-full sm:w-10 sm:h-10 bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-primary sm:w-6 sm:h-6" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </section>

    <div class="flex justify-center my-3">
        <div class="grid w-11/12 grid-cols-2 px-4 py-2 bg-white border shadow-lg rounded-xl md:w-10/12 gap-x-2">
            <label for="category" class="block mb-2 text-lg font-medium text-slate-600 col-span-full sm:col-span-1">
                Kategori
                <select id="category"
                    class="block w-full px-3 py-2 text-base text-white border rounded bg-sky-400 border-secondary focus:ring-blue-500 focus:border-blue-500"
                    x-model="type">
                    <option selected value="Semua">Semua Kategori</option>
                    @foreach ($type as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </label>
            {{-- <label for="category" class="block mb-2 text-lg font-medium text-slate-600 col-span-full sm:col-span-1">
            Urutkan Berdasar
            <select id="category" class="block w-full px-3 py-2 text-base text-white border rounded bg-sky-400 border-secondary focus:ring-blue-500 focus:border-blue-500">
                <option selected value="Nama">Nama</option>
                <option value="Rating">Rating</option>
            </select>
        </label> --}}
            <label for="region" class="block mb-2 text-lg font-medium text-slate-600 col-span-full sm:col-span-1">
                Wilayah
                <select id="region"
                    class="block w-full px-3 py-2 text-base text-white border rounded bg-sky-400 border-secondary focus:ring-blue-500 focus:border-blue-500"
                    x-model="region">
                    <option selected value="Semua">Semua Wilayah</option>
                    <option value="Sibolga">Sibolga</option>
                    <option value="Tapanuli Tengah">Tapanuli Tengah</option>
                </select>
            </label>
        </div>
    </div>

    <div class="flex justify-center my-3">
        <div class="grid w-11/12 grid-cols-3 md:w-10/12 gap-x-4 gap-y-3">
            @foreach ($destinations as $data)
                @foreach ($covers as $cover)
                    @if ($data->id == $cover->dest_id)
                        <x-item-card id="{{ $data->id }}" image="{{ $cover->url }}" name="{{ $data->name }}"
                            region="{{ $data->region }}"
                            desc="{{ strlen($data->description) > 80 ? substr($data->description, 0, 77) . '...' : $data->description }}"
                            maps="{{ $data->maps_url }}" type="{{ $data->destType->name }}"></x-item-card>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {


        })
    </script>
@endsection
