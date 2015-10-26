$(function () {
    $('#bt-qna-table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "order": [[ 0, "desc" ]]
    });
});
    