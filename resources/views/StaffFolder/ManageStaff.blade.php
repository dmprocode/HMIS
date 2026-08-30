@include('templeteController.Header');
@include('templeteController.SideNave');
@include('templeteController.TopNave')
<div class="row">


    <div class="col-12">
        <div
            class="manage-staff-titile  d-flex align-items-center justify-content-between p-3 bg-light rounded-3 border border-2 border-info mb-3">
            <div class="d-flex align-items-center gap-3">
                <span class="text-danger fs-4">👥</span>
                <h5 class="mb-0 fw-semibold">Staff Members</h5>
                <span class="badge bg-danger rounded-pill fs-6 px-3 py-1">{{$staffInfo['noStaff']}}</span>
            </div>
            <a href="javascript:void(0);"
                class="btn btn-outline-danger btn-sm d-inline-flex align-items-center gap-1 px-3 py-1.5 rounded-3 border-2 fw-semibold add-staff-btn ">
                <i class="mdi mdi-plus-circle fs-6"></i>
                Add Staff Member
            </a>


        </div>

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-start border-5 border-success"
            role="alert">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <i class="mdi mdi-check-circle-outline fs-2 text-success"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="alert-heading mb-1 text-success">Success!</h5>
                    <p class="mb-0">{{ session()->get('success') }}</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        <div class="card staff-table shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive p-2">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th class="border-0"> First name</th>
                                    <th class="border-0">Last name</th>
                                    <th class="border-0">User Email</th>
                                    <th class="border-0">User role</th>
                                    <th class="border-0">Member since</th>
                                    <th class="border-0" style="width: 80px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staffInfo['staff'] as $key=> $stafflist)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>
                                       {{$stafflist->fname}}
                                    </td>
                                    <td>
                                        
                                        {{$stafflist->lname}}
                                    </td>
                                                     
                                   
                                    <td>
                                        {{$stafflist->userEmail}}
                                    </td>
                                    <td>{{$stafflist->userrole}}</td>
                                    <td id="tooltip-container">
                                          {{\Carbon\Carbon::parse($stafflist->created_at)->format('d-M-Y')}}                                    
                                    </td>
                                    <td class="border-0">
                                        <div class="btn-group dropdown">
                                            <a href="#"
                                                class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                                <a class="dropdown-item edit-staff-info" href="javascript:void(0)"
                                                data-id = "{{$stafflist->id}}"
                                                data-fname = "{{$stafflist->fname}}"
                                                data-lname = "{{$stafflist->lname}}"
                                                data-userEmail = "{{$stafflist->userEmail}}"
                                                data-userrole = "{{$stafflist->userrole}}"
                                                data-phone = "{{$stafflist->phone}}">
                                                <i
                                                        class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Rename</a>
                                                
                                                 <a class="dropdown-item delete-staff text-danger" href="javascript:void(0)" 
                                                    data-id="{{ $stafflist->id }}" >
                                                        <i class="mdi mdi-delete me-2 text-danger"></i> Remove
                                                 </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================Add  staff form ============ -->
        <div class="card staff-form-add shadow-sm">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient bg-success text-white py-3">
                    <div class="d-flex align-items-center gap-2">
                        <i class="mdi mdi-account-plus fs-4"></i>
                        <h5 class="mb-0 fw-bold">Add New Staff Member</h5>
                        <span class="badge bg-light text-danger ms-auto">Required *</span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{route('add-staff')}}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="row g-3">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fname" class="form-label fw-semibold">
                                        <i class="mdi mdi-account text-success me-1"></i>
                                        First Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="fname" name="fname"
                                        class="form-control form-control-sm border-2" placeholder="Enter first name"
                                        required>
                                    <div class="invalid-feedback">Please enter first name.</div>
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lname" class="form-label fw-semibold">
                                        <i class="mdi mdi-account text-success me-1"></i>
                                        Last Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="lname" name="lname"
                                        class="form-control form-control-sm border-2" placeholder="Enter last name"
                                        required>
                                    <div class="invalid-feedback">Please enter last name.</div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label fw-semibold">
                                        <i class="mdi mdi-email text-success me-1"></i>
                                        Email Address <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" id="userEmail" name="userEmail"
                                        class="form-control form-control-sm border-2" placeholder="Enter email address"
                                        required>
                                    <i class="text-danger">@error('userEmail') {{$message}} @enderror .</i>

                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label fw-semibold">
                                        <i class="mdi mdi-phone text-success me-1"></i>
                                        Phone Number <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="phone" name="phone"
                                        class="form-control form-control-sm border-2" placeholder="Enter email address"
                                        required>
                                    <div class="invalid-feedback">Phone number is Required.</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label fw-semibold">
                                        <i class="mdi mdi-gender-male-female text-success me-1"></i>
                                        Gender <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select form-select-sm border-2" name="" id=""
                                        required>
                                        <option value="" selected disabled>Male</option>
                                        <option value="admin">Female</option>
                                    </select>
                                    <div class="invalid-feedback">Please select gender.</div>
                                </div>
                            </div>

                            <!-- Role -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userrole" class="form-label fw-semibold">
                                        <i class="mdi mdi-badge-account text-success me-1"></i>
                                        User Role <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select form-select-sm border-2" name="userrole" id="userrole"
                                        required>
                                        <option value="" selected disabled>Select user role</option>
                                        <option value="admin">Admin</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="doctor">Human Resource HR</option>
                                        <option value="pharmacy">Pharmacy Technician</option>
                                        <option value="receptionist">Receptionist</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a role.</div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex gap-2 mt-4 pt-3 border-top">
                            <button type="submit" class="btn btn-info btn-sm px-5">
                                <i class="mdi mdi-check me-2"></i> Add Staff
                            </button>
                            <button type="reset" class="btn btn-outline-secondary btn-lg px-4 " id="cancel-btn-add">
                                <i class="mdi mdi-close me-2"></i> Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            </form>




        </div>

