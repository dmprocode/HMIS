@include('templeteController.Header');
@include('templeteController.SideNave')
@include('templeteController.TopNave')

<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white py-3">
            <h4 class="mb-0"><i class="mdi mdi-doctor me-2"></i> Register New Doctor</h4>
        </div>

        <div class="card-body p-4">

            <!-- Progress Bar -->
            <div class="mb-4">
                <div class="progress" style="height: 8px;">
                    <div id="wizardProgress" class="progress-bar bg-success" style="width: 20%;"></div>
                </div>
                <div class="d-flex justify-content-between mt-2 small fw-bold">
                    <span class="step-label text-success" data-step="1">1. Personal</span>
                    <span class="step-label text-muted" data-step="2">2. Contact</span>
                    <span class="step-label text-muted" data-step="3">3. Specialization</span>
                    <span class="step-label text-muted" data-step="4">4. Qualifications</span>
                    <span class="step-label text-muted" data-step="5">5. Work</span>
                </div>
            </div>

            <form id="doctorForm" action="#" method="POST">
                @csrf

                <!-- STEP 1 -->
                <div class="wizard-step" data-step="1">
                    <h5 class="fw-bold text-primary mb-3">Personal Information</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Doctor ID</label>
                            <input type="text" class="form-control" value="DOC-2024-00001" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Gender *</label>
                            <select name="gender" class="form-select" required>
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">First Name *</label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Last Name *</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Date of Birth *</label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- STEP 2 -->
                <div class="wizard-step d-none" data-step="2">
                    <h5 class="fw-bold text-primary mb-3">Contact Information</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Phone *</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Email *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Emergency Contact</label>
                            <input type="text" name="emergency_contact" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- STEP 3 -->
                <div class="wizard-step d-none" data-step="3">
                    <h5 class="fw-bold text-primary mb-3">Area of Specialization</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Primary Specialization *</label>
                            <input type="text" name="primary_specialization" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Sub-Specialization</label>
                            <input type="text" name="sub_specialization" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Department *</label>
                            <input type="text" name="department" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Position *</label>
                            <input type="text" name="position" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Clinical Focus Areas</label>
                            <textarea name="clinical_focus" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <!-- STEP 4 -->
                <div class="wizard-step d-none" data-step="4">
                    <h5 class="fw-bold text-primary mb-3">Qualifications &amp; Education</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Highest Degree *</label>
                            <input type="text" name="highest_degree" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Medical School *</label>
                            <input type="text" name="medical_school" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Specialization Training</label>
                            <input type="text" name="specialization_training" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">License Number *</label>
                            <input type="text" name="license_number" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">License Status</label>
                            <select name="license_status" class="form-select">
                                <option value="">Select</option>
                                <option value="active">Active</option>
                                <option value="expired">Expired</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- STEP 5 -->
                <div class="wizard-step d-none" data-step="5">
                    <h5 class="fw-bold text-primary mb-3">Work Information</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Joined Hospital *</label>
                            <input type="date" name="joined_date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Employment Type</label>
                            <select name="employment_type" class="form-select">
                                <option value="">Select</option>
                                <option value="full_time">Full-time</option>
                                <option value="part_time">Part-Time</option>
                                <option value="contract">Contract</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Consultation Fee (TZS)</label>
                            <input type="number" name="consultation_fee" class="form-control" value="50000">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Working Hours</label>
                            <input type="text" name="working_hours" class="form-control" placeholder="Mon–Fri, 8:00 AM – 4:00 PM">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-bold">On-Call Days</label>
                            <input type="text" name="on_call_days" class="form-control" placeholder="Wed & Sat">
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="button" id="prevBtn" class="btn btn-outline-secondary rounded-pill px-4" disabled>
                        <i class="mdi mdi-arrow-left"></i> Back
                    </button>
                    <div>
                        <button type="button" id="nextBtn" class="btn btn-primary rounded-pill px-4">
                            Next <i class="mdi mdi-arrow-right"></i>
                        </button>
                        <button type="submit" id="submitBtn" class="btn btn-success rounded-pill px-4 d-none">
                            <i class="mdi mdi-content-save-check"></i> Save Doctor
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(function () {

    function showStep(step) {
        $('.wizard-step').addClass('d-none');
        $('.wizard-step[data-step="' + step + '"]').removeClass('d-none');

        $('#wizardProgress').css('width', (step / 5) * 100 + '%');

        $('.step-label').each(function () {
            var s = parseInt($(this).data('step'));
            $(this).toggleClass('text-success', s <= step)
                   .toggleClass('text-muted', s > step);
        });

        $('#prevBtn').prop('disabled', step === 1);
        $('#nextBtn').toggleClass('d-none', step === 5);
        $('#submitBtn').toggleClass('d-none', step !== 5);

        $('#doctorForm').data('step', step);
    }

    function validateStep(step) {
        var ok = true;
        $('.wizard-step[data-step="' + step + '"] [required]').each(function () {
            if (!$(this).val()) {
                $(this).addClass('is-invalid');
                ok = false;
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (!ok) {
            Swal.fire({
                icon: 'warning',
                title: 'Incomplete Step',
                text: 'Please fill all required fields before continuing.'
            });
        }
        return ok;
    }

    $('#nextBtn').on('click', function () {
        if (validateStep($('#doctorForm').data('step'))) {
            showStep($('#doctorForm').data('step') + 1);
        }
    });

    $('#prevBtn').on('click', function () {
        showStep($('#doctorForm').data('step') - 1);
    });

    $('#doctorForm').on('submit', function (e) {
        e.preventDefault();
        if (!validateStep(5)) return;

        $.ajax({
            url: "",
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (res) {
                Swal.fire({ icon: 'success', title: 'Saved!', text: res.message });
            },
            error: function (xhr) {
                Swal.fire({ icon: 'error', title: 'Error!', text: 'Something went wrong.' });
            }
        });
    });

    // Initialize
    $('#doctorForm').data('step', 1);
    showStep(1);
});
</script>
@include('templeteController.Footer');