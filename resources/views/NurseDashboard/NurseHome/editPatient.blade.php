@include('templeteController.Header')
@include('templeteController.SideNave')
@include('templeteController.TopNave')

<style>
    .edit-page * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .edit-page {
        padding-bottom: 80px;   /* ✅ Space for fixed footer */
    }

    .edit-page .form-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 20px;
        /* ❌ REMOVED: height: 100%; */
    }

    .edit-page .form-card-title {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 700;
        color: #64748b;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .edit-page .form-label {
        font-size: 13px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 6px;
    }

    .edit-page .form-control,
    .edit-page .form-select {
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        padding: 8px 12px;
        font-size: 14px;
    }

    .edit-page .form-control:focus,
    .edit-page .form-select:focus {
        border-color: #0284c7;
        box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.1);
    }

    .edit-page .patient-avatar-lg {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #0284c7, #0891b2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        font-weight: 700;
        color: #fff;
        margin: 0 auto;
    }

    /* ✅ Only on small screens — no desktop impact */
    @media (max-width: 575.98px) {
        .edit-page .form-card {
            padding: 14px;
        }
        .edit-page h4 {
            font-size: 1.1rem;
        }
    }
</style>
<div class="container-fluid py-4 px-3 px-md-4 edit-page">

    {{-- ═══ PAGE HEADER ═══ --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h4 class="mb-1 fw-bold">
                <i class="mdi mdi-account-edit text-primary me-2"></i>
                Hariri Taarifa za Mgonjwa
            </h4>
            <p class="text-muted mb-0" style="font-size: 13px;">
                Badilisha taarifa zinazohitajika kisha hifadhi
            </p>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <a href="#" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
                <i class="mdi mdi-arrow-left me-1"></i> Rudi
            </a>
            <a href="#" class="btn btn-info btn-sm px-3 rounded-pill text-white">
                <i class="mdi mdi-eye me-1"></i> Angalia
            </a>
        </div>
    </div>

    {{-- ═══ FORM ═══ --}}
   <form action="{{ route('edit-patients-data') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$patient->id}}" name="id">
        <div class="row g-3">

            {{-- ─────── LEFT COLUMN ─────── --}}
            <div class="col-lg-8">

                {{-- Taarifa Binafsi --}}
                <div class="form-card mb-3">
                    <div class="form-card-title">
                        <i class="mdi mdi-account-circle text-primary"></i>
                        Taarifa Binafsi
                    </div>

                    <div class="row g-3">

                        {{-- Patient Number (readonly) --}}
                        <div class="col-md-6">
                            <label class="form-label">
                                Namba ya Mgonjwa
                                <i class="mdi mdi-lock text-muted" title="Cannot be changed"></i>
                            </label>
                            <input type="text" class="form-control bg-light" name="patient_number" value="{{$patient->patient_number}}" readonly>
                        </div>

                        {{-- Gender --}}
                        <div class="col-md-6">
                            <label class="form-label">Jinsia <span class="text-danger">*</span></label>
                            <select class="form-select" value="{{$patient->gender}}" name="gender">
                                <option value="">-- Chagua Jinsia --</option>
                                <option value="male" selected>Mwanaume</option>
                                <option value="female">Mwanamke</option>
                                <option value="other">Nyingine</option>
                            </select>
                        </div>

                        {{-- First Name --}}
                        <div class="col-md-6">
                            <label class="form-label">Jina la Kwanza <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{$patient->first_name}}" name="first_name" placeholder="Mfano: Juma">
                        </div>

                        {{-- Last Name --}}
                        <div class="col-md-6">
                            <label class="form-label">Jina la Mwisho <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{$patient->last_name}}" name="last_name" placeholder="Mfano: Hassan">
                        </div>

                        {{-- DOB --}}
                      <div class="col-12 col-sm-6">
                        <label for="date_of_birth" class="form-label">
                            Tarehe ya Kuzaliwa
                        </label>

                        <input type="date"
                            id="date_of_birth"
                            name="date_of_birth"
                            class="form-control"
                            value="{{ old('date_of_birth', $patient->date_of_birth?->format('Y-m-d')) }}">
                    </div>

                        {{-- Phone --}}
                        <div class="col-md-6">
                            <label class="form-label">Namba ya Simu <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="phone" value="{{$patient->phone}}" placeholder="0712345678">
                        </div>

                        {{-- Address --}}
                        <div class="col-12">
                            <label class="form-label">Anwani</label>
                            <textarea class="form-control" rows="2" name="address" placeholder="Mtaa, Kijiji, Wilaya">{{ old('address', $patient->address) }}</textarea>
                        </div>

                    </div>
                </div>

                {{-- Kimatibabu --}}
                <div class="form-card">
                    <div class="form-card-title">
                        <i class="mdi mdi-medical-bag text-danger"></i>
                        Taarifa za Kimatibabu
                    </div>

                    <div class="row g-3">

                        {{-- Blood Group --}}
                        <div class="col-md-6">
                            <label class="form-label">Kundi la Damu</label>
                            <select class="form-select" name="blood_group"  value="{{$patient->blood_group}}">
                                <option value="">-- Chagua --</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+" selected>O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>

                        {{-- Next of Kin Phone --}}
                        <div class="col-md-6">
                            <label class="form-label">Simu ya Ndugu wa Karibu</label>
                            <input type="text" class="form-control" value="{{$patient->next_of_kin_phone}}" name="next_of_kin_phone" placeholder="0787654321">
                        </div>

                        {{-- Allergies --}}
                        <div class="col-12">
                            <label class="form-label">
                                Mzio / Allergies
                                <i class="mdi mdi-alert-circle text-warning"></i>
                            </label>
                            <textarea class="form-control " 
                                        rows="3"
                                        name="allergies"
                                        placeholder="Mfano: Penicillin, Peanuts, Pollen...">{{ old('allergies', $patient->allergies) }}</textarea>

                                
                             </div>

                    </div>
                </div>

            </div>

            {{-- ─────── RIGHT COLUMN ─────── --}}
            <div class="col-lg-4">

                {{-- Avatar Preview --}}
                <div class="form-card mb-3 text-center">
                    <div class="patient-avatar-lg mb-3">JH</div>
                    <h6 class="fw-bold mb-1">{{$patient->first_name}}  {{$patient->last_name}}</h6>
                    <p class="text-muted mb-0" style="font-size: 13px;">{{$patient->patient_number}}</p>
                </div>

                {{-- Status --}}
                <div class="form-card mb-3">
                    <div class="form-card-title">
                        <i class="mdi mdi-toggle-switch text-success"></i>
                        Hali ya Mgonjwa
                    </div>

                    <label class="form-label">Hali <span class="text-danger">*</span></label>
                    <select class="form-select" name="status" value="{{$patient->status}}">
                        <option value="active" selected>🟢 Hai (Active)</option>
                        <option value="inactive">🟡 Hajafanya kazi (Inactive)</option>
                        <option value="deceased">⚫ Marehemu (Deceased)</option>
                    </select>

                    <small class="text-muted d-block mt-2" style="font-size: 12px;">
                        <i class="mdi mdi-information-outline"></i>
                        Chagua hali halisi ya mgonjwa sasa
                    </small>
                </div>

                {{-- Actions --}}
                <div class="form-card">
                    <div class="form-card-title">
                        <i class="mdi mdi-content-save text-primary"></i>
                        Vitendo
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 mb-2 fw-semibold rounded-3">
                        <i class="mdi mdi-content-save me-1"></i> Hifadhi Mabadiliko
                    </button>

                    <button type="reset" class="btn btn-outline-secondary w-100 py-2 fw-semibold rounded-3">
                        <i class="mdi mdi-refresh me-1"></i> Rudisha Awali
                    </button>

                    <hr class="my-3">

                    <button type="button" class="btn btn-outline-danger w-100 py-2 fw-semibold rounded-3">
                        <i class="mdi mdi-delete-outline me-1"></i> Futa Mgonjwa
                    </button>
                </div>

            </div>

        </div>

    </form>

</div>

@include('templeteController.Footer')