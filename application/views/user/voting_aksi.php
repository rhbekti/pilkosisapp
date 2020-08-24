<script>
    $(document).ready(function(){
        loadPaslon();
        // load data paslon
        function loadPaslon()
        {
            $.ajax({
                url : "<?=site_url('/Voting/get_data_paslon');?>",
                type : 'get',
                async : false,
                dataType : 'json',
                success : function(respon){
                    $.each(respon,function(i,data){
                        $('#daftar-paslon').append('<div class="col-12 col-md-3"><div class="card text-center"><div class="card-body"><img src="<?=base_url();?>/uploads/images/'+data.foto+'" alt="foto" class="img-fluid"><p>'+data.nama+'</p><button class="detail-paslon btn btn-primary" type="button" data-idpaslon="'+data.id+'" data-nama="'+data.nama+'" data-visi="'+data.visi+'" data-misi="'+data.misi+'" data-proker="'+data.proker+'">Lihat</button><button class="btn-vote btn btn-success" data-idpaslon="'+data.id+'">Vote</button></div></div></div>');
                    });
                }
            });
        }
        // tombol detail paslon
        $('.detail-paslon').on('click',function(){
            let id = $(this).data('idpaslon');
            let nama = $(this).data('nama');
            let visi = $(this).data('visi');
            let misi = $(this).data('misi');
            let proker = $(this).data('proker');
            $('#modal-detail-paslon').modal('show');
            $('#nama-paslon').html(nama);
            $('#visi-paslon').html(visi);
            $('#misi-paslon').html(misi);
            $('#proker-paslon').html(proker);
        });
        $('.btn-vote').on('click',function(){
            let id = $(this).data('idpaslon');
            alert(id);
            
        });
    });
</script>
</body>

</html>