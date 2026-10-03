@include('DoctorDashboard.templeteController.Header')
@include('DoctorDashboard.templeteController.SideNave')
@include('DoctorDashboard.templeteController.TopNave')

<style>
    .doctor-page * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .doctor-page .stat-card {
        border: 0;
        border-radius: 14px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .doctor-page .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08) !important;
    }

    .doctor-page .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .doctor-page .section-card {
        border: 0;
        border-radius: 14px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
    }

    .doctor-page .appointment-row {
        padding: 12px 0;
        border-bottom: 1px dashed #f1f5f9;
    }

    .doctor-page .appointment-row:last-child {
        border-bottom: 0;
    }

    .doctor-page .patient-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 700;
        flex-shrink: 0;
    }

    .doctor-page .quick-action-btn {
        border-radius: 10px;
        padding: 14px 12px;
        font-size: 13px;
        font-weight: 600;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        transition: all 0.15s ease;
        border: 0;
    }

    .doctor-page .quick-action-btn:hover {
        transform: translateY(-2px);
    }

    .doctor-page .alert-item {
        padding: 12px 14px;
        border-radius: 10px;
        border-left: 4px solid;
        margin-bottom: 8px;
        font-size: 13px;
    }

    .doctor-page .stat-mini {
        background: #f8fafc;
        border-radius: 10px;
        padding: 14px;
        text-align: center;
    }

    .doctor-page .stat-mini-value {
        font-size: 1.4rem;
        font-weight: 700;
        color: #0f172a;
    }

    .doctor-page .stat-mini-label {
        font-size: 11px;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        font-weight: 600;
    }
</style>

