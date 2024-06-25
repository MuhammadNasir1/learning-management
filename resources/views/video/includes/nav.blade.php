<?php
$role = session('user_det')['role'];
?>
<nav>
    <div class="grid grid-cols-3 items-center px-6 py-5">
        <div>
            <div class="flex items-center gap-5 ">

                @if ($role === 'parent')
                    <a href="../" class="">
                    @else
                        <a href="../teachingpage" class="">
                @endif
                <svg width="35" height="23" viewBox="0 0 35 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.5 2L3 11L12.5 20.5" stroke="#EDBD58" stroke-width="4" stroke-linecap="round" />
                    <path d="M33 11H3" stroke="#EDBD58" stroke-width="4" stroke-linecap="round" />
                </svg>

                </a>
                <h2 class="text-4xl font-semibold  leading-none">@lang('lang.Teaching_Card')</h2>
                <div data-popover-target="popover-bottom" data-popover-placement="bottom">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z"
                            stroke="#339B96" stroke-width="2" />
                        <path d="M11 16V10" stroke="#339B96" stroke-width="2" stroke-linecap="round" />
                        <path
                            d="M11 6C11.5523 6 12 6.44772 12 7C12 7.55228 11.5523 8 11 8C10.4477 8 10 7.55228 10 7C10 6.44772 10.4477 6 11 6Z"
                            fill="#339B96" />
                    </svg>
                </div>
                <div data-popover id="popover-bottom" role="tooltip"
                    class="absolute border-none z-10 invisible inline-block w-[400px] text-sm text-gray-500 transition-opacity duration-300 bg-white border  rounded-lg shadow-dark opacity-0 ">
                    <div class="px-3 py-2 bg-gray-100 ">
                        <h3 class="font-semibold text-gray-900 ">Teaching Card</h3>
                    </div>
                    <div class="px-3 py-2">
                        <p>Here app will display Word in sequence and below the word teacher can get 3 audios. Next and
                            previous button to navigate. Once all words are completed in sequence order then the lesson
                            completed or start again.</p>
                    </div>
                    <div data-popper-arrow></div>
                </div>
            </div>
        </div>
        <div class="flex justify-center">

            <img width="150px" src="{{ asset('images/logo.svg') }}" alt="">
        </div>


        <div>
            <div class="flex justify-end gap-6">
                <button>
                    <svg width="19" height="21" viewBox="0 0 19 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.13043 0.130859C4.80824 0.130859 1.30439 3.63472 1.30439 7.95694V12.6341L0.38207 13.5564C0.00902661 13.9294 -0.10256 14.4904 0.0993266 14.9779C0.301214 15.4653 0.776831 15.783 1.30439 15.783H16.9565C17.4841 15.783 17.9597 15.4653 18.1616 14.9779C18.3635 14.4904 18.2519 13.9294 17.8788 13.5564L16.9565 12.6341V7.95694C16.9565 3.63472 13.4527 0.130859 9.13043 0.130859Z"
                            fill="#67748E" />
                        <path
                            d="M9.13082 21C6.96971 21 5.21777 19.2481 5.21777 17.0869H13.0439C13.0439 19.2481 11.292 21 9.13082 21Z"
                            fill="#67748E" />
                    </svg>
                </button>
                <div class="flex items-center gap-2">
                    <div class="leading-tight  text-end">
                        <h2 class="text-md">{{ session('user_det')['name'] }}</h2>
                        <p class="text-xs  text-gray">{{ session('user_det')['role'] }}</p>
                    </div>
                    <div>
                        <img height="42px" width="42px" class="rounded-[5px]" src="{{ asset('images/user.png') }}"
                            alt="user">
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
