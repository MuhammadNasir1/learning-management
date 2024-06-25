@include('layouts.header')
@include('admin.includes.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Audios')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Audios_List')</h3>
                <button data-modal-target="addaudiomodal" data-modal-toggle="addaudiomodal"
                    class="bg-secondary cursor-pointer text-white    e h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                    @lang('lang.Add_Audio')</button>
            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>@lang('lang.STN')</th>
                        <th>@lang('lang.Student_Name')</th>
                        <th>@lang('lang.Chinese_Name')</th>
                        <th>@lang('lang.Parent_Name')</th>
                        <th>@lang('lang.gender')</th>
                        <th>@lang('lang.age')</th>
                        <th>@lang('lang.Grade')</th>
                        <th>@lang('lang.Phone_no')</th>
                        <th>@lang('lang.Address')</th>

                        <th>@lang('lang.Action')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="pt-4">
                        <td>1</td>
                        <td>John Smith</td>
                        <td>1约翰·史密斯</td>
                        <td>james</td>
                        <td>Male</td>
                        <td>1</td>
                        <td>-</td>
                        <td>134 548 878</td>
                        <td>Town, City, Country</td>

                        <td class="flex gap-5">
                            <a class="cursor-pointer" href="#"><img width="38px"
                                    src="{{ asset('images/icons/delete.svg') }}" alt="delete"></a>
                            <a class="cursor-pointer" href="#"><img width="38px"
                                    src="{{ asset('images/icons/update.svg') }}" alt="update"></a>
                            <a class="cursor-pointer" data-modal-target="studendetails"
                                data-modal-toggle="studendetails"><img width="38px"
                                    src="{{ asset('images/icons/view.svg') }}" alt="View"></a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>


<!-- Add  Audio  modal -->
<div id="addaudiomodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form action="#" method="post">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center  justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Add_Audio')
                    </h3>
                    <button type="button"
                        class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addaudiomodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>


                <div class="grid grid-cols-2 mt-1 gap-10 px-10">
                    <div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="firstName">@lang('lang.First_Name')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="first_name" id="firstName" placeholder=" @lang('lang.Enter_Student_Name')">
                        </div>

                    </div>


                    <div>
                        {{-- Student Details --}}
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="chName">@lang('lang.Chinese_Name')</label>
                            <input type="email"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="chinese_name" id="chName" placeholder="@lang('lang.Enter_Chinese_Name')">
                        </div>




                    </div>
                </div>


                {{-- Campus --}}
                <div class="mt-2 px-10 font-semibold">
                    <h2 class="text-[18px]">@lang('lang.Campus')</h2>
                </div>
                <div class="grid grid-cols-2  gap-10 px-10 mt-4">
                    <div>

                        {{-- Campus --}}
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center ">
                            <label class="text-[14px] font-normal" for="Campus">@lang('lang.Campus')</label>
                            <div class="flex gap-4">
                                <select
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="Campus" id="Campus">
                                    <option value="">@lang('lang.Select_Subject')</option>
                                </select>
                                <div>
                                    <button type="button"
                                        class="bg-secondary h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                        style="width: 42px">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="stud_no">@lang('lang.Student_No')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="stud_no" id="stud_no" placeholder=" @lang('lang.Enter_Roll_no')">
                        </div>

                    </div>

                    <div>
                        {{-- Campus --}}

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center   ">
                            <label class="text-[14px] font-normal" for="sAttending">@lang('lang.School_Attending')</label>
                            <div class="flex gap-4">
                                <select
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="sch_attending" id="sAttending">
                                    <option value="">@lang('lang.Select')</option>
                                </select>
                                <div>
                                    <button type="button"
                                        class="bg-secondary h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                        style="width: 42px">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="grade">@lang('lang.Grade')</label>
                            <div class="flex gap-4">
                                <select
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="grade" id="grade">
                                    <option value="">@lang('lang.Select')</option>
                                </select>
                                <div>
                                    <button type="button"
                                        class="bg-secondary h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                        style="width: 42px">+</button>
                                </div>
                            </div>
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




@include('layouts.footer')
