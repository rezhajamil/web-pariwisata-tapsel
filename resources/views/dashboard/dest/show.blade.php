@extends('layouts.dashboard')
@section('content')
    <div class="flex flex-wrap -mx-3 gap-y-4">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 p-6 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div
                    class="flex items-center justify-between w-full pb-0 mb-2 space-x-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <span class="text-lg font-bold">{{ $destination->name }}</span>
                    <a href="{{ $destination->maps_url }}" target="_blank"
                        class="inline-block px-3 py-3 mr-3 text-xs font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-blue-600 to-cyan-400 leading-pro ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                        <i class="mr-2 fa-solid fa-link"></i>
                        Link GMaps
                    </a>
                </div>
                <span class="font-semibold">
                    <i class="mr-2 fa-solid fa-mountain-sun"></i>
                    {{ $destination->destType->name }}
                </span>
                <span class="font-semibold">
                    <i class="mr-2 fa-solid fa-map-location-dot"></i>
                    {{ $destination->address }}
                </span>
                <hr class="w-full h-1 bg-gray-800 border rounded" />
                {!! $destination->description !!}
            </div>
            <div
                class="relative min-w-0 px-6 py-4 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <span class="text-lg font-bold">Gambar {{ $destination->name }}</span>
                <div id="image-grid" class="grid grid-cols-1 gap-3 mt-2 sm:grid-cols-2">
                    @foreach ($images as $image)
                        <div class="relative h-64 overflow-hidden border-2 border-purple-700 rounded">
                            <img src="{{ asset('storage/' . $image->url) }}" alt=""
                                class="object-cover object-center w-full h-64">
                        </div>
                    @endforeach
                </div>
            </div>
            <div
                class="relative min-w-0 px-6 py-4 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <span class="text-lg font-bold">Review {{ $destination->name }}</span>
                <table class="w-full">
                    @foreach ($destination->review as $review)
                        <tr class="">
                            <td class="p-2 border-b-2 border-r w-fit border-b-gray-300">
                                <div class="flex items-center gap-x-2 w-fit">
                                    {{-- <div class="w-10 p-2 border-2 rounded-full aspect-square"> --}}
                                    @if ($review->user->avatar)
                                        <img src="{{ $review->user->avatar }}"
                                            class="w-10 h-10 border-2 rounded-full aspect-square" loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('images/avatar.png') }}';">
                                    @else
                                        <img src="{{ asset('images/avatar.png') }}"
                                            class="w-10 h-10 border-2 rounded-full aspect-square">
                                    @endif
                                    {{-- </div> --}}
                                    <div class="flex flex-col">
                                        <span class="text-sm ">{{ $review->user->name }}</span>
                                        <span class="text-sm font-bold">{{ $review->user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 border-b-2 border-r border-b-gray-300">
                                <div class="flex items-center">
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
                                                <title>{{ $i }} star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                            </td>
                            <td class="p-2 border-b-2 border-b-gray-300">
                                {!! $review->message !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#images").change(function() {
                previewImages(this);
                console.log($(this).val());
                $("#choose").show()
            });

            function previewImages(input) {
                var preview = $('#image-grid');
                // console.log(input.files);

                if (input.files) {
                    for (var i = 0; i < input.files.length; i++) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var cover = Math.floor(Math.random() * 51);
                            // console.log(e.target.result);
                            // console.log(input.files);
                            preview.prepend(
                                `<label for="cover${cover}" class="relative h-64 overflow-hidden border-2 border-purple-700 rounded">
                                    <img src="${e.target.result}"/>
                                    
                                </label>`
                            );
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }
            }
        });
    </script>
@endsection
