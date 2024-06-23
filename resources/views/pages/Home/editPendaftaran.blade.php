@extends('../layout')

@section('title', 'Edit Formulir | CHARGEPOINT')


@section('content')
    <section>
        {{-- @if ($errors->any())
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
        @endif --}}
        @include('pages.partials.alerterror')
        <div class="bg-[#000D81]">
            <div class="max-w-screen-lg mx-auto p-4">
                <div class="flex items-center gap-4">
                    <a href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" id="back" x="0" y="0" version="1.1"
                            viewBox="0 0 29 29" xml:space="preserve" width="29" height="29">
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
                    <h1 class="text-white font-poppins font-semibold">Edit Formulir Pendaftaran ChargePoint</h1>
                </div>
            </div>
        </div>
        {{-- pesan admin --}}
        <div class="max-w-screen-lg mx-auto p-4 mt-14">
            <h1 class="text-[#000D81] font-poppins font-semibold">Pesan Admin</h1>
            <br>
            <div class="flex items-start gap-2.5">
                <img class="w-8 h-8 rounded-full" src="/assets/img/admin.png" alt="Admin">
                <div class="flex flex-col gap-1 w-full max-w-[320px]">
                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $data->username }}</span>
                        <span
                            class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $data->pesan_updated_at }}</span>
                    </div>
                    <div
                        class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                        <p class="text-sm font-normal text-gray-900 dark:text-white"> {{ $data->pesan }}</p>
                    </div>
                </div>
            </div>
            <br>
            <hr>
        </div>

        <div class="max-w-screen-lg mx-auto p-4 mt-14">
            <h1 class="text-[#000D81] font-poppins font-semibold">Update Formulir</h1>
        </div>
        @php
            $formulirId = $data->id;
            $encryptedId = Crypt::encryptString($formulirId);
        @endphp
        <form class="max-w-screen-lg mx-auto p-4 mt-14" action="{{ route('UpdateFormulir', $encryptedId) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="md:grid md:grid-cols-2 md:gap-14 lg:gap-28 flex flex-col">
                <div class="flex flex-col">
                    <div class="mb-5">
                        <label for="nama"
                            class="block mb-2 text-sm text-gray-900 dark:text-white font-bold font-poppins">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ $data->nama }}"
                            class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>
                    <div class="mb-5">
                        <label for="telephone"
                            class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white">No
                            Telephone</label>
                        <input type="number" id="telephone" name="no_tlp" value="{{ $data->no_telp }}"
                            class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>
                    @if ($data->id_program === 1)
                        <div class="mb-5" id="pln-input">
                            <label for="pln"
                                class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white">ID PLN
                            </label>
                            <input type="number" maxlength="11" id="pln" name="id_pelangganPLN"
                                value="{{ $data->id_pelangganPLN }}"
                                class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5" id="tipecharger-input">
                            <label for="tipecharger"
                                class="block mb-2 text-sm text-gray-900 dark:text-white font-bold font-poppins">Tipe
                                Charger
                            </label>
                            <input type="text" id="tipecharger" name="tipe_charger" value="{{ $data->tipe_charger }}"
                                class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>

                        <div class="mb-5" id="imagecharger-input">
                            <label class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white"
                                for="img-charger">Image Charger</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="img-charger" type="file" name="charger_img" accept="image/*">
                            <div class="mb-4 mt-4">
                                @if ($data->charger_img)
                                    <img id="preview-charger" src="{{ asset('storage/' . $data->charger_img) }}"
                                        alt="Preview Gambar" class="w-[50%] h-[50%] cursor-pointer">
                                @else
                                    <img id="preview-charger" alt="Preview Gambar"
                                        class="w-[50%] h-[50%] hidden cursor-pointer">
                                @endif
                            </div>
                            <div class="fixed p-5 md:p-o inset-0 hidden items-center justify-center bg-black bg-opacity-50"
                                id="modal-charger">
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-sm mx-auto my-auto">
                                    <div class="p-2">
                                        <img id="check-charger" src="#" class="img-fluid w-full"
                                            alt="Modal Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="flex flex-col">
                    <div class="mb-5">
                        <label for="nik"
                            class="block mb-2 text-sm text-gray-900 dark:text-white font-bold font-poppins">NIK</label>
                        <input type="number" maxlength="16" id="nik" name="NIK" value="{{ $data->NIK }}"
                            class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white"
                            for="img-Ktp">Image KTP</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="img-Ktp" type="file" name="ktp_img" accept="image/*"
                            value="{{ $data->ktp_img }}">


                        <div class="mb-4 mt-4">
                            @if ($data->ktp_img)
                                <img id="preview" src="{{ asset('storage/' . $data->ktp_img) }}" alt="Preview Gambar"
                                    class="w-[50%] h-[50%] cursor-pointer">
                            @else
                                <img id="preview" alt="Preview Gambar" class="w-[50%] h-[50%] hidden cursor-pointer">
                            @endif

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
                            required>{{ $data->alamat }}</textarea>
                    </div>
                    {{-- @if ($data->id_program === 1)
                        <div class="mb-5" id="tipecharger-input">
                            <label for="tipecharger"
                                class="block mb-2 text-sm text-gray-900 dark:text-white font-bold font-poppins">Tipe
                                Charger
                            </label>
                            <input type="text" id="tipecharger" name="tipe_charger"
                                value="{{ $data->tipe_charger }}"
                                class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>

                        <div class="mb-5" id="imagecharger-input">
                            <label class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white"
                                for="img-charger">Image Charger</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="img-charger" type="file" name="charger_img" accept="image/*">
                            <div class="mb-4 mt-4">
                                @if ($data->charger_img)
                                    <img id="preview-charger" src="{{ asset('storage/' . $data->charger_img) }}"
                                        alt="Preview Gambar" class="w-[50%] h-[50%] cursor-pointer">
                                @else
                                    <img id="preview-charger" alt="Preview Gambar"
                                        class="w-[50%] h-[50%] hidden cursor-pointer">
                                @endif
                            </div>
                            <div class="fixed p-5 md:p-o inset-0 hidden items-center justify-center bg-black bg-opacity-50"
                                id="modal-charger">
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-sm mx-auto my-auto">
                                    <div class="p-2">
                                        <img id="check-charger" src="#" class="img-fluid w-full"
                                            alt="Modal Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif --}}
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-5">
                <button class="bg-[#000D81] px-5 py-3 text-white rounded-md hover:bg-black" type="submit">Submit</button>
                <a href="{{route('home')}}"><button class="bg-[#E8EEFF] px-5 py-3 text-black rounded-md hover:bg-black hover:text-white" type="button">Kembali</button></a>
            </div>

        </form>
    </section>

@section('script')
    <script src="/js/tamu/formDaftar.js"></script>
@endsection


@endsection
