@include('layouts.header')
@include('admin.includes.nav')
@php
    $permissions = session('permissions');
@endphp

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Teachers')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Teachers_List')</h3>
                @if ($permissions['insert'])
                    <button id="addmodal" data-modal-target="addteachermodal" data-modal-toggle="addteachermodal"
                        class="bg-secondary text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                        @lang('lang.Add_Teacher')</button>
                @endif
            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>@lang('lang.Name')</th>
                        <th>@lang('lang.Contact')</th>
                        <th>@lang('lang.email')</th>
                        <th>@lang('lang.Address')</th>
                        <th>@lang('lang.gender')</th>
                        <th>@lang('lang.subject')</th>
                        <th>@lang('lang.Join_Date')</th>
                        <th>@lang('lang.Action')</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($teachers as $i => $teacher)
                        <tr class="pt-4">
                            <td>{{ $teacher->first_name }}</td>
                            <td>{{ $teacher->phone_no }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->address }}</td>
                            <td>{{ $teacher->gender }}</td>
                            <td>{{ $teacher->subject }}</td>
                            <td>{{ $teacher->join_date }}</td>

                            <td class="flex gap-5">
                                @if ($permissions['delete'])
                                    <button delId="{{ $teacher->id }}" class="cursor-pointer delbtn"><img
                                            width="38px" src="{{ asset('images/icons/delete.svg') }}"
                                            alt="delete"></button>
                                @endif
                                @if ($permissions['update'])
                                    <button updateId="{{ $teacher->id }}" class="cursor-pointer updateBtn"
                                        data-modal-target="updateteachermodal"
                                        data-modal-toggle="updateteachermodal"><img width="38px"
                                            src="{{ asset('images/icons/update.svg') }}" alt="update"></button>
                                @endif
                                <span class="cursor-pointer" data-modal-target="teacherdetails{{ $i }}"
                                    data-modal-toggle="teacherdetails{{ $i }}"><img width="38px"
                                        src="{{ asset('images/icons/view.svg') }}" alt="View"></span>
                            </td>
                        </tr>



                        <!--  Teacher  Details  modal -->
                        <div id="teacherdetails{{ $i }}" data-modal-backdrop="static"
                            class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-7xl max-h-full ">

                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                                    <div
                                        class="flex items-center   justify-endjustify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                                        <h3 class="text-xl font-semibold text-white text-center">
                                            @lang('lang.Teacher_Details')
                                        </h3>
                                        <button type="button"
                                            class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                                            data-modal-hide="teacherdetails{{ $i }}">
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
                                            <div>
                                                <h2 class="text-pink text-[32px] font-semibold "><span
                                                        class=" py-1">@lang('lang.About_Teacher') </span>
                                                </h2>
                                            </div>
                                            <div class="flex items-center justify-end  mt-2">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.English_Name') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $teacher->first_name }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end  mt-2">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.Chinese_Name') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $teacher->last_name }}</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.gender') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]"> {{ $teacher->gender }} </p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.Date_of_Birth') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $teacher->dob }} </p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.Phone_no') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $teacher->phone_no }} </p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.E-mail') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $teacher->email }} </p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.subject') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $teacher->subject }} </p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.Skills') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $teacher->skill }} </p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.Join_Date') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $teacher->join_date }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.Address') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    <p class="text-[14px] text-[#323C47]">{{ $teacher->address }} </p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-end ">
                                                <div class="w-[200px]">
                                                    <h3 class="text-[18px] font-normal">@lang('lang.Teacher_CV') :</h3>
                                                </div>
                                                <div class="w-[150px]  ">
                                                    @if ($teacher->teacher_cv)
                                                        <a href="../{{ $teacher->teacher_cv }}" target="_blank"
                                                            class="text-[14px] text-[#323C47]">CV File here can
                                                            open</a>
                                                    @endif
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


