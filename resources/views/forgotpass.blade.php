<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Forgot - Enlighteningedu</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon(32X32).png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white">

    <div class="flex px-10  justify-center">
        <div class="md:w-1/2 px-8  sm:px-16  ">
            <div>
                <img class="mt-5 w-[180px]" src="{{ asset('images/logo.svg') }}" alt="logo">
            </div>

            <h2 class="font-semibold text-2xl mt-16 text-[#000000]">Forgot Password?</h2>
            <div>
                <p class="font-normal  leading-7  text-[16px]  mt-3">Please enter the email associated with <br> your
                    account
                    and we'll send an email with <br> link to reset your password.</p>
            </div>
            <form action="/" id="login-form" method="post" class="flex flex-col gap-4">
                @csrf
                <div class="relative mt-14 border-b-2 border-black">
                    <label for="email" class="text-sm text-gray">Email</label>
                    <input
                        class="p-2 pl-6 relative focus:outline-none focus:border-transparent outline-none border-none w-full text-sm"
                        type="email" name="email" placeholder="Enter your email address" id="email">
                    <img class="absolute bottom-3" width="17" src="{{ asset('images/icons/email.svg') }}"
                        alt="email">
                </div>


                <button type="submit" id="loginbutton"
                    class="bg-pink rounded-full w-full text-white py-4 hover:scale-105 duration-300 shadow-sm  mt-8">
                    <div class=" text-center hidden" id="spinner">
                        <svg aria-hidden="true"
                            class="w-5 h-5 mx-auto text-center text-gray-200 animate-spin fill-primary"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                    </div>
                    <div class="text-white font-semibold" id="text">
                        Forgot
                    </div>
                </button>
                <div>
                    <p class="font-normal  mt-3  leading-8 text-center ">You can <a href="login"
                            class="text-primary">Login here !</a></p>

                </div>
            </form>
        </div>

        <!-- image -->
        <div class="md:block hidden w-1/2  h-[100vh] ">
            <img class="rounded-2xl  h-full" src="{{ asset('images/loginpage.svg') }}">
        </div>
    </div>



    <script src="{{ asset('javascript/script.js') }}"></script>

</body>

</html>
