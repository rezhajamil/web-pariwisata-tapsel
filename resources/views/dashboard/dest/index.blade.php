@extends('layouts.dashboard')
@section('content')
    @if (session('success'))
        <div alert
            class="relative w-1/2 p-3 mx-auto mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-green-600 to-lime-400 border-lime-300">
            {{ session('success') }}</div>
    @endif
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid drop-shadow-2xl shadow-soft-xl rounded-2xl bg-clip-border">
                <div
                    class="flex items-center justify-between w-full p-6 pb-0 mb-3 space-x-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="mb-0">Tabel Destinasi</h6>
                    <div class="flex">
                        <button id="btn-print"
                            class="px-3 py-2 font-semibold text-white rounded-lg aspect-square bg-gradient-to-br from-gray-400 cursor-pointer !to-gray-500">
                            <i class="text-lg fa-solid fa-print"></i>
                        </button>
                        <a href="{{ route('admin.destination.create') }}"
                            class="inline-block px-3 py-2 ml-2 mr-3 text-sm font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer whitespace-nowrap bg-gradient-to-tl from-blue-600 to-cyan-400 ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs"><i
                                class="mr-2 fa-solid fa-plus"></i>Destinasi
                        </a>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full px-4 mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        No</th>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Jenis</th>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Nama</th>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Alamat</th>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Jumlah Review</th>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 maps">
                                        Link GMaps</th>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 action">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dests as $key => $dest)
                                    <tr>
                                        <td
                                            class="px-3 py-2 font-bold align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{{ $key + $dests->firstItem() }}</span>
                                        </td>
                                        <td
                                            class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{{ $dest->destType->name }}</span>
                                        </td>
                                        <td
                                            class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{{ $dest->name }}</span>
                                        </td>
                                        <td
                                            class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{{ $dest->address }}</span>
                                        </td>
                                        <td
                                            class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{{ count($dest->reviews) }}</span>
                                        </td>
                                        <td
                                            class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent maps">
                                            <span>
                                                <a class="text-sm font-semibold text-purple-700 transition-all ease-in-out hover:text-blue-600"
                                                    href="{{ $dest->maps_url }}" target="_blank">
                                                    <i class="mr-2 fa-solid fa-link"></i>
                                                    Buka Link
                                                </a>
                                            </span>
                                        </td>
                                        {{-- <td
                                            class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{!! $dest->description !!}</span>
                                        </td> --}}
                                        <td
                                            class="flex flex-col px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent gap-y-2 action">
                                            <a href="{{ route('admin.destination.show', $dest->id) }}"
                                                class="text-sm font-semibold leading-tight text-slate-400">
                                                Lihat</a>
                                            <a href="{{ route('admin.destination.edit', $dest->id) }}"
                                                class="text-sm font-semibold leading-tight text-blue-600">
                                                Edit </a>
                                            <form action="{{ route('admin.destination.destroy', $dest->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" href=""
                                                    class="text-sm font-semibold leading-tight text-red-700">
                                                    Hapus </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="hidden p-0 overflow-x-auto" id="table-container">
                        <table class="items-center w-full px-4 mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        No</th>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Jenis</th>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Nama</th>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Alamat</th>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Jumlah Review</th>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 maps">
                                        Link GMaps</th>
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 action">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dests_all as $key => $dest)
                                    <tr>
                                        <td
                                            class="px-3 py-2 font-bold align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{{ $key + 1 }}</span>
                                        </td>
                                        <td
                                            class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{{ $dest->destType->name }}</span>
                                        </td>
                                        <td
                                            class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{{ $dest->name }}</span>
                                        </td>
                                        <td
                                            class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{{ $dest->address }}</span>
                                        </td>
                                        <td
                                            class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{{ count($dest->reviews) }}</span>
                                        </td>
                                        <td
                                            class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent maps">
                                            <span>
                                                <a class="text-sm font-semibold text-purple-700 transition-all ease-in-out hover:text-blue-600"
                                                    href="{{ $dest->maps_url }}" target="_blank">
                                                    <i class="mr-2 fa-solid fa-link"></i>
                                                    Buka Link
                                                </a>
                                            </span>
                                        </td>
                                        {{-- <td
                                            class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{!! $dest->description !!}</span>
                                        </td> --}}
                                        <td
                                            class="flex flex-col px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent gap-y-2 action">
                                            <a href="{{ route('admin.destination.show', $dest->id) }}"
                                                class="text-sm font-semibold leading-tight text-slate-400">
                                                Lihat</a>
                                            <a href="{{ route('admin.destination.edit', $dest->id) }}"
                                                class="text-sm font-semibold leading-tight text-blue-600">
                                                Edit </a>
                                            <form action="{{ route('admin.destination.destroy', $dest->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" href=""
                                                    class="text-sm font-semibold leading-tight text-red-700">
                                                    Hapus </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $dests->links('components.pagination', compact('dests')) }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
    </script>
    <script>
        function createPDF() {
            var table = document.getElementById('table-container').innerHTML;


            var style = "<style>";
            style = style + "table {width: 100%;font: 17px Calibri;}";
            style = style + "table.resume, th.resume, td.resume {border: solid 1px #059669; border-collapse: collapse;}";
            style = style + "table, th, td {border: solid 1px #ccc; border-collapse: collapse;";
            style = style + "padding: 2px 3px;text-align: center;}";
            style = style + "h4{ width:100%;text-align: center;}";
            style = style + "</style>";

            // CREATE A WINDOW OBJECT.
            var win = window.open('', '', 'height=700,width=700');

            win.document.write('<html><head> ');
            win.document.write(`<title>Daftar Destinasi Wisata Tapanuli Selatan</title>`); // <title> FOR PDF HEADER.
            win.document.write(style); // ADD STYLE INSIDE THE HEAD TAG.
            win.document.write('</head>');
            win.document.write('<body>');
            win.document.write('<body><h4>Daftar Destinasi Wisata Tapanuli Selatan</h4>');
            win.document.write(table); // THE TABLE CONTENTS INSIDE THE BODY TAG.
            win.document.write('</body> </html > ');

            win.document.close(); // CLOSE THE CURRENT WINDOW.

            win.print(); // PRINT THE CONTENTS.
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#btn-print').click(function() {
                $(".action").hide();
                $(".maps").hide();
                createPDF()
                $(".action").show();
                $(".maps").show();
            })
        })
    </script>
@endsection
