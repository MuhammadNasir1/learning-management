</div>
<script src="https://kit.fontawesome.com/b6b9586b26.js" crossorigin="anonymous"></script>
<script src="{{ asset('javascript/jquery.js') }}"></script>
<script src="{{ asset('javascript/canvas.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
    integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ asset('DataTables/DataTables-1.13.8/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('javascript/script.js') }}"></script>

@if (session()->get('locale') == 'zh')
    <script>
        $(document).ready(function() {
            // $('#datatable').DataTable();

            //Spanish
            $('#datatable').DataTable({
                "language": {
                    "sProcessing": "加工...",
                    "sLengthMenu": "第 _MENU_ 位",
                    // "sZeroRecords":   "No se encontraron resultados",
                    // "sZeroRecords":   "No se encontraron resultados",
                    "sEmptyTable": "表中没有可用数据",
                    "sInfo": "第 _START_ 至 _END_ 位 合共 _TOTAL_ 位",
                    "sInfoEmpty": "第 _START_ 至 _END_ 位 合共 _TOTAL_ 位",
                    // "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "搜尋:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "加载中...",
                    "oPaginate": {
                        "sFirst": "第一的",
                        "sLast": "最后的",
                        "sNext": "下一頁",
                        "sPrevious": "上一頁"
                    },
                    // "oAria": {
                    //     "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    //     "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    // }
                }
            });
        });
    </script>
@else
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endif
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').select2({
            width: '100%'
        });
        $('#Items_dropdown').select2({
            minimumResultsForSearch: Infinity
        });
    });
</script>

</body>

</html>
