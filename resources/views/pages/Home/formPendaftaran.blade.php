@extends('../layout')

@auth
    @section('title', 'Pendaftaran | CHARGEPOINT')
@else
@section('title', 'Welcome ChargePoint | CHARGEPOINT')
@endauth

@section('content')
<section>
    @include('pages.partials.alerterror')
    <div class="bg-[#000D81] ">
        <div class="max-w-screen-lg mx-auto p-4">
            <div class="flex items-center gap-4">
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" id="back" x="0" y="0" version="1.1" viewBox="0 0 29 29"
                        xml:space="preserve" width="29" height="29">
                        <path
                            d="M14.5 27.065a12.465 12.465 0 0 1-8.839-3.655c-4.874-4.874-4.874-12.804 0-17.678 2.361-2.361 5.5-3.662 8.839-3.662s6.478 1.3 8.839 3.662c4.874 4.874 4.874 12.804 0 17.678a12.465 12.465 0 0 1-8.839 3.655zm-7.425-5.069c4.094 4.094 10.756 4.094 14.85 0C23.908 20.012 25 17.375 25 14.571s-1.092-5.441-3.075-7.425S17.305 4.07 14.5 4.07 9.059 5.163 7.075 7.146 4 11.766 4 14.571s1.092 5.441 3.075 7.425z"
                            fill="white">
                        </path>
                        <path
                            d="M16.798 20.167a.997.997 0 0 1-.707-.293l-4.596-4.596a.999.999 0 0 1 0-1.414l4.596-4.596a.999.999 0 1 1 1.414 1.414l-3.889 3.889 3.889 3.889a.999.999 0 0 1-.707 1.707z"
                            fill="white">
                        </path>
                    </svg>
                </a>
                <h1 class="text-white font-poppins font-semibold">Formulir Pendaftaran ChargePoint</h1>
            </div>
        </div>
    </div>
    <form class="max-w-screen-lg mx-auto p-4 mt-14" action="/daftar" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="md:grid md:grid-cols-2 md:gap-14 lg:gap-28 flex flex-col">
            <div class="flex flex-col">
                <div class="mb-5">
                    <label for="nama"
                        class="block mb-2 text-sm text-gray-900 dark:text-white font-bold font-poppins">Nama</label>
                    <input type="text" id="nama" name="nama"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
                <div class="mb-5">
                    <label for="telephone"
                        class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white">No
                        Telephone</label>
                    <input type="number" id="telephone" name="no_tlp"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <label for="jeniskemitraan"
                        class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white">Jenis Kemitraan
                    </label>
                    <select id="jeniskemitraan" name="jenis_mitra"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Basic">Basic</option>
                        <option value="Standar">Standar</option>
                        <option value="Premium">Premium</option>
                    </select>
                </div>
                <div class="mb-5" id="pln-input">
                </div>
            </div>
            <div class="flex flex-col">
                <div class="mb-5">
                    <label for="nik"
                        class="block mb-2 text-sm text-gray-900 dark:text-white font-bold font-poppins">NIK</label>
                    <input type="number" maxlength="16" id="nik" name="NIK"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white"
                        for="img-Ktp">Image KTP</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="img-Ktp" type="file" name="ktp_img" accept="image/*">


                    <div class="mb-4 mt-4">
                        <img id="preview" alt="Preview Gambar" class="w-[50%] h-[50%] hidden cursor-pointer">
                    </div>
                    <div class="fixed p-5 md:p-o inset-0 hidden items-center justify-center bg-black bg-opacity-50"
                        id="imageModal">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-sm mx-auto my-auto">
                            <div class="p-2">
                                <img id="modalcheck" src="#" class="img-fluid w-full" alt="Modal Image">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="mb-5">
                    <label for="alamat"
                        class="block mb-2 text-sm text-gray-900 dark:text-white font-bold font-poppins">Alamat</label>
                    <textarea type="text" id="alamat" rows="3" name="alamat"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required></textarea>
                </div>
                <div class="mb-5" id="tipecharger-input">
                </div>

                <div class="mb-5" id="imagecharger-input">
                </div>
            </div>
        </div>
        <div class="mt-8 flex gap-5">
            <button class="bg-[#000D81] px-5 py-3 text-white rounded-md hover:bg-black" type="submit">Submit</button>
            <button class="bg-[#E8EEFF] px-5 py-3 text-black rounded-md hover:bg-black hover:text-white"
                type="reset">Reset</button>
        </div>

    </form>
</section>

@section('script')
    <script src="./js/tamu/formDaftar.js"></script>
@endsection


@endsection
