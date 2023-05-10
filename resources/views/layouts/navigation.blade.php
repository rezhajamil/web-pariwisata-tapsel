<div class="bg-primary">
    <div>
        <div class="relative">
            <!-- For md screen size -->
            <div id="md-searchbar" class="items-center justify-between hidden px-6 py-5 bg-white lg:hidden">
                <div class="flex items-center space-x-3 text-gray-800">
                    <div>
                        <img class="" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/navigation-I-svg2.svg"
                            alt="search">
                        <img class="hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/navigation-I-svg2dark.svg"
                            alt="search">
                    </div>
                    <input type="text" placeholder="Search for products"
                        class="text-sm leading-none text-gray-600 focus:outline-none" />
                </div>
                <div class="space-x-6">
                    <button aria-label="view favourites"
                        class="text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-800">
                        <img class="w-5" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/navigation-I-svg3.svg"
                            alt="favourites">
                        <img class="hidden w-5"
                            src="https://tuk-cdn.s3.amazonaws.com/can-uploader/navigation-I-svg3dark.svg"
                            alt="favourites">
                    </button>
                    <button aria-label="go to cart"
                        class="text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-800">
                        <img class="w-5" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/navigation-I-svg4.svg"
                            alt="bag">
                        <img class="hidden w-5"
                            src="https://tuk-cdn.s3.amazonaws.com/can-uploader/navigation-I-svg4dark.svg"
                            alt="bag">
                    </button>
                </div>
            </div>
            <!-- For md screen size -->

            <!-- For large screens -->
            <div class="px-6 py-4 bg-primary">
                <div class="container flex items-center justify-around mx-auto space-x-4">
                    <h1 class="pr-3 text-gray-800 border-collapse cursor-pointer md:border-r-2">
                        <span class="text-xl font-extrabold text-white uppercase whitespace-nowrap">Pariwisata
                            Tapsel</span>
                    </h1>
                    <ul class="items-center justify-start hidden w-8/12 space-x-8 md:flex">
                        <li>
                            <a href="{{ route('home') }}"
                                class="text-base font-bold text-white transition-all hover:text-gray-medium focus:outline-none hover:underline">
                                Home
                            </a>
                        </li>
                        <li class="relative">
                            <button id="btn-wisata"
                                class="text-base font-bold text-white transition-all hover:text-gray-medium focus:outline-none hover:underline">
                                Wisata
                                <i class="fa-solid fa-caret-down"></i>
                            </button>
                            <div id="drop-wisata"
                                class="absolute left-0 z-50 hidden overflow-hidden bg-white rounded-md shadow-md h-fit">
                                <a href="#"
                                    class="inline-block w-full px-8 py-2 font-semibold transition-all border-b whitespace-nowrap text-gray-dark hover:bg-slate-300">Danau</a>
                                <a href="#"
                                    class="inline-block w-full px-8 py-2 font-semibold transition-all border-b whitespace-nowrap text-gray-dark hover:bg-slate-300">Air
                                    Terjun</a>
                            </div>
                        </li>
                    </ul>
                    @auth
                        <a href="{{ route('logout') }}"
                            class="hidden px-3 py-2 font-bold transition-all bg-white rounded-md cursor-pointer md:block whitespace-nowrap hover:bg-gray-200 text-primary">
                            <i class="mr-2 fa-solid fa-right-from-bracket"></i>
                            SIGN OUT
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="hidden px-3 py-2 font-bold transition-all bg-white rounded-md cursor-pointer md:block whitespace-nowrap hover:bg-gray-200 text-primary">
                            <i class="mr-2 fa-brands fa-google"></i>
                            SIGN IN
                        </a>
                    @endauth
                    <button id="open-menu"
                        class="block px-3 py-2 transition-all bg-white rounded-md cursor-pointer md:hidden aspect-square hover:bg-gray-200">
                        <i class="text-lg fa-solid fa-bars text-primary"></i>
                    </button>
                </div>
            </div>
            <!-- For small screen -->
            <div id="mobile-menu" class="absolute inset-0 z-10 flex flex-col hidden w-full h-screen bg-white md:hidden">
                <div class="flex items-center justify-between p-4 pb-4 border-b border-gray-200">
                    @auth
                        <a href="{{ route('logout') }}"
                            class="hidden px-3 py-2 font-bold transition-all bg-white rounded-md cursor-pointer md:block whitespace-nowrap hover:bg-gray-200 text-primary">
                            <i class="mr-2 fa-solid fa-right-from-bracket"></i>
                            SIGN OUT
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-3 py-2 font-bold text-white transition-all rounded-md cursor-pointer bg-primary md:hidden whitespace-nowrap hover:bg-gray-200">
                            <i class="mr-2 fa-brands fa-google"></i>
                            SIGN IN
                        </a>
                    @endauth

                    <button id="close-menu" aria-label="close menu"
                        class="p-2 rounded focus:outline-none focus:ring-2 focus:ring-primary">
                        <i class="text-lg fa-solid fa-xmark text-primary"></i>
                    </button>
                </div>
                <div class="p-4 bg-primary">
                    <ul class="flex flex-col space-y-6">
                        <li class="w-full border-b-2">
                            <a href="{{ route('home') }}"
                                class="flex justify-between w-full text-lg text-white text-white-center focus:outline-none focus:ring-2 focus:ring-white">
                                Home
                            </a>
                        </li>
                        <li class="w-full border-b-2">
                            <a href=""
                                class="flex justify-between w-full text-lg text-white text-white-center focus:outline-none focus:ring-2 focus:ring-white">
                                Wisata
                                <div>
                                    <i class="fa-solid fa-angle-right"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
