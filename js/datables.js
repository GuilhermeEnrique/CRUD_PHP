$(document).ready(function() {
    $('#listar-usuario').DataTable({
        "language": {
            "url": "./js/pt-BR.json"
        },
        "processing": true,
        "serverSide": true,
        "paging": true,
        "ordering": true,
        "info": true,
        "ajax": {
            "url": "proc_pesq_user.php",
            "type": "POST",
        },
    });
});