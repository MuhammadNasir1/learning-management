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
                        <th>@lang('lang.Date')</th>
                        <th>@lang('lang.Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trainings as $i => $training)
                        <tr class="pt-4">
                            <td class="w-[220px]">{{ $training->title }}</td>
                            <td class="w-[380px]">{{ $training->description }}</td>
                            <td>{{ $training->date }}</td>
                            <td class="flex gap-5">
                                {{-- @if (session('user_det')['role'] == 'admin') --}}
                                @if ($permissions['delete'])
                                    <button class="cursor-pointer delbtn" delId="{{ $training->id }}"><img
                                            width="38px" src="{{ asset('images/icons/delete.svg') }}"
                                            alt="delete"></button>
                                @endif
                                @if ($permissions['update'])
                                    <button updateId="{{ $training->id }}" type="button"
                                        data-modal-target="updatetrainingmodal" data-modal-toggle="updatetrainingmodal"
                                        class="cursor-pointer updateBtn"><img width="38px"
                                            src="{{ asset('images/icons/update.svg') }}" alt="update"></button>
                                @endif
                                {{-- @endif --}}
                                <a class="cursor-pointer" data-modal-target="videodetails{{ $i }}"
                                    data-modal-toggle="videodetails{{ $i }}"><img width="38px"
                                        src="{{ asset('images/icons/view.svg') }}" alt="View"></a>
                            </td>
                        </tr>

                        <!--  video  Details  modal -->
                        <div id="videodetails{{ $i }}" data-modal-backdrop="static"
                            class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full   max-w-4xl max-h-full ">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                                    <div
                                        class="flex items-center   justify-endjustify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                                        <h3 class="text-xl font-semibold text-white text-center">
                                            @lang('lang.Video_Details')
                                        </h3>
                                        <button type="button"
                                            class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                                            data-modal-hide="videodetails{{ $i }}">
                                            <svg class="w-4 h-4 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="flex justify-around gap-10 video-container">
                                        <div class="my-4 pl-6">
                                            <video class=" rounded-[4px] w-full videoduration" controls width="320px"
                                                src="{{ isset($training->video) ? asset($training->video) : '' }}"></video>
                                        </div>
                                        <div class="flex flex-col gap-5  mt-4  pb-4">
                                            <div>
                                                <h2 class="text-pink text-[32px] font-semibold "><span
                                                        class=" py-1 pr-4">@lang('lang.Training') @lang('lang.Video')
                                                    </span>
                                                </h2>
                                            </div>
                                            <div>
                                                <div class="flex items-center justify-end  mt-5">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.Title') :</h3>
                                                    </div>
                                                    <div class="w-[200px]  ">
                                                        <p class="text-[14px] text-[#323C47]">{{ $training->title }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end  mt-5">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.Duration') :</h3>
                                                    </div>
                                                    <div class="w-[200px]  ">
                                                        <p class="text-[14px] text-[#323C47] durationOutput">2Min</p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end  mt-5">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.Date') :</h3>
                                                    </div>
                                                    <div class="w-[200px]  ">
                                                        <p class="text-[14px] text-[#323C47]">{{ $training->date }}</p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end  mt-5">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.Description') :</h3>
                                                    </div>
                                                    <div class="w-[200px]  ">
                                                        <p class="text-[14px] text-[#323C47]">
                                                            {{ $training->description }}
                                                        </p>
                                                    </div>
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



<div id="updatetrainingmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form id="updatetraining" method="post">
            @csrf
            <input type="hidden" id="update_id" name="update_id">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.update_video')
                    </h3>
                    <button type="button"
                        class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="updatetrainingmodal">
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
                            <label class="text-[14px] font-normal" for="title">@lang('lang.Title')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="title" id="title" placeholder=" @lang('lang.Enter_Title')">
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)]  my-6  ">
                            <label class="text-[14px] font-normal" for="description">@lang('lang.Description')</label>
                            <textarea class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[85px] text-[14px]" name="description"
                                id="description" placeholder="@lang('lang.Enter_Description')"></textarea>
                        </div>




                    </div>


                    <div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="video">@lang('lang.Select_Video')</label>
                            <input type="file"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="video" id="video">
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

<!-- Add  courses  modal -->
<div id="addcoursesmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form id="training_data" method="post">
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-2 mt-4 gap-10 px-10">
                    <div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="title">@lang('lang.Title')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="title" id="title" placeholder=" @lang('lang.Enter_Title')">
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)]  my-6  ">
                            <label class="text-[14px] font-normal" for="description">@lang('lang.Description')</label>
                            <textarea class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[85px] text-[14px]" name="description"
                                id="description" placeholder="@lang('lang.Enter_Description')"></textarea>
                        </div>




                    </div>


                    <div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="video">@lang('lang.Select_Video')</label>
                            <input type="file"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="video" id="video">
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





@include('layouts.footer')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const videoContainers = document.querySelectorAll('.video-container');

        videoContainers.forEach(container => {
            const video = container.querySelector('.videoduration');
            const durationOutput = container.querySelector('.durationOutput');

            video.addEventListener('loadedmetadata', function() {
                const duration = video.duration;
                const minutes = Math.floor(duration / 60);
                const seconds = Math.floor(duration % 60);
                const formattedDuration = `${minutes}Min ${seconds}Sec`;

                if (durationOutput) {
                    durationOutput.textContent = formattedDuration;
                }
            });

            video.load();
        });
    });
    $(document).ready(function() {

        $('.updateBtn').click(function() {
            var updateId = $(this).attr('updateId');
            var url = "../trainingUpdataData/" + updateId;
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    var training = response.training;
                    console.log(training);
                    $('#update_id').val(training.id);
                    $('#title').val(training.title);
                    $('#description').val(training.description);

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



        $("#training_data").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "../addtraining",
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
                        window.location.href = '../training';
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


        $("#updatetraining").submit(function(event) {
            var updateId = $('#update_id').val();
            var url = "../updatetraining/" + updateId;
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
                        window.location.href = '../training';
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

        // delete training video
        $('.delbtn').click(function() {
            var delId = $(this).attr('delId');
            var url = "../delTraining/" + delId;
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    if (response.success == true) {
                        window.location.href = '../training';
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
                        'Training Not Found',
                        'warning'
                    );
                }

            });
        });

    });
</script>
