@include('NurseDashboard.templeteController.Header')
@include('NurseDashboard.templeteController.SideNave')
@include('NurseDashboard.templeteController.TopNave')

<div class="container-fluid py-4 px-3 px-md-4">

   <div class="card shadow-sm border-0 rounded-3">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 fw-bold text-primary">
            <i class="mdi mdi-account-group me-2"></i> Patients List
        </h5>
        <button class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="mdi mdi-plus-circle me-1"></i> Add Patient
        </button>
    </div>

    <div class="card-body">
        <!-- Filters -->
        <div class="row g-2 mb-3">
            <div class="col-md-3">
                <label class="form-label small fw-bold">Status</label>
                <select id="filterStatus" class="form-select form-select-sm">
                    <option value="">All</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="deceased">Deceased</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-bold">Gender</label>
                <select id="filterGender" class="form-select form-select-sm">
                    <option value="">All</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-bold">Blood Group</label>
                <select id="filterBlood" class="form-select form-select-sm">
                    <option value="">All</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button id="resetFilters" class="btn btn-outline-secondary btn-sm w-100">
                    <i class="mdi mdi-refresh"></i> Reset Filters
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table id="patientsTable" class="table table-hover align-middle w-100">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Patient No.</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Phone</th>
                        <th>Blood</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>PAT-0001</td>
                        <td>John Doe</td>
                        <td>male</td>
                        <td>1990-01-01</td>
                        <td>0712345678</td>
                        <td>O+</td>
                        <td>active</td>
                        <td class="text-center table-action">
                            <button class="btn btn-sm btn-outline-primary btn-view" data-id="1"><i class="mdi mdi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-warning btn-edit" data-id="1"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger btn-delete" data-id="1"><i class="mdi mdi-delete"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>PAT-0001</td>
                        <td>John Doe</td>
                        <td>male</td>
                        <td>1990-01-01</td>
                        <td>0712345678</td>
                        <td>O+</td>
                        <td>active</td>
                        <td class="text-center table-action">
                            <button class="btn btn-sm btn-outline-primary btn-view" data-id="1"><i class="mdi mdi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-warning btn-edit" data-id="1"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger btn-delete" data-id="1"><i class="mdi mdi-delete"></i></button>
                        </td>
                    </tr><tr>
                        <td>1</td>
                        <td>PAT-0001</td>
                        <td>John Doe</td>
                        <td>male</td>
                        <td>1990-01-01</td>
                        <td>0712345678</td>
                        <td>O+</td>
                        <td>active</td>
                        <td class="text-center table-action">
                            <button class="btn btn-sm btn-outline-primary btn-view" data-id="1"><i class="mdi mdi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-warning btn-edit" data-id="1"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger btn-delete" data-id="1"><i class="mdi mdi-delete"></i></button>
                        </td>
                    </tr><tr>
                        <td>1</td>
                        <td>PAT-0001</td>
                        <td>John Doe</td>
                        <td>male</td>
                        <td>1990-01-01</td>
                        <td>0712345678</td>
                        <td>O+</td>
                        <td>active</td>
                        <td class="text-center table-action">
                            <button class="btn btn-sm btn-outline-primary btn-view" data-id="1"><i class="mdi mdi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-warning btn-edit" data-id="1"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger btn-delete" data-id="1"><i class="mdi mdi-delete"></i></button>
                        </td>
                    </tr><tr>
                        <td>1</td>
                        <td>PAT-0001</td>
                        <td>John Doe</td>
                        <td>male</td>
                        <td>1990-01-01</td>
                        <td>0712345678</td>
                        <td>O+</td>
                        <td>active</td>
                        <td class="text-center table-action">
                            <button class="btn btn-sm btn-outline-primary btn-view" data-id="1"><i class="mdi mdi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-warning btn-edit" data-id="1"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger btn-delete" data-id="1"><i class="mdi mdi-delete"></i></button>
                        </td>
                    </tr><tr>
                        <td>1</td>
                        <td>PAT-0001</td>
                        <td>Mussa Doe</td>
                        <td>male</td>
                        <td>1990-01-01</td>
                        <td>0712345678</td>
                        <td>O+</td>
                        <td>Dactive</td>
                        <td class="text-center table-action">
                            <button class="btn btn-sm btn-outline-primary btn-view" data-id="1"><i class="mdi mdi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-warning btn-edit" data-id="1"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger btn-delete" data-id="1"><i class="mdi mdi-delete"></i></button>
                        </td>
                    </tr><tr>
                        <td>1</td>
                        <td>PAT-0001</td>
                        <td>John Doe</td>
                        <td>male</td>
                        <td>1990-01-01</td>
                        <td>0712345678</td>
                        <td>O+</td>
                        <td>active</td>
                        <td class="text-center table-action">
                            <button class="btn btn-sm btn-outline-primary btn-view" data-id="1"><i class="mdi mdi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-warning btn-edit" data-id="1"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger btn-delete" data-id="1"><i class="mdi mdi-delete"></i></button>
                        </td>
                    </tr><tr>
                        <td>1</td>
                        <td>PAT-0001</td>
                        <td>John Doe</td>
                        <td>male</td>
                        <td>1990-01-01</td>
                        <td>0712345678</td>
                        <td>O+</td>
                        <td>active</td>
                        <td class="text-center table-action">
                            <button class="btn btn-sm btn-outline-primary btn-view" data-id="1"><i class="mdi mdi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-warning btn-edit" data-id="1"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger btn-delete" data-id="1"><i class="mdi mdi-delete"></i></button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@include('NurseDashboard.NurseHome.patientsScript')
@include('NurseDashboard.templeteController.Footer')