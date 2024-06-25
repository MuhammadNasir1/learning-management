<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Role - LMS</title>
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>

<div class="flex px-10  justify-center">
    <!-- form -->

    <div class="md:w-1/2 px-8  sm:px-16  ">
        <div>
            <img class="mt-5 w-[180px]" src="{{ asset('images/logo.svg') }}" alt="logo">
        </div>

        <h2 class="font-semibold text-2xl  text-[#000000] mt-36">Select Login</h2>
        <div class="mt-10">
        <a href="register/teacher" class="mt-4"><button
                class="bg-secondary rounded-full w-full mt-6 py-4 hover:scale-105 duration-300 shadow-sm text-white font-bold ">Teacher Login
            </button></a>
        <a href="register/parent" class="mt-4"><button
                class="bg-pink rounded-full w-full mt-6 py-4 hover:scale-105 duration-300 shadow-sm text-white font-bold ">Parent Login
            </button></a>
        </div>
    </div>

    <!-- image -->
    <div class="md:block hidden w-1/2  h-[100vh] ">
        <img class="rounded-2xl  h-full" src="{{ asset('images/loginpage.svg') }}">
    </div>
</div>



<script src="{{ asset('javascript/script.js') }}"></script>

</body>

</html>
