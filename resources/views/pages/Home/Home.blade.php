@extends('../layout')

@auth
    @section('title', 'Home | CHARGEPOINT')
@else
@section('title', 'Welcome ChargePoint | CHARGEPOINT')
@endauth

@section('content')

{{-- Section 1 --}}
<section class="bg-[#000D81]">
    @if ($errors->any())
        <div class="fixed z-50">
            @foreach ($errors->all() as $index => $error)
                <div id="alert-{{ $index + 1 }}"
                    class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 z-50"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium"> {{ $error }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-{{ $index + 1 }}" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>
    @endif
    <div class="md:grid md:grid-cols-2 items-center gap-10 md:max-w-screen-lg mx-auto p-4">
        <div class="mt-28 mb-20 md:mt-20 text-white">
            <h1 class="font-baloo md:text-4xl lg:text-5xl text-3xl">Pendaftaran Mitra</h1>
            <h1 class="font-baloo md:text-4xl lg:text-5xl text-3xl mt-5">Chargepoint</h1>
            <p class="font-poppins text-[18px] font-normal mt-4">Pergi Kemanapun Tanpa Khawatir, Solusi Pintar
                Charger Kendaraan Listrik </p>
            <div class="mt-10">

                @auth
                    <button class="px-5 py-3 bg-[#E8EEFF] text-black rounded-md hover:bg-black hover:text-white"
                        onclick="window.location.href='{{ route('formPendaftaran') }}?program=Basic'">Daftar Sekarang</button>
                @else
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                        class="px-5 py-3 bg-[#E8EEFF] text-black rounded-md hover:bg-black hover:text-white" type="button">
                        Daftar Sekarang
                    </button>

                    <div id="popup-modal" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="popup-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                        Silahkan Login terlebih dahulu</h3>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                                        onclick="window.location.href='/login'">
                                        Login
                                    </button>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>

                @endauth


            </div>
        </div>
        <img src="./assets/img/login/assetLogin.png" class="w-full h-full mt-24 hidden md:block md:relative" />
    </div>
</section>

{{-- Section 2 --}}
<section id="about" class="bg-[#E8EEFF]">
    <div class=" max-w-screen-lg mx-auto p-4 ">
        <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-10 py-10 md:py-0">
            <img src="./assets/img/home/section2.png" class="w-full h-full hidden md:block md:relative" />
            <div>
                <h1 class="font-poppins font-bold lg:text-4xl md:text-3xl text-2xl">Apa itu CharPoint ?</h1>
                <p class="mt-5">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac dolor risus. Pellentesque
                    placerat,
                    risus et luctus posuere, enim mi mollis nibh, at bibendum nisl libero pretium est. Sed sed ex vel
                    odio
                    ullamcorper tincidunt vel quis turpis. Ut nibh felis, pulvinar ac nibh quis, ultrices fringilla
                    justo.
                    Etiam semper tristique neque quis vehicula.
                </p>
            </div>
        </div>

    </div>
</section>

{{-- Section 3 --}}
<section class="mb-20">
    <div class="max-w-screen-lg mx-auto p-4">
        <div class="text-center md:mt-28 mt-20">
            <h1 class="font-poppins font-bold lg:text-4xl md:text-3xl text-2xl">Pendaftaran Mitra</h1>
            <p class="font-medium font-poppins mt-2">Silahkan Pilih Pendaftaran Mitra di Charge Point</p>
        </div>
        <div class="flex flex-col md:flex md:flex-row mt-20 gap-10 justify-center text-center">
            <div
                class="bg-[#E8EEFF] rounded-md flex lg:py-10 lg:px-16 md:py-10 md:px-10 py-8 px-14 flex-col md:h-[25rem]  h-[20rem]  shadow-md justify-between">
                <div class="text-center">
                    <p class="text-1xl font-poppins font-bold">Basic</p>
                    <h1 class="text-2xl font-poppins font-bold mt-2">Mitra Satu</h1>
                    <p class="font-semibold font-poppins mt-2 mb-2">Fitur</p>
                    <p class="font-poppins">Memeber Premium</p>
                </div>
                <div class="mt-10 mb-0">
                    @auth
                        <button id="subscribe-basic"
                            onclick="window.location.href='{{ route('formPendaftaran') }}?program=Basic'"
                            class="bg-[#000D81] px-5 py-2 rounded-md text-white hover:bg-black">Subscribe Me</button>
                    @else
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="bg-[#000D81] px-5 py-2 rounded-md text-white hover:bg-black">Subscribe Me</button>
                    @endauth
                </div>
            </div>
            <div
                class="bg-[#E8EEFF] rounded-md flex lg:py-10 lg:px-16 md:py-10 md:px-10 py-8 px-14 flex-col md:h-[25rem] h-[20rem]  shadow-md  justify-between">
                <div class="text-center">
                    <p class="text-1xl font-poppins font-bold">Standar</p>
                    <h1 class="text-2xl font-poppins font-bold mt-2">Mitra Dua</h1>
                    <p class="font-semibold font-poppins mt-2 mb-2">Fitur</p>
                    <p class="font-poppins">Memeber Premium</p>
                    <p class="font-poppins">Charge Set</p>
                </div>
                <div class="mt-10 mb-0">
                    @auth
                        <button id="subscribe-standar"
                            onclick="window.location.href='{{ route('formPendaftaran') }}?program=Standar'"
                            class="bg-[#000D81] px-5 py-2 rounded-md text-white hover:bg-black">Subscribe Me</button>
                    @else
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="bg-[#000D81] px-5 py-2 rounded-md text-white hover:bg-black">Subscribe Me</button>
                    @endauth
                </div>
            </div>
            <div
                class="bg-[#E8EEFF] rounded-md flex lg:py-10 lg:px-16 md:py-10 md:px-10 py-8 px-14 flex-col md:h-[25rem] h-[20rem]  shadow-md justify-between">
                <div class="text-center">
                    <p class="text-1xl font-poppins font-bold">Premium</p>
                    <h1 class="text-2xl font-poppins font-bold mt-2">Mitra Tiga</h1>
                    <p class="font-semibold font-poppins mt-2 mb-2">Fitur</p>
                    <p class="font-poppins">Member Premium</p>
                    <p class="font-poppins">Charge Set</p>
                    <p class="font-poppins">Meteran Listrik</p>

                </div>
                <div class="mt-10 mb-0">
                    @auth
                        <button id="subscribe-premium"
                            onclick="window.location.href='{{ route('formPendaftaran') }}?program=Premium'"
                            class="bg-[#000D81] px-5 py-2 rounded-md text-white hover:bg-black">Subscribe Me</button>
                    @else
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="bg-[#000D81] px-5 py-2 rounded-md text-white hover:bg-black">Subscribe Me</button>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Section 4 --}}
<section class="bg-[#E8EEFF]">
    <div class="max-w-screen-lg mx-auto p-4">
        <div class="text-center lg:mt-28 md:mt-20 mt-16">
            <h1 class="font-poppins font-bold lg:text-4xl md:text-3xl text-2xl">Q & A</h1>
            <p class="font-medium font-poppins mt-2">Pertanyaan Seputar Charge Point dan lain-lain </p>
        </div>
        <div class="flex flex-col mt-16 md:mt-20 md:mb-20 mb-16">
            <div>
                <div class="p-4 bg-white rounded-md tanya-QA">
                    <p class="font-medium font-poppins">Bagaimana Cara Mendaftar Akun Charge Point ?</p>
                </div>

                <div class="p-4 bg-black text-white rounded-md hidden mt-4 jawab-QA">
                    <p class="font-medium font-poppins">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vestibulum sit amet sapien id diam finibus malesuada quis eu sem. Quisque tristique tristique
                        venenatis. </p>
                </div>
            </div>
            <div>
                <div class="p-4 bg-white rounded-md mt-4 tanya-QA">
                    <p class="font-medium font-poppins">Benefit di Pendaftara Mitra Charge Point ? </p>
                </div>
                <div class="p-4 bg-black text-white rounded-md hidden mt-4 jawab-QA">
                    <p class="font-medium font-poppins">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vestibulum sit amet sapien id diam finibus malesuada quis eu sem. Quisque tristique tristique
                        venenatis. </p>
                </div>
            </div>
            <div>
                <div class="p-4 bg-white rounded-md mt-4 tanya-QA">
                    <p class="font-medium font-poppins">Visi dan misi dari Charge Point ? </p>
                </div>
                <div class="p-4 bg-black text-white rounded-md hidden mt-4 jawab-QA">
                    <p class="font-medium font-poppins">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vestibulum sit amet sapien id diam finibus malesuada quis eu sem. Quisque tristique tristique
                        venenatis. </p>
                </div>
            </div>

            <div>
                <div class="p-4 bg-white rounded-md mt-4 tanya-QA">
                    <p class="font-medium font-poppins">Bagaimana Cara Mengatasi Lupa Password ? </p>
                </div>
                <div class="p-4 bg-black text-white rounded-md hidden mt-4 jawab-QA">
                    <p class="font-medium font-poppins">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vestibulum sit amet sapien id diam finibus malesuada quis eu sem. Quisque tristique tristique
                        venenatis. </p>
                </div>
            </div>


        </div>
    </div>
    </div>
</section>

{{-- Footer --}}
<footer class="bg-[#000D81] mt-20">
    <div class="max-w-screen-lg mx-auto p-4 text-white ">
        <a href="#" class="font-poppins text-[10px] md:text-[16px]">@2024 Charge Point Menuju Indonesia Emas
            2045</a>
    </div>

</footer>



@section('script')
    <script src="./js/tamu/home.js"></script>
@endsection

@endsection
