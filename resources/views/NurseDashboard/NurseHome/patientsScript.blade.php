<script>
$(document).ready(function () {

    const table = $('#patientsTable').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50, 100],
        language: {
            search: "",
            searchPlaceholder: "🔍 Search patients...",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ patients",
            paginate: {
                previous: '<i class="mdi mdi-chevron-left"></i>',
                next: '<i class="mdi mdi-chevron-right"></i>'
            }
        },
        columnDefs: [
            { orderable: false, targets: -1 }
        ]
    });

    // Filters
    $('#filterStatus').on('change', function () {
        table.column(7).search(this.value ? '^' + this.value + '$' : '', true, false).draw();
    });
    $('#filterGender').on('change', function () {
        table.column(3).search(this.value ? '^' + this.value + '$' : '', true, false).draw();
    });
    $('#filterBlood').on('change', function () {
        table.column(6).search(this.value ? '^' + this.value + '$' : '', true, false).draw();
    });
    $('#resetFilters').on('click', function () {
        $('#filterStatus, #filterGender, #filterBlood').val('');
        table.search('').columns().search('').draw();
    });

    // Actions
    $('#patientsTable tbody').on('click', '.btn-view', function () {
        alert('View patient ID: ' + $(this).data('id'));
    });
    $('#patientsTable tbody').on('click', '.btn-edit', function () {
        alert('Edit patient ID: ' + $(this).data('id'));
    });
    $('#patientsTable tbody').on('click', '.btn-delete', function () {
        if (confirm('Delete this patient?')) {
            alert('Delete patient ID: ' + $(this).data('id'));
        }
    });

});
</script>