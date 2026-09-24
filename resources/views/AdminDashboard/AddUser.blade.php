@include('templeteController.Header');
@include('templeteController.SideNave');
@include('templeteController.TopNave')
<div class="row">


    <div class="col-12">

        
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
        
       @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                <i class="mdi mdi-alert-circle-outline fs-4 me-2"></i>
                <div class="flex-grow-1">{{ session()->get('error') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
         
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <!-- Page Title -->
            <div>
                <h4 class="page-title fw-bold text-primary mb-1">
                    <i class="mdi mdi-account-group me-2"></i>Admin Details
                </h4>
                <p class="text-muted mb-0 small">Manage and view all staff member information</p>
            </div>

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb mb-0">
                <ol class="breadcrumb mb-0 bg-light px-3 py-2 rounded-pill shadow-sm">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.index')}}" class="text-decoration-none">
                            <i class="mdi mdi-home me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);" class="text-decoration-none">
                            <i class="mdi mdi-shield-account me-1"></i>Admin
                        </a>
                    </li>
                    <li class="breadcrumb-item active fw-semibold pages-links" aria-current="page">
                        <i class="mdi mdi-table me-1"></i>User Table
                    </li>

                </ol>
            </nav>
        </div>

        <div class="card admin-table shadow-sm">
            <div class="card-body p-2">
                <div
                    class="manage-staff-titile  d-flex align-items-center justify-content-between p-3 bg-light rounded-3 border border-2 border-info mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <span class="text-danger fs-4">👥</span>
                        <h5 class="mb-0 fw-semibold">Staff Members</h5>
                        <span
                            class="badge bg-danger rounded-pill fs-6 px-3 py-1">{{$adminComponents['numOfUser']}}</span>
                    </div>
                    <a href="javascript:void(0);"
                        class="btn btn-outline-danger btn-sm d-inline-flex align-items-center gap-1 px-3 py-1.5 rounded-3 border-2 fw-semibold add-user-btn"
                        id="addStaffBtn">
                        <i class="mdi mdi-plus-circle fs-6"></i>
                        Add Staff Member
                    </a>


                </div>
                <div class="table-responsive p-2">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Names</th>
                                    <th>Usename</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($adminComponents['adminData'] as $key=>$user)
                                <tr>
                                    <td>{{$key+ 1}}</td>
                                    <td>{{$user->fname}} {{$user->lname}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->gender}}</td>

                                    @if($user->role == 'admin')
                                    <td>Admin</td>
                                    @elseif($user->role == 'super_admin')
                                    <td>Super Admin</td>
                                    @else($user->role == 'moderator')
                                    <td>Moderator</td>
                                    @endif
                                    

                                    @if($user->is_active == 1)
                                    <td>
                                        <span
                                            class="badge bg-success bg-opacity-10 text-success border border-success rounded-pill px-2 py-1">
                                            <i class="mdi mdi-check-circle me-1"></i> Active
                                        </span>
                                    </td>
                                    @else
                                    <td>
                                        <span
                                            class="badge bg-danger bg-opacity-10 text-danger border border-danger rounded-pill px-2 py-1">
                                            <i class="mdi mdi-close-circle me-1"></i> Suspended
                                        </span>
                                    </td>
                                    @endif
                                    <td>
                                        
                                        <a href="javascript:void(0)" class="action-icon"> <i
                                                class="mdi mdi-square-edit-outline update-user"
                                                 data-id = '{{$user->id}}'
                                                data-fname = '{{$user->fname}}'
                                                data-lname = '{{$user->lname}}'
                                                data-username = '{{$user->username}}'
                                                data-phone = '{{$user->phone}}'
                                                data-gender = '{{$user->gender}}'
                                                data-role = '{{$user->role}}'
                                                data-is_active = '{{$user->is_active}}'></i></a>
                                        <a href="javascript:void(0);" class="action-icon "> <i
                                                class="mdi mdi-delete delete-user" 
                                                data-id = '{{$user->id}}'
                                                
                                                
                                                
                                                
                                                ></i></a></span></li>
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
        <div class="card admin-form-add shadow-sm">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient  text-white py-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <button
                            class="btn btn-primary rounded-pill px-4 py-2 view-staff-member shadow-sm d-inline-flex align-items-center gap-2">
                            <i class="mdi mdi-account-plus fs-4"></i>
                            <span class="fw-bold">View Staff Member</span>
                            <span
                                class="badge bg-danger text-white ms-2 rounded-pill">{{$adminComponents['numOfUser']}}</span>
                        </button>
                    </div>
                    
                </div>
                <div class="card-body p-4">
                    <form action="{{route('user.add')}}" method="POST" enctype="multipart/form-data">
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
                                        value="{{old('fname')}}">
                                    @error('fname')
                                    <i class="text-danger">{{ $message }}</i>
                                    @enderror
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
                                        value="{{old('lname')}}">
                                    <i class="text-danger">@error('lname') {{$message}} @enderror .</i>
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
                                        value="{{old('userEmail')}}">
                                    <div class="invalid-feedback">Please Enter eamil Address.</div>
                                    <i class="text-danger">@error('userEmail') {{$message}} @enderror .</i>


                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userImage" class="form-label fw-semibold">
                                        <i class="mdi mdi-email text-success me-1"></i>
                                        User image <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" id="userImage" name="userImage"
                                        class="form-control form-control-sm border-2" value="{{old('userImage')}}">
                                    <i class="text-danger">@error('userImage') {{$message}} @enderror .</i>

                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label fw-semibold">
                                        <i class="mdi mdi-phone text-success me-1"></i>
                                        Phone Number <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="phone" name="phone"
                                        class="form-control form-control-sm border-2" value="{{old('phone')}}">
                                    <div class="invalid-feedback">Phone number is .</div>
                                    <i class="text-danger">@error('phone') {{$message}} @enderror .</i>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label fw-semibold">
                                        <i class="mdi mdi-gender-male-female text-success me-1"></i>
                                        Gender <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select form-select-sm border-2" name="gender" id="gender"
                                        value="{{old('phone')}}">
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <div class="invalid-feedback">Please select gender.</div>
                                    <i class="text-danger">@error('gender') {{$message}} @enderror .</i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label fw-semibold">
                                        <i class="mdi mdi-check-circle text-success me-1"></i>
                                        Status <span class="text-danger">*</span>
                                    </label>

                                    <select class="form-select form-select-sm border-2" name="user_status"
                                        id="user_status" value="{{old('user_status')}}">
                                        <option value="" selected disabled>Select user status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">In nactive</option>
                                        <option value="suspended">Suspended</option>


                                    </select>
                                    <i class="text-danger">@error('user_status') {{$message}} @enderror .</i>

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
                                        value="{{old('userrole')}}">
                                        <option value="" selected disabled>Select user role</option>
                                        <option value="admin">Admin</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="pharmacy">Pharmacy Technician</option>
                                        <option value="receptionist">Receptionist</option>
                                    </select>
                                    <i class="text-danger">@error('userrole') {{$message}} @enderror .</i>

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
        <div class="card update-admin-data shadow-sm">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient  text-white py-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <button
                            class="btn btn-primary rounded-pill px-4 py-2 view-staff-member shadow-sm d-inline-flex align-items-center gap-2">
                            <i class="mdi mdi-account-plus fs-4"></i>
                            <span class="fw-bold">View Staff Member</span>
                            <span
                                class="badge bg-danger text-white ms-2 rounded-pill">{{$adminComponents['numOfUser']}}</span>
                        </button>
                    </div>
                    
                </div>
                <div class="card-body p-4">
                    <form   enctype="multipart/form-data">
                        @csrf
                           <input type="text" id="up_id">
                        <div class="row g-3">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fname" class="form-label fw-semibold">
                                        <i class="mdi mdi-account text-success me-1"></i>
                                        First Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="up_fname" name="up_fname"
                                        class="form-control form-control-sm border-2" placeholder="Enter first name"
                                        value="{{old('fname')}}">
                                    @error('fname')
                                    <i class="text-danger">{{ $message }}</i>
                                    @enderror
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lname" class="form-label fw-semibold">
                                        <i class="mdi mdi-account text-success me-1"></i>
                                        Last Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="up_lname" name="up_lname"
                                        class="form-control form-control-sm border-2" placeholder="Enter last name"
                                        value="{{old('lname')}}">
                                    <i class="text-danger">@error('lname') {{$message}} @enderror .</i>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label fw-semibold">
                                        <i class="mdi mdi-email text-success me-1"></i>
                                        Email Address <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" id="up_userEmail" name="up_userEmail"
                                        class="form-control form-control-sm border-2" placeholder="Enter email address"
                                        value="{{old('userEmail')}}">
                                    <div class="invalid-feedback">Please Enter eamil Address.</div>
                                    <i class="text-danger">@error('userEmail') {{$message}} @enderror .</i>


                                </div>
                            </div>

                            


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label fw-semibold">
                                        <i class="mdi mdi-phone text-success me-1"></i>
                                        Phone Number <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="up_phone" name="up_phone"
                                        class="form-control form-control-sm border-2" value="{{old('phone')}}">
                                    <div class="invalid-feedback">Phone number is .</div>
                                    <i class="text-danger">@error('phone') {{$message}} @enderror .</i>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label fw-semibold">
                                        <i class="mdi mdi-gender-male-female text-success me-1"></i>
                                        Gender <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select form-select-sm border-2" name="up_gender" id="up_gender"
                                        value="{{old('phone')}}">
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <div class="invalid-feedback">Please select gender.</div>
                                    <i class="text-danger">@error('gender') {{$message}} @enderror .</i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label fw-semibold">
                                        <i class="mdi mdi-check-circle text-success me-1"></i>
                                        Status <span class="text-danger">*</span>
                                    </label>

                                    <select class="form-select form-select-sm border-2 up-user-status" name="up_user_status"
                                        id="up_user_status" value="{{old('user_status')}}">
                                        <option value="" selected disabled>Select user status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">In nactive</option>
                                        <option value="suspended">Suspended</option>


                                    </select>
                                    <i class="text-danger">@error('user_status') {{$message}} @enderror .</i>

                                </div>
                            </div>

                            <!-- Role -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="userrole" class="form-label fw-semibold">
                                        <i class="mdi mdi-badge-account text-success me-1"></i>
                                        User Role <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select form-select-sm border-2" name="up_userrole" id="up_userrole"
                                        value="{{old('userrole')}}">
                                        <option value="" selected disabled>Select user role</option>
                                        <option value="admin">Admin</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="doctor">Human Resource HR</option>
                                        <option value="pharmacy">Pharmacy Technician</option>
                                        <option value="receptionist">Receptionist</option>
                                    </select>
                                    <i class="text-danger">@error('userrole') {{$message}} @enderror .</i>

                                </div>
                            </div>
                        </div>



                        <!-- Submit Buttons -->
                        <div class="d-flex gap-2 mt-4 pt-3 border-top">
                            <button type="#" class="btn btn-info btn-sm px-5  update-user-data">
                                <i class="mdi mdi-check me-2"></i> Update User
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
    </div>
    <!-- =======+End Staff Form=============  -->
</div>

</div> <!-- end col -->


</div>
@include('AdminDashboard.adminScript')
@include('templeteController.Footer');