<!-- Add  Teacher  modal -->
<div id="addteachermodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form id="teacher_data" enctype="multipart/form-data" method="post">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center  justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Add_Teacher')
                    </h3>
                    <button type="button"
                        class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addteachermodal">
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
                            <label class="text-[14px] font-normal" for="english_Name">@lang('lang.English_Name')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="first_name" id="english_Name" placeholder=" @lang('lang.Enter_English_Name')" required>
                        </div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="dob">@lang('lang.Date_of_Birth')</label>
                            <input type="date"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="dob" id="dob" required>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="phoneNo">@lang('lang.Phone_no')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="phone_no" id="phoneNo" placeholder="@lang('lang.Enter_Phone')" required>
                        </div>

                        <div class="grid select-container grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="subject">@lang('lang.subject')</label>
                            <div class="flex gap-4">
                                <div class="select-feild w-full">
                                    <select
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="subject" id="subject">
                                        <option value="">@lang('lang.subject')</option>
                                    </select>
                                </div>
                                <input type="text"
                                    class="w-full hidden border-[#DEE2E6] rounded-[4px] focus:border-primary input-field   h-[40px] text-[14px]"
                                    name="subject" id="subject">
                                <div>
                                    <button type="button"
                                        class="bg-secondary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                        style="width: 42px">+</button>
                                </div>
                            </div>
                        </div>


                        <div class="grid select-container grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="skill">@lang('lang.Skills')</label>
                            <div class="flex gap-4">
                                <div class="select-feild w-full">
                                    <select
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="skill" id="skill">
                                        <option value="">@lang('lang.add_Skills')</option>
                                    </select>
                                </div>
                                <input type="text"
                                    class="w-full hidden border-[#DEE2E6] rounded-[4px] focus:border-primary input-field   h-[40px] text-[14px]"
                                    name="skill" id="skill">
                                <div>
                                    <button type="button"
                                        class="bg-secondary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                        style="width: 42px">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="teacherCv">@lang('lang.Teacher_CV')</label>
                            <input type="file"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="teacher_cv" id="teacherCv" placeholder="@lang('lang.Enter_Phone')">
                        </div>


                    </div>


                    <div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="chinese_Name">@lang('lang.Chinese_Name')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="last_name" id="chinese_Name" placeholder="@lang('lang.Enter_Chinese_Name')" required>
                        </div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="gender">@lang('lang.gender')</label>
                            <select
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="gender" id="gender" required>
                                <option value="" selected disabled>@lang('lang.Select_Gender')</option>
                                <option value="male">@lang('lang.male')</option>
                                <option value="female">@lang('lang.female')</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="email">@lang('lang.email')</label>
                            <input type="email"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="email" id="email" placeholder="@lang('lang.Enter_Email')" required>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="joindate">@lang('lang.Join_Date')</label>
                            <input type="date"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="join_date" id="joindate" required>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)]  my-6  ">
                            <label class="text-[14px] font-normal" for="address">@lang('lang.Address')</label>
                            <textarea type="date" class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[85px] text-[14px]"
                                name="address" id="address" placeholder="@lang('lang.Enter_Address')" required></textarea>
                        </div>

                    </div>
                </div>
                <div class=" pt-4">
                    <hr class="border-[#DEE2E6] ">
                </div>
                <div class="flex justify-end " id="addBtn">
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


