$(document).ready(function() {
    $('#listar-usuario').DataTable({
        "processing": true,
        "serverSide": true,
        "paging": true,
        "order": [0, 'desc'],
        "ajax": {
            "url": "proc_pesq_user.php",
            "type": "POST",
        },
    });
});