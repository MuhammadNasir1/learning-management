@include('layouts.header')
@include('teacher.includes.nav')


<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Trainings')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.All_Trainings')</h3>
                <button data-modal-target="addcoursesmodal" data-modal-toggle="addcoursesmodal"
                    class="bg-secondary text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+ @lang('lang.Add_Training')
                </button>
            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>@lang('lang.Title')</th>
                        <th>@lang('lang.Description')</th>
                        <th>@lang('lang.Duration')</th>
                        <th>@lang('lang.Date')</th>
                        <th>@lang('lang.Action')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="pt-4">
                        <td class="w-[220px]">Utilities Utilities' Utilities'</td>
                        <td class="w-[380px]">Lorem Ipsum is simply dummy text of the printing and typesetting ... Lorem
                            ipsum dolor sit amet consectetur adipisicing.</td>
                        <td>00:12:20</td>
                        <td>12/30 2010</td>

                        <td class="flex gap-5">
                            <a  class="cursor-pointer" href="#"><img width="38px" src="{{ asset('images/icons/delete.svg') }}"
                                    alt="delete"></a>
                            <a  class="cursor-pointer" href="#"><img width="38px" src="{{ asset('images/icons/update.svg') }}"
                                    alt="update"></a>
                            <a  class="cursor-pointer" data-modal-target="videodetails" data-modal-toggle="videodetails"><img width="38px"
                                    src="{{ asset('images/icons/view.svg') }}" alt="View"></a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>


<!-- Add  courses  modal -->
<div id="addcoursesmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form action="#" method="post">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Add_Video')
                    </h3>
                    <button type="button"
                        class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addcoursesmodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-2 mt-4 gap-10 px-10">
                    <div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="title">@lang('lang.Title')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="title" id="title" placeholder=" @lang('lang.Enter_First_Name')">
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)]  my-6  ">
                            <label class="text-[14px] font-normal" for="address">@lang('lang.Description')</label>
                            <textarea class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[85px] text-[14px]" name="address"
                                id="address" placeholder="@lang('lang.Enter_Description')"></textarea>
                        </div>




                    </div>


                    <div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="contact">@lang('lang.Contact')</label>
                            <input type="file"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="contact" id="contact" placeholder="@lang('lang.Enter_Emergency_Phone')">
                        </div>



                    </div>
                </div>
                <div class=" pt-4">
                    <hr class="border-[#DEE2E6] ">
                </div>
                <div class="flex justify-end ">
                    <button
                        class="bg-secondary text-white py-2 px-6 my-4 rounded-[4px]  mx-6  font-semibold">@lang('lang.Add')</button>
                </div>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>



<!--  video  Details  modal -->
<div id="videodetails" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full   max-w-4xl max-h-full ">
        <form action="#" method="post">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div
                    class="flex items-center   justify-endjustify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Video_Details')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="videodetails">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="flex justify-around gap-10">
                    <div class="my-4 pl-6">
                        <video class=" rounded-[4px] w-full" controls width="320px"
                            src="{{ asset('videos/demo.mp4') }}"></video>
                    </div>
                    <div class="flex flex-col gap-5  items-center mt-4  pb-4">
                        <h2 class="text-pink text-[32px] font-semibold "><span
                                class="border-b-4 border-pink py-1 pr-4">@lang('lang.Training') </span>@lang('lang.Video')
                        </h2>
                        <div class="flex items-center justify-end  mt-5">
                            <div class="w-[200px]">
                                <h3 class="text-[18px] font-normal">@lang('lang.Title'):</h3>
                            </div>
                            <div class="w-[200px]  ">
                                <p class="text-[14px] text-[#323C47]">Video title</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end  mt-5">
                            <div class="w-[200px]">
                                <h3 class="text-[18px] font-normal">@lang('lang.Duration'):</h3>
                            </div>
                            <div class="w-[200px]  ">
                                <p class="text-[14px] text-[#323C47]">3:00</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end  mt-5">
                            <div class="w-[200px]">
                                <h3 class="text-[18px] font-normal">@lang('lang.Date'):</h3>
                            </div>
                            <div class="w-[200px]  ">
                                <p class="text-[14px] text-[#323C47]">10/30/2010</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end  mt-5">
                            <div class="w-[200px]">
                                <h3 class="text-[18px] font-normal">@lang('lang.Description')</h3>
                            </div>
                            <div class="w-[200px]  ">
                                <p class="text-[14px] text-[#323C47]">Lorem Ipsum is simply dummy text
                                    of the printing and typesetting text
                                    Lorem Ipsum is simply dummy text
                                    of the printing and typesetting ... </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>
@include('layouts.footer')

