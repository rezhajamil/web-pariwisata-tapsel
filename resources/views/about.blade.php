@extends('layouts.app')
@section('content')
    <section class="w-full min-h-screen px-3 py-8 bg-green-700 sm:px-6">
        <h1 class="w-full mb-2 text-2xl font-extrabold text-center text-white md:text-4xl">DINAS PARIWISATA
            TAPANULI SELATAN
        </h1>
        <div class="px-4 py-2 mx-auto mb-8 bg-white rounded-full shadow-lg sm:px-9 md:px-10 w-fit aspect-auto">
            <div class="flex items-center gap-x-3 sm:gap-x-6">
                <div class="overflow-hidden rounded-md w-fit h-fit">
                    <img src="{{ asset('images/logo-1.png') }}" alt="Logo 1" class="h-6 sm:h-6 md:h-9">
                </div>
                <div class="overflow-hidden rounded-md w-fit h-fit">
                    <img src="{{ asset('images/logo-2.png') }}" alt="Logo 2" class="h-6 sm:h-6 md:h-9">
                </div>
                <div class="overflow-hidden rounded-md w-fit h-fit">
                    <img src="{{ asset('images/logo-3.png') }}" alt="Logo 3" class="w-8 sm:w-10 md:w-12">
                </div>
            </div>
        </div>
        <div class="w-full mx-auto my-6 overflow-hidden rounded-lg shadow-lg sm:w-10/12">
            <img src="{{ asset('images/disparda.jpg') }}" alt="" class="object-cover object-center">
        </div>
        <div
            class="flex flex-col my-6 transition-all duration-500 border-2 border-white rounded-lg group hover:drop-shadow-xl hover:shadow-xl">
            <div
                class="p-3 text-white transition-all duration-500 border-b-2 border-white group-hover:bg-white group-hover:text-green-700">
                <span class="text-xl font-bold">VISI</span>
            </div>
            <div class="p-3 transition-all duration-500 group-hover:bg-green-800">
                <span class="text-justify text-white sm:text-lg">
                    Mewujudkan destinasi pariwisata yang berwawasan lingkungan dan lestari serta membangun pemuda dan
                    olahraga yang unggul
                </span>
            </div>
        </div>
        <div
            class="flex flex-col my-6 transition-all duration-500 border-2 border-white rounded-lg group hover:drop-shadow-xl hover:shadow-xl">
            <div
                class="p-3 text-white transition-all border-b-2 border-white group-hover:bg-white group-hover:text-green-700">
                <span class="text-xl font-bold">MISI</span>
            </div>
            <div class="p-3 transition-all duration-500 group-hover:bg-green-800">
                <ul class="space-y-2">
                    <li class="flex gap-x-2">
                        <span class="text-justify text-white sm:text-lg">
                            1.
                        </span>
                        <span class="text-justify text-white sm:text-lg">
                            Mewujudkan destinasi pariwisata dan mengembangkan objek wisata yang ada dengan berwawasan
                            lingkungan dan melestarikan kesenian daerah
                        </span>
                    </li>
                    <li class="flex gap-x-2">
                        <span class="text-justify text-white sm:text-lg">
                            2.
                        </span>
                        <span class="text-justify text-white sm:text-lg">
                            Mengembangkan kegiatan-kegiatan positif yang memfasilitasi pengembangan bakat dan minat generasi
                            muda dalam bidang kepemudaan kewirausahaan kepeleporan pemuda serta kebangsaan yang berdasarkan
                            Pancasila dan undang-undang dasar 1945 dalam kerangka NKRI
                        </span>
                    </li>
                    <li class="flex gap-x-2">
                        <span class="text-justify text-white sm:text-lg">
                            3.
                        </span>
                        <span class="text-justify text-white sm:text-lg">
                            Meningkatkan budaya dan prestasi olahraga secara berjenjang dan berkelanjutan melalui tahap
                            pengenalan olahraga pemanduan pengembangan bakat peningkatan prestasi serta pemantauan bakat
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {


        })
    </script>
@endsection
