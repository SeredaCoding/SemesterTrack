</div> <!-- fecha container -->

<!-- Bootstrap JS via CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables CSS e JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    // Inicializa DataTables
    $('#tabela-avaliacoes').DataTable({
        "paging": true,
        "searching": false,
        "ordering": true,
        "dom": 't<"d-flex justify-content-between mt-2"lp>', // <--- length + pagination embaixo
        "language": {
            "emptyTable": "Nenhum registro encontrado",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(filtrado de _MAX_ registros no total)",
            "lengthMenu": "Mostrar _MENU_ registros",
            "loadingRecords": "Carregando...",
            "processing": "Processando...",
            "zeroRecords": "Nenhum registro correspondente encontrado",
            "paginate": {
                "first": "Primeiro",
                "last": "Último",
                "next": "Próximo",
                "previous": "Anterior"
            }
        }
    });

    // Clique na linha para abrir o modal (delegação de evento)
    $('#tabela-avaliacoes tbody').on('click', 'tr.linha-editavel', function() {
        $('#edit-id').val($(this).data('id'));
        $('#edit-curso').val($(this).data('curso'));
        $('#edit-avaliacao').val($(this).data('avaliacao'));
        $('#edit-data_inicio').val($(this).data('data_inicio'));
        $('#edit-data_fim').val($(this).data('data_fim'));
        $('#edit-pontos').val($(this).data('pontos'));
        $('#edit-status').val($(this).data('status'));
        $('#edit-nota').val($(this).data('nota'));

        // Abrir modal
        var modal = new bootstrap.Modal(document.getElementById('modalEditar'));
        modal.show();
    });

});
</script>


</body>
</html>
