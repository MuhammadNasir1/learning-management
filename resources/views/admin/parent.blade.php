@include('layouts.header')
@include('admin.includes.nav')
@php
    $permissions = session('permissions');
@endphp

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Parents')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Parents_List')</h3>
                @if ($permissions['insert'])
                    <button data-modal-target="addparentmodal" data-modal-toggle="addparentmodal"
                        class="bg-secondary text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                        @lang('lang.Add_parents')
                    </button>
                @endif

            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>@lang('lang.Name')</th>
                        <th>@lang('lang.email')</th>
                        <th>@lang('lang.Phone_no')</th>
                        <th>@lang('lang.Address')</th>
                        <th>@lang('lang.gender')</th>
                        <th>@lang('lang.Child')</th>
                        <th>@lang('lang.Action')</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($parents as $x => $parent)
                        <tr class="pt-4">
                            <td>{{ $parent->first_name }}</td>
                            <td>{{ $parent->email }}</td>
                            <td>{{ $parent->phone_no }}</td>
                            <td>{{ $parent->address }}</td>
                            <td>{{ $parent->gender }}</td>
                            <td>{{ $parent->child_ren }}</td>

                            <td class="flex gap-5">
                                @if ($permissions['delete'])
                                    <button class="cursor-pointer delbtn" delId="{{ $parent->id }}"><img
                                            width="38px" src="{{ asset('images/icons/delete.svg') }}"
                                            alt="delete"></button>
                                @endif
                                @if ($permissions['update'])
                                    <button updateId="{{ $parent->id }}" type="button"
                                        data-modal-target="updateparentmodal" data-modal-toggle="updateparentmodal"
                                        class="cursor-pointer updateBtn"><img width="38px"
                                            src="{{ asset('images/icons/update.svg') }}" alt="update"></button>
                                @endif
                                <a class="cursor-pointer" data-modal-target="parentdetails{{ $x }}"
                                    data-modal-toggle="parentdetails{{ $x }}"><img width="38px"
                                        src="{{ asset('images/icons/view.svg') }}" alt="View"></a>
                            </td>
                        </tr>

                        <!--  parent  Details  modal -->
                        <div id="parentdetails{{ $x }}" data-modal-backdrop="static"
                            class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-7xl max-h-full ">
                                @csrf
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                                    <div
                                        class="flex items-center   justify-endjustify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                                        <h3 class="text-xl font-semibold text-white text-center">
                                            @lang('lang.About_Parent')
                                        </h3>
                                        <button type="button"
                                            class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                                            data-modal-hide="parentdetails{{ $x }}">
                                            <svg class="w-4 h-4 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="flex flex-col gap-5  items-center mt-4  pb-4">
                                        <div class="flex flex-col gap-5">
                                            <h2 class="text-pink text-[32px] font-semibold "><span
                                                    class=" py-1">@lang('lang.About')
                                                </span>@lang('lang.Parent')
                                            </h2>
                                            <div class="flex items-center justify-end  mt-2">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.English_Name') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $parent->first_name }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end  mt-2">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.Chinese_Name') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $parent->last_name }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.gender') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $parent->gender }} </p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.Phone_no') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $parent->phone_no }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.Emergency') <br>
                                                        @lang('lang.Contact_No') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $parent->contact }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.E-mail') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $parent->email }}</p>
                                                </div>
                                            </div>


                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.Address') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $parent->address }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.Child') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $parent->child_ren }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>


