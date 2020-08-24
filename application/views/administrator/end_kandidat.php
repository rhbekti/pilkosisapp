<script src="<?=base_url()?>/assets/sbadmin/vendor/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // visi
    $('#visi').summernote({
      height: 200,
      toolbar: [    
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],      
        ['insert']
      ]
    });
    $('#proker').summernote({
      height: 200,
      toolbar: [    
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],       
        ['insert']
      ]
    });
    $('#misi').summernote({
      height: 200,
      toolbar: [    
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],       
        ['insert',['p']]
      ]
    });
    $('#riwayat').summernote({
      height: 200,
      toolbar: [    
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],       
        ['insert',['p']]
      ]
    });
  })
</script>
<script>

    $('document').ready(function(){
        // fungsi untuk load data 
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
                var t = $("#tblkandidat").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#tblkandidat_filter input')
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
                    ajax: { "url": "<?php echo base_url().'index.php/admin/Kandidat/get_data'?>", 
                            "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },
                        {"data": "id"},
                        {"data": "gambar"},
                        {"data": "ketua"},
                        {"data": "wakil"},
                        {"data": "visi"},
                        {"data": "misi"},
                        {"data": "jumlah_suara"},
                        {"data" : "edit"},
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
                var rh = $("#tblbiodata").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#tblbiodata_filter input')
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
                    ajax: { "url": "<?php echo base_url().'index.php/admin/Kandidat/get_data_kandidat'?>", 
                            "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },
                        {"data": "gambar"},
                        {"data": "nama"},
                        {"data": "tanggal"},
                        {"data": "namakelas"},
                        {"data": "alamat"},
                        {"data": "sosmed"},
                        {"data": "riwayat"},
                        {"data" : "edit"},
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

                // tombol hapus
                $('#tblkandidat').on('click','.hapus_data',function(){
                    var id = $(this).data('no');
                    var foto = $(this).data('foto');
                    $('#Modalhapus').modal('show');
                    $('[name="no"]').val(id);
                    $('[name="foto"]').val(foto);
                });
                // tombol hapus
                $('#tblbiodata').on('click','.hapus_data',function(){
                    var id = $(this).data('id');
                    var foto = $(this).data('foto');
                    $('#Modalhapusbio').modal('show');
                    $('[name="id"]').val(id);
                    $('[name="foto"]').val(foto);
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
                        text  : 'Data Gagal '+det,
                        type : 'error'
                    });
                }
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
    });
</script>
</body>
</html>