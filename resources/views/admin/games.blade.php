@include('layouts.header')
@include('admin.includes.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Games')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl py-8 px-6  bg-white ">

        <div class="grid gap-10 md:grid-cols-4 grid-cols-2 ">
            {{-- game 1 --}}
            <div
                class="bg-[#F3EFF0] h-[400px] border game-card hover:bg-primary  transition-all   border-primary rounded-lg">
                <a href="../startMenu">
                    <div class="h-10 w-full bg-primary">

                    </div>
                    <div class="flex flex-col mt-14 items-center h-full gap-3">
                        <div>
                            <img src="{{ asset('images/game-1.svg') }}" alt="games">
                        </div>
                        <div class="flex flex-col items-center">
                            <h2 class="text-2xl font-semibold gc_heading">@lang('lang.Game_1')</h2>
                            <p class="text-gray text-sm gc_heading">@lang('lang.Random_Cards')</p>
                        </div>
                        <div>
                            <button
                                class="w-[132px] h-10 text-white text-lg bg-secondary rounded  font-semibold">@lang('lang.Play')</button>
                        </div>
                    </div>
                </a>
            </div>
            {{-- game 2 --}}
            <div
                class="bg-[#F3EFF0] h-[400px] border game-card hover:bg-primary  transition-all  border-primary rounded-lg">
                <a href="../startMenu">
                    <div class="h-10 w-full bg-primary">

                    </div>
                    <div class="flex flex-col mt-14 items-center h-full gap-3">
                        <div>
                            <img src="{{ asset('images/game-2.svg') }}" alt="games">
                        </div>
                        <div class="flex flex-col items-center">
                            <h2 class="text-2xl font-semibold gc_heading">@lang('lang.Game_2')</h2>
                            <p class="text-gray text-sm gc_heading">@lang('lang.Flip_Cards')</p>
                        </div>
                        <div>
                            <button
                                class="w-[132px] h-10 text-white text-lg bg-secondary rounded font-semibold">@lang('lang.Play')</button>
                        </div>
                    </div>
                </a>
            </div>
            {{-- game 3 --}}
            <div
                class="bg-[#F3EFF0] h-[400px] border game-card hover:bg-primary  transition-all  border-primary rounded-lg">
                <a href="../startMenu">
                    <div class="h-10 w-full bg-primary">

                    </div>
                    <div class="flex flex-col mt-[80px] items-center h-full gap-3">
                        <div>
                            <img src="{{ asset('images/game-3.svg') }}" alt="games">
                        </div>
                        <div class="flex flex-col items-center">
                            <h2 class="text-2xl font-semibold gc_heading">@lang('lang.Game_3')</h2>
                            <p class="text-gray text-sm gc_heading">@lang('lang.Flash_cards')</p>
                        </div>
                        <div>
                            <button
                                class="w-[132px] h-10 text-white text-lg bg-secondary rounded font-semibold">@lang('lang.Play')</button>
                        </div>
                    </div>
                </a>
            </div>
            {{-- game 4 --}}
            <div
                class="bg-[#F3EFF0] h-[400px] border game-card hover:bg-primary  transition-all  border-primary rounded-lg">
                <a href="../startMenu">
                    <div class="h-10 w-full bg-primary">

                    </div>
                    <div class="flex flex-col mt-[80px] items-center h-full gap-3">
                        <div>
                            <img src="{{ asset('images/game-4.svg') }}" alt="games">
                        </div>
                        <div class="flex flex-col items-center">
                            <h2 class="text-2xl font-semibold gc_heading">@lang('lang.Game_4')</h2>
                            <p class="text-gray text-sm gc_heading">@lang('lang.Read_and_Select_a_Cards')</p>
                        </div>
                        <div>
                            <button
                                class="w-[132px] h-10 text-white text-lg bg-secondary rounded font-semibold">@lang('lang.Play')</button>
                        </div>
                    </div>
                </a>
            </div>
        </div>



    </div>
</div>






@include('layouts.footer')
