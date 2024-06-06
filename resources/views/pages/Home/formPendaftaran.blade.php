@extends('../layout')

@auth
    @section('title', 'Pendaftaran | CHARGEPOINT')
@else
@section('title', 'Welcome ChargePoint | CHARGEPOINT')
@endauth

@section('content')
<section>
    <div class="bg-[#000D81] "> <!-- Menambahkan padding-top untuk menghindari tumpang tindih -->
        <div class="max-w-screen-lg mx-auto p-4">
            <div>
                <h1 class="text-white font-poppins font-semibold">Formulir Pendaftaran ChargePoint</h1>
            </div>
        </div>
    </div>
    <form class="max-w-screen-lg mx-auto p-4 mt-14">
        <div class="md:grid md:grid-cols-2 md:gap-14 lg:gap-28 flex flex-col">
            <div class="flex flex-col">
                <div class="mb-5">
                    <label for="nama"
                        class="block mb-2 text-sm text-gray-900 dark:text-white font-bold font-poppins">Nama</label>
                    <input type="text" id="nama"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
                <div class="mb-5">
                    <label for="telephone"
                        class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white">No
                        Telephone</label>
                    <input type="text" id="telephone"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
                <div class="mb-5">
                    <label for="tanggallahir"
                        class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" id="tanggallahir"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
                <div class="mb-5">
                    <label for="email"
                        class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white">
                        Email</label>
                    <input type="email" id="email"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <label for="jeniskemitraan"
                        class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white">Jenis
                        Kemitraan </label>
                    <select id="jeniskemitraan"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Basic</option>
                        <option>Standar</option>
                        <option>Premium</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="pln"
                        class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white">
                        ID PLN <span class="text-red-500">*</span></label>
                    <input type="text" id="idpln"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
            </div>
            <div class="flex flex-col">
                <div class="mb-5">
                    <label for="nik"
                        class="block mb-2 text-sm text-gray-900 dark:text-white font-bold font-poppins">NIK</label>
                    <input type="text" id="nik"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white"
                        for="file_input">Image KTP</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file">
                </div>
                <div class="mb-5">
                    <label for="alamat"
                        class="block mb-2 text-sm text-gray-900 dark:text-white font-bold font-poppins">Alamat</label>
                    <textarea type="text" id="alamat" rows="3"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required></textarea>
                </div>
                <div class="mb-5">
                    <label for="tipecharger"
                        class="block mb-2 text-sm text-gray-900 dark:text-white font-bold font-poppins">Tipe Charger
                        <span class="text-red-500">*</span></label>
                    <input type="text" id="tipecharger"
                        class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required></input>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white"
                        for="file_input">Image Charger</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file">
                </div>
            </div>
        </div>
        <div class="mt-8 flex gap-5">
            <button class="bg-[#000D81] px-5 py-3 text-white rounded-md hover:bg-black">Submit</button>
            <button class="bg-[#E8EEFF] px-5 py-3 text-black rounded-md  hover:bg-black hover:text-white">Batal</button>
        </div>
        <p class="text-red-500 mt-6">* hanya di isi ketika memilih kemitraan basic</p>
    </form>


</section>

@endsection
