@include('templeteController.Header')
@include('templeteController.SideNave')
@include('templeteController.TopNave')

<style>
    .doctor-profile * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .doctor-profile .profile-header {
        background: linear-gradient(135deg, #0891b2 0%, #0284c7 100%);
        border-radius: 16px;
        padding: 30px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .doctor-profile .profile-header::after {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
    }

    .doctor-profile .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        border: 4px solid rgba(255, 255, 255, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        font-weight: 700;
        color: #fff;
        flex-shrink: 0;
    }

    .doctor-profile .info-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 22px;
        height: 100%;
        transition: box-shadow 0.2s ease;
    }

    .doctor-profile .info-card:hover {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
    }

    .doctor-profile .info-card-title {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        font-weight: 700;
        color: #64748b;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .doctor-profile .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px dashed #f1f5f9;
        font-size: 14px;
    }

    .doctor-profile .info-row:last-child {
        border-bottom: 0;
    }

    .doctor-profile .info-label {
        color: #64748b;
        font-weight: 500;
    }

    .doctor-profile .info-value {
        color: #0f172a;
        font-weight: 600;
        text-align: right;
    }

    .doctor-profile .specialization-box {
        background: linear-gradient(135deg, #eff6ff 0%, #e0f2fe 100%);
        border: 1px solid #bae6fd;
        border-radius: 10px;
        padding: 16px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .doctor-profile .specialization-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: #0284c7;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .doctor-profile .stat-box {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 16px;
        text-align: center;
    }

    .doctor-profile .stat-box .stat-label {
        font-size: 11px;
        color: #94a3b8;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.4px;
    }

    .doctor-profile .stat-box .stat-value {
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
        margin-top: 4px;
    }

    .doctor-profile .skill-chip {
        display: inline-block;
        background: #f1f5f9;
        color: #475569;
        border-radius: 999px;
        padding: 6px 14px;
        font-size: 12px;
        font-weight: 600;
        margin: 3px 3px 3px 0;
    }
</style>

<div class="container-fluid py-4 px-3 px-md-4 doctor-profile">

    {{-- ═══ PAGE HEADER ═══ --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h4 class="mb-1 fw-bold">
                <i class="mdi mdi-doctor text-primary me-2"></i>
                Doctor Profile
            </h4>
            <p class="text-muted mb-0" style="font-size: 13px;">
                My professional information and specialization
            </p>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <a href="#" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
                <i class="mdi mdi-arrow-left me-1"></i> Back
            </a>
            <a href="#" class="btn btn-primary btn-sm px-3 rounded-pill">
                <i class="mdi mdi-pencil me-1"></i> Edit Profile
            </a>
            <a href="#" class="btn btn-danger btn-sm px-3 rounded-pill">
                <i class="mdi mdi-printer me-1"></i> Print
            </a>
        </div>
    </div>

    {{-- ═══ PROFILE HEADER ═══ --}}
    <div class="profile-header mb-4">
        <div class="d-flex flex-wrap align-items-center gap-4 position-relative" style="z-index: 1;">

            <div class="profile-avatar">JM</div>

            <div class="flex-grow-1">
                <h3 class="mb-1 fw-bold text-white">Dr. Juma Mwangosi</h3>
                <div class="d-flex flex-wrap align-items-center gap-3 mb-2">
                    <span class="badge bg-white bg-opacity-25 text-white rounded-pill px-3 py-1">
                        <i class="mdi mdi-identifier"></i> DOC-2024-00001
                    </span>
                    <span class="text-white-50" style="font-size: 13px;">
                        <i class="mdi mdi-stethoscope"></i> Cardiologist
                    </span>
                    <span class="text-white-50" style="font-size: 13px;">
                        <i class="mdi mdi-hospital-building"></i> Cardiology Department
                    </span>
                </div>
            </div>

            <div class="text-end">
                <div class="mb-2">
                    <span class="badge bg-success rounded-pill px-3 py-2">
                        <i class="mdi mdi-check-circle"></i> Active
                    </span>
                </div>
                <span class="badge bg-white bg-opacity-25 text-white rounded-pill px-3 py-2">
                    <i class="mdi mdi-star"></i> Senior Consultant
                </span>
            </div>

        </div>
    </div>

    {{-- ═══ MAIN INFO CARDS ═══ --}}
    <div class="row g-3 mb-3">

        {{-- Personal Info --}}
        <div class="col-lg-6">
            <div class="info-card">
                <div class="info-card-title">
                    <i class="mdi mdi-account-circle text-primary"></i>
                    Personal Information
                </div>

                <div class="info-row">
                    <span class="info-label">Doctor ID</span>
                    <span class="info-value">DOC-2024-00001</span>
                </div>
                <div class="info-row">
                    <span class="info-label">First Name</span>
                    <span class="info-value">Juma</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Last Name</span>
                    <span class="info-value">Mwangosi</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Gender</span>
                    <span class="info-value">Male</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Date of Birth</span>
                    <span class="info-value">10 Mar 1985</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Age</span>
                    <span class="info-value">41 years</span>
                </div>
            </div>
        </div>

        {{-- Contact --}}
        <div class="col-lg-6">
            <div class="info-card">
                <div class="info-card-title">
                    <i class="mdi mdi-phone text-success"></i>
                    Contact Information
                </div>

                <div class="info-row">
                    <span class="info-label">Phone</span>
                    <span class="info-value">
                        <a href="tel:0712345678" class="text-decoration-none text-dark">
                            <i class="mdi mdi-phone text-success"></i> 0712345678
                        </a>
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value">
                        <a href="mailto:juma@hospital.com" class="text-decoration-none text-dark">
                            <i class="mdi mdi-email text-info"></i> juma@hospital.com
                        </a>
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Address</span>
                    <span class="info-value">Mtaa wa Uhuru, Dar es Salaam</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Emergency Contact</span>
                    <span class="info-value">
                        <a href="tel:0787654321" class="text-decoration-none text-dark">
                            <i class="mdi mdi-phone text-warning"></i> 0787654321
                        </a>
                    </span>
                </div>
            </div>
        </div>

    </div>

    {{-- ═══ SPECIALIZATION SECTION ═══ --}}
    <div class="info-card mb-3">
        <div class="info-card-title">
            <i class="mdi mdi-certificate text-warning"></i>
            Area of Specialization
        </div>

        <div class="row g-3">

            {{-- Primary Specialization --}}
            <div class="col-lg-6">
                <div class="specialization-box">
                    <div class="specialization-icon">
                        <i class="mdi mdi-heart-pulse"></i>
                    </div>
                    <div>
                        <div style="font-size: 11px; color: #0284c7; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">
                            Primary Specialization
                        </div>
                        <div style="font-size: 16px; font-weight: 700; color: #0f172a;">
                            Cardiology
                        </div>
                        <small class="text-muted">Heart & Cardiovascular Medicine</small>
                    </div>
                </div>
            </div>

            {{-- Sub-Specialization --}}
            <div class="col-lg-6">
                <div class="specialization-box">
                    <div class="specialization-icon" style="background: #0891b2;">
                        <i class="mdi mdi-heart-plus"></i>
                    </div>
                    <div>
                        <div style="font-size: 11px; color: #0891b2; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">
                            Sub-Specialization
                        </div>
                        <div style="font-size: 16px; font-weight: 700; color: #0f172a;">
                            Interventional Cardiology
                        </div>
                        <small class="text-muted">Cardiac Catheterization & Angioplasty</small>
                    </div>
                </div>
            </div>

            {{-- Department --}}
            <div class="col-lg-4">
                <div class="info-row" style="border: 0;">
                    <span class="info-label">Department</span>
                    <span class="info-value">Cardiology</span>
                </div>
            </div>

            {{-- Position --}}
            <div class="col-lg-4">
                <div class="info-row" style="border: 0;">
                    <span class="info-label">Position</span>
                    <span class="info-value">Senior Consultant</span>
                </div>
            </div>

            {{-- Experience --}}
            <div class="col-lg-4">
                <div class="info-row" style="border: 0;">
                    <span class="info-label">Experience</span>
                    <span class="info-value">15 years</span>
                </div>
            </div>

        </div>

        {{-- Skills / Focus Areas --}}
        <div class="mt-3 pt-3 border-top">
            <div class="info-label mb-2" style="font-size: 12px;">
                <i class="mdi mdi-tag-multiple text-primary"></i>
                Clinical Focus Areas
            </div>
            <div>
                <span class="skill-chip">Heart Failure</span>
                <span class="skill-chip">Hypertension</span>
                <span class="skill-chip">Coronary Artery Disease</span>
                <span class="skill-chip">Echocardiography</span>
                <span class="skill-chip">Cardiac Imaging</span>
                <span class="skill-chip">Preventive Cardiology</span>
                <span class="skill-chip">Arrhythmia</span>
            </div>
        </div>
    </div>

    {{-- ═══ PROFESSIONAL INFO ═══ --}}
    <div class="row g-3 mb-3">

        {{-- Qualifications --}}
        <div class="col-lg-6">
            <div class="info-card">
                <div class="info-card-title">
                    <i class="mdi mdi-school text-primary"></i>
                    Qualifications & Education
                </div>

                <div class="info-row">
                    <span class="info-label">Highest Degree</span>
                    <span class="info-value">MD, MMed (Cardiology)</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Medical School</span>
                    <span class="info-value">Muhimbili University (MUHAS)</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Specialization Training</span>
                    <span class="info-value">Aga Khan University Hospital</span>
                </div>
                <div class="info-row">
                    <span class="info-label">License Number</span>
                    <span class="info-value" style="font-family: monospace; font-size: 12px;">
                        MC-2015-78432
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">License Status</span>
                    <span class="info-value">
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1">
                            <i class="mdi mdi-check-circle"></i> Valid
                        </span>
                    </span>
                </div>
            </div>
        </div>

        {{-- Work Info --}}
        <div class="col-lg-6">
            <div class="info-card">
                <div class="info-card-title">
                    <i class="mdi mdi-briefcase text-info"></i>
                    Work Information
                </div>

                <div class="info-row">
                    <span class="info-label">Joined Hospital</span>
                    <span class="info-value">12 Jan 2015</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Employment Type</span>
                    <span class="info-value">Full-time</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Consultation Fee</span>
                    <span class="info-value">TZS 50,000</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Working Hours</span>
                    <span class="info-value">Mon–Fri, 8:00 AM – 4:00 PM</span>
                </div>
                <div class="info-row">
                    <span class="info-label">On-Call Days</span>
                    <span class="info-value">Wed & Sat</span>
                </div>
            </div>
        </div>

    </div>

    {{-- ═══ QUICK STATS ═══ --}}
    <div class="row g-3">
        <div class="col-md-3 col-6">
            <div class="stat-box">
                <div class="stat-label">Experience</div>
                <div class="stat-value">15 yrs</div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-box">
                <div class="stat-label">Patients</div>
                <div class="stat-value">1,240</div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-box">
                <div class="stat-label">Surgeries</div>
                <div class="stat-value">320</div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="stat-box">
                <div class="stat-label">Rating</div>
                <div class="stat-value">4.8 ⭐</div>
            </div>
        </div>
    </div>

</div>

@include('templeteController.Footer')