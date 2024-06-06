@extends('../layout')

@auth
    @section('title', 'Home | CHARGEPOINT')
@else
@section('title', 'Welcome ChargePoint | CHARGEPOINT')
@endauth

@section('content')

{{-- Section 1 --}}
<section class="bg-[#000D81]">
    <div class="md:grid md:grid-cols-2 items-center gap-10 md:max-w-screen-lg mx-auto p-4">
        <div class="mt-28 mb-20 md:mt-20 text-white">
            <h1 class="font-baloo md:text-4xl lg:text-5xl text-3xl">Pendaftaran Mitra</h1>
            <h1 class="font-baloo md:text-4xl lg:text-5xl text-3xl mt-5">Chargepoint</h1>
            <p class="font-poppins text-[18px] font-normal mt-4">Pergi Kemanapun Tanpa Khawatir, Solusi Pintar
                Charger Kendaraan Listrik </p>
            <div class="mt-10">
                <button class="px-5 py-3 bg-[#E8EEFF] text-black rounded-md mt hover:bg-black hover:text-white">Daftar
                    Sekarang</button>
            </div>
        </div>
        <img src="./assets/img/login/assetLogin.png" class="w-full h-full mt-24 hidden md:block md:relative" />
    </div>
</section>

{{-- Section 2 --}}
<section class="bg-[#E8EEFF]">
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
                    <p class="font-poppins">Mitra Lahan</p>
                </div>
                <div class="mt-10 mb-0">
                    <button class="bg-[#000D81] px-5 py-2 rounded-md text-white hover:bg-black">Subscribe Me</button>
                </div>
            </div>
            <div
                class="bg-[#E8EEFF] rounded-md flex lg:py-10 lg:px-16 md:py-10 md:px-10 py-8 px-14 flex-col md:h-[25rem] h-[20rem]  shadow-md  justify-between">
                <div class="text-center">
                    <p class="text-1xl font-poppins font-bold">Standar</p>
                    <h1 class="text-2xl font-poppins font-bold mt-2">Mitra Dua</h1>
                    <p class="font-semibold font-poppins mt-2 mb-2">Fitur</p>
                    <p class="font-poppins">Mitra Lahan</p>
                    <p class="font-poppins">Charge Set</p>
                </div>
                <div class="mt-10 mb-0">
                    <button class="bg-[#000D81] px-5 py-2 rounded-md text-white hover:bg-black">Subscribe Me</button>
                </div>
            </div>
            <div
                class="bg-[#E8EEFF] rounded-md flex lg:py-10 lg:px-16 md:py-10 md:px-10 py-8 px-14 flex-col md:h-[25rem] h-[20rem]  shadow-md justify-between">
                <div class="text-center">
                    <p class="text-1xl font-poppins font-bold">Premium</p>
                    <h1 class="text-2xl font-poppins font-bold mt-2">Mitra Tiga</h1>
                    <p class="font-semibold font-poppins mt-2 mb-2">Fitur</p>
                    <p class="font-poppins">Mitra Lahan</p>
                    <p class="font-poppins">Charge Set</p>
                    <p class="font-poppins">Member Premium</p>
                </div>
                <div class="mt-10 mb-0">
                    <button class="bg-[#000D81] px-5 py-2 rounded-md text-white hover:bg-black">Subscribe Me</button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Section 4 --}}
<section class="bg-[#E8EEFF]">
    <div class="max-w-screen-lg mx-auto p-4">
        <div class="text-center lg:mt-28 md:mt-16 mt-20">
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