<div class="container-fluid py-4 px-3 px-md-4 doctor-page">

    {{-- ═══ PAGE HEADER ═══ --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h4 class="mb-1 fw-bold">
                <i class="mdi mdi-stethoscope text-primary me-2"></i>
                Doctor Dashboard
            </h4>
            <p class="text-muted mb-0" style="font-size: 13px;">
                Welcome, Dr. Juma — your daily overview
            </p>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <button class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
                <i class="mdi mdi-calendar-clock me-1"></i> My Schedule
            </button>
            <button class="btn btn-primary btn-sm px-3 rounded-pill">
                <i class="mdi mdi-plus me-1"></i> New Consultation
            </button>
        </div>
    </div>

    {{-- ═══ STAT CARDS ═══ --}}
    <div class="row g-3 mb-4">

        <div class="col-xl-3 col-md-6">
            <div class="card stat-card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1" style="font-size: 12.5px;">Today's Appointments</p>
                            <div class="fw-bold" style="font-size: 1.85rem;">12</div>
                        </div>
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                            <i class="mdi mdi-calendar-check"></i>
                        </div>
                    </div>
                    <small class="text-success mt-2 d-block" style="font-size: 11.5px;">
                        <i class="mdi mdi-arrow-up"></i> 3 completed
                    </small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card stat-card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1" style="font-size: 12.5px;">Wagonjwa Waiting</p>
                            <div class="fw-bold text-warning" style="font-size: 1.85rem;">4</div>
                        </div>
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                            <i class="mdi mdi-account-clock"></i>
                        </div>
                    </div>
                    <small class="text-muted mt-2 d-block" style="font-size: 11.5px;">
                        <i class="mdi mdi-clock-outline"></i> Avg wait: 15 min
                    </small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card stat-card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1" style="font-size: 12.5px;">Dharura</p>
                            <div class="fw-bold text-danger" style="font-size: 1.85rem;">2</div>
                        </div>
                        <div class="stat-icon bg-danger bg-opacity-10 text-danger">
                            <i class="mdi mdi-ambulance"></i>
                        </div>
                    </div>
                    <small class="text-danger mt-2 d-block" style="font-size: 11.5px;">
                        <i class="mdi mdi-alert"></i> Check emergency
                    </small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card stat-card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1" style="font-size: 12.5px;">Vipimo Results</p>
                            <div class="fw-bold text-info" style="font-size: 1.85rem;">5</div>
                        </div>
                        <div class="stat-icon bg-info bg-opacity-10 text-info">
                            <i class="mdi mdi-flask-outline"></i>
                        </div>
                    </div>
                    <small class="text-muted mt-2 d-block" style="font-size: 11.5px;">
                        <i class="mdi mdi-clock-outline"></i> Need review
                    </small>
                </div>
            </div>
        </div>

    </div>

    {{-- ═══ MAIN ROW ═══ --}}
    <div class="row g-3 mb-4">

        {{-- LEFT: Today's Appointments --}}
        <div class="col-lg-8">
            <div class="card section-card h-100">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
                    <h6 class="mb-0 fw-bold">
                        <i class="mdi mdi-calendar-today text-primary me-1"></i>
                        Today's Appointments
                    </h6>
                    <a href="#" class="text-decoration-none small">View all →</a>
                </div>

                <div class="card-body pt-2">

                    {{-- Appointment 1 --}}
                    <div class="appointment-row">
                        <div class="d-flex align-items-center justify-content-between gap-2">
                            <div class="d-flex align-items-center gap-3">
                                <div class="patient-avatar bg-primary bg-opacity-10 text-primary">JH</div>
                                <div>
                                    <div class="fw-semibold">Juma Hassan</div>
                                    <small class="text-muted">09:00 AM · General checkup</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1">
                                    <i class="mdi mdi-check-circle"></i> Completed
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Appointment 2 --}}
                    <div class="appointment-row">
                        <div class="d-flex align-items-center justify-content-between gap-2">
                            <div class="d-flex align-items-center gap-3">
                                <div class="patient-avatar bg-info bg-opacity-10 text-info">AM</div>
                                <div>
                                    <div class="fw-semibold">Asha Mwangi</div>
                                    <small class="text-muted">09:30 AM · High fever</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-1">
                                    <i class="mdi mdi-progress-clock"></i> In Progress
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Appointment 3 --}}
                    <div class="appointment-row">
                        <div class="d-flex align-items-center justify-content-between gap-2">
                            <div class="d-flex align-items-center gap-3">
                                <div class="patient-avatar bg-warning bg-opacity-10 text-warning">NP</div>
                                <div>
                                    <div class="fw-semibold">Neema Peter</div>
                                    <small class="text-muted">10:00 AM · Follow-up</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-1">
                                    <i class="mdi mdi-clock-outline"></i> Waiting
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Appointment 4 --}}
                    <div class="appointment-row">
                        <div class="d-flex align-items-center justify-content-between gap-2">
                            <div class="d-flex align-items-center gap-3">
                                <div class="patient-avatar bg-secondary bg-opacity-10 text-secondary">MZ</div>
                                <div>
                                    <div class="fw-semibold">Maria Zakaria</div>
                                    <small class="text-muted">10:30 AM · Stomach pain</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-1">
                                    <i class="mdi mdi-clock-outline"></i> Waiting
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Appointment 5 --}}
                    <div class="appointment-row">
                        <div class="d-flex align-items-center justify-content-between gap-2">
                            <div class="d-flex align-items-center gap-3">
                                <div class="patient-avatar bg-danger bg-opacity-10 text-danger">SK</div>
                                <div>
                                    <div class="fw-semibold">Samuel Kimaro</div>
                                    <small class="text-muted">11:00 AM · Dharura</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-1">
                                    <i class="mdi mdi-alert"></i> Dharura
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- RIGHT: Alerts + Quick Stats --}}
        <div class="col-lg-4">

            {{-- Alerts --}}
            <div class="card section-card mb-3">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="mb-0 fw-bold">
                        <i class="mdi mdi-bell-alert text-danger me-1"></i>
                        Alerts
                    </h6>
                </div>
                <div class="card-body">

                    <div class="alert-item" style="background: #fef2f2; border-color: #dc2626;">
                        <div class="d-flex align-items-start gap-2">
                            <i class="mdi mdi-alert-circle text-danger fs-5"></i>
                            <div>
                                <div class="fw-semibold text-danger">Mzio wa Penicillin</div>
                                <small class="text-muted">Juma Hassan (Bed 4)</small>
                            </div>
                        </div>
                    </div>

                    <div class="alert-item" style="background: #fffbeb; border-color: #f59e0b;">
                        <div class="d-flex align-items-start gap-2">
                            <i class="mdi mdi-flask text-warning fs-5"></i>
                            <div>
                                <div class="fw-semibold text-warning">Vipimo Results</div>
                                <small class="text-muted">3 awaiting your review</small>
                            </div>
                        </div>
                    </div>

                    <div class="alert-item mb-0" style="background: #eff6ff; border-color: #0284c7;">
                        <div class="d-flex align-items-start gap-2">
                            <i class="mdi mdi-message-text text-primary fs-5"></i>
                            <div>
                                <div class="fw-semibold text-primary">New Message</div>
                                <small class="text-muted">Nurse Mary sent you a message</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Quick Stats --}}
            <div class="card section-card">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="mb-0 fw-bold">
                        <i class="mdi mdi-chart-line text-success me-1"></i>
                        Weekly Stats
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="stat-mini">
                                <div class="stat-mini-value text-primary">45</div>
                                <div class="stat-mini-label">Wagonjwa</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-mini">
                                <div class="stat-mini-value text-success">32</div>
                                <div class="stat-mini-label">Dawa</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-mini">
                                <div class="stat-mini-value text-info">18</div>
                                <div class="stat-mini-label">Vipimo</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-mini">
                                <div class="stat-mini-value text-warning">3</div>
                                <div class="stat-mini-label">Rufaa</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    {{-- ═══ QUICK ACTIONS ═══ --}}
    <div class="card section-card mb-4">
        <div class="card-header bg-white border-bottom py-3">
            <h6 class="mb-0 fw-bold">
                <i class="mdi mdi-lightning-bolt text-warning me-1"></i>
                Quick Actions
            </h6>
        </div>
        <div class="card-body">
            <div class="row g-2">

                <div class="col-xl-3 col-md-6">
                    <button class="quick-action-btn bg-primary bg-opacity-10 text-primary w-100">
                        <i class="mdi mdi-account-plus fs-3"></i>
                        New Consultation
                    </button>
                </div>

                <div class="col-xl-3 col-md-6">
                    <button class="quick-action-btn bg-success bg-opacity-10 text-success w-100">
                        <i class="mdi mdi-pill fs-3"></i>
                        Andika Dawa
                    </button>
                </div>

                <div class="col-xl-3 col-md-6">
                    <button class="quick-action-btn bg-info bg-opacity-10 text-info w-100">
                        <i class="mdi mdi-flask-outline fs-3"></i>
                        Agiza Kipimo
                    </button>
                </div>

                <div class="col-xl-3 col-md-6">
                    <button class="quick-action-btn bg-warning bg-opacity-10 text-warning w-100">
                        <i class="mdi mdi-share fs-3"></i>
                        Tuma Rufaa
                    </button>
                </div>

            </div>
        </div>
    </div>

    {{-- ═══ MY PATIENTS LIST ═══ --}}
    <div class="card section-card">
        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
            <h6 class="mb-0 fw-bold">
                <i class="mdi mdi-account-multiple text-primary me-1"></i>
                My Recent Patients
            </h6>
            <a href="#" class="text-decoration-none small">View all →</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-3">Patient</th>
                        <th>Age</th>
                        <th>Last Visit</th>
                        <th>Status</th>
                        <th class="text-end pe-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="patient-avatar bg-primary bg-opacity-10 text-primary"
                                     style="width: 32px; height: 32px; font-size: 11px;">JH</div>
                                <div>
                                    <div class="fw-semibold" style="font-size: 13.5px;">Juma Hassan</div>
                                    <small class="text-muted">PT-2026-00001</small>
                                </div>
                            </div>
                        </td>
                        <td style="font-size: 13px;">31 yrs</td>
                        <td style="font-size: 13px;">26 Sep 2026</td>
                        <td>
                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1">
                                Ufuatiliaji
                            </span>
                        </td>
                        <td class="text-end pe-3">
                            <a href="#" class="btn btn-sm btn-primary rounded-pill px-3">View</a>
                        </td>
                    </tr>

                    <tr>
                        <td class="ps-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="patient-avatar bg-info bg-opacity-10 text-info"
                                     style="width: 32px; height: 32px; font-size: 11px;">AM</div>
                                <div>
                                    <div class="fw-semibold" style="font-size: 13.5px;">Asha Mwangi</div>
                                    <small class="text-muted">PT-2026-00002</small>
                                </div>
                            </div>
                        </td>
                        <td style="font-size: 13px;">27 yrs</td>
                        <td style="font-size: 13px;">25 Sep 2026</td>
                        <td>
                            <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-2 py-1">
                                First Visit
                            </span>
                        </td>
                        <td class="text-end pe-3">
                            <a href="#" class="btn btn-sm btn-primary rounded-pill px-3">View</a>
                        </td>
                    </tr>

                    <tr>
                        <td class="ps-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="patient-avatar bg-warning bg-opacity-10 text-warning"
                                     style="width: 32px; height: 32px; font-size: 11px;">NP</div>
                                <div>
                                    <div class="fw-semibold" style="font-size: 13.5px;">Neema Peter</div>
                                    <small class="text-muted">PT-2026-00003</small>
                                </div>
                            </div>
                        </td>
                        <td style="font-size: 13px;">24 yrs</td>
                        <td style="font-size: 13px;">20 Sep 2026</td>
                        <td>
                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1">
                                Ufuatiliaji
                            </span>
                        </td>
                        <td class="text-end pe-3">
                            <a href="#" class="btn btn-sm btn-primary rounded-pill px-3">View</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@include('DoctorDashboard.templeteController.Footer')