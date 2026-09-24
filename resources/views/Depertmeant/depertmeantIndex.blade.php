@include('templeteController.Header')
@include('templeteController.SideNave')
@include('templeteController.TopNave')

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- PAGE-SCOPED STYLES (only this page)                    --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<style>
    /* ═══ SCOPED TO THIS PAGE ONLY ═══ */
    .dept-page {
        --dept-bg: #f4f7fc;
        --dept-text: #0f172a;
        --dept-muted: #94a3b8;
    }

    .dept-page * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI',
                     Roboto, 'Helvetica Neue', sans-serif;
        letter-spacing: -0.01em;
    }

    .dept-page h1,
    .dept-page h2,
    .dept-page h3,
    .dept-page h4,
    .dept-page h5,
    .dept-page h6 {
        font-weight: 700;
        color: var(--dept-text);
    }

    /* ═══ STAT CARDS ═══ */
    .dept-page .stat-card {
        border-radius: 16px;
        border: 0;
        position: relative;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .dept-page .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, currentColor, transparent);
        opacity: 0.4;
    }

    .dept-page .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.08) !important;
    }

    .dept-page .stat-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        flex-shrink: 0;
    }

    .dept-page .stat-number {
        font-size: 1.85rem;
        font-weight: 700;
        line-height: 1;
    }

    /* ═══ DEPARTMENT CARDS ═══ */
    .dept-page .dept-card {
        border-radius: 16px;
        border: 0;
        overflow: hidden;
        position: relative;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .dept-page .dept-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--dept-color, #0284c7);
    }

    .dept-page .dept-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 34px rgba(0, 0, 0, 0.1) !important;
    }

    .dept-page .dept-card .card-footer {
        background: #fff;
        border-top: 1px solid #f1f5f9;
    }

    .dept-page .dept-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .dept-page .dept-code-badge {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.5px;
        padding: 4px 10px;
        border-radius: 999px;
    }

    .dept-page .dept-name-en {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.7px;
        color: var(--dept-muted);
        font-weight: 600;
        margin-bottom: 2px;
    }

    .dept-page .dept-name-sw {
        font-size: 15px;
        font-weight: 700;
        color: var(--dept-text);
        line-height: 1.3;
        margin-bottom: 0;
    }

    .dept-page .dept-stat-number {
        font-size: 1.2rem;
        font-weight: 700;
        line-height: 1;
    }

    .dept-page .dept-stat-label {
        font-size: 10px;
        color: var(--dept-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
        margin-top: 3px;
    }

    .dept-page .dept-footer-link {
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
    }

    /* ═══ RESPONSIVE TWEAKS ═══ */
    @media (max-width: 576px) {
        .dept-page h3 { font-size: 1.25rem; }
        .dept-page .stat-number { font-size: 1.5rem; }
        .dept-page .stat-icon { width: 40px; height: 40px; font-size: 1.2rem; }
        .dept-page .dept-icon { width: 44px; height: 44px; font-size: 1.25rem; }
        .dept-page .dept-name-sw { font-size: 14px; }
    }

    /* ═══ EMPTY STATE (if needed later) ═══ */
    .dept-page .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: var(--dept-muted);
    }
    
