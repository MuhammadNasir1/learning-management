@include('layouts.header')
@include('parent.includes.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.Dashboard')</h1>
    </div>
    <div class="grid grid-cols-3 gap-6  mt-4">
        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Children')</p>
                        <h2 class="text-2xl font-semibold mt-1">05</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/totall_student.svg') }}" alt="Children">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Pending_Lessons')</p>
                        <h2 class="text-2xl font-semibold mt-1">00</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/lesson_com_icon.svg') }}"
                            alt="pending">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Recorded_Videos')</p>
                        <h2 class="text-2xl font-semibold mt-1">05</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/recorded.svg') }}"
                            alt="Recorded Videos">
                    </div>
                </div>
            </div>
        </div>




    </div>

</div>
@include('layouts.footer')
