@extends('layouts.app')
@section('content')
    <section class="flex justify-center jumbotron">
        <div class="relative w-full overflow-hidden ">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-72 overflow-hidden sm:h-[400px] md:h-[600px]">
                    @foreach ($banners as $key => $banner)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('storage/' . $banner->url) }}"
                                class="absolute block object-cover w-full sm:h-[400px] md:h-[600px] h-72 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="{{ $banner->destination->name }}">
                        </div>
                    @endforeach
                </div>
                <!-- Slider indicators -->
                <div
                    class="absolute z-30 flex px-3 py-2 space-x-3 -translate-x-1/2 rounded-full bottom-5 left-1/2 bg-emerald-500/60">
                    @foreach ($banners as $key => $banner)
                        <button type="button" class="w-3 h-3 bg-green-600 rounded-full" aria-current="true"
                            aria-label="Slide {{ $key + 1 }}" data-carousel-slide-to="{{ $key }}"></button>
                    @endforeach
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 bg-white rounded-full sm:w-10 sm:h-10 bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-green-600 sm:w-6 sm:h-6" fill="none"
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
                        <svg aria-hidden="true" class="w-5 h-5 text-green-600 sm:w-6 sm:h-6" fill="none"
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
        <form action="{{ route('browse') }}" method="GET"
            class="grid w-11/12 grid-cols-3 px-4 py-2 bg-white border shadow-sm shadow-emerald-500 rounded-xl md:w-8/12 gap-x-2">
            <label for="search" class="block mb-2 text-lg font-medium text-slate-600 col-span-full sm:col-span-1">
                Cari Destinasi
                <div class="flex">
                    <div
                        class="flex items-center px-2 py-3 border rounded-l border-emerald-500 focus:ring-green-600 focus:border-green-600">
                        <i class="text-emerald-500 fa-solid fa-search"></i>
                    </div>
                    <input type="text" id="search" placeholder="Cari Destinasi" name="name"
                        class="block w-full px-3 py-2 text-base border border-l-0 rounded rounded-l-none text-emerald-500 border-emerald-500 focus:ring-green-600 focus:border-green-600">
                </div>
            </label>
            <label for="category" class="block mb-2 text-lg font-medium text-slate-600 col-span-full sm:col-span-1">
                Kategori
                <select id="category" name="category"
                    class="block w-full px-3 py-2 text-base border rounded text-emerald-500 border-emerald-500 focus:ring-green-600 focus:border-green-600"
                    x-model="type">
                    <option selected value="">Semua Kategori</option>
                    @foreach ($type as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </label>
            <div class="flex items-end mb-3 sm:px-6 col-span-full sm:col-span-1">
                <button type="submit"
                    class="w-full px-3 py-2 font-bold text-white transition-all ease-in-out rounded bg-emerald-500 hover:bg-green-600">Telusuri</button>
            </div>
        </form>
    </div>

    <section id="gallery" class="px-6 py-4 my-4 bg-green-600">
        <h1 class="my-8 text-3xl font-bold text-center text-white">Galeri <span class="block sm:inline-block">Pariwisata
                Tapsel</span></h1>
        <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-3">
            @foreach ($galleries as $key => $gallery)
                <div class="overflow-hidden transition-all rounded-lg hover:shadow-xl shadow-emerald-500">
                    <img class="h-full max-w-full transition-all duration-500 ease-in-out rounded-lg hover:scale-125"
                        src="{{ asset('storage/' . $gallery->url) }}">
                </div>
            @endforeach
        </div>

    </section>

    {{-- <div class="flex justify-center my-3">
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
    </div> --}}
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {


        })
    </script>
@endsection
