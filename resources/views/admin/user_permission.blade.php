@include('layouts.header')
@include('admin.includes.nav')
@php
    // dd(session('permissions'));
@endphp
<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Users')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Users_List')</h3>
            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>@lang('lang.Name')</th>
                        <th>@lang('lang.email')</th>
                        <th>@lang('lang.Phone_no')</th>
                        <th>@lang('lang.Role')</th>
                        <th>@lang('lang.Permission')</th>
                        <th>@lang('lang.Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $i => $user)
                        <tr>
                            <th>{{ $i + 1 }}</th>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['phone'] }}</td>
                            <td>{{ $user['role'] }}</td>
                            {{-- <td>Create / Update / Delete</td> --}}
                            <td>
                                <ul>
                                    <li>Insert: {{ $permissions[$user->permission]['insert'] ? 'Yes' : 'No' }}</li>
                                    <li>Delete: {{ $permissions[$user->permission]['delete'] ? 'Yes' : 'No' }}</li>
                                    <li>Update: {{ $permissions[$user->permission]['update'] ? 'Yes' : 'No' }}</li>
                                </ul>
                            </td>
                            <td>
                                <button id="addmodal" data-modal-target="addteachermodal" userId="{{ $user['id'] }}"
                                    data-modal-toggle="addteachermodal"
                                    class="bg-secondary py-2 px-4  font-bold text-white rounded-md GetPermissionBtn ">Change
                                    Permission</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>


<!-- Add  Teacher  modal -->
<div id="addteachermodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full ">
        <form id="permissionForm" action="" method="post">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center  justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Change_Permission')
                    </h3>
                    <button type="button"
                        class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addteachermodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <input name="updateId" type="hidden" id="user_id">
                <div class="flex  justify-center gap-5 my-8">
                    <div class="flex items-center me-4">
                        <input id="add" type="checkbox"
                            class="w-6 h-6 text-green-600 bg-gray-100 border-gray-300 rounded  " name="insert">
                        <label for="add" class="ms-2 text-sm font-medium text-gray-900 ">Insert/Add</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input type="checkbox" name="update" id="Update"
                            class="w-6 h-6 text-green-600 bg-gray-100 border-gray-300 rounded  ">
                        <label for="Update" class="ms-2 text-sm font-medium text-gray-900 "
                            value="u">Edit/Update</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input type="checkbox" name="delete" id="Delete"
                            class="w-6 h-6 text-green-600 bg-gray-100 border-gray-300 rounded  ">
                        <label for="Delete" class="ms-2 text-sm font-medium text-gray-900 "
                            value="d">Delete/Remove</label>
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
                            @lang('lang.Change_Permission')
                        </div>

                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



@include('layouts.footer')

<script>
    $(document).ready(function() {
        // get selected update  data
        $('.GetPermissionBtn').click(function() {
            var userId = $(this).attr('userId');
            $('#user_id').val(userId);
            $('#permissionForm').attr('action', "../changePermission/" + userId);
        });

    });
</script>