</style>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- MAIN CONTENT                                           --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<div class="container-fluid py-4 px-3 px-md-4 dept-page">

    <!-- ═══════════════ PAGE HEADER ═══════════════ -->
    <div class="d-flex flex-wrap justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h3 class="mb-1 d-flex align-items-center">
                <i class="mdi mdi-hospital-building text-primary me-2"></i>
                Idara za Hospitali
            </h3>
            <p class="text-muted mb-0" style="font-size: 14px;">
                Muhtasari wa idara zote za hospitali na hali zao
            </p>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <button class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
                <i class="mdi mdi-refresh me-1"></i> Onyesha upya
            </button>
            <button class="btn btn-primary btn-sm px-3 rounded-pill">
                <i class="mdi mdi-plus me-1"></i> Ongeza Idara
            </button>
        </div>
    </div>

    <!-- ═══════════════ STAT CARDS ═══════════════ -->
  

    <!-- ═══════════════ DEPARTMENT CARDS ═══════════════ -->
    <div class="row g-3">

        {{-- ─── 1. OUT PATIENT ─── --}}
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card dept-card shadow-sm h-100" style="--dept-color: #0284c7;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="dept-icon" style="background: #0284c715;">
                            <i class="mdi mdi-account-multiple-outline" style="color: #0284c7;"></i>
                        </div>
                        <span class="dept-code-badge" style="background: #0284c715; color: #0284c7;">OPD</span>
                    </div>

                    <div class="dept-name-en">Out Patient</div>
                    <div class="dept-name-sw">Wagonjwa wa Nje</div>

                    <p class="text-muted mb-3 mt-2" style="font-size: 13px;">
                        <i class="mdi mdi-map-marker-outline"></i> Jengo A, Ghorofa 1
                    </p>

                    <div class="d-flex justify-content-between border-top pt-3">
                        <div class="text-center">
                            <div class="dept-stat-number" style="color: #0284c7;">12</div>
                            <div class="dept-stat-label">Wafanyakazi</div>
                        </div>
                        <div class="text-center">
                            <div class="dept-stat-number" style="color: #0284c7;">45</div>
                            <div class="dept-stat-label">Wagonjwa</div>
                        </div>
                        
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between py-2">
                    <a href="#" class="dept-footer-link" style="color: #0284c7;">
                        <i class="mdi mdi-eye-outline"></i> Angalia
                    </a>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-muted" title="Hariri"><i class="mdi mdi-pencil-outline"></i></a>
                        <a href="#" class="text-muted" title="Zaidi"><i class="mdi mdi-dots-horizontal"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ─── 2. IN PATIENT ─── --}}
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card dept-card shadow-sm h-100" style="--dept-color: #0891b2;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="dept-icon" style="background: #0891b215;">
                            <i class="mdi mdi-bed" style="color: #0891b2;"></i>
                        </div>
                        <span class="dept-code-badge" style="background: #0891b215; color: #0891b2;">IPD</span>
                    </div>

                    <div class="dept-name-en">In Patient</div>
                    <div class="dept-name-sw">Wagonjwa wa Kulazwa</div>

                    <p class="text-muted mb-3 mt-2" style="font-size: 13px;">
                        <i class="mdi mdi-map-marker-outline"></i> Jengo A, Ghorofa 2
                    </p>

                    <div class="d-flex justify-content-between border-top pt-3">
                        <div class="text-center">
                            <div class="dept-stat-number" style="color: #0891b2;">18</div>
                            <div class="dept-stat-label">Wafanyakazi</div>
                        </div>
                        <div class="text-center">
                            <div class="dept-stat-number" style="color: #0891b2;">32</div>
                            <div class="dept-stat-label">Wagonjwa</div>
                        </div>
                        
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between py-2">
                    <a href="#" class="dept-footer-link" style="color: #0891b2;">
                        <i class="mdi mdi-eye-outline"></i> Angalia
                    </a>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-muted" title="Hariri"><i class="mdi mdi-pencil-outline"></i></a>
                        <a href="#" class="text-muted" title="Zaidi"><i class="mdi mdi-dots-horizontal"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ─── 3. GENERAL MEDICINE ─── --}}
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card dept-card shadow-sm h-100" style="--dept-color: #0d9488;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="dept-icon" style="background: #0d948815;">
                            <i class="mdi mdi-stethoscope" style="color: #0d9488;"></i>
                        </div>
                        <span class="dept-code-badge" style="background: #0d948815; color: #0d9488;">GENMED</span>
                    </div>

                    <div class="dept-name-en">General Medicine</div>
                    <div class="dept-name-sw">Wagonjwa wa Kawaida</div>

                    <p class="text-muted mb-3 mt-2" style="font-size: 13px;">
                        <i class="mdi mdi-map-marker-outline"></i> Jengo B, Ghorofa 1
                    </p>

                    <div class="d-flex justify-content-between border-top pt-3">
                        <div class="text-center">
                            <div class="dept-stat-number" style="color: #0d9488;">10</div>
                            <div class="dept-stat-label">Wafanyakazi</div>
                        </div>
                        <div class="text-center">
                            <div class="dept-stat-number" style="color: #0d9488;">28</div>
                            <div class="dept-stat-label">Wagonjwa</div>
                        </div>
                       
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between py-2">
                    <a href="#" class="dept-footer-link" style="color: #0d9488;">
                        <i class="mdi mdi-eye-outline"></i> Angalia
                    </a>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-muted" title="Hariri"><i class="mdi mdi-pencil-outline"></i></a>
                        <a href="#" class="text-muted" title="Zaidi"><i class="mdi mdi-dots-horizontal"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ─── 4. GENERAL SURGERY ─── --}}
       

        {{-- ─── 5. PEDIATRICS ─── --}}
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card dept-card shadow-sm h-100" style="--dept-color: #ec4899;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="dept-icon" style="background: #ec489915;">
                            <i class="mdi mdi-baby-face-outline" style="color: #ec4899;"></i>
                        </div>
                        <span class="dept-code-badge" style="background: #ec489915; color: #ec4899;">PED</span>
                    </div>

                    <div class="dept-name-en">Pediatrics</div>
                    <div class="dept-name-sw">Watoto</div>

                    <p class="text-muted mb-3 mt-2" style="font-size: 13px;">
                        <i class="mdi mdi-map-marker-outline"></i> Jengo C, Ghorofa 1
                    </p>

                    <div class="d-flex justify-content-between border-top pt-3">
                        <div class="text-center">
                            <div class="dept-stat-number" style="color: #ec4899;">9</div>
                            <div class="dept-stat-label">Wafanyakazi</div>
                        </div>
                        <div class="text-center">
                            <div class="dept-stat-number" style="color: #ec4899;">24</div>
                            <div class="dept-stat-label">Wagonjwa</div>
                        </div>
                        
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between py-2">
                    <a href="#" class="dept-footer-link" style="color: #ec4899;">
                        <i class="mdi mdi-eye-outline"></i> Angalia
                    </a>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-muted" title="Hariri"><i class="mdi mdi-pencil-outline"></i></a>
                        <a href="#" class="text-muted" title="Zaidi"><i class="mdi mdi-dots-horizontal"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ─── 6. OBGY ─── --}}
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card dept-card shadow-sm h-100" style="--dept-color: #f59e0b;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="dept-icon" style="background: #f59e0b15;">
                            <i class="mdi mdi-human-pregnant" style="color: #f59e0b;"></i>
                        </div>
                        <span class="dept-code-badge" style="background: #f59e0b15; color: #f59e0b;">OBGY</span>
                    </div>

                    <div class="dept-name-en">Obstetrics & Gynecology</div>
                    <div class="dept-name-sw">Uzazi na Magonjwa ya Wanawake</div>

                    <p class="text-muted mb-3 mt-2" style="font-size: 13px;">
                        <i class="mdi mdi-map-marker-outline"></i> Jengo C, Ghorofa 2
                    </p>

                    <div class="d-flex justify-content-between border-top pt-3">
                        <div class="text-center">
                            <div class="dept-stat-number" style="color: #f59e0b;">14</div>
                            <div class="dept-stat-label">Wafanyakazi</div>
                        </div>
                        <div class="text-center">
                            <div class="dept-stat-number" style="color: #f59e0b;">19</div>
                            <div class="dept-stat-label">Wagonjwa</div>
                        </div>
                        
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between py-2">
                    <a href="#" class="dept-footer-link" style="color: #f59e0b;">
                        <i class="mdi mdi-eye-outline"></i> Angalia
                    </a>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-muted" title="Hariri"><i class="mdi mdi-pencil-outline"></i></a>
                        <a href="#" class="text-muted" title="Zaidi"><i class="mdi mdi-dots-horizontal"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ─── 7. EMERGENCY ─── --}}
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card dept-card shadow-sm h-100" style="--dept-color: #dc2626;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="dept-icon" style="background: #dc262615;">
                            <i class="mdi mdi-ambulance" style="color: #dc2626;"></i>
                        </div>
                        <span class="dept-code-badge" style="background: #dc262615; color: #dc2626;">EMER</span>
                    </div>

                    <div class="dept-name-en">Emergency</div>
                    <div class="dept-name-sw">Dharura</div>

                    <p class="text-muted mb-3 mt-2" style="font-size: 13px;">
                        <i class="mdi mdi-map-marker-outline"></i> Lango Kuu
                    </p>

                    <div class="d-flex justify-content-between border-top pt-3">
                        <div class="text-center">
                            <div class="dept-stat-number" style="color: #dc2626;">16</div>
                            <div class="dept-stat-label">Wafanyakazi</div>
                        </div>
                        <div class="text-center">
                            <div class="dept-stat-number" style="color: #dc2626;">14</div>
                            <div class="dept-stat-label">Wagonjwa</div>
                        </div>
                        
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between py-2">
                    <a href="#" class="dept-footer-link" style="color: #dc2626;">
                        <i class="mdi mdi-eye-outline"></i> Angalia
                    </a>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-muted" title="Hariri"><i class="mdi mdi-pencil-outline"></i></a>
                        <a href="#" class="text-muted" title="Zaidi"><i class="mdi mdi-dots-horizontal"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@include('templeteController.Footer')