<!-- Update  parent  modal -->
<div id="updateparentmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form id="updateparent_data" method="post">
            @csrf
            <input type="hidden" id="update_id">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Update_parents')
                    </h3>
                    <button type="button"
                        class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="updateparentmodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-2 mt-4 gap-10 px-10">
                    <div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="firstName">@lang('lang.English_Name')</label>
                            <div class="flex gap-4 w-[100%]">
                                <div class="w-full">
                                    <input type="text"
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="first_name" id="firstName" placeholder=" @lang('lang.Enter_English_Name')">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="gender">@lang('lang.gender')</label>
                            <select
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="gender" id="gender">
                                <option value="" disabled>@lang('lang.Select_Gender')</option>
                                <option value="male">@lang('lang.male')</option>
                                <option value="female">@lang('lang.female')</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="phoneNo">@lang('lang.Phone_no')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="phone_no" id="phoneNo" placeholder="@lang('lang.Enter_Phone')">
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)]  my-6  ">
                            <label class="text-[14px] font-normal" for="address">@lang('lang.Address')</label>
                            <textarea type="date" class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[85px] text-[14px]"
                                name="address" id="address" placeholder="@lang('lang.Enter_Address')"></textarea>
                        </div>
                    </div>
                    <div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="chinese_name">@lang('lang.Chinese_Name')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="last_name" id="chinese_name" placeholder="@lang('lang.Chinese_Name')">

                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="email">@lang('lang.email')</label>
                            <input type="email"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="email" id="email" placeholder="@lang('lang.Enter_Email')">
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="contact">@lang('lang.Contact')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="contact" id="contact" placeholder="@lang('lang.Enter_Emergency_Phone')">
                        </div>

                        <div class="grid select-container grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="child">@lang('lang.Child')</label>

                            <div class="flex gap-4">
                                <div class="select-feild w-full hidden">
                                    <select
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="child_ren" id="child">
                                        <option value="">@lang('lang.sel_Child')</option>
                                    </select>
                                </div>
                                <input type="text"
                                    class="w-full  border-[#DEE2E6] rounded-[4px] focus:border-primary input-field   h-[40px] text-[14px]"
                                    name="child_ren" id="child_ren">
                                <div>
                                    <button type="button"
                                        class="bg-secondary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
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
                    <button class="bg-secondary text-white py-2 px-6 my-4 rounded-[4px]  mx-6  font-semibold"
                        id="uaddBtn">
                        <div class=" text-center hidden" id="uspinner">
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
                        <div id="utext">
                            @lang('lang.Update')
                        </div>

                    </button>
                </div>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>


<!-- Add  parent  modal -->
<div id="addparentmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form id="parent_data" method="post">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Add_parents')
                    </h3>
                    <button type="button"
                        class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addparentmodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-2 mt-4 gap-10 px-10">
                    <div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="firstName">@lang('lang.English_Name')</label>
                            <div class="flex gap-4">
                                <div class="w-full">
                                    <input type="text"
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="first_name" required id="firstName" placeholder=" @lang('lang.Enter_English_Name')">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="gender">@lang('lang.gender')</label>
                            <select
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="gender" required id="gender">
                                <option value="" selected disabled>@lang('lang.Select_Gender')</option>
                                <option value="male">@lang('lang.male')</option>
                                <option value="female">@lang('lang.female')</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="phoneNo">@lang('lang.Phone_no')</label>
                            <input type="number"
                                class="w-full  border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="phone_no" required id="phoneNo" placeholder="@lang('lang.Enter_Phone')">
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)]  my-6  ">
                            <label class="text-[14px] font-normal" for="address">@lang('lang.Address')</label>
                            <textarea type="date" class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[85px] text-[14px]"
                                name="address" required id="address" placeholder="@lang('lang.Enter_Address')"></textarea>
                        </div>




                    </div>


                    <div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="chinese_name">@lang('lang.Chinese_Name')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="last_name" required id="chinese_name" placeholder="@lang('lang.Chinese_Name')">
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="email">@lang('lang.email')</label>
                            <input type="email"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="email" required id="email" placeholder="@lang('lang.Enter_Email')">
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="contact">@lang('lang.Contact')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="contact" required id="contact" placeholder="@lang('lang.Enter_Emergency_Phone')">
                        </div>

                        <div class="grid select-container grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="child">@lang('lang.Child')</label>

                            <div class="flex gap-4">
                                <div class="select-feild w-full">
                                    <select
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="child_ren" id="child">
                                        <option value="">@lang('lang.sel_Child')</option>
                                    </select>
                                </div>
                                <input type="text"
                                    class="w-full hidden border-[#DEE2E6] rounded-[4px] focus:border-primary input-field   h-[40px] text-[14px]"
                                    name="child_ren" id="child_ren">
                                <div>
                                    <button type="button"
                                        class="bg-secondary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
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
                    <button class="bg-secondary text-white py-2 px-6 my-4 rounded-[4px]  mx-6  font-semibold">
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
                        <div id="text">
                            @lang('lang.Add')
                        </div>

                    </button>
                </div>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>




