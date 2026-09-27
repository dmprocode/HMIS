@include('templeteController.Header');
@include('templeteController.SideNave');
@include('templeteController.TopNave')
<div class="row">


    <div class="card admin-table shadow-sm">
        <div class="card-body p-2">
            <div
                class="manage-staff-titile d-flex align-items-center justify-content-between p-3 bg-light rounded-3 border border-2 border-info mb-3">
                <div class="d-flex align-items-center gap-3">
                    <span class="text-danger fs-4">👥</span>
                    <h5 class="mb-0 fw-semibold">To Day Patients</h5>
                    <span class="badge bg-danger rounded-pill fs-6 px-3 py-1">2</span>
                </div>

                <a href="{{route('patents.index')}}"
                    class="btn btn-outline-danger btn-sm d-inline-flex align-items-center gap-1 px-3 py-1.5 rounded-3 border-2 fw-semibold add-user-btn"
                    id="addPatientBtn">
                    <i class="mdi mdi-account-plus fs-6"></i>
                    Add Patient
                </a>
            </div>
            <div class="table-responsive p-2">
                <div class="table-responsive p-2">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Patient No.</th>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Blood Group</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($patientCompontents['patents'] as $key=>$patient)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><span
                                            class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-2 py-1">{{$patient->patient_number}}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px; font-size: 12px; font-weight: 600;">
                                                {{ strtoupper(substr($patient->first_name, 0, 1) .
                                                substr($patient->last_name, 0, 1)) }}

                                            </div>
                                            <div>
                                                <div class="fw-semibold">{{$patient->first_name}}
                                                    {{$patient->last_name}}</div>
                                                <small class="text-muted" style="font-size: 11px;">Age: ({{
                                                    $patient->date_of_birth->age }} yrs)</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$patient->gender}}</td>
                                    <td>{{$patient->phone}}</td>
                                    <td><span
                                            class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-2 py-1">{{$patient->blood_group}}</span>
                                    </td>
                                    <td><span
                                            class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1">{{$patient->status}}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="#" class="text-primary" title="View"><i
                                                    class="mdi mdi-eye-outline"></i></a>
                                            <a href="#" class="text-warning" title="Edit"><i
                                                    class="mdi mdi-pencil-outline"></i></a>
                                            <a href="#" class="text-danger" title="Delete"><i
                                                    class="mdi mdi-delete-outline"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================Add  staff form ============ -->



</div>
<!-- =======+End Staff Form=============  -->
</div>

</div> <!-- end col -->


</div>
@include('templeteController.Footer');