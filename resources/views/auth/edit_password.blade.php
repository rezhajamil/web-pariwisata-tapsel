@extends('layouts.dashboard', ['plain' => true])
@section('content')
    <section>
        <div
            class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover bg-gradient-to-br from-purple-600 to-pink-400">
            <div class="container z-10">
                <div class="flex flex-wrap mt-0 -mx-3">
                    <div
                        class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                        <div
                            class="relative flex flex-col min-w-0 px-2 py-4 mt-32 break-words bg-white border-0 shadow-none rounded-2xl bg-clip-border drop-shadow-2xl">
                            <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                                <h3
                                    class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-purple-600 to-pink-400 bg-clip-text">
                                    Change Password
                                </h3>
                                <p class="mb-0">Enter your new account password</p>
                            </div>
                            <div class="flex-auto p-6">
                                @error('email')
                                    <span class="block mb-2 text-sm italic text-red-600">{{ $message }}</span>
                                @enderror
                                <form role="form" method="POST" action="{{ route('update_password') }}">
                                    @csrf
                                    @method('put')
                                    <label class="mb-2 ml-1 text-xs font-bold text-slate-700">Password</label>
                                    <div class="mb-4">
                                        <input type="password" name="password"
                                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                            placeholder="Password" aria-label="Password"
                                            aria-describedby="password-addon" />
                                        @error('password')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label class="mb-2 ml-1 text-xs font-bold text-slate-700">Konfirmasi Password</label>
                                    <div class="mb-4">
                                        <input type="password" name="password_confirmation"
                                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                            placeholder="Password_confirmation" aria-label="Password_confirmation"
                                            aria-describedby="password_confirmation-addon" />
                                        @error('password_confirmation')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="inline-block w-full px-6 py-3 mt-6 mb-0 text-xs font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro ease-soft-in tracking-tight-soft bg-gradient-to-tl from-purple-600 to-pink-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Change
                                            Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
