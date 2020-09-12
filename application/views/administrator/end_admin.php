<script>
    $(document).ready(function() {
        load_total();
        grafik_suara();
        persen_pemilih();
        total_suara_masuk();
        belum_memilih();
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
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
            ajax: {
                "url": "<?php echo base_url() . 'index.php/admin/Data_user/get_data' ?>",
                "type": "POST"
            },
            columns: [{
                    "data": "id",
                    "orderable": false
                },
                {
                    "data": "nama"
                },
                {
                    "data": "username"
                },
                {
                    "data": "level"
                },
                {
                    "data": "status"
                },
                {
                    "data": "edit"
                },
                {
                    "data": "hapus"
                }
            ],
            order: [
                [0, 'asc']
            ],
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
            format: "DD-MM-YYYY",
            useCurrent: false
        });
        $('#tgltutupform').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
            format: "DD-MM-YYYY",
            useCurrent: false
        });
        $('#jambukaform').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
            format: "HH:mm:ss",
            useCurrent: false
        });
        $('#jamtutupform').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
            format: "HH:mm:ss",
            useCurrent: false
        });
        //sweet alert
        const Aksi = $('.flashdata').data('aksi');
        const det = $('.infoaksi').data('info');
        if (Aksi == 'sukses') {
            Swal.fire({
                title: 'Informasi',
                text:  det,
                type: 'success'
            });
        } else if (Aksi == 'error') {
            Swal.fire({
                title: 'Informasi',
                text: det,
                type: 'error'
            });
        }
        $.ajax({
            url: "<?= site_url('/admin/Pilkosis/get_setting'); ?>",
            method: 'post',
            async: false,
            dataType: 'json',
            success: function(respon) {
                $.each(respon, function(i, data) {
                    $('#list-setting').append(`
                <tr>
                <td>` + data.id + `</td>
                <td>` + data.tglawal + `</td>
                <td>` + data.tglakhir + `</td>
                <td>` + data.jambuka + `</td>
                <td>` + data.jamtutup + `</td>
                <td>` + data.nama + `</td>
                <td><a href="<?= site_url('/admin/Pilkosis/hapus/') ?>` + data.id + `" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a></td>
                </tr>`);
                });
            }
        });

        function load_total() {
            $.ajax({
                url: "<?= site_url('/admin/kandidat/total_kandidat'); ?>",
                method: 'post',
                async: false,
                dataType: 'json',
                success: function(respon) {
                    $('#total-kandidat').html(respon);
                }
            });
        }
        function persen_pemilih()
        {
            $.ajax({
                url : "<?=site_url('/admin/Dashboard/get_persen_pemilih');?>",
                method : 'post',
                async : false,
                dataType : 'json',
                success : function(r){
                    var dt = r.toFixed(0);
                    $('#persen-pemilih').html(dt);
                }
            })
        }
        function belum_memilih()
        {
            $.ajax({
                url : "<?=site_url('/admin/Dashboard/belum_memilih');?>",
                method : 'post',
                async : false,
                dataType : 'json',
                success : function(r){
                    $('#belum-memilih').html(r);
                }
            })
        }
        function total_suara_masuk()
        {
            $.ajax({
                url : "<?=site_url('/admin/Dashboard/get_jumlah_suara')?>",
                method : 'post',
                async : false,
                dataType : 'json',
                success : function(rh){
                    $.each(rh,function(i,item){
                        $('#total-suara-masuk').html(item.total_suara);
                    });
                }
            });
        }
        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        function grafik_suara() {
            var id = [];
            var perolehan = [];
            $.ajax({
                url: "<?= site_url('/admin/Dashboard/get_total_suara'); ?>",
                method: 'post',
                async: false,
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(i, item) {
                        id.push(item.id);
                        perolehan.push(item.jumlah_suara);
                    });


                    var ctx = document.getElementById("grafik-suara");
                    var myLineChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: id,
                            datasets: [{
                                label: "Jumlah Suara ",
                                lineTension: 0.3,
                                backgroundColor: "rgba(78, 115, 223, 0.05)",
                                borderColor: "rgba(78, 115, 223, 1)",
                                pointRadius: 3,
                                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                pointBorderColor: "rgba(78, 115, 223, 1)",
                                pointHoverRadius: 3,
                                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                                data: perolehan,
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 25,
                                    top: 25,
                                    bottom: 0
                                }
                            },
                            scales: {
                              xAxes: [{
                                time: {
                                  unit: 'date'
                                },
                                gridLines: {
                                  display: false,
                                  drawBorder: false
                                },
                                ticks: {
                                  maxTicksLimit: 7
                                }
                              }],
                              yAxes: [{
                                ticks: {
                                  maxTicksLimit: 5,
                                  padding: 10,
                                  callback: function(perolehan, index, values) {
                                    return + number_format(perolehan);
                                  }
                                },
                                gridLines: {
                                  color: "rgb(234, 236, 244)",
                                  zeroLineColor: "rgb(234, 236, 244)",
                                  drawBorder: false,
                                  borderDash: [2],
                                  zeroLineBorderDash: [2]
                                }
                              }],
                            },
                            legend: {
                                display: false
                            },
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                titleMarginBottom: 10,
                                titleFontColor: '#6e707e',
                                titleFontSize: 14,
                                borderColor: '#00a3cc',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                intersect: false,
                                mode: 'index',
                                caretPadding: 10,
                                callbacks: {
                                    label: function(tooltipItem, chart) {
                                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                        return datasetLabel + number_format(tooltipItem.yLabel);
                                    }
                                }
                            }
                        }
                    });
                }
            });
        }
    });
</script>
</body>

</html>