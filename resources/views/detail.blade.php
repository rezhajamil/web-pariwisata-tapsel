@extends('layouts.app')
@section('style')
    <style>
        .star-label {
            color: gray;
            cursor: pointer;
        }

        .star-input.checked~.star-label {
            color: rgb(234 179 8 / var(--tw-bg-opacity));
        }
    </style>
@endsection
@section('content')
    <section class="flex justify-center py-4 my-1 carousel md:my-10">
        <div id="default-carousel" class="relative w-11/12 border border-green-600 rounded-lg md:w-10/12"
            data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg sm:h-64 md:h-96 ">
                @foreach ($destination->images as $image)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('storage/' . $image->url) }}"
                            class="absolute block object-cover object-center w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                @endforeach
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                @foreach ($destination->images as $key => $image)
                    <button type="button" class="w-3 h-3 rounded-full bg-green-400/60" aria-current="false"
                        aria-label="Slide {{ $key + 1 }}" data-carousel-slide-to="{{ $key + 1 }}"></button>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-green-600/40 group-hover:bg-green-600/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="white" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span class="hidden">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-green-600/40 group-hover:bg-green-600/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="white" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="hidden">Next</span>
                </span>
            </button>
        </div>
    </section>

    <section class="px-[16px] mx-auto my-3 lg:px-0 lg:w-4/5">
        <div class="flex justify-around gap-x-5">
            <div class="w-full lg:w-3/4">
                <div class="flex items-center justify-between w-full gap-x-2">
                    <div class="flex flex-col gap-y-1">
                        <span class="inline-block text-3xl font-bold text-prussian text-capitalize fw-bold"
                            id="name">{{ $destination->name }}</span>
                        <span class="text-slate-500">{{ $destination->address }}</span>
                    </div>
                </div>
                <hr class="my-3">
                <div class="flex flex-col mb-16 space-y-1 lg:mb-6 h-fit">
                    <span class="text-lg font-bold text-decoration-underline col-span-full text-prussian ">Deskripsi</span>
                    <hr class="border border-gray-400">
                    <p
                        class="inline-block mb-10 text-base text-justify text-neutral-900 font-['Nunito_Sans'] flex-wrap max-w-full">
                        {!! $destination->description !!}</p>
                </div>
                <hr class="my-3">
                <div class="flex flex-col mb-16 lg:mb-6 h-fit">
                    <span class="mb-1 text-lg font-bold text-decoration-underline col-span-full text-prussian">Review</span>
                    <hr class="my-1 border border-gray-400">
                    @forelse ($destination->reviews as $key => $review)
                        {{-- {{ ddd($review) }} --}}
                        <div class="flex flex-col mb-4 shadow gap-x-2 gap-y-4">
                            <div class="flex items-center gap-x-2">
                                <img src="{{ $review->user->avatar }}" alt="review{{ $key }}"
                                    class="w-8 h-8 rounded-full aspect-square"
                                    onerror="this.onerror=null;this.src='{{ asset('images/avatar.png') }}';">
                                <div class="flex flex-col">
                                    <span
                                        class="text-xs text-gray-400">{{ $review->created_at ? $review->created_at : '' }}</span>
                                    <span class="text-sm text-gray-500">{{ $review->user->email }}</span>
                                </div>
                            </div>
                            <div class="flex flex-col w-full sm:flex-row gap-y-2 sm:justify-between">
                                <div class="w-full sm:w-8/12 ">{!! $review->message !!}</div>
                                <div class="flex items-center w-full sm:w-fit aspect-auto">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rate)
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
                            </div>
                        </div>
                    @empty
                        <span class="italic font-semibold text-gray-400">Tidak Ada Review</span>
                    @endforelse
                </div>
                <hr class="my-3">

                <div class="py-3">
                    <span class="text-lg font-bold">Berikan Ulasan Anda</span>
                    <form action="{{ route('store_review') }}" method="POST" class="px-4 py-4 border border-gray-400">
                        @csrf
                        <input type="hidden" name="dest_id" value="{{ $destination->id }}">
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="">
                                    <input type="radio" id="star{{ $i }}" name="rate"
                                        value="{{ $i }}" class="hidden star-input">
                                    <label for="star{{ $i }}" class="star-label">
                                        <i class="fa-solid fa-star"></i>
                                    </label>
                                </div>
                            @endfor
                        </div>
                        @error('rate')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                        <textarea name="message" id="message" cols="30" rows="5" placeholder="Ulasan Anda"
                            class="w-full mt-4 rounded" required></textarea>
                        @error('message')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                        <button type="submit"
                            class="w-full py-3 font-bold text-white transition-all bg-green-600 rounded hover:bg-green-800">Kirim
                            Ulasan</button>
                    </form>
                </div>
            </div>
            <div
                class="flex-col items-center justify-center hidden w-1/4 px-3 py-2 rounded-lg shadow gap-y-2 h-fit lg:flex ">
                <a href="{{ $destination->maps_url }}" target="_blank"
                    class="flex items-center justify-center w-full p-2 transition bg-green-600 rounded hover:bg-green-800 btn-booking">
                    <i class="mr-2 text-xl text-white transition fa-solid fa-map-location-dot"></i>
                    <span class="text-lg font-semibold text-white transition">
                        Lihat Di Maps
                    </span>
                </a>
            </div>
        </div>
    </section>
    <div
        class="fixed bottom-0 lg:hidden flex justify-evenly items-center w-full space-x-2 px-3 py-2 bg-white drop-shadow-[18px_-18px_28px_#d5d5d5]">
        <button class="w-1/2 p-2 transition bg-green-600 rounded hover:bg-green-800 btn-booking"
            onclick="location.href='{{ $destination->maps_url }}'" target="_blank">
            <i class="mr-2 text-white transition fa-solid fa-map-location-dot"></i>
            <span class="text-lg font-semibold text-white transition">
                Lihat Di Maps
            </span>
        </button>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.star-input').on('change', function() {
                var selectedStarId = $(this).attr('id').substr($(this).attr('id').length - 1);
                var allStars = $('.star-input');

                allStars.removeClass('checked');

                allStars.each(function() {
                    if ($(this).attr('id').substr($(this).attr('id').length - 1) <=
                        selectedStarId) {
                        $(this).addClass('checked');
                    }
                })
            });
        });
    </script>
@endsection
