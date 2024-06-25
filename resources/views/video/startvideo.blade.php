@php
    // dd(session('teachingData'));
    try {
        $count = count(session('teachingData'));
    } catch (Throwable $e) {
        $count = 0; // Set count to 0 if an error occurs
    }
@endphp

@include('layouts.header')
@include('video.includes.nav')
<section class="mx-16 mt-10 ">
    <div class="shadow-dark mt-3  rounded-xl   bg-white h-[70vh] relative ">
        {{-- === whiteboard Action =====  --}}
        <div class=" absolute w-full z-50">
            <div class=" py-4 mx-6 mt-1   flex gap-5 justify-end ">
                <button class="bg-green-700 px-2 py-2 rounded-md">
                    <svg class="text-white" fill="white" width="22px" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                    </svg>
                </button>

                <button onclick="resize()"><svg width="22px" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                    </svg></button>
            </div>
        </div>


        <div class=" w-full h-full  relative">

            <canvas id="canvas" class="absolute h-full w-full bg-red z-40">
            </canvas>
            <div id="controls-carousel" class="relative w-full h-full controls-carousel " data-carousel="static">
                <!-- Carousel wrapper -->

                <div class="relative h-full overflow-hidden rounded-lg z-20 ">
                    <!-- word 1 -->
                    @foreach (session('teachingData') as $teachingData)
                        @if ($count == 1)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                            </div>
                        @endif
                        <div class="hidden duration-700 ease-in-out " data-carousel-item="active">
                            <div>
                                <h2
                                    class="absolute  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[200px] text-[#EC1C24] font-bold font-mono">
                                    {{ $teachingData['word'] }}</h2>
                            </div>
                            {{-- audio controlls --}}
                            <div class="">
                                <div class="ml-6 pr-12 absolute top-[85%] w-full">
                                    <div class="mt-4 flex  {{ $count !== 1 ? 'justify-center' : 'justify-center' }}  ">
                                        @if ($count !== 1)
                                            {{-- <div class="flex items-center  gap-5 z-50">
                                                <button id="preBtn"
                                                    class="w-32  cursor-pointer bg-secondary rounded-md h-12 text-white font-semibold text-xl">@lang('lang.Previous')</button>
                                            </div> --}}
                                        @endif
                                        <div class="flex gap-4">
                                            @if ($teachingData['audio_1'] !== 'null')
                                                <div>
                                                    <audio class="audio-player"
                                                        src="../{{ $teachingData['audio_1'] }}"></audio>
                                                    <button class="play-button">
                                                        <img src="{{ asset('images/icons/audio-1.svg') }}"
                                                            alt="audio-1">
                                                    </button>
                                                </div>
                                            @endif
                                            @if ($teachingData['audio_2'] !== 'null')
                                                <div>
                                                    <audio class="audio-player"
                                                        src="../{{ $teachingData['audio_2'] }}"></audio>
                                                    <button class="play-button">
                                                        <img src="{{ asset('images/icons/audio-2.svg') }}"
                                                            alt="audio-2">
                                                    </button>
                                                </div>
                                            @endif
                                            @if ($teachingData['audio_3'] !== 'null')
                                                <div>
                                                    <audio class="audio-player"
                                                        src="../{{ $teachingData['audio_3'] }}"></audio>
                                                    <button class="play-button">
                                                        <img src="{{ asset('images/icons/audio-3.svg') }}"
                                                            alt="audio-3">

                                                    </button>
                                                </div>
                                            @endif
                                            <button
                                                class="w-[140px] h-[45px] rounded-full bg-primary flex justify-center gap-2  items-center">
                                                <img src="{{ asset('images/icons/audio.svg') }}" alt="audio-3">
                                                <input
                                                    class="w-[80px] appearance-none rounded-full bg-white h-1 range audio-volume-range"
                                                    type="range" min="0" max="1" step="0.01"
                                                    value="1">
                                            </button>
                                        </div>
                                        @if ($count !== 1)
                                            {{-- <div>
                                                <button id="nBtn"
                                                    class="w-32 z-50 bg-secondary rounded-md h-12 text-white font-semibold text-lg">@lang('lang.Next')</button>
                                            </div> --}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>

                <!-- Slider controls -->
                @if ($count !== 1)
                    <button type="button" id="CPrebtn"
                        class="absolute top-0 start-0 z-40 flex items-center justify-center h-full px-4 cursor-pointer "
                        data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full ">
                            <svg class="w-8 h-8 text-primary " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" id="CNexbtn"
                        class="absolute top-0 end-0 z-40 flex items-center justify-center h-full px-4 cursor-pointer "
                        data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full">
                            <svg class="w-8 h-8 text-primary " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                @endif
            </div>

        </div>
    </div>


    <div class="mt-8 mb-6  flex  justify-center">
        <div class="flex items-center  gap-5">
            <a href="../teachingpage"> <button
                    class=" bg-secondary px-4 rounded-md h-12 text-white font-semibold text-xl">@lang('lang.Teaching_Page')</button></a>
            <button
                class=" bg-secondary px-4 rounded-md h-12 text-white font-semibold text-xl">@lang('lang.Games')</button>
            <button id="recordButton"
                class=" bg-secondary px-4 rounded-md h-12 text-white font-semibold text-xl flex gap-2 items-center">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.0056 12.8569C11.5835 12.8569 12.8627 11.5777 12.8627 9.99972C12.8627 8.42176 11.5835 7.14258 10.0056 7.14258C8.42762 7.14258 7.14844 8.42176 7.14844 9.99972C7.14844 11.5777 8.42762 12.8569 10.0056 12.8569Z"
                        fill="#FF0000" />
                    <path
                        d="M10 0C4.5 0 0 4.5 0 10C0 15.5 4.5 20 10 20C15.5 20 20 15.5 20 10C20 4.5 15.5 0 10 0ZM10 14.2857C7.64286 14.2857 5.71429 12.3571 5.71429 10C5.71429 7.64286 7.64286 5.71429 10 5.71429C12.3571 5.71429 14.2857 7.64286 14.2857 10C14.2857 12.3571 12.3571 14.2857 10 14.2857Z"
                        fill="white" />
                </svg>
                <span id="recordBtnText">@lang('lang.Start_Recording')</span></button>
            {{-- <button
                class=" bg-secondary px-4 rounded-md h-12 text-white font-semibold text-xl">@lang('lang.Restart')</button> --}}
        </div>
    </div>


</section>

{{-- recording modal btn   --}}
<button data-modal-target="recordingDel" data-modal-toggle="recordingDel" id="recordingModalBtn"
    class="invisible absolute"> add recording btn
</button>
<div id="recordingDel" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-5xl max-h-full bg-white shadow-dark ">
        <form id="teacherRec" method="post">
            @csrf
            <div id="fileInputContainer" class="invisible  absolute">

            </div>
            <video id="recordedVideo" class="recordedvideotag" src="" height="700px" width="100%"
                controls></video>
            <a id="downloadLink" class=" absolute right-2 mt-3 mr-3 cursor-pointer" style="display: none"> <svg
                    width="30px" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 551 551"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                </svg></a>
            <div class="flex  mt-7  pb-6  justify-between items-end">
                <div class="w-[80%] px-4 flex  items-start gap-5">
                    <label for=""> @lang('lang.Teacher_comment')</label>
                    <textarea name="teacher_comment" id="" class="h-28 w-[70%] rounded-md  border-gray focus:border-black"
                        placeholder="@lang('lang.Enter_Comment')"></textarea>
                </div>
                <button class="bg-secondary text-white py-2 px-8 my-4 rounded-[4px]    mx-6  font-semibold w-[102px]">
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
                        @lang('lang.save')
                    </div>

                </button>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>



<script>
    const ctx = document.getElementById('canvas').getContext('2d');
    window.addEventListener('resize', resize);
    resize();

    let mousePos = {
        x: 0,
        y: 0
    }

    window.addEventListener('mousemove', draw);
    window.addEventListener('mousedown', mousePosition);
    window.addEventListener('mouseenter', mousePosition);

    function mousePosition(e) {
        mousePos.x = e.clientX;
        mousePos.y = e.clientY;
    }

    function resize() {
        ctx.canvas.width = window.innerWidth;
        ctx.canvas.height = window.innerHeight;
    }

    function draw(e) {
        if (e.buttons !== 1)
            return;
        ctx.beginPath();
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#111';
        ctx.lineWidth = 5;
        ctx.moveTo(mousePos.x, mousePos.y);
        mousePosition(e);
        ctx.lineTo(mousePos.x, mousePos.y);
        ctx.stroke();
    }
</script>
@include('layouts.footer')
<script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>
<script>
    function audioplayer() {
        var playButtons = document.querySelectorAll('.play-button');
        playButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var audio = button.parentElement.querySelector('.audio-player');
                if (audio) {
                    audio.play();
                }
            });
        });
        var volumeRanges = document.querySelectorAll('.audio-volume-range');

        var audioElements = document.querySelectorAll('.audio-player');

        function updateAllRanges(value) {
            volumeRanges.forEach(function(range) {
                range.value = value;
            });
        }
        volumeRanges.forEach(function(range) {
            range.addEventListener('input', function() {
                var volumeValue = range.value;
                audioElements.forEach(function(audio) {
                    if (audio) {
                        audio.volume = volumeValue;
                    }
                });
                updateAllRanges(volumeValue);
            });
        });

    }
    audioplayer()


    let tabStream;
    let audioStream;
    let recorder;
    let isRecording = false;
    const recordingModalBtn = document.getElementById("recordingModalBtn");
    const recordButton = document.getElementById("recordButton");
    const recordBtnText = document.getElementById("recordBtnText");
    const recordedVideo = document.getElementById("recordedVideo");
    const downloadLink = document.getElementById("downloadLink");
    const fileInputContainer = document.getElementById("fileInputContainer");

    recordButton.addEventListener("click", toggleRecording);

    async function toggleRecording() {
        if (!isRecording) {
            startRecording();
        } else {
            stopRecording();
        }
    }

    async function startRecording() {
        tabStream = await navigator.mediaDevices.getDisplayMedia({
            video: {
                mediaSource: "tab"
            },
        });
        audioStream = await navigator.mediaDevices.getUserMedia({
            audio: true,
        });

        const combinedStream = new MediaStream([
            ...tabStream.getTracks(),
            ...audioStream.getTracks(),
        ]);

        recorder = RecordRTC(combinedStream, {
            type: "video"
        });
        recorder.startRecording();

        isRecording = true;
        recordBtnText.innerHTML = "Stop Recording";
    }

    function stopRecording() {
        recorder.stopRecording(() => {
            const blob = recorder.getBlob();
            const url = URL.createObjectURL(blob);
            recordedVideo.src = url;

            downloadLink.href = url;
            downloadLink.download = "recording.webm";
            downloadLink.style.display = "block";

            const file = new File([blob], "recording.webm", {
                type: "video/webm",
            });

            const fileInput = document.createElement("input");
            fileInput.type = "file";
            fileInput.accept = "video/webm";
            fileInput.name = "video";
            fileInput.multiple = false;

            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            fileInput.files = dataTransfer.files;

            fileInputContainer.appendChild(fileInput);

            isRecording = false;
            recordBtnText.textContent = "Start Recording";
        });
        recordingModalBtn.click();
        tabStream.getTracks().forEach((track) => track.stop());
        audioStream.getTracks().forEach((track) => track.stop());

        let video = document.getElementsByClassName('recordedvideotag')[0];
        console.log(video);
        video.onloadedmetadata = function() {
            console.log("Video duration: " + video.duration + " seconds");
        };
    }

    $(document).ready(function() {
        let Cnextbtn = $('#CNexbtn');
        let Cprebtn = $('#CPrebtn');
        let prebtn = $('#preBtn');
        let nbtn = $('#nBtn');

        prebtn.on('click', function() {
            Cprebtn.click();
        });

        nbtn.on('click', function() {
            Cnextbtn.click();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#teacherRec").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "../teacherRec",
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
                        window.location.href = '../studentRec';
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
