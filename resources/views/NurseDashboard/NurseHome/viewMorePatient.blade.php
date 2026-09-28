@include('templeteController.Header')
@include('templeteController.SideNave')
@include('templeteController.TopNave')

<style>
    .profile-page * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .profile-page .profile-header {
        background: linear-gradient(135deg, #0284c7 0%, #0891b2 100%);
        border-radius: 16px;
        padding: 30px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .profile-page .profile-header::after {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
    }

    .profile-page .profile-avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        border: 3px solid rgba(255, 255, 255, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        font-weight: 700;
        color: #fff;
        flex-shrink: 0;
    }

    .profile-page .info-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 22px;
        height: 100%;
        transition: box-shadow 0.2s ease;
    }

    .profile-page .info-card:hover {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
    }

    .profile-page .info-card-title {
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

    .profile-page .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px dashed #f1f5f9;
        font-size: 14px;
    }

    .profile-page .info-row:last-child {
        border-bottom: 0;
    }

    .profile-page .info-label {
        color: #64748b;
        font-weight: 500;
    }

    .profile-page .info-value {
        color: #0f172a;
        font-weight: 600;
        text-align: right;
    }

    .profile-page .allergy-box {
        background: #fef2f2;
        border-left: 4px solid #dc2626;
        border-radius: 8px;
        padding: 14px 16px;
    }

    .profile-page .stat-box {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 16px;
        text-align: center;
    }

    .profile-page .stat-box .stat-label {
        font-size: 11px;
        color: #94a3b8;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.4px;
    }

    .profile-page .stat-box .stat-value {
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
        margin-top: 4px;
    }

    
</style>

<div class="container-fluid py-4 px-3 px-md-4 profile-page">

    <!-- ═══ PAGE HEADER ═══ -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h4 class="mb-1 fw-bold">
                <i class="mdi mdi-account-details text-primary me-2"></i>
                Wasifu wa Mgonjwa
            </h4>
            <p class="text-muted mb-0" style="font-size: 13px;">
                Taarifa kamili za mgonjwa
            </p>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <a href="{{route('view-patients')}}" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
                <i class="mdi mdi-arrow-left me-1"></i> Rudi
            </a>
            <a href="{{route('edit-patient', $patientView->uuid)}}" class="btn btn-primary btn-sm px-3 rounded-pill">
                <i class="mdi mdi-pencil me-1"></i> Hariri
            </a>
            <a href="#" class="btn btn-danger btn-sm px-3 rounded-pill">
                <i class="mdi mdi-printer me-1"></i> Chapisha
            </a>
        </div>
    </div>
    <!-- ═══ PROFILE HEADER ═══ -->
    <div class="profile-header mb-4">
        <div class="d-flex flex-wrap align-items-center gap-4 position-relative" style="z-index: 1;">
            <div class="profile-avatar">JH</div>

            <div class="flex-grow-1">
                <h3 class="mb-1 fw-bold text-white">{{$patientView->first_name}} {{$patientView->last_name}}</h3>
                <div class="d-flex flex-wrap align-items-center gap-3 mb-2">
                    <span class="badge bg-white bg-opacity-25 text-white rounded-pill px-3 py-1">
                        <i class="mdi mdi-identifier"></i> {{$patientView->patient_number}}
                    </span>
                    <span class="text-white-50" style="font-size: 13px;">
                        <i class="mdi mdi-calendar"></i> {{$patientView->date_of_birth->format('M-j-Y')}}
                    </span>
                    <span class="text-white-50" style="font-size: 13px;">
                        <i class="mdi mdi-gender-male"></i> {{$patientView->gender}}
                    </span>
                </div>
            </div>

            <div class="text-end">
                <div class="mb-2">
                    <span class="badge bg-success rounded-pill px-3 py-2">
                        <i class="mdi mdi-check-circle"></i> {{$patientView->status}}
                    </span>
                </div>
                <span class="badge bg-danger rounded-pill px-3 py-2">
                    <i class="mdi mdi-water"></i> {{$patientView->blood_group}}
                </span>
            </div>

        </div>
    </div>

    <!-- ═══ INFO CARDS ═══ -->
    <div class="row g-3 mb-3">

        <!-- Taarifa Binafsi -->
        <div class="col-lg-6">
            <div class="info-card">
                <div class="info-card-title">
                    <i class="mdi mdi-account-circle text-primary"></i>
                    Taarifa Binafsi
                </div>

                <div class="info-row">
                    <span class="info-label">Namba ya Mgonjwa</span>
                    <span class="info-value">{{$patientView->patient_number}}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Jina la Kwanza</span>
                    <span class="info-value">{{$patientView->first_name}}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Jina la Mwisho</span>
                    <span class="info-value">{{$patientView->last_name}}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Tarehe ya Kuzaliwa</span>
                    <span class="info-value">{{$patientView->date_of_birth->format('M-j-Y')}}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Umri</span>
                    <span class="info-value">{{$patientView->date_of_birth->age}} <small> yrs</small></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Jinsia</span>
                    <span class="info-value">{{$patientView->gender}}</span>
                </div>
            </div>
        </div>

        <!-- Mawasiliano -->
        <div class="col-lg-6">
            <div class="info-card">
                <div class="info-card-title">
                    <i class="mdi mdi-phone text-success"></i>
                    Mawasiliano
                </div>

                <div class="info-row">
                    <span class="info-label">Simu</span>
                    <span class="info-value">
                        <a href="tel:0712345678" class="text-decoration-none text-dark">
                            <i class="mdi mdi-phone text-success"></i> {{$patientView->phone}}
                        </a>
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Anwani</span>
                    <span class="info-value">{{$patientView->address}}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Simu ya Ndugu</span>
                    <span class="info-value">
                        <a href="tel:0787654321" class="text-decoration-none text-dark">
                            <i class="mdi mdi-phone text-warning"></i> {{$patientView->next_of_kin_phone}}
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <!-- Kimatibabu -->
        <div class="col-lg-6">
            <div class="info-card">
                <div class="info-card-title">
                    <i class="mdi mdi-medical-bag text-danger"></i>
                    Taarifa za Kimatibabu
                </div>

                <div class="info-row">
                    <span class="info-label">Kundi la Damu</span>
                    <span class="info-value">
                        <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-1">
                            {{$patientView->blood_group}}
                        </span>
                    </span>
                </div>

                <div class="mt-3">
                    <div class="info-label mb-2">
                        <i class="mdi mdi-alert-circle text-warning"></i>
                        Mzio / Allergies
                    </div>
              @if($patientView->allergies == '')
                    <div class="allergy-box">
                        <div class="d-flex align-items-start gap-2">
                            <i class="mdi mdi-alert-circle text-danger fs-5"></i>
                            <div style="font-size: 13.5px; color: #7f1d1d; font-weight: 500;">
                               No Value
                           </div>
                        </div>
                    </div>
                    @else
                     <div class="allergy-box">
                        <div class="d-flex align-items-start gap-2">
                            <i class="mdi mdi-alert-circle text-danger fs-5"></i>
                            <div style="font-size: 13.5px; color: #7f1d1d; font-weight: 500;">
                                {{$patientView->allergies}}
                           </div>
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>

        <!-- Usajili -->
        <div class="col-lg-6">
            <div class="info-card">
                <div class="info-card-title">
                    <i class="mdi mdi-clipboard-text text-info"></i>
                    Taarifa za Usajili
                </div>

                <div class="info-row">
                    <span class="info-label">Aliyesajili</span>
                    <span class="info-value">{{$patientView->registeredBy->fname}} {{$patientView->registeredBy->lname}}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Tarehe ya Usajili</span>
                    <span class="info-value">{{$patientView->created_at->format('M-j-Y')}}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Mara ya Mwisho Kubadilishwa</span>
                    <span class="info-value">{{ $patientView->updated_at->format('M j, Y') }}</span>
                </div>
               
            </div>
        </div>

    </div>

    <!-- ═══ QUICK STATS ═══ -->
    <div class="row g-3">
    {{-- Umri --}}
    <div class="col-md-3 col-6">
        <div class="stat-box stat-primary">
            <div class="stat-icon">
                <i class="mdi mdi-cake-variant"></i>
            </div>
            <div class="stat-label">Umri</div>
            <div class="stat-value">{{$patientView->date_of_birth->age}} <small>yrs</small></div>
        </div>
    </div>

    {{-- Kundi la Damu --}}
    <div class="col-md-3 col-6">
        <div class="stat-box stat-danger">
            <div class="stat-icon">
                <i class="mdi mdi-water text-danger"></i>
            </div>
            <div class="stat-label">Kundi la Damu</div>
            <div class="stat-value">{{ $patientView->blood_group ?? '—' }}</div>
        </div>
    </div>

    {{-- Hali --}}
    <div class="col-md-3 col-6">
        <div class="stat-box stat-success">
            <div class="stat-icon">
                <i class="mdi mdi-heart-pulse"></i>
            </div>
            <div class="stat-label">Hali</div>
            <div class="stat-value text-capitalize">{{ $patientView->status }}</div>
        </div>
    </div>

    {{-- Jinsia --}}
    <div class="col-md-3 col-6">
        <div class="stat-box stat-info">
            <div class="stat-icon">
                <i class="mdi mdi-gender-{{ $patientView->gender === 'male' ? 'male' : 'female' }}"></i>
            </div>
            <div class="stat-label">Jinsia</div>
            <div class="stat-value text-capitalize">{{ $patientView->gender }}</div>
        </div>
    </div>
</div>

</div>

@include('templeteController.Footer')