<!-- =======================Update staff Data================ -->
        <div class="card update-staff-data shadow-sm">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient bg-success text-white py-3">
                    <div class="d-flex align-items-center gap-2">
                        <i class="mdi mdi-account-edit fs-4"></i>
                        <h5 class="mb-0 fw-bold">Update  Staff Data</h5>
                    </div>
                </div>
                <div class="card-body p-4">
                    <input type="hidden" id="up_id">
                    <form action="{{route('add-staff')}}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="row g-3">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fname" class="form-label fw-semibold">
                                        <i class="mdi mdi-account text-success me-1"></i>
                                        First Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="fname" name="fname"
                                        class="form-control form-control-sm border-2 up-fname" placeholder="Enter first name"
                                        required>
                                    <div class="invalid-feedback">Please enter first name.</div>
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lname" class="form-label  fw-semibold">
                                        <i class="mdi mdi-account text-success me-1"></i>
                                        Last Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="lname" name="lname"
                                        class="form-control form-control-sm border-2 up-lname" placeholder="Enter last name"
                                        required>
                                    <div class="invalid-feedback">Please enter last name.</div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label fw-semibold">
                                        <i class="mdi mdi-email text-success me-1"></i>
                                        Email Address <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" id="userEmail" name="userEmail"
                                        class="form-control form-control-sm border-2 up-user-mail" placeholder="Enter email address"
                                        required>
                                    <div class="invalid-feedback">Please enter user email.</div>


                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label fw-semibold">
                                        <i class="mdi mdi-phone text-success me-1"></i>
                                        Phone Number <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="phone" name="phone"
                                        class="form-control form-control-sm border-2 up-phone-number" placeholder="Enter phone number"
                                        required>
                                    <div class="invalid-feedback">Phone number is Required.</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 d-none">
                                    <label for="userEmail" class="form-label fw-semibold">
                                        <i class="mdi mdi-gender-male-female text-success me-1"></i>
                                        Gender <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select form-select-sm border-2" name="gender" id="gender"
                                        required>
                                        <option value="" selected disabled>Male</option>
                                        <option value="admin">Female</option>
                                    </select>
                                    <div class="invalid-feedback">Please select gender.</div>
                                </div>
                            </div>

                            <!-- Role -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userrole" class="form-label fw-semibold">
                                        <i class="mdi mdi-badge-account text-success me-1"></i>
                                        User Role <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select form-select-sm border-2 up-user-role" name="userrole" id="userrole"
                                        required>
                                        <option value="" selected disabled>Select user role</option>
                                        <option value="admin">Admin</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="doctor">Human Resource HR</option>
                                        <option value="pharmacy">Pharmacy Technician</option>
                                        <option value="receptionist">Receptionist</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a role.</div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex gap-2 mt-4 pt-3 border-top">
                            <button type="submit" class="btn btn-info btn-sm px-5 update-staff-data-btn">
                                <i class="mdi mdi-update me-2"></i> Update Staff
                            </button>
                            <button type="reset" class="btn btn-outline-secondary cancel-btn-update btn-lg px-4">
                                <i class="mdi mdi-close me-2"></i> Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            </form> 
        </div>
    </div>
    <!-- =======+End Staff Form=============  -->
</div>

</div> <!-- end col -->


</div>
@include('StaffFolder.staffScript')
@include('templeteController.Footer');