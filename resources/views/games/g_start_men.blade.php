@include('layouts.header')
@include('games.includes.nav')


<section class="mx-16 mt-10 ">
    <div class="shadow-dark mt-3  rounded-xl   bg-white h-[70vh] ">

        <div class="flex flex-col items-center  justify-center w-full h-full gap-10">
            <div>
                <img class="w-[200px]" src="{{ asset('images/game-1.svg') }}" alt="game">
            </div>
            <button class="w-full" data-modal-target="phonemodal" data-modal-toggle="phonemodal">
                <div
                    class=" shadow-dark h-[70px] text-white font-semibold text-2xl  bg-secondary flex justify-center items-center">
                    @lang('lang.Lets_Go')!
                </div>
            </button>
        </div>
    </div>
    <div class="mt-8 flex  justify-between">
        <div class="flex items-center  gap-5">
            {{-- <h2 class="text-xl  font-semibold">@lang('lang.Select')</h2> --}}
            {{-- <button
                class="w-32 bg-secondary rounded-md h-12 text-white font-semibold text-xl">@lang('lang.Student')</button>
            <button
                class="w-32 bg-secondary rounded-md h-12 text-white font-semibold text-xl">@lang('lang.Course')</button>
            <button
                class="w-32 bg-secondary rounded-md h-12 text-white font-semibold text-xl">@lang('lang.level')</button>
            <button
                class="w-32 bg-secondary rounded-md h-12 text-white font-semibold text-xl">@lang('lang.Page')</button> --}}
        </div>
        {{-- <div>
            <button data-modal-target="addwordmodal" data-modal-toggle="addwordmodal"
                class="w-32 bg-secondary rounded-md h-12 text-white font-semibold text-lg">@lang('lang.Add_words')</button>
        </div> --}}
    </div>
</section>




<!-- add word modal -->
<div id="addwordmodal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-dark ">
            <!-- Modal header -->
            <div class="flex items-center justify-between   rounded-t">
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="addwordmodal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
               <form action="?">
                @csrf
                <div class=" items-center   ">
                    <label class="text-[14px] font-semibold" for="word">@lang('lang.Add_words')</label>
                    <div class="flex gap-4 mt-4 ">
                        <div class="w-full">
                            <select
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="grade" id="grade">
                                <option value="">@lang('lang.Select_Word')</option>
                            </select>
                        </div>
                        <div>
                            <button type="button"
                                class="bg-secondary h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                style="width: 42px">+</button>
                        </div>
                    </div>
                    <div class="flex justify-end mt-8">
                        <button
                            class="w-28   bg-secondary rounded-md h-10 text-white font-semibold text-xl">@lang('lang.Add')</button>
                    </div>
                </div>
               </form>
            </div>
        </div>
    </div>
</div>



<!-- games  modal -->
<div id="phonemodal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-dark ">
            <!-- Modal header -->
            <div class="flex items-center justify-between   rounded-t">
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="phonemodal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flex justify-center">
             <img src="{{asset('images/gamephone.png')}}" alt="play game on phone">
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')
