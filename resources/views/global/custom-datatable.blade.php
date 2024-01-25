<script>
    let table = $('.custom-datatable').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.2/i18n/tr.json"
        },
        info: 0,
        responsive: true,
        order: []
    });
    $('#datatable-search').on("keyup", (function () {
        table.search($(this).val()).draw()
    }))
</script>
<style>
    #DataTables_Table_0_wrapper {
        width: 100% !important;
    }
</style>
