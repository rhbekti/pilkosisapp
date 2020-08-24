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
                var t = $("#tbluser").dataTable({
                    dom: '<"top"if>rt<"bottom"p>',
                    initComplete: function() {
                        var api = this.api();
                        $('#tbluser_filter input')
                            .off('.DT')
                            // melakukan proses ketika ada input otomatis
                            .on('input.DT', function() {
                                api.search(this.value).draw();
                            });
                    },
                    oLanguage: {
                        sProcessing: "<div class='spinner-grow text-success'></div>"
                    },
                    processing: true,
                    serverSide: true, 
                    searching: true,
                    ajax: { "url": "<?php echo base_url().'index.php/admin/Data_user/get_data'?>", 
                            "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },
                        {"data": "nama"},
                        {"data": "username"},
                        {"data": "level"},
                        {"data": "status"},
                        {"data": "edit"},
                        {"data": "hapus"}
                    ],
                    order: [[0, 'asc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
    
    $('#tglmulaiform').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        },
        format : "DD-MM-YYYY",
        useCurrent : false
    });
    $('#tgltutupform').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        },
        format : "DD-MM-YYYY",
        useCurrent : false
    });
    $('#jambukaform').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        },
        format : "HH:mm:ss",
        useCurrent : false
    });
    $('#jamtutupform').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        },
        format : "HH:mm:ss",
        useCurrent : false
    });
     //sweet alert
     const Aksi = $('.flashdata').data('aksi');
                const det = $('.infoaksi').data('info');
                if(Aksi == 'sukses'){
                    Swal.fire({
                        title : 'Data Kandidat',
                        text : 'Data Berhasil '+det,
                        type: 'success'
                    });   
                }else if(Aksi == 'error'){
                    Swal.fire({
                        title : 'Data Kandidat',
                        text  : det,
                        type : 'error'
                    });
                }
    $.ajax({
        url : "<?=site_url('/admin/Pilkosis/get_setting');?>",
        method : 'post',
        async : false,
        dataType : 'json',
        success : function(respon){
            $.each(respon,function(i,data){
                $('#list-setting').append(`
                <tr>
                <td>`+data.id+`</td>
                <td>`+data.tglawal+`</td>
                <td>`+data.tglakhir+`</td>
                <td>`+data.jambuka+`</td>
                <td>`+data.jamtutup+`</td>
                <td>`+data.nama+`</td>
                <td><a href="<?=site_url('/admin/Pilkosis/hapus/')?>`+data.id+`" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a></td>
                </tr>`);
            });
        }
    });
});
</script>
</body>
</html>