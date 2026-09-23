@include('templeteController.Header');
@include('templeteController.SideNave')
@include('templeteController.TopNave')


<div class="row">
<div class="container-fluid py-4">

    <!-- Success Alert (static) -->
    <div class="alert alert-success bg-success bg-opacity-10 border border-success border-2 text-success rounded-3 d-flex align-items-center p-3 mb-3">
        <i class="mdi mdi-check-circle-outline fs-3 me-3"></i>
        <div class="flex-grow-1 fw-semibold">Profile updated successfully!</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <div class="row">

        <!-- ==================== LEFT: PROFILE CARD ==================== -->
        <div class="col-lg-4 col-md-5">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body text-center p-4">

                    <!-- Gradient Cover -->
                    <div class="rounded-3 mb-3"
                         style="height: 100px; background: linear-gradient(135deg, #0d9488 0%, #0891b2 50%, #0284c7 100%); margin-top: -50px;"></div>

                    <!-- Profile Image -->
                    <div class="position-relative d-inline-block" style="margin-top: -70px;">
                        <img src="https://ui-avatars.com/api/?name=John+Doe&size=200&background=0284c7&color=fff"
                             alt="John Doe"
                             class="rounded-circle border border-4 border-white shadow-sm"
                             style="width: 130px; height: 130px; object-fit: cover;">

                        <!-- Camera icon -->
                        <button type="button"
                                class="btn btn-primary btn-sm rounded-circle position-absolute bottom-0 end-0"
                                style="width: 36px; height: 36px;"
                                data-bs-toggle="modal"
                                data-bs-target="#changeImageModal">
                            <i class="mdi mdi-camera"></i>
                        </button>
                    </div>

                    <!-- Name -->
                    <h4 class="mt-3 mb-1 fw-bold">{{$userProfile->fname}}   {{$userProfile->lname}}</h4>
                    <p class="text-muted mb-2">@ {{$userProfile->username}}</p>

                    <!-- Status Badge -->
                     @if($userProfile->is_active)
                    <span class="badge bg-success bg-opacity-10 text-success border border-success rounded-pill px-3 py-2">
                        <i class="mdi mdi-circle" style="font-size: 8px;"></i> Active
                    </span>
                    @else
                    <span class="badge bg-danger bg-opacity-10 text-success border border-success rounded-pill px-3 py-2">
                        <i class="mdi mdi-circle" style="font-size: 8px;"></i> In Active
                    </span>
                    @endif


                    <!-- Quick Info -->
                    <div class="text-start">

                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="mdi mdi-email text-primary fs-5"></i>
                            </div>
                            <div class="flex-grow-1" style="min-width: 0;">
                                <small class="text-muted d-block">Email</small>
                                <span class="fw-semibold text-truncate d-block">{{$userProfile->username}}</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-info bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="mdi mdi-phone text-info fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <small class="text-muted d-block">Phone</small>
                                <span class="fw-semibold">{{$userProfile->phone}}</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="mdi mdi-cake-variant text-warning fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                              @if(empty($userProfile->dob))
                                <small class="text-danger d-block">
                                    <i class="mdi mdi-alert-circle-outline me-1"></i> No value
                                </small>
                            @else
                                <span class="fw-semibold">
                                    {{ \Carbon\Carbon::parse($userProfile->dob)->format('d M Y') }}
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="mdi mdi-calendar-account text-success fs-5"></i>
                            </div>
                            <div class="flex-grow-1">
                                <small class="text-muted d-block">
                                    Age / Date of Birth
                                </small>

                                @if($userProfile->dob)
                                    <span class="fw-semibold">
                                        {{ \Carbon\Carbon::parse($userProfile->dob)->age }} years
                                        <small class="text-muted">
                                            ({{ \Carbon\Carbon::parse($userProfile->dob)->format('d M Y') }})
                                        </small>
                                    </span>
                                @else
                                    <span class="text-danger fw-semibold">
                                        <i class="mdi mdi-alert-circle-outline me-1"></i>
                                        No value
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <!-- Settings Button -->
                    <button type="button"
                            class="btn btn-outline-primary rounded-pill w-100 mt-3"
                            data-bs-toggle="modal"
                            data-bs-target="#settingsModal">
                        <i class="mdi mdi-cog me-1"></i> Settings
                    </button>

                </div>
            </div>
        </div>

        <!-- ==================== RIGHT: TABS ==================== -->
        <div class="col-lg-8 col-md-7">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-0">

                    <!-- Tabs Nav -->
                    <ul class="nav nav-tabs nav-fill border-0 p-3 pb-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active rounded-top" data-bs-toggle="tab" href="#tab-profile">
                                <i class="mdi mdi-account-outline me-1"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-top" data-bs-toggle="tab" href="#tab-security">
                                <i class="mdi mdi-shield-lock-outline me-1"></i> Security
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-top" data-bs-toggle="tab" href="#tab-notifications">
                                <i class="mdi mdi-bell-outline me-1"></i> Notifications
                                <span class="badge bg-danger rounded-pill ms-1">3</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tabs Content -->
                    <div class="tab-content p-4">

                        <!-- ============ TAB 1: PROFILE ============ -->
                        <div class="tab-pane fade show active" id="tab-profile">
                            <button type="button" class="btn btn-primary rounded-pill fw-bold mb-4 px-4 py-2 shadow-sm d-inline-flex align-items-center gap-2">
                                <i class="mdi mdi-account-edit-outline fs-5"></i>
                                <span>Edit Profile Information</span>
                            </button>

                            <form>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">First Name</label>
                                        <input type="text" class="form-control" value="{{$userProfile->fname}}"readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Last Name</label>
                                        <input type="text" class="form-control" value="{{$userProfile->lname}}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Username</label>
                                        <input type="text" class="form-control" value="{{$userProfile->username}}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Email</label>
                                        <input type="email" class="form-control" value="{{$userProfile->username}}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Phone</label>
                                        <input type="text" class="form-control" value="{{$userProfile->phone}}" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold" value="{{$userProfile->gender}}">Gender</label>
                                        <select class="form-select" readonly>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>   

                                    @if(empty($userProfile->dob))
                                            {{-- No date set --}}
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">
                                                    <i class="mdi mdi-calendar me-1 text-primary"></i> Date of Birth
                                                </label>
                                                <input type="date" 
                                                    class="form-control rounded-pill shadow-sm"
                                                    name="dob"
                                                    placeholder="Select date"
                                                    value="">
                                                <small class="text-muted">No date set</small>
                                            </div>
                                        @else
                                            {{-- Date exists --}}
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">
                                                    <i class="mdi mdi-calendar-check me-1 text-success"></i> Date of Birth
                                                </label>
                                                <input type="text" 
                                                    class="form-control rounded-pill shadow-sm"
                                                    name="dob"
                                                    value="{{ \Carbon\Carbon::parse($userProfile->dob)->format('d M Y') }}" readonly>
                                            </div>
                                        @endif

                                    

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-semibold">Age (auto-calculated)</label>
                                        <input type="text" class="form-control bg-light" value="{{ \Carbon\Carbon::parse($userProfile->dob)->age }}" readonly>
                                    </div>
                                </div>

                                <div class="text-end mt-3">
                                    <button type="button" class="btn btn-primary rounded-pill px-4">
                                        <i class="mdi mdi-content-save me-1"></i> Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- ============ TAB 2: SECURITY ============ -->
                        <div class="tab-pane fade" id="tab-security">
                            <h5 class="fw-bold mb-4">
                                <i class="mdi mdi-shield-lock-outline me-1 text-primary"></i>
                                Change Password
                            </h5>

                            <form method="post" action="{{route('update.password')}}">
                                @csrf 

                                @if(session()->has('error'))

                                    <div class="alert alert-danger bg-info bg-opacity-10 border-0 rounded-3">
                                        <i class="mdi mdi-information-outline me-1"></i>
                                        {{session()->get('error')}}
                                    </div>

                                @endif
                                 @if(session()->has('success'))
                                 <div class="alert alert-info bg-info bg-opacity-10 border-0 rounded-3">
                                    <i class="mdi mdi-information-outline me-1"></i>
                                    {{session()->get('success')}}
                                </div>
                                @endif


                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Current Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="mdi mdi-lock-outline"></i>
                                        </span>
                                        <input type="password" class="form-control" placeholder="Enter current password" id="current_password" name="current_password">
                                        <button type="button" class="btn btn-outline-secondary toggle-password">
                                            <i class="mdi mdi-eye-outline"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">New Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="mdi mdi-lock-plus-outline"></i>
                                        </span>
                                        <input type="password" class="form-control" placeholder="Enter new password" name="new_password" id="new_password">
                                        <button type="button" class="btn btn-outline-secondary toggle-password">
                                            <i class="mdi mdi-eye-outline"></i>
                                        </button>
                                    </div>

                                    @error('new_password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Confirm New Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="mdi mdi-lock-check-outline"></i>
                                        </span>
                                        <input type="password" class="form-control" name="confirm_new_password"  id="confirm_new_password" placeholder="Confirm new password">
                                        <button type="button" class="btn btn-outline-secondary toggle-password">
                                            <i class="mdi mdi-eye-outline"></i>
                                        </button>
                                    </div>
                                    @error('confirm_new_password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                               

                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                                        <i class="mdi mdi-key-change me-1"></i> Update Password
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- ============ TAB 3: NOTIFICATIONS ============ -->
                        <div class="tab-pane fade" id="tab-notifications">
                            <h5 class="fw-bold mb-4">
                                <i class="mdi mdi-bell-outline me-1 text-primary"></i>
                                Notification Settings
                            </h5>

                            <!-- Message notifications -->
                            <div class="card border rounded-3 mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                        <i class="mdi mdi-message-text-outline text-primary fs-4"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-semibold">Message Notifications</h6>
                                        <small class="text-muted">Get notified when you receive a new message.</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </div>
                                </div>
                            </div>

                            <!-- Appointment notifications -->
                            <div class="card border rounded-3 mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <div class="bg-info bg-opacity-10 rounded-circle p-3 me-3">
                                        <i class="mdi mdi-calendar-clock text-info fs-4"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-semibold">Appointment Reminders</h6>
                                        <small class="text-muted">Receive reminders before appointments.</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </div>
                                </div>
                            </div>

                            <!-- Email notifications -->
                            <div class="card border rounded-3 mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <div class="bg-warning bg-opacity-10 rounded-circle p-3 me-3">
                                        <i class="mdi mdi-email-outline text-warning fs-4"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-semibold">Email Notifications</h6>
                                        <small class="text-muted">Send updates to your email address.</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </div>
                            </div>

                            <!-- SMS notifications -->
                            <div class="card border rounded-3 mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-3 me-3">
                                        <i class="mdi mdi-message-processing-outline text-success fs-4"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-semibold">SMS Notifications</h6>
                                        <small class="text-muted">Receive SMS alerts on your phone.</small>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </div>
                            </div>

                            <div class="text-end mt-3">
                                <button type="button" class="btn btn-primary rounded-pill px-4">
                                    <i class="mdi mdi-content-save me-1"></i> Save Preferences
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ==================== MODAL: CHANGE IMAGE ==================== -->
<div class="modal fade" id="changeImageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">

            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">
                    <i class="mdi mdi-camera me-1 text-primary"></i> Change Profile Image
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img id="imagePreview"
                     src="https://ui-avatars.com/api/?name=John+Doe&size=200&background=0284c7&color=fff"
                     class="rounded-circle border border-3 border-primary mb-3"
                     style="width: 150px; height: 150px; object-fit: cover;">

                <div class="mb-3">
                    <label for="userImage" class="form-label fw-semibold">Select Image</label>
                    <input type="file" id="userImage" class="form-control" accept="image/*">
                    <small class="text-muted d-block mt-1">
                        <i class="mdi mdi-information-outline"></i>
                        Max 2MB — JPG, PNG, GIF, WebP
                    </small>
                </div>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary rounded-pill px-4">
                    <i class="mdi mdi-upload me-1"></i> Upload
                </button>
            </div>

        </div>
    </div>
</div>


<!-- ==================== MODAL: SETTINGS ==================== -->
<div class="modal fade" id="settingsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">

            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">
                    <i class="mdi mdi-cog me-1 text-primary"></i> Settings
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-0">

                <a href="#" class="d-flex align-items-center p-3 text-decoration-none text-dark border-bottom"
                   data-bs-toggle="modal" data-bs-target="#changeImageModal" data-bs-dismiss="modal">
                    <i class="mdi mdi-camera fs-4 text-primary me-3"></i>
                    <div class="flex-grow-1">
                        <span class="fw-semibold d-block">Change Profile Image</span>
                        <small class="text-muted">Upload a new profile picture</small>
                    </div>
                    <i class="mdi mdi-chevron-right text-muted"></i>
                </a>

                <a href="#" class="d-flex align-items-center p-3 text-decoration-none text-dark border-bottom"
                   data-bs-toggle="modal" data-bs-target="#passwordModal" data-bs-dismiss="modal">
                    <i class="mdi mdi-lock-outline fs-4 text-warning me-3"></i>
                    <div class="flex-grow-1">
                        <span class="fw-semibold d-block">Change Password</span>
                        <small class="text-muted">Update your login password</small>
                    </div>
                    <i class="mdi mdi-chevron-right text-muted"></i>
                </a>

                <a href="#" class="d-flex align-items-center p-3 text-decoration-none text-dark border-bottom">
                    <i class="mdi mdi-bell-outline fs-4 text-info me-3"></i>
                    <div class="flex-grow-1">
                        <span class="fw-semibold d-block">Notifications</span>
                        <small class="text-muted">Manage message alerts</small>
                    </div>
                    <i class="mdi mdi-chevron-right text-muted"></i>
                </a>

                <a href="#" class="d-flex align-items-center p-3 text-decoration-none text-dark border-bottom">
                    <i class="mdi mdi-shield-account-outline fs-4 text-success me-3"></i>
                    <div class="flex-grow-1">
                        <span class="fw-semibold d-block">Privacy & Security</span>
                        <small class="text-muted">Manage account security</small>
                    </div>
                    <i class="mdi mdi-chevron-right text-muted"></i>
                </a>

                <button type="button" class="d-flex align-items-center p-3 text-decoration-none text-danger border-0 bg-transparent w-100">
                    <i class="mdi mdi-logout fs-4 me-3"></i>
                    <div class="flex-grow-1 text-start">
                        <span class="fw-semibold d-block">Logout</span>
                        <small class="text-muted">Sign out of your account</small>
                    </div>
                    <i class="mdi mdi-chevron-right"></i>
                </button>

            </div>
        </div>
    </div>
</div>


<!-- ==================== MODAL: CHANGE PASSWORD ==================== -->
<div class="modal fade" id="passwordModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">

            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">
                    <i class="mdi mdi-lock-reset me-1 text-warning"></i> Change Password
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center py-4">
                <p class="text-muted">Use the <strong>Security tab</strong> on the profile page to change your password.</p>
                <button type="button" class="btn btn-primary rounded-pill px-4"
                        data-bs-dismiss="modal"
                        onclick="document.querySelector('a[href=\'#tab-security\']').click();">
                    <i class="mdi mdi-arrow-right me-1"></i> Go to Security Tab
                </button>
            </div>

        </div>
    </div>
</div>


<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Preview image before upload
    document.getElementById('userImage')?.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                document.getElementById('imagePreview').src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const input = this.parentElement.querySelector('input');
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('mdi-eye-outline');
                icon.classList.add('mdi-eye-off-outline');
            } else {
                input.type = 'password';
                icon.classList.remove('mdi-eye-off-outline');
                icon.classList.add('mdi-eye-outline');
            }
        });
    });
</script>


       <!-- ======================End hire -->
</div>
    </div> <!-- end card-->
</div> <!-- end col -->


</div>
@include('AdminDashboard.AdminScript');
@include('templeteController.Footer');