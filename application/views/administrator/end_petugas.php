<script>
$(document).ready(function(){
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };
                var table = $("#tblpetugas").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#tblpetugas_filter input')
                    .off('.DT')
                    .on('input.DT', function() {
                        api.search(this.value).draw();
                    });
            },
            oLanguage: {
                sProcessing: "Tunggu Bentar"
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "<?= site_url('/admin/Petugas/get_data'); ?>",
                "type": "POST"
            },
            columns: [
                {
                    "data": "id",
                    "orderable" : false
                },
                {
                    "data": "nama"
                },
                {
                    "data" : "nama_level"
                },
                {
                    "data" : "foto"
                },
                {
                    "data" : "hapus"
                }

            ],
            order: [
                [2, 'asc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }

        });
        // end setup datatables
        $('#tblpetugas').on('click','.btn-hapus',function(){
            var id = $(this).data('id');
            $('#Modalhapus').modal('show');
            $('[name="idpetugashapus"]').val(id);
        });
});
</script>
</body>
</html>