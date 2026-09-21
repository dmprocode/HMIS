<script>
 $(document).ready(function(){
    $('.admin-form-add').show()
    $('.update-admin-data').hide()
    $('.admin-table').hide();


    $(document).on('click','.add-user-btn', function(){
        $('.admin-table').hide();
         $('.admin-form-add').show()
    })

    $(document).on('click','#addStaffBtn', function(e){
        e.preventDefault()
         $('.pages-links').html(`<i class="mdi mdi-account me-1"></i> User Form`)
        
    })

    $(document).on('click','.view-staff-member', function(){
            $('.admin-form-add').hide()
            $('.admin-table').show()
            $('.pages-links').html(`<i class="mdi mdi-table me-1"></i>User Table`)

    })

    // ================++++delete User============

    $(document).on('click', '.delete-user', function (e) {
    e.preventDefault();

    let userId = $(this).data('id');
    let row    = $(this).closest('tr');   // Save row for removal

const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger"
    },
    buttonsStyling: false
});

swalWithBootstrapButtons.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true

}).then((result) => {

    if (result.isConfirmed) {

        $.ajax({
            url: "{{ route('delete-user') }}",
            method: "POST",

            data: {
                _token: "{{ csrf_token() }}",
                userId: userId
            },

            dataType: "json",

            success: function (res) {

                // Show success message AFTER database deletion
                swalWithBootstrapButtons.fire({
                    title: "Deleted!",
                    text: res.message,
                    icon: "success"
                });
                setTimeout(() => {
                    location.reload()
                }, 1000);

            },

            error: function (xhr, status, error) {

                console.error("Error:", xhr.responseText);

                swalWithBootstrapButtons.fire({
                    title: "Error!",
                    text: "Something went wrong. Please try again.",
                    icon: "error"
                });

            }
        });

    }

    else if (result.dismiss === Swal.DismissReason.cancel) {

        swalWithBootstrapButtons.fire({
            title: "Cancelled",
            text: "User was not deleted.",
            icon: "error"
        });

    }

});


});


// ===end of deleting user Data

 $(document).on('click','.update-user', function(e){
    e.preventDefault()
        $('.admin-table').hide();
        $('.update-admin-data').show()

    let user_id = $(this).data('id')
    let fname = $(this).data('fname')
    let lname = $(this).data('lname')
    let username = $(this).data('username')
    let phone = $(this).data('phone')
    let gender = $(this).data('gender')
    let role = $(this).data('role')
    let is_active = $(this).data('is_active')

    $('#up_id').val(user_id)
    $('#up_fname').val(fname)
    $('#up_lname').val(lname)
    $('#up_userEmail').val(username)
    $('#up_phone').val(phone)
    $('#up_gender').val(gender)
    $('#up_userrole').val(role)
    $('.up-user-status').val(is_active)



    
 })
});


</script>