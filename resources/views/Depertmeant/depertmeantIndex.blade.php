@include('templeteController.Header');
@include('templeteController.SideNave');
@include('templeteController.TopNave')
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 user-table-card">
            <div class="card-body p-4">
                <div class="row align-items-center">

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <a href="javascript:void(0);"
                            class="btn btn-primary btn-lg rounded-pill shadow-sm px-4 fw-medium add-user-btn">
                            <i class="mdi mdi-plus-circle me-2 fs-5"></i> Add New Department
                        </a>
                    </div>

                    <div class="col-sm-6">
                        <div class="d-flex justify-content-start justify-content-sm-end">
                            <button type="button"
                                class="btn btn-outline-secondary border-2 rounded-pill px-4 fw-medium">
                                <i class="mdi mdi-arrow-left-circle me-2 fs-5"></i> Back
                            </button>
                        </div>
                    </div><!-- end col-->

                </div> <!-- end row -->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->


    <div class="col-6">
        <div class="card update-user-card">
            <div class="card-body">
                <div class="row g-3">
                    <!-- Medical Services -->
                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 bg-primary bg-opacity-10 rounded-3 border-start border-4 border-primary h-100">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="fs-2">🩺</span>
                                <h6 class="mb-0 fw-bold text-primary">Medical Services</h6>
                            </div>
                            <ul class="list-unstyled mb-0 small">
                                <li class="py-1"><i class="mdi mdi-check-circle text-primary me-1"></i> Internal
                                    Medicine</li>
                                <li class="py-1"><i class="mdi mdi-check-circle text-primary me-1"></i> Cardiology</li>
                                <li class="py-1"><i class="mdi mdi-check-circle text-primary me-1"></i> Neurology</li>
                                <li class="py-1"><i class="mdi mdi-check-circle text-primary me-1"></i> Nephrology</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Surgical Services -->
                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 bg-success bg-opacity-10 rounded-3 border-start border-4 border-success h-100">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="fs-2">🩻</span>
                                <h6 class="mb-0 fw-bold text-success">Surgical Services</h6>
                            </div>
                            <ul class="list-unstyled mb-0 small">
                                <li class="py-1"><i class="mdi mdi-check-circle text-success me-1"></i> General Surgery
                                </li>
                                <li class="py-1"><i class="mdi mdi-check-circle text-success me-1"></i> Orthopedics</li>
                                <li class="py-1"><i class="mdi mdi-check-circle text-success me-1"></i> Neurosurgery
                                </li>
                                <li class="py-1"><i class="mdi mdi-check-circle text-success me-1"></i> ENT</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Clinical Support -->
                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 bg-warning bg-opacity-10 rounded-3 border-start border-4 border-warning h-100">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="fs-2">🧪</span>
                                <h6 class="mb-0 fw-bold text-warning">Clinical Support</h6>
                            </div>
                            <ul class="list-unstyled mb-0 small">
                                <li class="py-1"><i class="mdi mdi-check-circle text-warning me-1"></i> Laboratory</li>
                                <li class="py-1"><i class="mdi mdi-check-circle text-warning me-1"></i> Radiology</li>
                                <li class="py-1"><i class="mdi mdi-check-circle text-warning me-1"></i> Pharmacy</li>
                                <li class="py-1"><i class="mdi mdi-check-circle text-warning me-1"></i> Physiotherapy
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Nursing & Hospitality -->
                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 bg-info bg-opacity-10 rounded-3 border-start border-4 border-info h-100">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="fs-2">🏥</span>
                                <h6 class="mb-0 fw-bold text-info">Nursing & Hospitality</h6>
                            </div>
                            <ul class="list-unstyled mb-0 small">
                                <li class="py-1"><i class="mdi mdi-check-circle text-info me-1"></i> Nursing Services
                                </li>
                                <li class="py-1"><i class="mdi mdi-check-circle text-info me-1"></i> Nutrition</li>
                                <li class="py-1"><i class="mdi mdi-check-circle text-info me-1"></i> Housekeeping</li>
                                <li class="py-1"><i class="mdi mdi-check-circle text-info me-1"></i> Patient Care</li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </div> <!-- end card-->
</div> <!-- end col -->


</div>

@include('templeteController.Footer');