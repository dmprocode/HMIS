@include('NurseDashboard.templeteController.Header')
@include('NurseDashboard.templeteController.SideNave')
@include('NurseDashboard.templeteController.TopNave')

<div class="container-fluid py-4 px-3 px-md-4">

    {{-- ═══════════════ PAGE HEADER ═══════════════ --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h3 class="mb-1 d-flex align-items-center">
                <i class="mdi mdi-account-plus text-primary me-2"></i>
                Ongeza Mgonjwa
            </h3>
            <p class="text-muted mb-0" style="font-size: 14px;">
                Jaza taarifa za mgonjwa mpya hapa chini
            </p>
        </div>

        <a href="{{route('nurse.dashboard')}}" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
            <i class="mdi mdi-arrow-left me-1"></i> Rudi
        </a>
    </div>

    @if(session()->has('success'))
    <div id="successAlert" class="alert alert-success alert-dismissible fade show shadow-sm rounded-3 border-0 d-flex align-items-center gap-2" role="alert">
        <i class="mdi mdi-check-circle fs-4"></i>
        <div class="flex-grow-1 fw-semibold">{{ session()->get('success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        setTimeout(() => {
            let el = document.getElementById('successAlert');
            if (el) el.remove();
        }, 4000);
    </script>
@endif

    {{-- ═══════════════ FORM ═══════════════ --}}
    <form action="{{route('add-patients')}}" method="POST">
        @csrf

        <div class="row g-4">

            {{-- ─────────── LEFT COLUMN: Personal Info ─────────── --}}
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                    <div class="card-body p-4">

                        <h6 class="fw-bold mb-3 d-flex align-items-center">
                            <i class="mdi mdi-account-circle text-primary me-2"></i>
                            Taarifa Binafsi
                        </h6>

                        {{-- Hidden fields --}}
                        <input type="hidden" name="uuid" value="">
                        <input type="hidden" name="registered_by" value="{{ auth('admin')->id() }}">

                        <div class="row g-3">

                            {{-- Patient Number --}}
                            <div class="col-md-6">
                                <label for="patient_number" class="form-label fw-semibold">
                                    Namba ya Mgonjwa
                                    <i class="mdi mdi-lock text-muted" title="Auto-generated"></i>
                                </label>
                                <input type="text" 
                                       id="patient_number" 
                                       name="patient_number"
                                       class="form-control bg-light"
                                       placeholder="PT-2026-00001"
                                       readonly>
                                <small class="text-muted" style="font-size: 12px;">
                                    Itatengenezwa moja kwa moja
                                </small>
                                
                            </div>

                            {{-- Gender --}}
                            <div class="col-md-6">
                                <label for="gender" class="form-label fw-semibold">
                                    Jinsia <span class="text-danger">*</span>
                                </label>
                                <select id="gender" name="gender" class="form-select">
                                    <option value="">-- Chagua Jinsia --</option>
                                    <option value="male">Mwanaume</option>
                                    <option value="female">Mwanamke</option>
                                    <option value="other">Nyingine</option>
                                </select>
                                @error('gender')
                                    <small class="text-danger d-flex align-items-center gap-1 mt-1" style="font-size: 12px;">
                                        <i class="mdi mdi-alert-circle" style="font-size: 13px;"></i>
                                        <span>{{ $message }}</span>
                                    </small>
                                @enderror
                            </div>

                            {{-- First Name --}}
                            <div class="col-md-6">
                                <label for="first_name" class="form-label fw-semibold">
                                    Jina la Kwanza <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       id="first_name" 
                                       name="first_name"
                                       class="form-control"
                                       placeholder="Mfano: Juma">
                                      @error('first_name')
                                        <small class="text-danger d-flex align-items-center gap-1 mt-1" style="font-size: 12px;">
                                            <i class="mdi mdi-alert-circle" style="font-size: 13px;"></i>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror                                     
                            </div>

                            {{-- Last Name --}}
                            <div class="col-md-6">
                                <label for="last_name" class="form-label fw-semibold">
                                    Jina la Mwisho <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       id="last_name" 
                                       name="last_name"
                                       class="form-control"
                                       placeholder="Mfano: Hassan">
                                 @error('last_name')
                                    <small class="text-danger d-flex align-items-center gap-1 mt-1" style="font-size: 12px;">
                                        <i class="mdi mdi-alert-circle" style="font-size: 13px;"></i>
                                        <span>{{ $message }}</span>
                                    </small>
                                @enderror
                            </div>

                            {{-- Date of Birth --}}
                            <div class="col-md-6">
                                <label for="date_of_birth" class="form-label fw-semibold">
                                    Tarehe ya Kuzaliwa
                                </label>
                                <input type="date" 
                                       id="date_of_birth" 
                                       name="date_of_birth"
                                       class="form-control">
                                    @error('date_of_birth')
                                        <small class="text-danger d-flex align-items-center gap-1 mt-1" style="font-size: 12px;">
                                            <i class="mdi mdi-alert-circle" style="font-size: 13px;"></i>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold">
                                    Namba ya Simu <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       id="phone" 
                                       name="phone"
                                       class="form-control"
                                       placeholder="Mfano: 0712345678">
                                     @error('phone')
                                        <small class="text-danger d-flex align-items-center gap-1 mt-1" style="font-size: 12px;">
                                            <i class="mdi mdi-alert-circle" style="font-size: 13px;"></i>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                            </div>

                            {{-- Address --}}
                            <div class="col-12">
                                <label for="address" class="form-label fw-semibold">
                                    Anwani
                                </label>
                                <textarea id="address" 
                                          name="address"
                                          rows="2"
                                          class="form-control"
                                          placeholder="Mfano: Mtaa wa Uhuru, Kijiji cha Mwanga"></textarea>
                                           @error('address')
                                        <small class="text-danger d-flex align-items-center gap-1 mt-1" style="font-size: 12px;">
                                            <i class="mdi mdi-alert-circle" style="font-size: 13px;"></i>
                                            <span>{{ $message }}</span>
                                        </small>
                                        @enderror
                            </div>

                        </div>

                    </div>
                </div>

                {{-- ─────────── MEDICAL INFO ─────────── --}}
                <div class="card border-0 shadow-sm mt-4" style="border-radius: 16px;">
                    <div class="card-body p-4">

                        <h6 class="fw-bold mb-3 d-flex align-items-center">
                            <i class="mdi mdi-medical-bag text-danger me-2"></i>
                            Taarifa za Kimatibabu
                        </h6>

                        <div class="row g-3">

                            {{-- Blood Group --}}
                            <div class="col-md-6">
                                <label for="blood_group" class="form-label fw-semibold">
                                    Kundi la Damu
                                </label>
                                <select id="blood_group" name="blood_group" class="form-select">
                                    <option value="">-- Chagua --</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>

                                    @error('blood_group')
                                        <small class="text-danger d-flex align-items-center gap-1 mt-1" style="font-size: 12px;">
                                            <i class="mdi mdi-alert-circle" style="font-size: 13px;"></i>
                                            <span>{{ $message }}</span>
                                        </small>
                                        @enderror
                            </div>

                            {{-- Next of Kin Phone --}}
                            <div class="col-md-6">
                                <label for="next_of_kin_phone" class="form-label fw-semibold">
                                    Simu ya Ndugu wa Karibu
                                </label>
                                <input type="text" 
                                       id="next_of_kin_phone" 
                                       name="next_of_kin_phone"
                                       class="form-control"
                                       placeholder="Mfano: 0787654321">

                                       @error('next_of_kin_phone')
                                        <small class="text-danger d-flex align-items-center gap-1 mt-1" style="font-size: 12px;">
                                            <i class="mdi mdi-alert-circle" style="font-size: 13px;"></i>
                                            <span>{{ $message }}</span>
                                        </small>
                             @enderror
                            </div>
                             

                            {{-- Allergies --}}
                            <div class="col-12">
                                <label for="allergies" class="form-label fw-semibold">
                                    Mzio / Allergies
                                    <i class="mdi mdi-alert-circle text-warning"></i>
                                </label>
                                <textarea id="allergies" 
                                          name="allergies"
                                          rows="3"
                                          class="form-control"
                                          placeholder="Mfano: Penicillin, Peanuts, Pollen..."></textarea>
                                <small class="text-muted" style="font-size: 12px;">
                                    <i class="mdi mdi-information-outline"></i>
                                    Weka mzio wowote unaojulikana — muhimu kwa matibabu salama
                                </small>
                                @error('allergies')
                                        <small class="text-danger d-flex align-items-center gap-1 mt-1" style="font-size: 12px;">
                                            <i class="mdi mdi-alert-circle" style="font-size: 13px;"></i>
                                            <span>{{ $message }}</span>
                                        </small>
                               @enderror
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            {{-- ─────────── RIGHT COLUMN: Status + Actions ─────────── --}}
            <div class="col-lg-4">

                {{-- Status Card --}}
                <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                    <div class="card-body p-4">

                        <h6 class="fw-bold mb-3 d-flex align-items-center">
                            <i class="mdi mdi-toggle-switch text-success me-2"></i>
                            Hali ya Mgonjwa
                        </h6>

                        <label for="status" class="form-label fw-semibold">Hali</label>
                        <select id="status" name="status" class="form-select">
                            <option value="active" selected>
                                🟢 Hai (Active)
                            </option>
                            <option value="inactive">
                                🟡 Hajafanya kazi (Inactive)
                            </option>
                            <option value="deceased">
                                ⚫ Marehemu (Deceased)
                            </option>
                        </select>

                        <small class="text-muted d-block mt-2" style="font-size: 12px;">
                            <i class="mdi mdi-information-outline"></i>
                            Kwa kawaida ni "Hai" kwa wagonjwa wapya
                        </small>

                    </div>
                </div>

                {{-- Summary Card --}}
                <div class="card border-0 shadow-sm mt-4" style="border-radius: 16px;">
                    <div class="card-body p-4">

                        <h6 class="fw-bold mb-3 d-flex align-items-center">
                            <i class="mdi mdi-clipboard-check-outline text-info me-2"></i>
                            Muhtasari
                        </h6>

                        <ul class="list-unstyled mb-0" style="font-size: 13px;">
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span class="text-muted">Namba ya Mgonjwa:</span>
                                <span class="fw-semibold">Auto</span>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span class="text-muted">Aliyesajili:</span>
                                <span class="fw-semibold">
                                    {{ auth('admin')->user()->fname   }}
                                    {{ auth('admin')->user()->lname   }}

                                </span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="text-muted">Tarehe:</span>
                                <span class="fw-semibold">{{ now()->format('d M Y') }}</span>
                            </li>
                        </ul>

                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="card border-0 shadow-sm mt-4" style="border-radius: 16px;">
                    <div class="card-body p-3">

                        <button type="submit" class="btn btn-primary w-100 py-2 mb-2 fw-semibold rounded-3">
                            <i class="mdi mdi-content-save me-1"></i> Hifadhi Mgonjwa
                        </button>

                        <button type="reset" class="btn btn-outline-secondary w-100 py-2 fw-semibold rounded-3">
                            <i class="mdi mdi-refresh me-1"></i> Safisha Fomu
                        </button>

                    </div>
                </div>

            </div>

        </div>

    </form>

</div>

@include('NurseDashboard.templeteController.Footer')