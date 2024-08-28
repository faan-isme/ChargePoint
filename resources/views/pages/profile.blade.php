@extends('../layout')


@section('title', 'Profile | CHARGEPOINT')


@section('content')

<section>
    <div class=" items-center gap-10 md:max-w-screen-lg mx-auto p-4">


        <div
            class=" mt-28 mb-20 md:mt-20  w-full md:max-w-screen-lg bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-10 mt-4">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('assets/img/user.png') }}"
                    alt="Bonnie image" />
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $data->username }}</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $data->email }}</span>
                <h5 class="mt-10 md:mt-6 mb-1 text-xl font-medium text-gray-900 dark:text-white">Status Pendaftaran</h5>
                <div class="">
                    <div class="p-4 max-w-md mx-auto pt-5 flow-root">
                        <ul role="list" class="-mb-8">
                            <li>
                                <div class="relative pb-8">
                                    <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200"
                                        aria-hidden="true"></span>
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span
                                                class="h-8 w-8 rounded-full  flex items-center justify-center ring-8 ring-white bg-white">
                                                <img class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true"
                                                    src="{{ asset('assets/img/icon/send-alt-svgrepo-com.svg') }}" />

                                            </span>
                                        </div>
                                        @if (($formulir->status??null)== 'new' || ($formulir->status??null) == 'acc' || ($formulir->status??null) == 'revisi')
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm text-green-500">Pengisian Formulir</p>
                                            </div>
                                            <div class="whitespace-nowrap text-right text-sm text-green-500">
                                                {{$formulir->tgl_pengiriman->format('d-m-Y H:i')}}
                                            </div>
                                        </div>
                                        @else
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm text-gray-500">Pengisian Formulir</p>
                                            </div>
                                            <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                                -
                                            </div>
                                        </div>
                                        @endif




                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="relative pb-8">
                                    <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200"
                                        aria-hidden="true"></span>
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span
                                                class="h-8 w-8 rounded-full  flex items-center justify-center ring-8 ring-white bg-white">
                                                <img class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true"
                                                    src="{{ asset('assets/img/icon/file-check-svgrepo-com.svg') }}" />

                                            </span>
                                        </div>
                                        @if (($formulir->status??null) == 'acc' || ($formulir->status??null) == 'revisi')
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm text-green-500">Validasi Berkas</p>
                                            </div>
                                            <div class="whitespace-nowrap text-right text-sm text-green-500">
                                                {{$formulir->updated_at->format('d-m-Y H:i')}}
                                            </div>
                                        </div>
                                        @else
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm text-gray-500">Validasi Berkas</p>
                                            </div>
                                            <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                                -
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="relative pb-8">
                                    <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200"
                                        aria-hidden="true"></span>
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span
                                                class="h-8 w-8 rounded-full  flex items-center justify-center ring-8 ring-white bg-white">
                                                <img class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true"
                                                    src="{{ asset('assets/img/icon/receipt-up-svgrepo-com.svg') }}" />

                                            </span>
                                        </div>
                                        @if (($order->status??null) == 'Paid' || ($order->status??null) == 'Unpaid' )
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm text-green-500">Pembayaran</p>
                                            </div>
                                            <div class="whitespace-nowrap text-right text-sm text-green-500">
                                                @if ($order->status == 'Paid')
                                                {{$order->updated_at->format('d-m-Y H:i')}}
                                                @else
                                                {{$order->status}}
                                                @endif
                                            </div>
                                        </div>
                                        @else
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm text-gray-500">Pembayaran</p>
                                            </div>
                                            <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                                -
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="relative pb-8">

                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span
                                                class="h-8 w-8 rounded-full  flex items-center justify-center ring-8 ring-white bg-white">
                                                <img class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true"
                                                    src="{{ asset('assets/img/icon/verified-svgrepo-com.svg') }}" />

                                            </span>
                                        </div>
                                        @if (($order->status ?? null) == 'Paid')
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm text-green-500">Selesai</p>
                                            </div>
                                            <div class="whitespace-nowrap text-right text-sm text-green-500">
                                                {{$order->updated_at->format('d-m-Y H:i')}}
                                            </div>
                                        </div>
                                        @else
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm text-gray-500">Selesai</p>
                                            </div>
                                            <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                                -
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>


    </div>
</section>
@endsection