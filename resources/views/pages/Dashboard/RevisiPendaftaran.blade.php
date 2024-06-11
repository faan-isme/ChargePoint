@extends('../layout-admin')

@auth
    @section('title', 'Data Pendaftaran | CHARGEPOINT')
@else
@section('title', 'Welcome Dashboard ChargePoint | CHARGEPOINT')
@endauth

@section('content')

<div class="px-6 pt-3 md:px-10 md:pt-10 lg:ml-64">
    <h1 class="mb-6 md:text-3xl text-2xl font-poppins font-bold">Revisi Pendaftaran</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-[14px] font-bold font-poppins text-black uppercase bg-[#E8EEFF]">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr class=" bg-[#F8F8F8] text-black font-poppins">
                        <td class="px-6 py-4">
                            {{ $loop->iteration + $data->firstItem() - 1 }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $item->username }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->email }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('CheckPendaftaran', $item->id) }}"
                                class="font-medium px-6 py-2 rounded-md bg-[#000D81] hover:bg-black text-white">Check</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-end mt-10 md:gap-5 gap-3">
        @if ($data->onFirstPage())
            <button class="font-medium px-6 py-2 rounded-md bg-gray-400 text-white cursor-not-allowed opacity-50"
                disabled>Back</button>
        @else
            <a class="page-link" href="{{ $data->previousPageUrl() }}" rel="prev"><button
                    class="font-medium px-6 py-2 rounded-md bg-[#000D81] hover:bg-black text-white">Back</button></a>
        @endif

        @if ($data->hasMorePages())
            <a href="{{ $data->nextPageUrl() }}" rel="next"><button
                    class="font-medium px-6 py-2 rounded-md bg-[#000D81] hover:bg-black text-white">Next</button></a>
        @else
            <button class="font-medium px-6 py-2 rounded-md bg-gray-400 text-white cursor-not-allowed opacity-50"
                disabled>Next</button>
        @endif
    </div>
</div>

@section('script')

@endsection


@endsection