<script>
    var selectContainers = document.querySelectorAll('.select-container');

    selectContainers.forEach(function(container) {
        var select = container.querySelector('.select-feild');
        var inputField = container.querySelector('.input-field');
        var toggleButton = container.querySelector('.toggle-button');

        toggleButton.addEventListener('click', function() {
            if (select.style.display !== 'none') {
                select.style.display = 'none';
                inputField.style.display = 'block';
            } else {
                select.style.display = 'block';
                inputField.style.display = 'none';
            }
        });
    });
</script>
@include('layouts.footer')
<script>
    // get selected update  data
    $('.updateBtn').click(function() {
        var updateId = $(this).attr('updateId');
        var url = "../parentUpdataData/" + updateId;

        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(response) {
                console.log(response);
                var parent = response.parent;
                $('#update_id').val(parent.id);
                $('#firstName').val(parent.first_name);
                $('#chinese_name').val(parent.last_name);
                $('#gender').val(parent.gender);
                $('#phoneNo').val(parent.phone_no);
                $('#address').val(parent.address);
                $('#lastName').val(parent.last_name);
                $('#email').val(parent.email);
                $('#contact').val(parent.contact);
                $('#child_ren').val(parent.child_ren);

            },
            error: function(jqXHR) {
                let response = JSON.parse(jqXHR.responseText);
                console.log("error");
                Swal.fire(
                    'Warning!',
                    'Student Not Found',
                    'warning'
                );
            }
        });
    })
    // update parent  data
    $(document).ready(function() {
        $("#updateparent_data").submit(function(event) {
            var updateId = $('#update_id').val();
            var url = "../parentUpdate/" + updateId;
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#uspinner').removeClass('hidden');
                    $('#utext').addClass('hidden');
                    $('#uaddBtn').attr('disabled', true);
                },
                success: function(response) {
                    if (response.success == true) {
                        window.location.href = '../admin/parents';
                    } else if (response.success == false) {
                        Swal.fire(
                            'Warning!',
                            response.message,
                            'warning'
                        );
                    }
                },
                error: function(jqXHR) {
                    let response = JSON.parse(jqXHR.responseText);
                    console.log("error");
                    Swal.fire(
                        'Warning!',
                        response.message,
                        'warning'
                    );

                    $('#utext').removeClass('hidden');
                    $('#uspinner').addClass('hidden');
                    $('#uaddBtn').attr('disabled', false);
                }
            });
        });
    });

    // delete parant
    $('.delbtn').click(function() {
        var delId = $(this).attr('delId');
        var url = "../delParent/" + delId;
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(response) {
                if (response.success == true) {
                    window.location.href = '../admin/parents';
                } else if (response.success == false) {
                    Swal.fire(
                        'Warning!',
                        response.message,
                        'warning'
                    );
                }
            },
            error: function(jqXHR) {
                let response = JSON.parse(jqXHR.responseText);
                console.log("error");
                Swal.fire(
                    'Warning!',
                    'Parent Not Found',
                    'warning'
                );
            }

        });

    })


    $(document).ready(function() {
        $("#parent_data").submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "../addParent",
                data: formData,
                dataType: "json",
                beforeSend: function() {
                    $('#spinner').removeClass('hidden');
                    $('#text').addClass('hidden');
                    $('#addBtn').attr('disabled', true);
                },
                success: function(response) {
                    if (response.success == true) {
                        window.location.href = '../admin/parents';
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
                    console.log("eror");
                    Swal.fire(
                        'Warning!',
                        response.message,
                        'warning'
                    );
                    $('#text').removeClass('hidden');
                    $('#spinner').addClass('hidden');
                    $('#addBtn').attr('disabled', false);
                }
            });
        });
    });
</script>
