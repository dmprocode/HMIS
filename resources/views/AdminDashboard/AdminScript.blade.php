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

    

    $.ajax({
        url: "{{ route('delete-user') }}",
        method: "POST",
        data: {
            _token: "{{ csrf_token() }}",   
            userId: userId,
        },
        dataType: 'json',                    
        success: function (res) {
            
          
        },
        error: function (xhr, status, error) {
            console.error('Error:', xhr.responseText);
            alert('Something went wrong. Please try again.');
        }
    });
});
});


</script>