@include('templeteController.Header');
<div class="bg-light d-flex align-items-center py-3" style="min-height: 90vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">

                <!-- Main Card -->
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                    <!-- Header - Reduced Padding -->
                    <div class="card-header py-2 text-center text-white border-0"
                        style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 50%, #084298 100%);">
                        <div class="d-flex align-items-center justify-content-center gap-2">
                            <div class="bg-white bg-opacity-10 rounded-circle p-1 d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px;">
                                <i class="mdi mdi-hospital text-white fs-4"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold text-white">PHMIS</h5>
                                <small class="text-white-50 " style="font-size: 12px;">Patient Health
                                    Management</small>
                            </div>
                        </div>
                        <div class="mt-1">
                            <span class="badge bg-white bg-opacity-10 text-white rounded-pill px-2 py-0"
                                style="font-size: 12px;">
                                <i class="mdi mdi-shield-check me-1"></i> Secure Login
                            </span>
                        </div>
                    </div>

                    <!-- Card Body - Reduced Padding -->
                    <div class="card-body p-3 p-xl-4 bg-white">
                        @if(session()->has('fail'))
                              <h2>{{session()->get('fail')}}</h2>
                         @endif
                            <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-3 position-relative overflow-hidden" role="alert" id="failAlert">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="mdi mdi-alert-circle fs-4"></i>
                                    <span>{{ session()->get('fail') }}</span>
                                </div>
                                <div class="position-absolute bottom-0 start-0 w-100" style="height: 3px;">
                                    <div class="bg-danger" style="width: 100%; height: 100%; animation: shrink 5s linear forwards;"></div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                              <h2>{{session()->get('fail')}}</h2>
                         @endif
                        <!-- Welcome Section - Reduced -->
                        <div class="text-center mb-2">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-2 mb-1"
                                style="width: 45px; height: 45px;">
                                <i
                                    class="mdi mdi-account-circle text-primary fs-3 d-flex align-items-center justify-content-center"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-0">Welcome Back!</h5>
                            <p class="text-muted small mb-0" style="font-size: 11px;">Sign in to access your dashboard
                            </p>
                        </div>

                        <!-- Login Form -->
                        <form action="{{route('user-login-data')}}" method="POST">
                                @csrf
                            <!-- Email Field - Reduced -->
                            <div class="mb-2">
                                <label for="emailaddress" class="form-label fw-semibold ">
                                    <i class="mdi mdi-email text-primary me-1"></i>
                                    Email Address
                                </label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="mdi mdi-email-outline text-muted" style="font-size: 14px;"></i>
                                    </span>
                                    <input class="form-control form-control border-start-0" type="email"
                                        id="email" name="email" placeholder="user@gmail.com" value="{{old('email')}}">
                                </div>
                             <span class="text-danger">@error('username') {{$message}} @enderror</span>
                                        id="emailaddress" name="emailaddress" placeholder="doctor@hospital.com" value="{{old('emailaddress')}}">
                                </div>
                             <span class="text-danger">@error('emailaddress') {{$message}} @enderror</span>
                                        id="email" name="email" placeholder="user@gmail.com" value="{{old('email')}}">
                                </div>
                             <span class="text-danger">@error('username') {{$message}} @enderror</span>

                            </div>

                            <div class="mb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="password" class="form-label fw-semibold ">
                                        <i class="mdi mdi-lock text-primary me-1"></i>
                                        Password
                                    </label>
                                    
                                </div>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="mdi mdi-lock-outline text-muted" style="font-size: 14px;"></i>
                                    </span>
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control border-start-0"
                                        placeholder="Enter your password" value="{{old('password')}}" >
                                </div>
                                <span class="text-danger">@error('password') {{$message}} @enderror</span>

                            </div>

                            <!-- Remember Me - Reduced -->
                            <div class="mb-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signin" checked
                                            style="width: 14px; height: 14px;">
                                        <label class="form-check-label small" for="checkbox-signin"
                                            style="font-size: 11px;">
                                            <i class="mdi mdi-check-circle-outline me-1"></i>
                                            Remember me
                                        </label>
                                    </div>
                                    
                                   
                                </div>
                            </div>

                            <!-- Login Button - Reduced -->
                            <div class="d-grid gap-1">
                                <button class="btn btn-primary btn-sm" type="submit"
                                    style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); border: none; font-size: 13px; padding: 0.4rem 0.8rem;">
                                    <i class="mdi mdi-login me-1"></i>
                                    Sign In
                                    <span class="badge bg-white bg-opacity-20 text-white ms-1" style="font-size: 10px;">
                                        <i class="mdi mdi-arrow-right"></i>
                                    </span>
                                </button>
                            </div>

                            <!-- Help Links - Reduced -->
                            <div class="text-center mt-1">
                                <small class="text-muted" style="font-size: 12px;">
                                    <i class="mdi mdi-help-circle-outline me-1"></i>
                                    Need help?
                                    <a href="#" class="text-primary text-decoration-none">Contact Support</a>
                                </small>
                            </div>
                        </form>
                    </div> <!-- end card-body -->

                    <!-- Footer - Reduced -->
                    <div class="card-footer bg-light py-1 border-0">
                        <div class="d-flex justify-content-center gap-3">
                            <span class="text-muted" style="font-size: 12px;">
                                <i class="mdi mdi-hospital-box text-primary me-1"></i>
                                PHMIS v2.0
                            </span>
                            <span class="text-muted" style="font-size: 12px;">
                                <i class="mdi mdi-shield-check text-success me-1"></i>
                                HIPAA Compliant
                            </span>
                            <span class="text-muted" style="font-size: 12px;">
                                <i class="mdi mdi-clock-time-four text-info me-1"></i>
                                24/7 Support
                            </span>
                        </div>
                    </div>
                </div>
             

                <!-- Accreditation Badge - Reduced -->
                <div class="text-center mt-1">
                    <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1 rounded-pill"
                        style="font-size: 15px;">
                        <i class="mdi mdi-hospital me-1"></i>
                        Accredited Patient Management System
                    </span>
                </div>

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>







<!-- end page -->



<!-- bundle -->
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>

</body>

<!-- Mirrored from hyper.vercel.app/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Aug 2026 11:31:53 GMT -->

</html>