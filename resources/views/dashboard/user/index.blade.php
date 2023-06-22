@extends('layouts.dashboard')
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid drop-shadow-2xl shadow-soft-xl rounded-2xl bg-clip-border">
                <div
                    class="flex items-center justify-between w-full p-6 pb-0 mb-3 space-x-2 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparen">
                    <h6 class="mb-0">Tabel User</h6>
                    <div class="flex">
                        <button id="btn-print"
                            class="px-3 py-2 font-semibold text-white rounded-lg aspect-square bg-gradient-to-br from-gray-400 cursor-pointer !to-gray-500">
                            <i class="text-lg fa-solid fa-print"></i>
                        </button>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-2 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        No
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Akun
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Tanggal Daftar
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 action">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr class="border-b-2">
                                        <td
                                            class="p-2 text-left align-middle bg-transparent whitespace-nowrap shadow-transparent">
                                            <span class="font-bold leading-tight text-slate-400">
                                                {{ $key + 1 }}
                                            </span>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="avatar">
                                                    <img src="{{ $user->avatar }}"
                                                        class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl"
                                                        alt="{{ $user->name }}" />
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">{{ $user->name }}</h6>
                                                    <p class="mb-0 leading-tight text-slate-400">
                                                        {{ $user->email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-slate-400">
                                                {{ date('d-M-y', strtotime($user->created_at)) }}
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center bg-transparent whitespace-nowrap shadow-transparent action">
                                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="post"
                                                class="block h-full my-auto">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" href=""
                                                    class="my-auto text-sm font-semibold leading-tight text-red-700">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="hidden p-0 overflow-x-auto" id="table-container">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-2 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        No
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Nama
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Email
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Tanggal Daftar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr class="border-b-2">
                                        <td
                                            class="p-2 text-left align-middle bg-transparent whitespace-nowrap shadow-transparent">
                                            <span class="font-bold leading-tight text-slate-400">
                                                {{ $key + 1 }}
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-left align-middle bg-transparent whitespace-nowrap shadow-transparent">
                                            <span class="font-bold leading-tight text-slate-400">
                                                {{ $user->name }}
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-left align-middle bg-transparent whitespace-nowrap shadow-transparent">
                                            <span class="font-bold leading-tight text-slate-400">
                                                {{ $user->email }}
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-slate-400">
                                                {{ date('d-M-y', strtotime($user->created_at)) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
            win.document.write(`<title>Daftar User Web Wisata Tapanuli Selatan</title>`); // <title> FOR PDF HEADER.
            win.document.write(style); // ADD STYLE INSIDE THE HEAD TAG.
            win.document.write('</head>');
            win.document.write('<body>');
            win.document.write('<body><h4>Daftar User Web Wisata Tapanuli Selatan</h4>');
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
                $(".avatar").hide();
                createPDF()
                $(".action").show();
                $(".avatar").show();
            })
        })
    </script>
@endsection
