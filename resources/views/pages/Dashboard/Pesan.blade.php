@extends('../layout-admin')

@auth
    @section('title', 'Data Pendaftaran | CHARGEPOINT')
@else
@section('title', 'Welcome Dashboard ChargePoint | CHARGEPOINT')
@endauth

@section('content')

<div class="px-6 pt-3 md:px-10 md:pt-10 lg:ml-64">
    <h1 class="mb-6 md:text-3xl text-2xl font-poppins font-bold">Data Belum Lengkap</h1>

    <form class="mt-10" action="{{route('revisi',$id)}}" method="POST">
        @csrf
        <textarea id="message" name="message" rows="5"
            class="block p-2.5 w-full text-sm text-black rounded-sm border border-gray-300 " required maxlength="100"></textarea>
        <div class="flex justify-start mt-10 md:gap-5 gap-3">
            <button class="font-medium px-6 py-2 rounded-md bg-[#000D81] hover:bg-black text-white">Submit</button>
            <button
                class="font-medium px-6 py-2 rounded-md bg-[#E8EEFF] hover:bg-black text-black hover:text-white">Batal</button>
        </div>
    </form>

</div>

@section('script')
    <script src="../js/dashboard/check.js"></script>
@endsection


@endsection
