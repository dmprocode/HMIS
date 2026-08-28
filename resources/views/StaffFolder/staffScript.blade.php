<script>
    $(document).ready(function() {
        // Setup CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.staff-form-add').hide()

        // Handle Add Staff button click
        $(document).on('click', '.add-staff-btn', function(e) {
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
         $(document).on('.click','.view-staff-btn', function(e){
                alert()
            })
        
    });
</script>