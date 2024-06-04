@extends('../layout')

@auth
    @section('title', 'Login | CHARGEPOINT')
@else
@section('title', 'Welcome ChargePoint | CHARGEPOINT')
@endauth

@section('content')
<div class="md:ms-20 md:me-20 lg:ms-20 ms-10 me-10 lg:me-0 h-screen">
    <div class="lg:grid lg:grid-cols-2 lg:items-center lg:gap-10 lg:justify-center" id="grid">
        <div class="flex flex-col">
            <div class="text-center mt-10">
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
                <div class="flex flex-col">
                    <label>Email Address</label>
                    <input class="w-100 rounded-lg shadow-md p-3 border border-gray-400 mt-3" placeholder="Email" />
                </div>
                <div class="flex flex-col mt-5">
                    <label>Username</label>
                    <input class="w-100 rounded-lg shadow-md p-3 border border-gray-400 mt-3" placeholder="Username" />
                </div>
                <div class="flex flex-col mt-5">
                    <label>Password</label>
                    <input class="w-100 rounded-lg shadow-md p-3 border border-gray-400 mt-3" placeholder="Password" />
                </div>
                <div class="flex flex-col mt-5">
                    <label>Password Confirmation</label>
                    <input class="w-100 rounded-lg shadow-md p-3 border border-gray-400 mt-3"
                        placeholder="Konfirmasi Password" />
                </div>
                <div class="mt-3 text-end">
                    <a href="#" class="text-[#110DB1] font-semibold">Lupa Password ?</a>
                </div>
                <div class="mt-10">
                    <button class="p-3 bg-[#110DB1] w-[100%] rounded-lg text-white font-bold hover:bg-black"
                        onclick="">Login</button>
                </div>
                <div class="flex text-center justify-center mt-5 gap-2">
                    <p class="font-bold text-[#110DB1]">Don’t have an account? </p>
                    <a class="font-bold text-[#77049F]" href="/signin">Register</a>
                </div>
            </div>
        </div>
        <div class=" bg-[#EAEEFA] h-[100%] p-10 gap-2 hidden lg:block lg:relative">
            <img src="./assets/login/assetSignup.png" class="w-full h-full" />
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
