@extends('../layout')


@section('title', 'Status Pendaftaran | CHARGEPOINT')


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
                    <h1 class="text-white font-poppins font-semibold">Status Pendaftaran ChargePoint</h1>
                </div>
            </div>
        </div>
        <div
            class="max-w-screen-lg mx-auto p-4 h-[500px] md:mt-20 sm:mt-15 flex items-center p-4 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600">
            @if ($status->status == 'acc')
                <div
                    class="w-full flex flex-col items-center p-4 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400 ">

                    <svg viewBox="0 0 20 20" height="50" fill="#299963" stroke="">
                        <path
                            d="M10 1.875C8.39303 1.875 6.82214 2.35152 5.486 3.24431C4.14985 4.1371 3.10844 5.40605 2.49348 6.8907C1.87852 8.37535 1.71762 10.009 2.03112 11.5851C2.34463 13.1612 3.11846 14.6089 4.25476 15.7452C5.39106 16.8815 6.8388 17.6554 8.4149 17.9689C9.99099 18.2824 11.6247 18.1215 13.1093 17.5065C14.594 16.8916 15.8629 15.8502 16.7557 14.514C17.6485 13.1779 18.125 11.607 18.125 10C18.1225 7.84588 17.2657 5.7807 15.7425 4.25751C14.2193 2.73431 12.1541 1.87749 10 1.875ZM13.8696 8.57727L9.28589 12.9523C9.16935 13.0632 9.01463 13.125 8.85376 13.125C8.69289 13.125 8.53818 13.0632 8.42164 12.9523L6.13037 10.7648C6.01067 10.6501 5.94137 10.4926 5.9377 10.3269C5.93404 10.1612 5.99629 10.0008 6.11081 9.88092C6.22532 9.76107 6.38272 9.69157 6.54844 9.68769C6.71416 9.68381 6.87464 9.74587 6.99463 9.86023L8.85376 11.6357L13.0054 7.67273C13.1254 7.55837 13.2859 7.49631 13.4516 7.50019C13.6173 7.50407 13.7747 7.57357 13.8892 7.69342C14.0037 7.81327 14.066 7.97367 14.0623 8.13939C14.0586 8.30512 13.9893 8.46261 13.8696 8.57727Z">
                        </path>
                    </svg>

                    <h1 class="text-[#299963] font-poppins font-bold">Pendaftaran telah disetujui</h1>
                    <h2 class="text-[#299963] font-poppins font-bold">Silahkan melakuakn pembayaran untuk memproses
                        pemasangan alat dan aktivasi akun</h2>
                    <div class="mt-4 flex justify-center">
                        <div class="text-right">
                            <button id="pay-button" class="bg-blue-500 text-white px-6 py-2 rounded mt-4">Checkout</button>
                        </div>
                    </div>
                </div>
            @elseif($status->status == 'new')
                <div
                    class="w-full flex flex-col items-center p-4 rounded-lg bg-blue-100 dark:bg-gray-800 dark:text-green-400 ">

                    <svg viewBox="0 0 20 20" height="50" fill="#1C64F2" stroke="">
                        <path
                            d="M10 1.875C8.39303 1.875 6.82214 2.35152 5.486 3.24431C4.14985 4.1371 3.10844 5.40605 2.49348 6.8907C1.87852 8.37535 1.71762 10.009 2.03112 11.5851C2.34463 13.1612 3.11846 14.6089 4.25476 15.7452C5.39106 16.8815 6.8388 17.6554 8.4149 17.9689C9.99099 18.2824 11.6247 18.1215 13.1093 17.5065C14.594 16.8916 15.8629 15.8502 16.7557 14.514C17.6485 13.1779 18.125 11.607 18.125 10C18.1225 7.84588 17.2657 5.7807 15.7425 4.25751C14.2193 2.73431 12.1541 1.87749 10 1.875ZM13.8696 8.57727L9.28589 12.9523C9.16935 13.0632 9.01463 13.125 8.85376 13.125C8.69289 13.125 8.53818 13.0632 8.42164 12.9523L6.13037 10.7648C6.01067 10.6501 5.94137 10.4926 5.9377 10.3269C5.93404 10.1612 5.99629 10.0008 6.11081 9.88092C6.22532 9.76107 6.38272 9.69157 6.54844 9.68769C6.71416 9.68381 6.87464 9.74587 6.99463 9.86023L8.85376 11.6357L13.0054 7.67273C13.1254 7.55837 13.2859 7.49631 13.4516 7.50019C13.6173 7.50407 13.7747 7.57357 13.8892 7.69342C14.0037 7.81327 14.066 7.97367 14.0623 8.13939C14.0586 8.30512 13.9893 8.46261 13.8696 8.57727Z">
                        </path>
                    </svg>

                    <h1 class="text-[#1C64F2] font-poppins font-bold">Formulir Dalam Proses Verifikasi</h1>
                </div>
            
            @endif

        </div>

    </section>
@endsection

@section('script')
    @if (($status->status??null) == 'acc')
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        alert("payment success!");
                        console.log(result);
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        alert("wating your payment!");
                        console.log(result);
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        alert("payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })
            });
        </script>
    @endif

@endsection
