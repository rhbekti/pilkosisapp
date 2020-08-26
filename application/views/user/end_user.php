<script>
    $(document).ready(function(){
        load_vote();
        function load_vote()
        {
            $.ajax({
                url : "<?=base_url('/Dashboard/get_data_vote');?>",
                method : 'post',
                async : false,
                dataType : 'json',
                success : function(respon){
                    $('#totalvote').html(respon);
                }
            });
        }
         //sweet alert
         const Aksi = $('.flashdata').data('aksi');
                const det = $('.infoaksi').data('info');
                if(Aksi == 'sukses'){
                    Swal.fire({
                        title : 'Informasi',
                        text : det,
                        type: 'success'
                    });   
                }else if(Aksi == 'error'){
                    Swal.fire({
                        title : 'Informasi',
                        text  : det,
                        type : 'error'
                    });
                }

    });
</script>
</body>
</html>