{{-- ================================================================= --}}
<!-- update  Teacher  modal -->
<div id="updateteachermodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form id="teacherupdatedata" enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" id="update_id">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center  justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Update_Teacher')
                    </h3>
                    <button type="button"
                        class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="updateteachermodal">
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
                            <label class="text-[14px] font-normal" for="englishName">@lang('lang.English_Name')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="first_name" id="englishName" placeholder=" @lang('lang.Enter_English_Name')" required>
                        </div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="udob">@lang('lang.Date_of_Birth')</label>
                            <input type="date"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="dob" id="udob" required>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="uphoneNo">@lang('lang.Phone_no')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="phone_no" id="uphoneNo" placeholder="@lang('lang.Enter_Phone')" required>
                        </div>

                        <div class="grid select-container grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="usubject">@lang('lang.subject')</label>
                            <div class="flex gap-4">
                                <div class="select-feild w-full hidden">
                                    <select
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="subject" id="subject">
                                        <option value="">@lang('lang.subject')</option>
                                    </select>
                                </div>
                                <input type="text"
                                    class="w-full  border-[#DEE2E6] rounded-[4px] focus:border-primary input-field   h-[40px] text-[14px]"
                                    name="subject" id="usubject">
                                <div>
                                    <button type="button"
                                        class="bg-secondary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                        style="width: 42px">+</button>
                                </div>
                            </div>
                        </div>


                        <div class="grid select-container grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="uskill">@lang('lang.Skills')</label>
                            <div class="flex gap-4">
                                <div class="select-feild w-full hidden">
                                    <select
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="skill" id="skill">
                                        <option value="">@lang('lang.add_Skills')</option>
                                    </select>
                                </div>
                                <input type="text"
                                    class="w-full  border-[#DEE2E6] rounded-[4px] focus:border-primary input-field   h-[40px] text-[14px]"
                                    name="skill" id="uskill">
                                <div>
                                    <button type="button"
                                        class="bg-secondary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                        style="width: 42px">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="uteacherCv">@lang('lang.Teacher_CV')</label>
                            <input type="file"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="teacher_cv" id="uteacherCv" placeholder="@lang('lang.Enter_Phone')">
                        </div>


                    </div>


                    <div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="chineseName">@lang('lang.Chinese_Name')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="last_name" id="chineseName" placeholder="@lang('lang.Enter_Chinese_Name')" required>
                        </div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="ugender">@lang('lang.gender')</label>
                            <select
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="gender" id="ugender" required>
                                <option value="" disabled>@lang('lang.Select_Gender')</option>
                                <option value="male">@lang('lang.male')</option>
                                <option value="female">@lang('lang.female')</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="uemail">@lang('lang.email')</label>
                            <input type="email"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="email" id="uemail" placeholder="@lang('lang.Enter_Email')" required>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="ujoindate">@lang('lang.Join_Date')</label>
                            <input type="date"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="join_date" id="ujoindate" required>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)]  my-6  ">
                            <label class="text-[14px] font-normal" for="uaddress">@lang('lang.Address')</label>
                            <textarea type="date" class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[85px] text-[14px]"
                                name="address" id="uaddress" placeholder="@lang('lang.Enter_Address')"></textarea>
                        </div>

                    </div>
                </div>
                <div class=" pt-4">
                    <hr class="border-[#DEE2E6] ">
                </div>
                <div class="flex justify-end ">
                    <button id="uaddBtn"
                        class="bg-secondary text-white py-2 px-6 my-4 rounded-[4px]  mx-6  font-semibold">
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
    // del teacher
    $('.delbtn').click(function() {
        var updateId = $(this).attr('delId');
        var url = "../api/delTeacher/" + updateId;

        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            success: function(response) {
                if (response.success == true) {
                    window.location.href = '../admin/teacher';
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
                    'Teacher Not Found',
                    'warning'
                );
            }

        });

    })
    // get selected update  data
    $('.updateBtn').click(function() {
        var updateId = $(this).attr('updateId');
        var url = "../teacherUpdataData/" + updateId;

        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(response) {
                var teacher = response.teacher;
                $('#update_id').val(teacher.id);
                $('#englishName').val(teacher.first_name);
                $('#chineseName').val(teacher.last_name);
                $('#udob').val(teacher.dob);
                $('#ugender').val(teacher.gender);
                $('#uphoneNo').val(teacher.phone_no);
                $('#uemail').val(teacher.email);
                $('#usubject').val(teacher.subject);
                $('#uaddress').val(teacher.address);
                $('#uskill').val(teacher.skill);
                $('#ujoindate').val(teacher.join_date);
            },
            error: function(jqXHR) {
                let response = JSON.parse(jqXHR.responseText);
                console.log("error");
                Swal.fire(
                    'Warning!',
                    'Teacher Not Found',
                    'warning'
                );
            }

        });

    })
    // update teacher data
    $(document).ready(function() {
        $("#teacherupdatedata").submit(function(event) {
            var updateId = $('#update_id').val();
            var url = "../teacherUpdataData/" + updateId;
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
                        window.location.href = '../admin/teacher';
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
    // insert  teacher data
    $(document).ready(function() {
        $("#teacher_data").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "../addteacher",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#spinner').removeClass('hidden');
                    $('#text').addClass('hidden');
                    $('#addBtn').attr('disabled', true);
                },
                success: function(response) {
                    if (response.success == true) {
                        window.location.href = '../admin/teacher';
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

                    $('#text').removeClass('hidden');
                    $('#spinner').addClass('hidden');
                    $('#addBtn').attr('disabled', false);
                }
            });
        });
    });
</script>
