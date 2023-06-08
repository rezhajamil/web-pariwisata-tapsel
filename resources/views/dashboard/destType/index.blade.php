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
                    <h6 class="mb-0">Tabel Tipe Destinasi</h6>
                    <div class="flex">
                        <a href="{{ route('admin.destination_type.create') }}"
                            class="inline-block px-3 py-2 ml-2 mr-3 text-sm font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer whitespace-nowrap bg-gradient-to-tl from-blue-600 to-cyan-400 ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs"><i
                                class="mr-2 fa-solid fa-plus"></i>Tipe Destinasi</a>
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
                                        Nama</th>
                                    {{-- <th
                                            class="px-6 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Deskripsi</th> --}}
                                    <th
                                        class="px-3 py-3 text-xs font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($destTypes as $key => $destType)
                                    <tr>
                                        <td
                                            class="px-3 py-2 font-bold align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{{ $key + 1 }}</span>
                                        </td>
                                        <td
                                            class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span>{{ $destType->name }}</span>
                                        </td>
                                        <td
                                            class="flex flex-col px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent gap-y-2">
                                            <a href="{{ route('admin.destination_type.edit', $destType->id) }}"
                                                class="text-sm font-semibold leading-tight text-blue-600">
                                                Edit </a>
                                            <form action="{{ route('admin.destination_type.destroy', $destType->id) }}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
