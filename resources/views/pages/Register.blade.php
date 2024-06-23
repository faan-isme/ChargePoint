@extends('../layout')

@auth
    @section('title', 'Login | CHARGEPOINT')
@else
@section('title', 'Welcome ChargePoint | CHARGEPOINT')
@endauth

@section('content')
<div class="md:ms-20 md:me-20 lg:ms-20 ms-10 me-10 lg:me-0 h-screen">
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
    <div class="lg:grid lg:grid-cols-2 lg:items-center lg:gap-10 lg:justify-center" id="grid">
        <div class="flex flex-col">
            <div class="text-center mt-32">
                <h1 class="md:text-5xl text-3xl font-bold">Register </h1>
            </div>

            <div>
                <div class="md:mt-14 mt-10 text-center">
                    <button onclick=""
                        class="flex items-center justify-center p-3 border border-gray-400 rounded-lg shadow-md w-[100%] gap-10 font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                            viewBox="0 0 48 48">
                            <path fill="#FFC107"
                                d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                            </path>
                            <path fill="#FF3D00"
                                d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                            </path>
                            <path fill="#4CAF50"
                                d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                            </path>
                            <path fill="#1976D2"
                                d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                            </path>
                        </svg>
                        Login With Google
                    </button>
                </div>
                <hr class="mt-5 mb-5" />
                <form action="/register" method="post">
                    @csrf
                    <div class="flex flex-col">
                        <label for="email">Email Address</label>
                        <input id="email" name="email"
                            class="w-100 rounded-lg shadow-md p-3 border border-gray-400 mt-3" placeholder="Email"
                            type="email" value="{{ Session::get('email') }}"required />
                    </div>
                    <div class="flex flex-col mt-5">
                        <label for="username">Username</label>
                        <input id="username" name="username"
                            class="w-100 rounded-lg shadow-md p-3 border border-gray-400 mt-3" placeholder="Username"
                            type="text" value="{{ Session::get('username') }}" required />
                    </div>
                    <div class="flex flex-col mt-5">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password"
                            class="w-100 rounded-lg shadow-md p-3 border border-gray-400 mt-3" placeholder="Password" />
                    </div>
                    <div class="flex flex-col mt-5">
                        <label for="confirm-pw">Password Confirmation</label>
                        <input id="confirm-pw" name="password_confirmation" type="password"
                            class="w-100 rounded-lg shadow-md p-3 border border-gray-400 mt-3"
                            placeholder="Konfirmasi Password" />
                    </div>
                    <div class="mt-10">
                        <button class="p-3 bg-[#110DB1] w-[100%] rounded-lg text-white font-bold hover:bg-black"
                            type="submit">Register</button>
                    </div>
                </form>
                <div class="flex text-center justify-center mt-5 gap-2 mb-16">
                    <p class="font-bold text-[#110DB1]">have an account? </p>
                    <a class="font-bold text-[#77049F]" href="/login">Login</a>
                </div>
            </div>
        </div>
        <div class=" bg-[#EAEEFA] h-[100%] p-10 gap-2 hidden lg:block lg:relative">
            <img src="./assets/img/login/assetSignup.png" class="w-full h-full" />
        </div>
    </div>
</div>
<section>

    @section('script')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const cols = document.getElementById("grid");
                console.log(cols);
                if (condition) {

                } else {

                }
            })
        </script>

    @endsection

@endsection
