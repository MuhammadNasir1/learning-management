@include('layouts.header')
@if (session('user_det')['role'] == 'parent')
    @include('parent.includes.nav')
@elseif (session('user_det')['role'] == 'teacher')
    @include('teacher.includes.nav')
@else
    @include('admin.includes.nav')
@endif
@php
    $permissions = session('permissions');
@endphp

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Courses')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Course_List')</h3>
                @if ($permissions['insert'])
                    <div class="flex items-center gap-4">
                        <button data-modal-target="addcoursemodal" data-modal-toggle="addcoursemodal"
                            class="bg-secondary text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                            @lang('lang.Add_Course')
                        </button>
                        <button class="bg-secondary  text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold "
                            data-modal-target="addExcelSheetmodal" data-modal-toggle="addExcelSheetmodal">+
                            @lang('lang.Import_Excel')
                        </button>
                        <button data-modal-target="excelDemo" data-modal-toggle="excelDemo">
                            <svg width="27" height="27" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5"
                                    d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z"
                                    stroke="#EDBD58" stroke-width="2" />
                                <path d="M11 16V10" stroke="#EDBD58" stroke-width="2" stroke-linecap="round" />
                                <path
                                    d="M11 6C11.5523 6 12 6.44772 12 7C12 7.55228 11.5523 8 11 8C10.4477 8 10 7.55228 10 7C10 6.44772 10.4477 6 11 6Z"
                                    fill="#EDBD58" />
                            </svg>

                        </button>
                    </div>
                @endif
            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>@lang('lang.Course_ID')</th>
                        <th>@lang('lang.Course_Name')</th>
                        <th>@lang('lang.Level')</th>
                        <th>@lang('lang.Lesson')</th>
                        <th>@lang('lang.Word')</th>
                        <th>@lang('lang.Audio_1')</th>
                        <th>@lang('lang.Audio_2')</th>
                        <th>@lang('lang.Audio_3')</th>
                        <th>@lang('lang.Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $i => $course)
                        <tr class="pt-4">
                            <td>{{ $course->course_id }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->level }}</td>
                            <td>{{ $course->lesson }}</td>
                            <td>{{ $course->word }}</td>
                            <td>
                                @if (($course->audio_1 !== 'null') & !empty($course->audio_1))
                                    <div class="flex justify-center">
                                        <div>
                                            <audio class="audio-player" src="../{{ $course->audio_1 }}"></audio>
                                            <button class="play-button">
                                                <svg width="46" height="46" viewBox="0 0 29 29" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M15 28C21.9035 28 27.5 22.4035 27.5 15.5C27.5 8.59644 21.9035 3 15 3C8.09644 3 2.5 8.59644 2.5 15.5C2.5 22.4035 8.09644 28 15 28Z"
                                                        fill="#339B96" />
                                                    <path
                                                        d="M19.2671 16.8238L13.3669 20.3073C12.4171 20.868 11.25 20.1381 11.25 18.9835V12.0164C11.25 10.8618 12.4171 10.132 13.3669 10.6927L19.2671 14.1763C20.2443 14.7533 20.2443 16.2467 19.2671 16.8238Z"
                                                        fill="#339B96" />
                                                </svg>

                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </td>

                            <td>
                                @if (($course->audio_2 !== 'null') & !empty($course->audio_2))
                                    <div class="flex justify-center">
                                        <div>
                                            <audio class="audio-player" src="../{{ $course->audio_2 }}"></audio>
                                            <button class="play-button">
                                                <svg width="46" height="46" viewBox="0 0 29 29" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M15 28C21.9035 28 27.5 22.4035 27.5 15.5C27.5 8.59644 21.9035 3 15 3C8.09644 3 2.5 8.59644 2.5 15.5C2.5 22.4035 8.09644 28 15 28Z"
                                                        fill="#339B96" />
                                                    <path
                                                        d="M19.2671 16.8238L13.3669 20.3073C12.4171 20.868 11.25 20.1381 11.25 18.9835V12.0164C11.25 10.8618 12.4171 10.132 13.3669 10.6927L19.2671 14.1763C20.2443 14.7533 20.2443 16.2467 19.2671 16.8238Z"
                                                        fill="#339B96" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </td>

                            <td>
                                @if (($course->audio_3 !== 'null') & !empty($course->audio_3))
                                    <div class="flex justify-center">
                                        <div>
                                            <audio class="audio-player" src="../{{ $course->audio_3 }}"></audio>
                                            <button class="play-button">
                                                <svg width="46" height="46" viewBox="0 0 29 29" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M15 28C21.9035 28 27.5 22.4035 27.5 15.5C27.5 8.59644 21.9035 3 15 3C8.09644 3 2.5 8.59644 2.5 15.5C2.5 22.4035 8.09644 28 15 28Z"
                                                        fill="#339B96" />
                                                    <path
                                                        d="M19.2671 16.8238L13.3669 20.3073C12.4171 20.868 11.25 20.1381 11.25 18.9835V12.0164C11.25 10.8618 12.4171 10.132 13.3669 10.6927L19.2671 14.1763C20.2443 14.7533 20.2443 16.2467 19.2671 16.8238Z"
                                                        fill="#339B96" />
                                                </svg>

                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </td>
                            </td>

                            <td class="flex gap-5">
                                @if ($permissions['delete'])
                                    <button delId="{{ $course->id }}" class="cursor-pointer delbtn"><img
                                            width="38px" src="{{ asset('images/icons/delete.svg') }}"
                                            alt="delete"></button>
                                @endif
                                @if ($permissions['update'])
                                    <button updateId="{{ $course->id }}" data-modal-target="updatecoursemodal"
                                        data-modal-toggle="updatecoursemodal" class="updateBtn"><img width="38px"
                                            src="{{ asset('images/icons/update.svg') }}" alt="update"></button>
                                @endif
                                <button class="cursor-pointer" data-modal-target="coursedetails{{ $i }}"
                                    data-modal-toggle="coursedetails{{ $i }}"><img width="38px"
                                        src="{{ asset('images/icons/view.svg') }}" alt="View"></button>
                            </td>
                        </tr>


                        <!--  course  Details  modal -->
                        <div id="coursedetails{{ $i }}" data-modal-backdrop="static"
                            class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-3xl max-h-full ">
                                <form action="#" method="post">
                                    @csrf
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                                        <div
                                            class="flex items-center   justify-endjustify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                                            <h3 class="text-xl font-semibold text-white text-center">
                                                @lang('lang.About_Course')
                                            </h3>
                                            <button type="button"
                                                class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                                                data-modal-hide="coursedetails{{ $i }}">
                                                <svg class="w-4 h-4 text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex flex-col gap-5 items-center  mt-4  pb-4">
                                            <div class="flex flex-col gap-5">
                                                <div>
                                                    <h2 class="text-pink text-[32px] font-semibold "><span
                                                            class=" ">@lang('lang.About_Course')
                                                        </span>
                                                    </h2>
                                                </div>
                                                <div class="flex items-center justify-end  mt-2">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.Course_Name') :</h3>
                                                    </div>
                                                    <div class="w-[150px]  ">
                                                        <p class="text-[14px] text-[#323C47]">
                                                            {{ $course->course_name }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end ">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.course_id') :</h3>
                                                    </div>
                                                    <div class="w-[150px]  ">
                                                        <p class="text-[14px] text-[#323C47]">{{ $course->course_id }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end ">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.no_of_levels') :</h3>
                                                    </div>
                                                    <div class="w-[150px]  ">
                                                        <p class="text-[14px] text-[#323C47]">{{ $course->level }}</p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end ">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.Lesson') :</h3>
                                                    </div>
                                                    <div class="w-[150px]  ">
                                                        <p class="text-[14px] text-[#323C47]">{{ $course->lesson }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end ">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.Word') :</h3>
                                                    </div>
                                                    <div class="w-[150px]  ">
                                                        <p class="text-[14px] text-[#323C47]">{{ $course->word }}</p>
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
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

{{-- ============ add  Excel modal  =========== --}}
<div id="addExcelSheetmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="relative p-4 w-full   max-w-2xl max-h-full ">
        <form action="{{ url('course/import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Add_Course')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addExcelSheetmodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="mx-6 my-6">
                    <div class="  ">
                        <label class="text-[14px] font-normal" for="excelFile">@lang('lang.Excel_File')</label>
                        <input type="file"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary border   h-[40px] text-[14px]"
                            name="excel_file" id="excelFile" required>
                    </div>




                </div>

                <div class="flex justify-end ">
                    <button class="bg-primary text-white py-2 px-6 my-4 rounded-[4px]  mx-6 uaddBtn  font-semibold "
                        id="addBtn">
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


<!-- Update course  modal -->
<div id="updatecoursemodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form id="Updatecourse" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="update_id">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Update_Course')
                    </h3>
                    <button type="button"
                        class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="updatecoursemodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div>
                    <div class=" my-6  flex justify-between mx-10">
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center">
                            <label class="text-[14px] font-normal" for="courseName">@lang('lang.Course_Name')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="course_name" id="courseName" placeholder=" @lang('lang.Enter_Course_Name')">
                        </div>
                    </div>
                    {{-- ====== word inputs ===  --}}
                    <div>
                        <div class="wordsInputs">
                            <div class="px-10 grid grid-cols-3 gap-10">
                                <div class="my-4">
                                    <label class="text-[14px] font-semibold mb-1  block"
                                        for="Level">@lang('lang.Level')</label>
                                    <input type="text"
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="level" id="Levelinput" placeholder="@lang('lang.Enter_Level_No')">
                                </div>
                                <div class="my-4">
                                    <label class="text-[14px] font-semibold mb-1 ml-1 block"
                                        for="Lesson">@lang('lang.Lesson')</label>
                                    <input type="text"
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="lesson" id="Lessoninput" placeholder="@lang('lang.Enter_Lesson_No')">
                                </div>
                                <div class="my-4">
                                    <label class="text-[14px] font-semibold mb-1 ml-1 block"
                                        for="Word">@lang('lang.Word')</label>
                                    <input type="text"
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="word" id="Wordinput" placeholder="@lang('lang.Enter_Word')">
                                </div>
                            </div>
                            <div class="px-10 my-5 mt-3 grid grid-cols-3 gap-10">
                                <div class="recording-set">
                                    <label class="text-[14px] font-semibold mb-1 ml-1 block">@lang('lang.Audio_1')</label>
                                    <div
                                        class="h-10 w-full border border-[#DEE2E6] rounded-[4px]  gap-2 flex justify-between px-2 items-center">
                                        {{-- ==== hidden audio and file ====== --}}
                                        <div class="invisible absolute">
                                            <input type="file" name="audio_1" class="audioFileInput"
                                                accept="audio/*" />
                                            <div>
                                                <audio class="audioElement audio-player" id="audio1"
                                                    controls></audio>
                                            </div>
                                        </div>
                                        <button type="button"
                                            class="h-8 play-button w-full max-h-8 max-w-8  rounded-full flex justify-center items-center ">
                                            <svg width="46" height="46" viewBox="0 0 29 29" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15 28C21.9035 28 27.5 22.4035 27.5 15.5C27.5 8.59644 21.9035 3 15 3C8.09644 3 2.5 8.59644 2.5 15.5C2.5 22.4035 8.09644 28 15 28Z"
                                                    fill="#339B96" />
                                                <path
                                                    d="M19.2671 16.8238L13.3669 20.3073C12.4171 20.868 11.25 20.1381 11.25 18.9835V12.0164C11.25 10.8618 12.4171 10.132 13.3669 10.6927L19.2671 14.1763C20.2443 14.7533 20.2443 16.2467 19.2671 16.8238Z"
                                                    fill="#339B96" />
                                            </svg>
                                        </button>
                                        <div class="w-full  border-2  border-gray">

                                        </div>
                                        <button type="button" class="recordButton relative h-8 w-8">
                                            <span
                                                class="animate-ping recordButtonAnimation hidden  absolute right-[1px]  h-full w-full rounded-full bg-primary opacity-75"></span>
                                            <svg width="32" height="32" viewBox="0 0 29 29" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M28.667 14.167C28.667 21.8989 22.3989 28.167 14.667 28.167C6.935 28.167 0.666992 21.8989 0.666992 14.167C0.666992 6.435 6.935 0.166992 14.667 0.166992C22.3989 0.166992 28.667 6.435 28.667 14.167ZM16.4353 13.7985C16.4353 15.0217 15.4479 16.0091 14.2249 16.0091C13.0017 16.0091 12.0143 15.0217 12.0143 13.7985V9.37752C12.0143 8.15436 13.0017 7.16699 14.2249 7.16699C15.4479 7.16699 16.4353 8.15436 16.4353 9.37752V13.7985ZM14.2249 8.6407C13.8196 8.6407 13.4881 8.97228 13.4881 9.37755V13.7987C13.4881 14.2038 13.8196 14.5355 14.2249 14.5355C14.6375 14.5355 14.9617 14.2112 14.9617 13.7987V9.37755C14.9617 8.97228 14.63 8.6407 14.2249 8.6407ZM19.3828 13.7985H18.1302C18.1302 16.0091 16.2585 17.5564 14.2249 17.5564C12.1912 17.5564 10.3196 16.0091 10.3196 13.7985H9.06699C9.06699 16.3112 11.0712 18.3891 13.4881 18.7502V21.167H14.9617V18.7502C17.3785 18.3891 19.3828 16.3112 19.3828 13.7985Z"
                                                    fill="#EDBD58" />
                                            </svg>
                                        </button>

                                    </div>
                                </div>
                                <div class="recording-set">
                                    <label class="text-[14px] font-semibold mb-1 ml-1 block">@lang('lang.Audio_2')</label>
                                    <div
                                        class="h-10 w-full border border-[#DEE2E6] rounded-[4px]  gap-2 flex justify-between px-2 items-center">
                                        {{-- ==== hidden audio and file ====== --}}
                                        <div class="invisible absolute">
                                            <input name="audio_2" type="file" class="audioFileInput"
                                                accept="audio/*" />
                                            <div>
                                                <audio class="audioElement audio-player" id="audio2"
                                                    controls></audio>
                                            </div>
                                        </div>
                                        <button type="button"
                                            class="h-8 play-button w-full max-h-8 max-w-8  rounded-full flex justify-center items-center ">
                                            <svg width="46" height="46" viewBox="0 0 29 29" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15 28C21.9035 28 27.5 22.4035 27.5 15.5C27.5 8.59644 21.9035 3 15 3C8.09644 3 2.5 8.59644 2.5 15.5C2.5 22.4035 8.09644 28 15 28Z"
                                                    fill="#339B96" />
                                                <path
                                                    d="M19.2671 16.8238L13.3669 20.3073C12.4171 20.868 11.25 20.1381 11.25 18.9835V12.0164C11.25 10.8618 12.4171 10.132 13.3669 10.6927L19.2671 14.1763C20.2443 14.7533 20.2443 16.2467 19.2671 16.8238Z"
                                                    fill="#339B96" />
                                            </svg>
                                        </button>
                                        <div class="w-full  border-2  border-gray">

                                        </div>
                                        <button type="button" class="recordButton relative h-8 w-8">
                                            <span
                                                class="animate-ping recordButtonAnimation hidden  absolute right-[1px]  h-full w-full rounded-full bg-primary opacity-75"></span>
                                            <svg width="32" height="32" viewBox="0 0 29 29" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M28.667 14.167C28.667 21.8989 22.3989 28.167 14.667 28.167C6.935 28.167 0.666992 21.8989 0.666992 14.167C0.666992 6.435 6.935 0.166992 14.667 0.166992C22.3989 0.166992 28.667 6.435 28.667 14.167ZM16.4353 13.7985C16.4353 15.0217 15.4479 16.0091 14.2249 16.0091C13.0017 16.0091 12.0143 15.0217 12.0143 13.7985V9.37752C12.0143 8.15436 13.0017 7.16699 14.2249 7.16699C15.4479 7.16699 16.4353 8.15436 16.4353 9.37752V13.7985ZM14.2249 8.6407C13.8196 8.6407 13.4881 8.97228 13.4881 9.37755V13.7987C13.4881 14.2038 13.8196 14.5355 14.2249 14.5355C14.6375 14.5355 14.9617 14.2112 14.9617 13.7987V9.37755C14.9617 8.97228 14.63 8.6407 14.2249 8.6407ZM19.3828 13.7985H18.1302C18.1302 16.0091 16.2585 17.5564 14.2249 17.5564C12.1912 17.5564 10.3196 16.0091 10.3196 13.7985H9.06699C9.06699 16.3112 11.0712 18.3891 13.4881 18.7502V21.167H14.9617V18.7502C17.3785 18.3891 19.3828 16.3112 19.3828 13.7985Z"
                                                    fill="#EDBD58" />
                                            </svg>
                                        </button>

                                    </div>
                                </div>
                                <div class="recording-set">
                                    <label class="text-[14px] font-semibold mb-1 ml-1 block">@lang('lang.Audio_3')</label>
                                    <div class="flex gap-2 items-center">
                                        <div
                                            class="h-10 w-full border border-[#DEE2E6] rounded-[4px]  gap-2 flex justify-between px-2 items-center">
                                            {{-- ==== hidden audio and file ====== --}}
                                            <div class="invisible absolute">
                                                <input name="audio_3" type="file" class="audioFileInput"
                                                    accept="audio/*" />
                                                <div>
                                                    <audio class="audioElement audio-player" id="audio3"
                                                        controls></audio>
                                                </div>
                                            </div>
                                            <button type="button"
                                                class="h-8 play-button w-full max-h-8 max-w-8  rounded-full flex justify-center items-center ">
                                                <svg width="46" height="46" viewBox="0 0 29 29"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M15 28C21.9035 28 27.5 22.4035 27.5 15.5C27.5 8.59644 21.9035 3 15 3C8.09644 3 2.5 8.59644 2.5 15.5C2.5 22.4035 8.09644 28 15 28Z"
                                                        fill="#339B96" />
                                                    <path
                                                        d="M19.2671 16.8238L13.3669 20.3073C12.4171 20.868 11.25 20.1381 11.25 18.9835V12.0164C11.25 10.8618 12.4171 10.132 13.3669 10.6927L19.2671 14.1763C20.2443 14.7533 20.2443 16.2467 19.2671 16.8238Z"
                                                        fill="#339B96" />
                                                </svg>
                                            </button>
                                            <div class="w-full  border-2  border-gray">

                                            </div>
                                            <button type="button" class="recordButton relative h-8 w-8">
                                                <span
                                                    class="animate-ping recordButtonAnimation hidden  absolute right-[1px]  h-full w-full rounded-full bg-primary opacity-75"></span>
                                                <svg width="32" height="32" viewBox="0 0 29 29"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M28.667 14.167C28.667 21.8989 22.3989 28.167 14.667 28.167C6.935 28.167 0.666992 21.8989 0.666992 14.167C0.666992 6.435 6.935 0.166992 14.667 0.166992C22.3989 0.166992 28.667 6.435 28.667 14.167ZM16.4353 13.7985C16.4353 15.0217 15.4479 16.0091 14.2249 16.0091C13.0017 16.0091 12.0143 15.0217 12.0143 13.7985V9.37752C12.0143 8.15436 13.0017 7.16699 14.2249 7.16699C15.4479 7.16699 16.4353 8.15436 16.4353 9.37752V13.7985ZM14.2249 8.6407C13.8196 8.6407 13.4881 8.97228 13.4881 9.37755V13.7987C13.4881 14.2038 13.8196 14.5355 14.2249 14.5355C14.6375 14.5355 14.9617 14.2112 14.9617 13.7987V9.37755C14.9617 8.97228 14.63 8.6407 14.2249 8.6407ZM19.3828 13.7985H18.1302C18.1302 16.0091 16.2585 17.5564 14.2249 17.5564C12.1912 17.5564 10.3196 16.0091 10.3196 13.7985H9.06699C9.06699 16.3112 11.0712 18.3891 13.4881 18.7502V21.167H14.9617V18.7502C17.3785 18.3891 19.3828 16.3112 19.3828 13.7985Z"
                                                        fill="#EDBD58" />
                                                </svg>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
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






<!-- Add  course  modal -->
<div id="addcoursemodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form id="courseData" method="post" enctype="multipart/form-data">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Add_Course')
                    </h3>
                    <button type="button"
                        class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addcoursemodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div>
                    <div class=" my-6  flex justify-between mx-10">
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center">
                            <label class="text-[14px] font-normal" for="courseName">@lang('lang.Course_Name')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="course_name" id="courseName" placeholder=" @lang('lang.Enter_Course_Name')">
                        </div>
                    </div>
                    {{-- ====== word inputs ===  --}}
                    <div id="wordContainer">
                        <div class="wordsInputs">
                            <div class="px-10 grid grid-cols-3 gap-10">
                                <div class="my-4">
                                    <label class="text-[14px] font-semibold mb-1  block"
                                        for="Level">@lang('lang.Level')</label>
                                    <input type="text"
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="level[]" id="Levelinput" placeholder="@lang('lang.Enter_Level_No')">
                                </div>
                                <div class="my-4">
                                    <label class="text-[14px] font-semibold mb-1 ml-1 block"
                                        for="Lesson">@lang('lang.Lesson')</label>
                                    <input type="text"
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="lesson[]" id="Lessoninput" placeholder="@lang('lang.Enter_Lesson_No')">
                                </div>
                                <div class="my-4">
                                    <label class="text-[14px] font-semibold mb-1 ml-1 block"
                                        for="Word">@lang('lang.Word')</label>
                                    <input type="text"
                                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="word[]" id="Wordinput" placeholder="@lang('lang.Enter_Word')">
                                </div>
                            </div>
                            <div class="px-10 my-5 mt-3 grid grid-cols-3 gap-10">
                                <div class="recording-set">
                                    <label class="text-[14px] font-semibold mb-1 ml-1 block">@lang('lang.Audio_1')</label>
                                    <div
                                        class="h-10 w-full border border-[#DEE2E6] rounded-[4px]  gap-2 flex justify-between px-2 items-center">
                                        {{-- ==== hidden audio and file ====== --}}
                                        <div class="invisible absolute ">
                                            <input type="file" name="audio_1[]" class="audioFileInput"
                                                accept="audio/*" />
                                            <div>
                                                <audio class="audioElement audio-player" controls></audio>
                                            </div>
                                        </div>
                                        <button disabled type="button"
                                            class="h-8 play-button w-full max-h-8 max-w-8  rounded-full flex justify-center items-center ">
                                            <svg width="46" height="46" viewBox="0 0 29 29" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15 28C21.9035 28 27.5 22.4035 27.5 15.5C27.5 8.59644 21.9035 3 15 3C8.09644 3 2.5 8.59644 2.5 15.5C2.5 22.4035 8.09644 28 15 28Z"
                                                    fill="#339B96" />
                                                <path
                                                    d="M19.2671 16.8238L13.3669 20.3073C12.4171 20.868 11.25 20.1381 11.25 18.9835V12.0164C11.25 10.8618 12.4171 10.132 13.3669 10.6927L19.2671 14.1763C20.2443 14.7533 20.2443 16.2467 19.2671 16.8238Z"
                                                    fill="#339B96" />
                                            </svg>

                                        </button>
                                        <div class="w-full  border-2  border-gray">

                                        </div>
                                        <button type="button" class="recordButton relative h-8 w-8">
                                            <span
                                                class="animate-ping recordButtonAnimation hidden  absolute right-[1px]  h-full w-full rounded-full bg-primary opacity-75"></span>
                                            <svg width="32" height="32" viewBox="0 0 29 29" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M28.667 14.167C28.667 21.8989 22.3989 28.167 14.667 28.167C6.935 28.167 0.666992 21.8989 0.666992 14.167C0.666992 6.435 6.935 0.166992 14.667 0.166992C22.3989 0.166992 28.667 6.435 28.667 14.167ZM16.4353 13.7985C16.4353 15.0217 15.4479 16.0091 14.2249 16.0091C13.0017 16.0091 12.0143 15.0217 12.0143 13.7985V9.37752C12.0143 8.15436 13.0017 7.16699 14.2249 7.16699C15.4479 7.16699 16.4353 8.15436 16.4353 9.37752V13.7985ZM14.2249 8.6407C13.8196 8.6407 13.4881 8.97228 13.4881 9.37755V13.7987C13.4881 14.2038 13.8196 14.5355 14.2249 14.5355C14.6375 14.5355 14.9617 14.2112 14.9617 13.7987V9.37755C14.9617 8.97228 14.63 8.6407 14.2249 8.6407ZM19.3828 13.7985H18.1302C18.1302 16.0091 16.2585 17.5564 14.2249 17.5564C12.1912 17.5564 10.3196 16.0091 10.3196 13.7985H9.06699C9.06699 16.3112 11.0712 18.3891 13.4881 18.7502V21.167H14.9617V18.7502C17.3785 18.3891 19.3828 16.3112 19.3828 13.7985Z"
                                                    fill="#EDBD58" />
                                            </svg>
                                        </button>

                                    </div>
                                </div>
                                <div class="recording-set">
                                    <label class="text-[14px] font-semibold mb-1 ml-1 block">@lang('lang.Audio_2')</label>
                                    <div
                                        class="h-10 w-full border border-[#DEE2E6] rounded-[4px]  gap-2 flex justify-between px-2 items-center">
                                        {{-- ==== hidden audio and file ====== --}}
                                        <div class="invisible absolute">
                                            <input name="audio_2[]" type="file" class="audioFileInput"
                                                accept="audio/*" />
                                            <div>
                                                <audio class="audioElement audio-player" controls></audio>
                                            </div>
                                        </div>
                                        <button disabled type="button"
                                            class="h-8 play-button w-full max-h-8 max-w-8  rounded-full flex justify-center items-center ">
                                            <svg width="46" height="46" viewBox="0 0 29 29" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15 28C21.9035 28 27.5 22.4035 27.5 15.5C27.5 8.59644 21.9035 3 15 3C8.09644 3 2.5 8.59644 2.5 15.5C2.5 22.4035 8.09644 28 15 28Z"
                                                    fill="#339B96" />
                                                <path
                                                    d="M19.2671 16.8238L13.3669 20.3073C12.4171 20.868 11.25 20.1381 11.25 18.9835V12.0164C11.25 10.8618 12.4171 10.132 13.3669 10.6927L19.2671 14.1763C20.2443 14.7533 20.2443 16.2467 19.2671 16.8238Z"
                                                    fill="#339B96" />
                                            </svg>
                                        </button>
                                        <div class="w-full  border-2  border-gray">

                                        </div>
                                        <button type="button" class="recordButton relative h-8 w-8">
                                            <span
                                                class="animate-ping recordButtonAnimation hidden  absolute right-[1px]  h-full w-full rounded-full bg-primary opacity-75"></span>
                                            <svg width="32" height="32" viewBox="0 0 29 29" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M28.667 14.167C28.667 21.8989 22.3989 28.167 14.667 28.167C6.935 28.167 0.666992 21.8989 0.666992 14.167C0.666992 6.435 6.935 0.166992 14.667 0.166992C22.3989 0.166992 28.667 6.435 28.667 14.167ZM16.4353 13.7985C16.4353 15.0217 15.4479 16.0091 14.2249 16.0091C13.0017 16.0091 12.0143 15.0217 12.0143 13.7985V9.37752C12.0143 8.15436 13.0017 7.16699 14.2249 7.16699C15.4479 7.16699 16.4353 8.15436 16.4353 9.37752V13.7985ZM14.2249 8.6407C13.8196 8.6407 13.4881 8.97228 13.4881 9.37755V13.7987C13.4881 14.2038 13.8196 14.5355 14.2249 14.5355C14.6375 14.5355 14.9617 14.2112 14.9617 13.7987V9.37755C14.9617 8.97228 14.63 8.6407 14.2249 8.6407ZM19.3828 13.7985H18.1302C18.1302 16.0091 16.2585 17.5564 14.2249 17.5564C12.1912 17.5564 10.3196 16.0091 10.3196 13.7985H9.06699C9.06699 16.3112 11.0712 18.3891 13.4881 18.7502V21.167H14.9617V18.7502C17.3785 18.3891 19.3828 16.3112 19.3828 13.7985Z"
                                                    fill="#EDBD58" />
                                            </svg>
                                        </button>

                                    </div>
                                </div>
                                <div class="recording-set">
                                    <label class="text-[14px] font-semibold mb-1 ml-1 block">@lang('lang.Audio_3')</label>
                                    <div class="flex gap-2 items-center">
                                        <div
                                            class="h-10 w-full border border-[#DEE2E6] rounded-[4px]  gap-2 flex justify-between px-2 items-center">
                                            {{-- ==== hidden audio and file ====== --}}
                                            <div class="invisible absolute">
                                                <input name="audio_3[]" type="file" class="audioFileInput"
                                                    accept="audio/*" />
                                                <div>
                                                    <audio class="audioElement audio-player" controls></audio>
                                                </div>
                                            </div>
                                            <button disabled type="button"
                                                class="h-8 play-button w-full max-h-8 max-w-8  rounded-full flex justify-center items-center ">
                                                <svg width="46" height="46" viewBox="0 0 29 29"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M15 28C21.9035 28 27.5 22.4035 27.5 15.5C27.5 8.59644 21.9035 3 15 3C8.09644 3 2.5 8.59644 2.5 15.5C2.5 22.4035 8.09644 28 15 28Z"
                                                        fill="#339B96" />
                                                    <path
                                                        d="M19.2671 16.8238L13.3669 20.3073C12.4171 20.868 11.25 20.1381 11.25 18.9835V12.0164C11.25 10.8618 12.4171 10.132 13.3669 10.6927L19.2671 14.1763C20.2443 14.7533 20.2443 16.2467 19.2671 16.8238Z"
                                                        fill="#339B96" />
                                                </svg>

                                            </button>
                                            <div class="w-full  border-2  border-gray">

                                            </div>
                                            <button type="button" class="recordButton relative h-8 w-8">
                                                <span
                                                    class="animate-ping recordButtonAnimation hidden  absolute right-[1px]  h-full w-full rounded-full bg-primary opacity-75"></span>
                                                <svg width="32" height="32" viewBox="0 0 29 29"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M28.667 14.167C28.667 21.8989 22.3989 28.167 14.667 28.167C6.935 28.167 0.666992 21.8989 0.666992 14.167C0.666992 6.435 6.935 0.166992 14.667 0.166992C22.3989 0.166992 28.667 6.435 28.667 14.167ZM16.4353 13.7985C16.4353 15.0217 15.4479 16.0091 14.2249 16.0091C13.0017 16.0091 12.0143 15.0217 12.0143 13.7985V9.37752C12.0143 8.15436 13.0017 7.16699 14.2249 7.16699C15.4479 7.16699 16.4353 8.15436 16.4353 9.37752V13.7985ZM14.2249 8.6407C13.8196 8.6407 13.4881 8.97228 13.4881 9.37755V13.7987C13.4881 14.2038 13.8196 14.5355 14.2249 14.5355C14.6375 14.5355 14.9617 14.2112 14.9617 13.7987V9.37755C14.9617 8.97228 14.63 8.6407 14.2249 8.6407ZM19.3828 13.7985H18.1302C18.1302 16.0091 16.2585 17.5564 14.2249 17.5564C12.1912 17.5564 10.3196 16.0091 10.3196 13.7985H9.06699C9.06699 16.3112 11.0712 18.3891 13.4881 18.7502V21.167H14.9617V18.7502C17.3785 18.3891 19.3828 16.3112 19.3828 13.7985Z"
                                                        fill="#EDBD58" />
                                                </svg>
                                            </button>

                                        </div>
                                        <div class="appendedElement">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="wordInput"></div>
                    <div class="mx-10 my-6  flex justify-end">
                        <button id="addwordContainer" type="button"
                            class="bg-secondary text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">
                            @lang('lang.add_more_word')
                        </button>
                    </div>
                </div>
                <div class=" pt-4">
                    <hr class="border-[#DEE2E6] ">
                </div>
                <div class="flex justify-end ">
                    <button id="addBtn"
                        class="bg-secondary text-white py-2 px-6 my-4 rounded-[4px]  mx-6  font-semibold">
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


{{--  --}}

<div id="excelDemo" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-6xl max-h-full ">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
            <div class="flex items-center   justify-endjustify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                <h3 class="text-xl font-semibold text-white text-center">
                    @lang('lang.Sample_Excel_Sheet')
                </h3>
                <button type="button"
                    class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                    data-modal-hide="excelDemo">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <div class="p-5">
                <table class="w-full text-left">
                    <thead>
                        <tr class="">
                            <th class="bg-primary text-white border border-slate-300  py-3 pl-2">@lang('lang.Course_Name')
                            </th>
                            <th class="bg-primary text-white border border-slate-300  py-3 pl-2">@lang('lang.Level')
                            </th>
                            <th class="bg-primary text-white border border-slate-300  py-3 pl-2">@lang('lang.Lesson')
                            </th>
                            <th class="bg-primary text-white border border-slate-300  py-3 pl-2">@lang('lang.Word')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-slate-300 py-3 pl-2">GEN AI</td>
                            <td class="border border-slate-300 py-3 pl-2">01</td>
                            <td class="border border-slate-300 py-3 pl-2">02</td>
                            <td class="border border-slate-300 py-3 pl-2">B</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class=" pt-4">
                <hr class="border-[#DEE2E6] ">
            </div>
            <div class="flex justify-end ">
                <a href="{{ asset('assets/Courses.xlsx') }}" download="Example">

                    <button id="addBtn"
                        class="bg-secondary text-white py-2 px-6 my-4 rounded-[4px]  mx-6  font-semibold">
                        <div id="text">
                            @lang('lang.Download_Example')
                        </div>

                    </button>
                </a>
            </div>
        </div>

    </div>
</div>


@include('layouts.footer')
<script>
    function audioPlayer() {
        var playButtons = document.querySelectorAll('.play-button');

        playButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var audio = button.parentElement.querySelector('.audio-player');

                if (audio) {
                    if (audio.paused) {
                        audio.play();
                        button.innerHTML = `<svg width="46" height="46" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"  fill-rule="evenodd" clip-rule="evenodd" d="M15.5 28C22.4035 28 28 22.4035 28 15.5C28 8.59644 22.4035 3 15.5 3C8.59644 3 3 8.59644 3 15.5C3 22.4035 8.59644 28 15.5 28Z" fill="#339B96"/>
                    <rect x="11" y="11" width="3" height="10" rx="1.5" fill="#339B96"/>
                    <rect x="16" y="11" width="3" height="10" rx="1.5" fill="#339B96"/>
                    </svg>`;
                    } else {
                        audio.pause();
                        button.innerHTML = `
                <svg width="46" height="46" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M15 28C21.9035 28 27.5 22.4035 27.5 15.5C27.5 8.59644 21.9035 3 15 3C8.09644 3 2.5 8.59644 2.5 15.5C2.5 22.4035 8.09644 28 15 28Z" fill="#339B96"/>
<path d="M19.2671 16.8238L13.3669 20.3073C12.4171 20.868 11.25 20.1381 11.25 18.9835V12.0164C11.25 10.8618 12.4171 10.132 13.3669 10.6927L19.2671 14.1763C20.2443 14.7533 20.2443 16.2467 19.2671 16.8238Z" fill="#339B96"/>
</svg>`;
                    }


                    audio.addEventListener('ended', function() {
                        button.innerHTML = `
                <svg width="46" height="46" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M15 28C21.9035 28 27.5 22.4035 27.5 15.5C27.5 8.59644 21.9035 3 15 3C8.09644 3 2.5 8.59644 2.5 15.5C2.5 22.4035 8.09644 28 15 28Z" fill="#339B96"/>
<path d="M19.2671 16.8238L13.3669 20.3073C12.4171 20.868 11.25 20.1381 11.25 18.9835V12.0164C11.25 10.8618 12.4171 10.132 13.3669 10.6927L19.2671 14.1763C20.2443 14.7533 20.2443 16.2467 19.2671 16.8238Z" fill="#339B96"/>
</svg>
                `;
                    });
                }
            });
        });



    }


    audioPlayer();

    $(document).ready(function() {
        //  get   course  data
        $('.updateBtn').click(function() {
            var updateId = $(this).attr('updateId');
            var url = "../getCourseData/" + updateId;
            console.log(url);
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    var course = response.course;
                    $('#update_id').val(course.id);
                    $('#courseName').val(course.course_name);
                    $('#Levelinput').val(course.level);
                    $('#Lessoninput').val(course.lesson);
                    $('#Wordinput').val(course.word);
                    $('#audio1').attr('src', course.audio_1);
                    $('#audio2').attr('src', course.audio_2);
                    $('#audio3').attr('src', course.audio_3);

                },
                error: function(jqXHR) {
                    let response = JSON.parse(jqXHR.responseText);
                    console.log("error");
                    Swal.fire(
                        'Warning!',
                        'Training  Not Found',
                        'warning'
                    );
                }
            });
        })


        $("#Updatecourse").submit(function(event) {
            var updateId = $('#update_id').val();
            var url = "../updateCoursedata/" + updateId;
            console.log(url);
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
                        window.location.href = '../course';
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

        //  add course  data
        $("#courseData").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "../addCourse",
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
                        window.location.href = '../course';
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

        // delete training video
        $('.delbtn').click(function() {
            var delId = $(this).attr('delId');
            var url = "../deleteCourseData/" + delId;
            console.log(url);
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    if (response.success == true) {
                        window.location.href = '../course';
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
                        'Course Not Found',
                        'warning'
                    );
                }

            });
        });
    });

    function audiorec() {
        const recordingSets = document.querySelectorAll(".recording-set");
        const fileoutput = document.querySelector("#wordInput");
        recordingSets.forEach((set, index) => {
            const recordButton = set.querySelector(".recordButton");
            const playButton = set.querySelector(".play-button");
            const recordButtonAn = set.querySelector(".recordButtonAnimation");
            const audioElement = set.querySelector(".audioElement");
            const audioFileInput = set.querySelector(".audioFileInput");
            let mediaRecorder;

            recordButton.addEventListener("click", () => toggleRecording(index));

            function toggleRecording(index) {
                if (mediaRecorder && mediaRecorder.state === "recording") {
                    stopRecording();
                } else {
                    startRecording();
                }
            }

            function startRecording() {
                navigator.mediaDevices
                    .getUserMedia({
                        audio: true
                    })
                    .then(function(stream) {
                        mediaRecorder = new MediaRecorder(stream);
                        mediaRecorder.chunks = [];

                        mediaRecorder.ondataavailable = function(event) {
                            mediaRecorder.chunks.push(event.data);
                        };

                        mediaRecorder.onstop = function() {
                            const audioBlob = new Blob(mediaRecorder.chunks, {
                                type: "audio/ogg; codecs=opus",
                            });

                            const audioFile = new File([audioBlob], `recording_${Date.now()}.ogg`, {
                                type: "audio/ogg",
                            });

                            const fileList = new DataTransfer();
                            fileList.items.add(audioFile);
                            audioFileInput.files = fileList.files;

                            const audioUrl = URL.createObjectURL(audioBlob);
                            audioElement.src = audioUrl;
                        };

                        mediaRecorder.start();
                        // recordButton.textContent = "Stop Recording";
                        recordButtonAn.classList.remove('hidden')


                    })
                    .catch(function(err) {
                        console.error("Error accessing microphone", err);
                    });
            }

            function stopRecording() {
                playButton.removeAttribute("disabled");
                mediaRecorder.stop();
                // recordButton.textContent = "Start Recording";
                recordButtonAn.classList.add('hidden')
                // Stop the microphone stream
                const tracks = mediaRecorder.stream.getTracks();
                tracks.forEach((track) => track.stop());

            }
        });

    }
    audiorec()
    // $('#addwordContainer').click(function() {
    //     var inputsCon = $('#wordContainer').html();
    //     $('#wordInput').append(inputsCon);
    //     audiorec()
    // });
    $('#addwordContainer').click(function() {
        var inputsCon = $('#wordContainer').html();
        // Appending the HTML content
        $('#wordInput').append(inputsCon);

        // Adding a remove button to the latest appended element
        $('#wordInput .appendedElement').last().append(`<button type="button"
                                        class="bg-[#FBF0F1] flex justify-center items-center toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl removeButton"
                                        style="width: 42px">
                                        <svg width="20" height="24" viewBox="0 0 12 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.4905 2.74327C11.7356 2.74327 11.9396 2.94675 11.9396 3.20568V3.44508C11.9396 3.69771 11.7356 3.90749 11.4905 3.90749H1.04934C0.803641 3.90749 0.599609 3.69771 0.599609 3.44508V3.20568C0.599609 2.94675 0.803641 2.74327 1.04934 2.74327H2.88624C3.25937 2.74327 3.58411 2.47804 3.66805 2.10382L3.76425 1.67417C3.91375 1.0889 4.40575 0.700195 4.96883 0.700195H7.57039C8.12734 0.700195 8.62486 1.0889 8.76885 1.6433L8.87178 2.10319C8.95511 2.47804 9.27984 2.74327 9.65359 2.74327H11.4905ZM10.5573 11.4946C10.7491 9.70727 11.0849 5.46111 11.0849 5.41827C11.0971 5.2885 11.0548 5.16565 10.9709 5.06674C10.8808 4.97413 10.7669 4.91932 10.6412 4.91932H1.90281C1.77659 4.91932 1.6565 4.97413 1.57317 5.06674C1.48862 5.16565 1.44695 5.2885 1.45308 5.41827C1.45421 5.42615 1.46625 5.57571 1.4864 5.82576C1.57588 6.9366 1.8251 10.0305 1.98614 11.4946C2.1001 12.5731 2.80778 13.251 3.83284 13.2756C4.62384 13.2938 5.43875 13.3001 6.27203 13.3001C7.05691 13.3001 7.85404 13.2938 8.66956 13.2756C9.73015 13.2573 10.4372 12.5914 10.5573 11.4946Z"
                                                fill="#B72834" />
                                        </svg>
                                    </button>`);

        // Binding click event to the newly added remove button
        $('.removeButton').off('click').on('click', function() {
            $(this).closest('.wordsInputs').remove();
        });

        audiorec();
        audioPlayer()
    });
</script>
<script>
    //     $('#addwordbtn').click(function() {
    //         var level = $('#Levelinput').val();
    //         var lesson = $('#Lessoninput').val();
    //         var word = $('#Wordinput').val();
    //         var audio_1 = $('#audio_1').val();
    //         var audio_2 = $('#audio_2').val();
    //         var audio_3 = $('#audio_3').val();

    //         var inputsCon = `<div>
    //     <input type="text" name="level[]" value="${level}">
    //     <input type="text" name="lesson[]" value="${lesson}">
    //     <input type="text" name="word[]" value="${word}">
    //     {{-- <input type="file" name="audio_1[]" value="${audio_1}">
// <input type="file" name="audio_2[]" value="${audio_2}">
// <input type="file" name="audio_3[]" value="${audio_3}"> --}}
    // </div>`
    //         $('#wordInput').append(inputsCon);

    //     })
</script>
