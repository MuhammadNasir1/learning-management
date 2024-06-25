@include('layouts.header')
@include('teacher.includes.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.Dashboard')</h1>
    </div>
    <div class="grid grid-cols-4 gap-6  mt-4">
        <div class="card-1 ">
            <div class="bg-white shadow-med  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Todays_Lesson')</p>
                        <h2 class="text-2xl font-semibold mt-1">05</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/lessonicon.svg') }}" alt="lesson">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white shadow-med  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Complete_Lessons')</p>
                        <h2 class="text-2xl font-semibold mt-1">00</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/lesson_com_icon.svg') }}"
                            alt="students">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white shadow-med  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Training_Videos')</p>
                        <h2 class="text-2xl font-semibold mt-1">{{ $trainingCount }}</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/tainingicon.svg') }}"
                            alt="Training Vidwi">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8 ">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Recorded_Videos')</p>
                        <h2 class="text-2xl font-semibold mt-1">{{ $videoCount }}</h2>
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
<div class="flex gap-10 mt-16 px-3 ">
    <div class="w-[60%] shadow-med p-3 rounded-xl">
        <h2 class="text-xl text-[#808191] font-semibold  ml-6">@lang('lang.Daily_Lessons')</h2>
        <div id="lessonChart" class="mt-3" style="height: 370px; width: 100%;"></div>
    </div>
    <div class="w-[40%] shadow-med p-3 rounded-xl">
        <h2 class="text-xl text-[#808191] font-semibold ml-6">@lang('lang.Students')</h2>
        <div id="studentChart" class="mt-3" style="height: 370px; width: 100%;"></div>
    </div>
</div>
</div>

<script>
    window.onload = function() {
        CanvasJS.addColorSet("colors",
            [

                "#EDBD58",
                "#339B96",
                "#D95975",
                "#3E3CB3",
                "#0A5214",
                "#c3ddfd"
            ]);
        var chart = new CanvasJS.Chart("lessonChart", {
            colorSet: "colors",
            animationEnabled: true,
            theme: "light1",
            axisY: {
                gridColor: "#00000016",
                suffix: "-"

            },

            data: [{
                type: "column",
                yValueFormatString: "#,##0.0#\"\"",
                dataPoints: [{
                        label: "Mon",

                        y: 25
                    },
                    {
                        label: "Tue",
                        y: 15
                    },
                    {
                        label: "Wed",
                        y: 10
                    },
                    {
                        label: "Thu",
                        y: 30
                    },
                    {
                        label: "Fri",
                        y: 21
                    },
                    {
                        label: "Sat",
                        y: 6
                    },
                    {
                        label: "Sun",
                        y: 3
                    }

                ]
            }]
        });
        var chart2 = new CanvasJS.Chart("studentChart", {
            colorSet: "colors",
            animationEnabled: true,
            theme: "light1",
            axisY: {
                gridColor: "#00000016",
                suffix: "-"
            },



            data: [{
                type: "column",
                yValueFormatString: "#,##0.0#\"\"",
                dataPoints: [{
                        label: "Mon",
                        y: 30
                    },
                    {
                        label: "Tue",
                        y: 10
                    },
                    {
                        label: "Wed",
                        y: 8
                    },
                    {
                        label: "Thu",
                        y: 20
                    },
                    {
                        label: "Fri",
                        y: 5
                    },
                    {
                        label: "Sat",
                        y: 14
                    },
                    {
                        label: "Sun",
                        y: 6
                    }

                ]
            }]
        });
        chart.render();
        chart2.render();

    }
</script>
@include('layouts.footer')
