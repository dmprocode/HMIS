<script>
    $(document).ready(function () {
        // Setup CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.staff-form-add').hide()

        // Handle Add Staff button click
        $(document).on('click', '.add-staff-btn', function (e) {
            e.preventDefault();
            $('.staff-form-add').show()
            $('.staff-table').hide()

            $('.add-staff-btn').html(`
                <span class="d-flex align-items-center gap-2">
                    <i class="mdi mdi-account-group fs-5"></i>
                    <span class="fw-semibold  view-staff-table">View Staff</span>
                </span>
            `);




        });


        $(document).on('click', '.delete-staff', function (e) {
            e.preventDefault();

            let staffId = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel"
            }).then((result) => {

                // User clicked "Yes, delete it!"
                if (result.isConfirmed) {

                    $.ajax({
                        url: "{{ route('delete-staff') }}",
                        method: "POST",
                        data: {
                            staffId: staffId,
                            _token: "{{ csrf_token() }}"
                        },

                        success: function (res) {

                            Swal.fire({
                                title: "Deleted!",
                                text: res.message,
                                icon: "success"
                            })
                            setTimeout(() => {
                                location.reload()
                            }, 2000);
                        },

                        error: function (error) {
                            Swal.fire({
                                title: "Error!",
                                text: "Something went wrong. Staff was not deleted.",
                                icon: "error"
                            });

                        }
                    });

                }
            });
        });

        // =================update staff===================
         $('.update-staff-data').hide()
        $(document).on('click', '.edit-staff-info',function(e){
            e.preventDefault()
            $('.update-staff-data').show()
            $('.staff-table ').hide()

        let staffId    = $(this).data('id');
        let fname      = $(this).data('fname');
        let lname      = $(this).data('lname');
        let userEmail  = $(this).data('useremail');
        let userRole   = $(this).data('userrole');
        let phone      = $(this).data('phone');
        $('#up_id').val(staffId)
        $('.up-fname').val(fname)
        $('.up-lname').val(lname)
        $('.up-fname').val(fname)
        $('.up-user-mail').val(userEmail)
        $('.up-user-role').val(userRole)
        $('.up-phone-number').val(phone)  
        })


        $(document).on('click','.update-staff-data-btn', function(e){
            e.preventDefault()
            let staff_id = $('#up_id').val()
            let fname = $('.up-fname').val()
            let lname = $('.up-lname').val()
            let userEmail = $('.up-user-mail').val()
            let userRole = $('.up-user-role').val()
            let phone = $('.up-phone-number').val()
            $.ajax({
                url : "{{ route('update-staff-data')}}",
                method:"POST",
                data:{
                    staff_id:staff_id,
                    fname:fname,
                    lname:lname,
                    userEmail:userEmail,
                    userRole:userRole,
                    phone:phone

                },
                success:function(res){
                   Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title:res.message,
                    showConfirmButton: false,
                    timer: 1500
                    });
                  setTimeout(() => {
                    location.reload()
                  }, 2000);
                    
                },
                error:function(error){
                    console.log(error);
                    
                }
            })

           
        })
        // =================Cancel Btn============================
       $(document).on('click', '.cancel-btn-update, #cancel-btn-add', function(e) {
            e.preventDefault();
            setTimeout(function() {
                location.reload();
            }, 500);
        });





    });
</script>