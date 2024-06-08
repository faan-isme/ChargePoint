@extends('../layout-admin')

@auth
    @section('title', 'Data Pendaftaran | CHARGEPOINT')
@else
@section('title', 'Welcome Dashboard ChargePoint | CHARGEPOINT')
@endauth

@section('content')

<div class="px-6 pt-3 md:px-10 md:pt-10 lg:ml-64">
    <h1 class="mb-6 md:text-3xl text-2xl font-poppins font-bold">Check Pendaftaran</h1>
    <form class="mt-10" action="#">
        <div class="font-poppins mb-6">
            <label class="font-bold">Nama</label>
            <div class="p-3 w-full border-[#D0D5DD] mt-2 text-[#667085] border-2 rounded-md">
                <p>Anonymus</p>
            </div>
        </div>
        <div class="font-poppins mb-6">
            <label class="font-bold">No Telephone</label>
            <div class="p-3 w-full border-[#D0D5DD] mt-2 text-[#667085] border-2 rounded-md">
                <p>083723791823</p>
            </div>
        </div>
        <div class="font-poppins mb-6">
            <label class="font-bold">Tanggal Lahir</label>
            <div class="p-3 w-full border-[#D0D5DD] mt-2 text-[#667085] border-2 rounded-md">
                <p>20 Januari 1945</p>
            </div>
        </div>
        <div class="font-poppins mb-6">
            <label class="font-bold">Email</label>
            <div class="p-3 w-full border-[#D0D5DD] mt-2 text-[#667085] border-2 rounded-md">
                <p>anonymus@gmail.com</p>
            </div>
        </div>
        <div class="font-poppins mb-6">
            <label class="font-bold">NIK</label>
            <div class="p-3 w-full border-[#D0D5DD] mt-2 text-[#667085] border-2 rounded-md">
                <p>3210511270001234</p>
            </div>
        </div>
        <div class="font-poppins mb-6">
            <label class="font-bold">Image</label>
            <div class="mt-2 w-full">
                <img src="../assets/img/check/ktp.png" class="lg:w-2/5 w-4/5 md:w-3/5 cursor-pointer" id="checkimg" />
            </div>
            <div class="fixed p-5 md:p-o inset-0 hidden items-center justify-center bg-black bg-opacity-50"
                id="imageModal">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-sm mx-auto">
                    <div class="p-2">
                        <img id="modalcheck" src="#" class="img-fluid w-full" alt="Modal Image">
                    </div>
                </div>
            </div>
        </div>
        <div class="font-poppins mb-6">
            <label class="font-bold">Alamat</label>
            <div class="p-3 w-full border-[#D0D5DD] mt-2 text-[#667085] border-2 rounded-md">
                <p>Jln. Pendidikan, Bantul, Yogyakarta</p>
            </div>
        </div>
        <div class="flex mt-10 md:gap-5 gap-3 mb-10">
            <a href="/admin/accpendaftaran"
                class="font-medium md:px-6 py-2 px-4 text-center rounded-md bg-[#000D81] hover:bg-black text-white w-[50%]">Terima
                atau ACC</a>
            <a href="/admin/notifikasi"
                class="font-medium md:px-6 py-2 px-4 text-center rounded-md bg-[#000D81] hover:bg-black text-white w-[50%]">Belum
                Lengkap</a>
        </div>
    </form>

</div>

@section('script')
    <script src="../js/dashboard/check.js"></script>
@endsection


@endsection
