@include('templeteController.Header');
@include('templeteController.SideNave')
@include('templeteController.TopNave')


<div class="row">
    

    <div class="col-12">
        <div class="card border-0 shadow-lg rounded-4">
    <div class="card-body p-4">
        
        <!-- Quick Actions Header -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h5 class="mb-0 fw-bold text-primary">
                    <i class="mdi mdi-rocket me-2"></i>Quick Actions
                </h5>
                <small class="text-muted">Click any action to manage your hospital system</small>
            </div>
            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">
                <i class="mdi mdi-lightning-bolt me-1"></i> 8 Actions
            </span>
        </div>
        
        <!-- Action Buttons with Arrows -->
        <div class="row g-3">
            
            <!-- Manage Staff -->
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('staff-index') }}" class="btn btn-primary w-100 py-3 rounded-3 shadow-sm hover-shadow transition-all text-start d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <i class="mdi mdi-account-multiple fs-4"></i>
                        <div>
                            <div class="fw-semibold ">Manage Staff</div>
                            <small class="opacity-75" style="font-size: 12px;"> Total: 1</small>
                        </div>
                    </div>
                    <i class="mdi mdi-arrow-right fs-5"></i>
                </a>
            </div>
            
            <!-- Manage Patients -->
            <div class="col-6 col-md-4 col-lg-3">
                <a href="" class="btn btn-success w-100 py-3 rounded-3 shadow-sm hover-shadow transition-all text-start d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <i class="mdi mdi-account-group fs-4"></i>
                        <div>
                            <div class="fw-semibold ">Manage Patients</div>
                            <small class="opacity-75" style="font-size: 9px;">1,284 Total</small>
                        </div>
                    </div>
                    <i class="mdi mdi-arrow-right fs-5"></i>
                </a>
            </div>
            
            <!-- Manage Departments -->
            <div class="col-6 col-md-4 col-lg-3">
                <a href="" class="btn btn-warning w-100 py-3 rounded-3 shadow-sm hover-shadow transition-all text-start d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <i class="mdi mdi-domain fs-4"></i>
                        <div>
                            <div class="fw-semibold small">Manage Departments</div>
                            <small class="opacity-75" style="font-size: 9px;">12 Total</small>
                        </div>
                    </div>
                    <i class="mdi mdi-arrow-right fs-5"></i>
                </a>
            </div>
            
            <!-- Manage Medicines -->
            <div class="col-6 col-md-4 col-lg-3">
                <a href="" class="btn btn-info text-white w-100 py-3 rounded-3 shadow-sm hover-shadow transition-all text-start d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <i class="mdi mdi-pill fs-4"></i>
                        <div>
                            <div class="fw-semibold small">Manage Medicines</div>
                            <small class="opacity-75" style="font-size: 9px;">2,456 Total</small>
                        </div>
                    </div>
                    <i class="mdi mdi-arrow-right fs-5"></i>
                </a>
            </div>
            
            <!-- Manage Invoices -->
            <div class="col-6 col-md-4 col-lg-3">
                <a href="javascript.void(0)" class="btn btn-danger w-100 py-3 rounded-3 shadow-sm hover-shadow transition-all text-start d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <i class="mdi mdi-file-document fs-4"></i>
                        <div>
                            <div class="fw-semibold ">Manage Invoices</div>
                            <small class="opacity-75" style="font-size: 9px;">342 Total</small>
                        </div>
                    </div>
                    <i class="mdi mdi-arrow-right fs-5"></i>
                </a>
            </div>
            
            <!-- Manage Charges -->
            <div class="col-6 col-md-4 col-lg-3">
                <a href="javascript.void(0)" class="btn btn-secondary w-100 py-3 rounded-3 shadow-sm hover-shadow transition-all text-start d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <i class="mdi mdi-cash-multiple fs-4"></i>
                        <div>
                            <div class="fw-semibold ">Manage Charges</div>
                            <small class="opacity-75" style="font-size: 9px;">$45,678</small>
                        </div>
                    </div>
                    <i class="mdi mdi-arrow-right fs-5"></i>
                </a>
            </div>
            
            <!-- Reports -->
            <div class="col-6 col-md-4 col-lg-3">
                <a href="javascript.void(0)" class="btn btn-dark w-100 py-3 rounded-3 shadow-sm hover-shadow transition-all text-start d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <i class="mdi mdi-chart-bar fs-4"></i>
                        <div>
                            <div class="fw-semibold ">Reports</div>
                            <small class="opacity-75" style="font-size: 9px;">View Analytics</small>
                        </div>
                    </div>
                    <i class="mdi mdi-arrow-right fs-5"></i>
                </a>
            </div>
            
            <!-- Settings -->
            <div class="col-6 col-md-4 col-lg-3">
                <a href="javascript.void(0)" class="btn btn-outline-primary w-100 py-3 rounded-3 shadow-sm hover-shadow transition-all text-start d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <i class="mdi mdi-cog fs-4"></i>
                        <div>
                            <div class="fw-semibold ">Settings</div>
                            <small class="opacity-75" style="font-size: 9px;">Configure System</small>
                        </div>
                    </div>
                    <i class="mdi mdi-arrow-right fs-5"></i>
                </a>
            </div>
            
        </div>
        
        <!-- Footer -->
        <div class="d-flex align-items-center justify-content-between mt-4 pt-3 border-top">
            <small class="text-muted">
                <i class="mdi mdi-information-outline me-1"></i>
                Click any action to manage your hospital system
            </small>
            <span class="badge bg-light text-muted rounded-pill px-3 py-1">
                <i class="mdi mdi-keyboard-backspace me-1"></i> Navigate
            </span>
        </div>
        
    </div>
</div>
    </div> <!-- end card-->
</div> <!-- end col -->


</div>

<script>
    // Handle back button using pageshow (better than popstate)
    window.addEventListener('pageshow', function (event) {
        // If page loaded from cache (back/forward button)
        if (event.persisted) {
            // Reload from server → server re-checks auth
            window.location.reload();
        }
    });
</script>

@include('templeteController.Footer');