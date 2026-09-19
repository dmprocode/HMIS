<script>
 $(document).ready(function(){
    $('.admin-form-add').hide()
    $('.update-admin-data').hide()

    $(document).on('click','.add-user-btn', function(){
        $('.admin-table').hide();
         $('.admin-form-add').show()
    })
});


</script>