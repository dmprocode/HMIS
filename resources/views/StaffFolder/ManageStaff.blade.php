@include('templeteController.Header');
@include('templeteController.SideNave');
@include('templeteController.TopNave')
<div class="row">


    <div class="col-12">
        <div
            class="manage-staff-titile  d-flex align-items-center justify-content-between p-3 bg-light rounded-3 border border-2 border-info mb-3">
            <div class="d-flex align-items-center gap-3">
                <span class="text-danger fs-4">👥</span>
                <h5 class="mb-0 fw-semibold">Staff Members</h5>
                <span class="badge bg-danger rounded-pill fs-6 px-3 py-1">5</span>
            </div>
            <a href="javascript:void(0);"
                class="btn btn-outline-danger btn-sm d-inline-flex align-items-center gap-1 px-3 py-1.5 rounded-3 border-2 fw-semibold add-staff-btn ">
                <i class="mdi mdi-plus-circle fs-6"></i>
                Add Staff Member
            </a>


        </div>

        <div class="card staff-table shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive p-2">
                    <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ================Add  staff form ============ -->
        <div class="card staff-form-add shadow-sm">
            
            <form action="" class="p-2">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Text</label>
                    <input type="text" id="simpleinput" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="example-email" class="form-label">Email</label>
                    <input type="email" id="example-email" name="example-email" class="form-control"
                        placeholder="Email">
                </div>

                <div class="mb-3">
                    <label for="example-password" class="form-label">Password</label>
                    <input type="password" id="example-password" class="form-control" value="password">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Show/Hide Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control" placeholder="Enter your password">
                        <div class="input-group-text" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="example-palaceholder" class="form-label">Placeholder</label>
                    <input type="text" id="example-palaceholder" class="form-control" placeholder="placeholder">
                </div>

            </form>




        </div>
    </div>
    <!-- =======+End Staff Form=============  -->
</div>

</div> <!-- end col -->


</div>
@include('StaffFolder.staffScript')
@include('templeteController.Footer');