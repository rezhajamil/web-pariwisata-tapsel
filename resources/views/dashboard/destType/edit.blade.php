@extends('layouts.dashboard')
@section('content')
    <div class="flex flex-wrap -mx-3 gap-y-4">
        <div class="flex-none max-w-full px-3 w-fit">
            <a href="{{ route('admin.destination_type.index') }}"
                class="inline-block px-3 py-3 mx-3 text-xs font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer w-fit bg-gradient-to-br from-slate-600 from-20% !to-gray-400 leading-pro ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                <i class="mr-2 fa-solid fa-arrow-left"></i>
                Kembali
            </a>
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid drop-shadow-2xl shadow-soft-xl rounded-2xl bg-clip-border">
                <div
                    class="flex items-center justify-between w-full p-6 pb-0 mb-2 space-x-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="mb-0">Edit Tipe Destinasi</h6>
                </div>
                <div class="px-6 py-4 sm:px-8">
                    <form action="{{ route('admin.destination_type.update', $destType->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="w-full col-span-full">
                                <input type="text" placeholder="Nama Tipe Destinasi" name="name"
                                    value="{{ old('name', $destType->name) }}"
                                    class="focus:shadow-soft-primary-outline w-full text-sm leading-5.6 ease-soft block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                @error('name')
                                    <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit"
                                class="inline-block px-6 py-3 text-xs font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro col-span-full ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">Submit</button>
                        </div>
                    </form>
                </div>
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
    </script>
@endsection
