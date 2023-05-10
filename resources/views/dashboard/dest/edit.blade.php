@extends('layouts.dashboard')
@section('content')
    <div class="flex flex-wrap -mx-3 gap-y-4">
        <form action="{{ route('admin.destination.update', $destination->id) }}" method="post" enctype="multipart/form-data"
            class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div
                    class="flex items-center justify-between w-full p-6 pb-0 mb-2 space-x-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="mb-0">Tambah Destinasi</h6>
                </div>
                <div class="px-6 py-4 sm:px-8">
                    <div>
                        @csrf
                        @method('put')
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="w-full">
                                <input type="text" placeholder="Nama Destinasi" name="name"
                                    value="{{ old('name', $destination->name) }}"
                                    class="focus:shadow-soft-primary-outline w-full text-sm leading-5.6 ease-soft block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                @error('name')
                                    <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <select name="type" id="type"
                                    class="focus:shadow-soft-primary-outline w-full text-sm leading-5.6 ease-soft block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                    <option value="" disabled selected>Pilih Jenis Destinasi</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ old('type', $destination->type) == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <input type="text" placeholder="Alamat Destinasi" name="address"
                                    value="{{ old('address', $destination->address) }}"
                                    class="focus:shadow-soft-primary-outline w-full text-sm leading-5.6 ease-soft block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                @error('address')
                                    <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <input type="url" placeholder="URL Google Maps" name="maps_url"
                                    value="{{ old('maps_url', $destination->maps_url) }}"
                                    class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all w-full placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                @error('maps_url')
                                    <span class="block text-sm italic text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <textarea name="description" id="description" cols="30" rows="10" class="hidden">{!! old('description', $destination->description) !!}</textarea>
                            <div class="mt-2 col-span-full">
                                <trix-editor input="description" placeholder="Deskripsi"></trix-editor>
                            </div>
                            @error('description')
                                <span class="block text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                            <label for="images"
                                class="inline-block px-3 py-2 text-sm font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer w-fit whitespace-nowrap bg-gradient-to-tl from-blue-600 to-cyan-400 ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs"><i
                                    class="mr-2 fa-solid fa-images"></i>Tambah Gambar Destinasi</label>
                            <input type="file" name="images[]" id="images" class="hidden" multiple
                                accept="image/jpg, image/png, image/gif, image/jpeg">
                            <button type="submit"
                                class="inline-block px-6 py-3 text-xs font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro col-span-full ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="relative min-w-0 px-6 py-4 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <span class="text-lg font-bold">Gambar Destinasi</span>
                <span class="block text-xs italic text-red-600">*Hapus Gambar</span>
                <div class="grid grid-cols-1 gap-3 mt-2 sm:grid-cols-2">
                    @foreach ($destination->images as $image)
                        <label class="relative h-64 overflow-hidden border-2 border-purple-700 rounded">
                            <img src="{{ asset('storage/' . $image->url) }}" />
                            <input type="checkbox" name="delete_image[]" id="image{{ $image->id }}" class="hidden peer"
                                value="{{ $image->id }}">
                            <div
                                class="absolute inset-0 hidden w-full h-full border-4 border-red-600 rounded peer-checked:block">
                            </div>
                        </label>
                    @endforeach
                </div>
                <div id="image-grid" style="display: none;"
                    class="grid grid-cols-1 gap-3 py-2 mt-2 border-t-4 border-gray-700 sm:grid-cols-2">

                </div>
            </div>
        </form>
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
            preview.show();
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
