<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Enlighteningedu</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon(32X32).png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white">


    <div class="flex px-10  justify-center">
        <!-- form -->

        <div class="md:w-1/2 px-8  sm:px-16  ">
            <div>
                <img class="mt-5 w-[180px]" src="{{ asset('images/logo.svg') }}" alt="logo">
            </div>

            <h2 class="font-semibold text-2xl mt-16 text-[#000000]">Register Here</h2>
            <div>
                <p class="font-normal  leading-8 ">If you already have an account register <br> You can <a
                        href="login" class="text-primary">Login here !</a></p>
            </div>
            <form id="register_data" method="post" class="flex flex-col gap-4">
                @csrf
                <input type="hidden" name="role" value="parent">
                <div class="relative mt-12 border-b-2 border-black">
                    <label for="email" class="text-sm text-gray">User Name</label>
                    <input
                        class="p-2 pl-6 relative focus:outline-none focus:border-transparent outline-none border-none w-full text-sm"
                        type="text" name="name" placeholder="Enter your User name" id="username">
                    <img class="absolute bottom-3" width="17" src="{{ asset('images/icons/email.svg') }}"
                        alt="email">
                </div>
                <div class="relative  border-b-2 border-black">
                    <label for="email" class="text-sm text-gray">Email</label>
                    <input
                        class="p-2 pl-6 relative focus:outline-none focus:border-transparent outline-none border-none w-full text-sm"
                        type="email" name="email" placeholder="Enter your email address" id="email">
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
                        <img class="absolute  eyeicon right-0 bottom-2 cursor-pointer" id="eyeicon" width="18px"
                            src="{{ asset('images/icons/eye-invisible.png') }}" alt="show">
                    </div>
                </div>
                <div class="relative border-b-2 border-black">
                    <label for="cPassword" class="text-sm text-gray">Confrim Password</label>
                    <input
                        class="passinput p-2 pl-6  focus:outline-none focus:border-transparent outline-none border-none w-full  text-sm"
                        type="password" name="cpassword" placeholder="Confrim your Password" id="cPassword">
                    <img class="absolute bottom-3" width="15" src="{{ asset('images/icons/lock.svg') }}"
                        alt="password">
                    <div>
                        <img class="absolute eyeicon right-0 bottom-2 cursor-pointer" id="eyeicon" width="18px"
                            src="{{ asset('images/icons/eye-invisible.png') }}" alt="show">
                    </div>
                </div>
                <div>
                    <div class="flex items-center gap-2 mt-1">
                        <input class="text-green-600 bg-gray-100" type="checkbox" name="term_cond" id="term_condition"
                            required>
                        <p class="text-sm">Agree with <span data-modal-target="default-modal"
                                data-modal-toggle="default-modal" id="terms_condtion"
                                class="text-primary cursor-pointer">Terms &
                                Condition.</span></p>
                    </div>
                </div>
                <button type="submit" id="loginbutton"
                    class="bg-pink rounded-full w-full text-white py-4 hover:scale-105 duration-300 shadow-sm">
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
                        Register
                    </div>
                </button>
            </form>
        </div>

        <!-- image -->
        <div class="md:block hidden w-1/2  h-[100vh] ">
            <img class="rounded-2xl  h-full" src="{{ asset('images/loginpage.svg') }}">
        </div>
    </div>

    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-6xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-end px-4 py-2  border-b rounded-t bg-primary">
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="border-b border-blue-500 pb-3">
                        <img width="150px" src="{{ asset('images/logo.svg') }}" alt="">
                    </div>
                    <h1 class="text-center text-lg underline">家長須知</h1>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <ul class="list-disc">
                        <li class="underline mt-4  list-none">上課守則</li>
                        <li class="ml-4 text-sm mt-2">請學童準時出席，逾時出席, 恕不補時。</li>
                        <li class="ml-4 text-sm mt-2">在課室內必須佩戴口罩及穿上襪子。</li>
                        <li class="ml-4 text-sm mt-2">家長不可陪同上課。由於中心空間有限，請家長在門外等候。。</li>
                        <li class="ml-4 text-sm mt-2">**所有已報讀的課堂將不設退款安排，亦不得轉讓他人、空缺席課堂只可補堂，不可順延。若需特別安排，本
                            中心將收取總學費之百分之三十作為行政費用。本中心將保留一切有關課堂安排之最終決定權。</li>

                        <li class="underlinemt mt-4 list-none">有關惡劣天氣之課堂安排</li>
                        <li class="ml-4 text-sm mt-2">當天文台發出紅色暴雨警告或懸掛三號熱帶氣旋警告時，本中心仍會照常運作。</li>
                        <li class="ml-4 text-sm mt-2">當天文台發出黑色暴雨警告或懸掛八號或以上的熱帶氣旋警告時，或根據教育局指引，學童無須返回本中心上
                            課，當天的課堂不會額外安排補課。</li>

                        <li class="underlinemt mt-4 list-none">有關調堂或請假安排</li>
                        <li class="ml-4 text-sm mt-2">如需要調動整月時間，家長必須於一個月前通知及確認，例: 9月通知，整月調動須在10月該月份調動上課時間。</li>
                        <li class="ml-4 text-sm mt-2">在一般情況下，學童如請事假或病假，家長必須在當天上課3小時前致電本中心請假，病假需要附上醫生證明，
                            方可獲安排補堂。</li>
                        <li class="ml-4 text-sm mt-2">**如家長沒有預先請假而缺席課堂，一律當自動放棄，不會被安排補堂。所有已報讀的課堂在任何情況下將不設
                            退款安排，亦不得轉讓他人使用</li>
                        <li class="underlinemt mt-4 list-none">補課須知</li>
                        <li class="ml-4 text-sm mt-2">每星期一堂之學生，每月可安排補課合共1次。(該月份請假不可超過1堂，如多於1堂，本中心不會作出補堂安排)</li>
                        <li class="ml-4 text-sm mt-2">每星期兩或三堂之學生，每月可安排補課合共2次。(該月份請假不可超過2堂，如多於2堂，本中心不會作出補堂安排)</li>
                        <li class="ml-4 text-sm mt-2">本中心公眾假期休息，已繳交的公眾假期之學費，可與老師聯絡另行安排補堂。</li>
                        <li class="ml-4 text-sm mt-2">任何補堂必須在報讀月份的3個月內完成，逾期作廢。</li>
                        <li class="ml-4 text-sm mt-2">如學生即將停學，請在最後的繳費月內完成全部課堂，所有剩餘的課堂將不可順延。</li>

                        <li class="underlinemt mt-4 list-none">因應新型冠狀病毒之特別安排</li>
                        <li class="ml-4 text-sm mt-2">如因疫情教育局宣佈暫停面授課堂，家長可要求順延課堂或安排網課。若果家長選擇順延，當可回復面授後，學生
                            也必須立即回來上課並在指定時間內完成餘下的課堂。(例如：7月1日回復面授，一星期一堂之學生成餘兩堂順延課
                            堂及一堂補堂，必須在7月14日前完成課堂，逾期作廢。</li>
                        <li class="ml-4 text-sm mt-2">由於在疫情期間本中心會繼續提供面授及網課，所以不論教育局有否宣佈暫停面授，已付費的課堂必須在報讀月份
                            的6個月期限內完成，逾期作廢。(例如：如教育局宣報暫停面授9個月，學生也必須在6個月內完成課程。)</li>

                        <li class="underlinemt list-none">*所有已的課堂將不設退款安排，亦不得聘他人使用。</li>
                        <li class="underlinemt list-none">**本中心將保留一切有關課堂安排之最終決定權。</li>
                        <li class="underlinemt list-none mt-4">謹此</li>
                        <li class="underlinemt list-none mt-1">啟蒙教育</li>

                    </ul>
                    </p>
                    <div class="mt-4 flex gap-2 items-center">
                        <input type="checkbox" name="terms" id="terms" class="text-green-600 bg-gray-100"
                            required>
                        <label for="terms " class="text-sm">Agree with Terms & Condition.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('javascript/script.js') }}"></script>
    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#term_condition').click(function() {
                $('#terms_condtion').click();

            })
            $('#terms').click(function() {
                $('#terms_condtion').click();

            })

            $("#register_data").submit(function(event) {
                // Prevent the default form submission
                event.preventDefault();

                // Serialize the form data into a JSON object
                var formData = $(this).serialize();

                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "/registerdata",
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
                        // Handle the error here
                        $('#text').removeClass('hidden');
                        $('#spinner').addClass('hidden');
                        $('#loginbutton').attr('disabled', false);
                    }
                });
            });
        });
    </script>
</body>

</html>
