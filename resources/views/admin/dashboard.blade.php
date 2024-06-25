@include('layouts.header')
@include('admin.includes.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.Dashboard')</h1>
    </div>
    <div class="grid grid-cols-4 gap-6  mt-4">
        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_Students')</p>
                        <h2 class="text-2xl font-semibold mt-1">{{ $studentsCount }}</h2>
                    </div>
                    <div>
                        <img width="90px" height="90px" src="{{ asset('images/totall_student.svg') }}" alt="students">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_Parents')</p>
                        <h2 class="text-2xl font-semibold mt-1">{{ $parentsCount }}</h2>
                    </div>
                    <div>
                        <img width="90px" height="90px" src="{{ asset('images/total_prent.svg') }}" alt="students">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_Teachers')</p>
                        <h2 class="text-2xl font-semibold mt-1">{{ $teachersCount }}</h2>
                    </div>
                    <div>
                        <img width="90px" height="90px" src="{{ asset('images/total_teacher.svg') }}" alt="teacher">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_Revenue')</p>
                        <h2 class="text-2xl font-semibold mt-1">$0.00</h2>
                    </div>
                    <div>
                        <img width="90px" height="90px" src="{{ asset('images/total_rev.svg') }}" alt="Revenue">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="flex gap-14 mt-16 px-3 ">
    <div class="w-[60%]">
        <div class=" shadow-med p-3 rounded-xl">
            <h2 class="text-xl  font-semibold  ml-6">@lang('lang.Earning')</h2>
            <div id="earningChart" class="mt-4" style="height: 370px; width: 100%;"></div>

        </div>


        <div class=" shadow-med p-3 py-5  mt-8 rounded-xl min-h-[448px]">
            <div class="flex justify-between px-6">
                <h2 class="text-xl  font-semibold ">@lang('lang.Top_Performer')</h2>
                <button>
                    <svg width="5" height="25" viewBox="0 0 5 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.28308e-06 2.38095C1.28308e-06 1.91005 0.139642 1.44971 0.401264 1.05817C0.662886 0.666622 1.03474 0.361449 1.4698 0.18124C1.90486 0.00103162 2.38359 -0.0461192 2.84545 0.0457504C3.30731 0.13762 3.73156 0.364384 4.06454 0.697366C4.39752 1.03035 4.62429 1.45459 4.71615 1.91645C4.80802 2.37831 4.76087 2.85704 4.58066 3.2921C4.40046 3.72717 4.09528 4.09902 3.70374 4.36064C3.31219 4.62226 2.85186 4.76191 2.38095 4.76191C1.74949 4.76191 1.14388 4.51106 0.697366 4.06454C0.250851 3.61803 1.28308e-06 3.01242 1.28308e-06 2.38095ZM2.38095 10.119C1.91004 10.119 1.44971 10.2587 1.05817 10.5203C0.666622 10.7819 0.361449 11.1538 0.18124 11.5888C0.00103162 12.0239 -0.0461191 12.5026 0.0457504 12.9645C0.13762 13.4264 0.364384 13.8506 0.697366 14.1836C1.03035 14.5166 1.45459 14.7433 1.91645 14.8352C2.37831 14.9271 2.85704 14.8799 3.2921 14.6997C3.72717 14.5195 4.09902 14.2143 4.36064 13.8228C4.62226 13.4312 4.7619 12.9709 4.7619 12.5C4.7619 11.8685 4.51105 11.2629 4.06454 10.8164C3.61802 10.3699 3.01242 10.119 2.38095 10.119ZM2.38095 20.2381C1.91004 20.2381 1.44971 20.3777 1.05817 20.6394C0.666622 20.901 0.361449 21.2728 0.18124 21.7079C0.00103162 22.143 -0.0461191 22.6217 0.0457504 23.0835C0.13762 23.5454 0.364384 23.9697 0.697366 24.3026C1.03035 24.6356 1.45459 24.8624 1.91645 24.9543C2.37831 25.0461 2.85704 24.999 3.2921 24.8188C3.72717 24.6386 4.09902 24.3334 4.36064 23.9418C4.62226 23.5503 4.7619 23.09 4.7619 22.619C4.7619 21.9876 4.51105 21.382 4.06454 20.9355C3.61802 20.4889 3.01242 20.2381 2.38095 20.2381Z"
                            fill="#323C47" />
                    </svg>
                </button>
            </div>
            <div>


                <div class="text-sm font-medium text-center text-gray-500 border-b border-gray mt-4">
                    <ul class="flex gap-2 ml-3">
                        <li class="me-2">
                            <a href="#"
                                class=" font-semibold inline-block p-2 text-dblue border-b-2 border-dblue rounded-t-lg active">@lang('lang.Monthly')</a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class=" font-semibold inline-block p-2 border-b-2 border-transparent rounded-t-lg ">@lang('lang.Weekly')</a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class=" font-semibold inline-block p-2 border-b-2 border-transparent rounded-t-lg  ">@lang('lang.Today')</a>
                        </li>

                    </ul>
                </div>


                <div>



                    <div class="relative">
                        <table class="w-full text-sm text-center ">
                            <thead class="text-sm text-gray-900 = text-dblue ">
                                <tr>
                                    <th class="px-6 py-3">
                                        @lang('lang.Photo')
                                    </th>
                                    <th class="px-6 py-3">
                                        @lang('lang.Name')
                                    </th>
                                    <th class="px-6 py-3">
                                        @lang('lang.Standard')
                                    </th>
                                    <th class="px-6 py-3">
                                        @lang('lang.Rank')
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white ">
                                    <td class="px-6 py-3 ">
                                        <div class="flex justify-center">
                                            <img height="40px" width="40px" src="{{ asset('images/teacher.svg') }}"
                                                alt="user">
                                        </div>
                                    </td>
                                    <td class="px-6 py-3">
                                        John Smith
                                    </td>
                                    <td class="px-6 py-3">
                                        7th Class
                                    </td>
                                    <td class="px-6 py-3">
                                        <div class="flex items-center justify-center flex-col">
                                            <div>
                                                <p class="text-dblue flex">95.06%</p>
                                                <div class="bg-green-100 rounded-xl w-36 h-3 relative  mt-1">
                                                    <div class="bg-dblue w-[70%] rounded-xl h-full"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="bg-white ">
                                    <td class="px-6 py-3 ">
                                        <div class="flex justify-center">
                                            <img height="40px" width="40px" src="{{ asset('images/teacher.svg') }}"
                                                alt="user">
                                        </div>
                                    </td>
                                    <td class="px-6 py-3">
                                        John Smith
                                    </td>
                                    <td class="px-6 py-3">
                                        7th Class
                                    </td>
                                    <td class="px-6 py-3">
                                        <div class="flex items-center justify-center flex-col">
                                            <div>
                                                <p class="text-dblue flex">95.06%</p>
                                                <div class="bg-green-100 rounded-xl w-36 h-3 relative  mt-1">
                                                    <div class="bg-dblue w-[70%] rounded-xl h-full"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="w-[40%]">
        <div class=" shadow-med p-3 rounded-xl">
            <h2 class="text-xl  font-semibold ml-6">@lang('lang.Students')</h2>
            <div id="studentChart" class="mt-4" style="height: 370px; width: 100%;"></div>
        </div>
        <div class=" shadow-med p-3 rounded-xl mt-10">

            <div>
                <div class="flex justify-between px-6">
                    <h2 class="text-xl  font-semibold ">@lang('lang.Attendance')</h2>
                    <button>
                        <svg width="5" height="25" viewBox="0 0 5 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.28308e-06 2.38095C1.28308e-06 1.91005 0.139642 1.44971 0.401264 1.05817C0.662886 0.666622 1.03474 0.361449 1.4698 0.18124C1.90486 0.00103162 2.38359 -0.0461192 2.84545 0.0457504C3.30731 0.13762 3.73156 0.364384 4.06454 0.697366C4.39752 1.03035 4.62429 1.45459 4.71615 1.91645C4.80802 2.37831 4.76087 2.85704 4.58066 3.2921C4.40046 3.72717 4.09528 4.09902 3.70374 4.36064C3.31219 4.62226 2.85186 4.76191 2.38095 4.76191C1.74949 4.76191 1.14388 4.51106 0.697366 4.06454C0.250851 3.61803 1.28308e-06 3.01242 1.28308e-06 2.38095ZM2.38095 10.119C1.91004 10.119 1.44971 10.2587 1.05817 10.5203C0.666622 10.7819 0.361449 11.1538 0.18124 11.5888C0.00103162 12.0239 -0.0461191 12.5026 0.0457504 12.9645C0.13762 13.4264 0.364384 13.8506 0.697366 14.1836C1.03035 14.5166 1.45459 14.7433 1.91645 14.8352C2.37831 14.9271 2.85704 14.8799 3.2921 14.6997C3.72717 14.5195 4.09902 14.2143 4.36064 13.8228C4.62226 13.4312 4.7619 12.9709 4.7619 12.5C4.7619 11.8685 4.51105 11.2629 4.06454 10.8164C3.61802 10.3699 3.01242 10.119 2.38095 10.119ZM2.38095 20.2381C1.91004 20.2381 1.44971 20.3777 1.05817 20.6394C0.666622 20.901 0.361449 21.2728 0.18124 21.7079C0.00103162 22.143 -0.0461191 22.6217 0.0457504 23.0835C0.13762 23.5454 0.364384 23.9697 0.697366 24.3026C1.03035 24.6356 1.45459 24.8624 1.91645 24.9543C2.37831 25.0461 2.85704 24.999 3.2921 24.8188C3.72717 24.6386 4.09902 24.3334 4.36064 23.9418C4.62226 23.5503 4.7619 23.09 4.7619 22.619C4.7619 21.9876 4.51105 21.382 4.06454 20.9355C3.61802 20.4889 3.01242 20.2381 2.38095 20.2381Z"
                                fill="#323C47" />
                        </svg>
                    </button>
                </div>
                <div id="attendanceChart" class="mt-4" style="height: 270px; width: 100%;"></div>
                <div class="mt-8 mx-10">
                    <div class="flex justify-around">
                        <div class="flex flex-col items-center">
                            <p class="text-[#CECECE] text-lg font-semibold">@lang('lang.Students')</p>
                            <h2 class="text-secondary text-3xl  mt-2 font-bold">84%</h2>
                        </div>
                        <div class="flex flex-col items-center">
                            <p class="text-[#CECECE] text-lg font-semibold">@lang('lang.Teachers')</p>
                            <h2 class="text-pink text-3xl  mt-2  font-bold">34%</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
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

            ]);
        var chart = new CanvasJS.Chart("earningChart", {
            animationEnabled: true,
            axisX: {
                valueFormatString: "DDD",
                minimum: new Date(2017, 1, 5, 23),
                maximum: new Date(2017, 1, 12, 1)
            },
            axisY: {
                gridColor: "#00000016",
                lineDashType: "dot"
            },
            toolTip: {
                shared: true
            },
            data: [{
                    name: "Received",
                    type: "area",
                    fillOpacity: 100,
                    color: "#edbd58",
                    markerSize: 0,
                    dataPoints: [{
                            x: new Date(2017, 1, 6),
                            y: 550
                        },
                        {
                            x: new Date(2017, 1, 7),
                            y: 450
                        },
                        {
                            x: new Date(2017, 1, 8),
                            y: 500
                        },
                        {
                            x: new Date(2017, 1, 9),
                            y: 162
                        },
                        {
                            x: new Date(2017, 1, 10),
                            y: 150
                        },
                        {
                            x: new Date(2017, 1, 11),
                            y: 400
                        },
                        {
                            x: new Date(2017, 1, 12),
                            y: 129
                        }
                    ]
                },
                {

                    name: "Sent",
                    type: "area",
                    color: "#417dfc",
                    fillOpacity: 100,
                    markerSize: 2,
                    dataPoints: [{
                            x: new Date(2017, 1, 6),
                            y: 200
                        },
                        {
                            x: new Date(2017, 1, 7),
                            y: 150
                        },
                        {
                            x: new Date(2017, 1, 8),
                            y: 300
                        },
                        {
                            x: new Date(2017, 1, 9),
                            y: 550
                        },
                        {
                            x: new Date(2017, 1, 10),
                            y: 50
                        },
                        {
                            x: new Date(2017, 1, 11),
                            y: 80
                        },
                        {
                            x: new Date(2017, 1, 12),
                            y: 200
                        }
                    ]
                }
            ]
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
                        label: "Jan",

                        y: 78
                    },
                    {
                        label: "Feb",
                        y: 55
                    },
                    {
                        label: "Mar",
                        y: 80
                    },
                    {
                        label: "Apr",
                        y: 60
                    },


                ]
            }]
        });

        var chart3 = new CanvasJS.Chart("attendanceChart", {
            animationEnabled: true,

            data: [{
                type: "doughnut",
                startAngle: 60,
                //innerRadius: 60,
                indexLabelFontColor: "transparent",
                indexLabelPlacement: "inside",
                dataPoints: [{
                        y: 67,
                        color: "#edbd58",
                        label: "Students"
                    },
                    {
                        y: 28,
                        color: "#D95975",
                        label: "Teachers"
                    },

                ]
            }]
        });
        chart.render();
        chart2.render();
        chart3.render();

    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
    integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@include('layouts.footer')
