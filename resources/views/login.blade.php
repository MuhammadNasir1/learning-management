<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Enlighteningedu</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon(32X32).png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white">
    <div class="flex px-10  justify-center">
        <div class="md:w-1/2 px-8  sm:px-16  ">
            <div>
                <img class="mt-5 w-[180px]" src="{{ asset('images/logo.svg') }}" alt="logo">
            </div>

            <h2 class="font-semibold text-2xl mt-16 text-[#000000]">Log In</h2>
            <div>
                <p class="font-normal  leading-8 ">If you don't have an account registered <br> You can <a
                        href="register" class="text-primary">Register here !</a></p>
            </div>
            <form id="login_data" method="post" class="flex flex-col gap-4">
                @csrf
                <div class="relative mt-16 border-b-2 border-black">
                    <label for="email" class="text-sm text-gray">Email</label>
                    <input
                        class="p-2 pl-6 relative focus:outline-none focus:border-none focus:border-transparent outline-none border-none w-full text-sm"
                        type="email" name="email" placeholder="Enter your Email Address" id="email">
                    <img class="absolute bottom-3" width="17" src="{{ asset('images/icons/email.svg') }}"
                        alt="email">
                </div>
                <div class="relative border-b-2 border-black">
                    <label for="Password" class="text-sm text-gray">Password</label>
                    <input
                        class="passinput p-2 pl-6  focus:outline-none focus:border-transparent outline-none border-none w-full  text-sm"
                        type="password" name="password" placeholder="Enter your Password" id="Password">
                    <img class="absolute bottom-3" width="15" src="{{ asset('images/icons/lock.svg') }}"
                        alt="password">
                    <div>
                        <img class="eyeicon absolute right-0 bottom-2 cursor-pointer" id="eyeicon" width="18px"
                            src="{{ asset('images/icons/eye-invisible.png') }}" alt="show">

                    </div>
                </div>
                <div>
                    <a href="/forgot" class="text-primary text-[12px]/[18px]  text-end m-0">Forgotpassword ?</a>
                </div>
                <button type="submit" id="loginbutton"
                    class="bg-pink rounded-full w-full text-white  py-4 hover:scale-105 duration-300 shadow-sm">
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
                    <div class="text-white  font-semibold" id="text">
                        Login
                    </div>
                </button>
            </form>
        </div>

        <!-- image -->
        <div class="md:block hidden w-1/2  h-[100vh] ">
            <img class="rounded-2xl  h-full" src="{{ asset('images/loginpage.svg') }}">
        </div>
    </div>
    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $("#login_data").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "/login",
                    data: formData,
                    dataType: "json",
                    beforeSend: function() {
                        $('#spinner').removeClass('hidden');
                        $('#text').addClass('hidden');
                        $('#loginbutton').attr('disabled', true);
                    },
                    success: function(response) {
                        // Handle the success response here
                        if (response.success == true) {
                            $('#text').removeClass('hidden');
                            $('#spinner').addClass('hidden');
                            // Redirect to the  specfic role dashboard
                            if (response.user.role == "parent") {

                                window.location.href = '/';
                            } else if (response.user.role == "superAdmin") {

                                window.location.href = '../admin';

                            } else {

                                window.location.href = response.user.role;
                            }
                        } else if (response.success == false) {
                            Swal.fire(
                                'Warning!',
                                response.message,
                                'warning'
                            )
                        }
                    },
                    error: function(jqXHR) {

                        let response = JSON.parse(jqXHR.responseText);

                        Swal.fire(
                            'Warning!',
                            response.message,
                            'warning'
                        )
                        $('#text').removeClass('hidden');
                        $('#spinner').addClass('hidden');
                        $('#loginbutton').attr('disabled', false);
                    }
                });
            });
        });


        //  register page password show and hide

        let passinputs = document.querySelectorAll('.passinput');
        let eyebtns = document.querySelectorAll(".eyeicon");

        eyebtns.forEach((btn, index) => {
            btn.addEventListener("click", () => {
                let passinput = passinputs[index];
                if (passinput.type === "password") {
                    passinput.type = "text";
                    btn.src = "../images/icons/eye-visible.png";
                } else {
                    passinput.type = "password";
                    btn.src = "../images/icons/eye-invisible.png";
                }
            });
        });
    </script>

</body>

</html>
