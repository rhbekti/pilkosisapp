<!-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script> -->
<script>
    $(document).ready(function() {
        show_chat();
        function show_chat() {
            $.ajax({
                url: "<?= site_url('/admin/Chat/get_chat'); ?>",
                method: 'post',
                async: true,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                   if(data.length > 0){
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<div class="row mt-3">' +
                            '<div class="col-2 col-md-2 text-center">' +
                            '<img src="<?= base_url('/uploads/images/'); ?>'+data[i].foto+'" class="img-fluid rounded-circle" style="height:50px;width:50px;">' +
                            '</div>' +
                            '<div class="col-10 col-md-10">'+
                            '<div class ="alert alert-success"  role="alert">'+
                            '<p>'+data[i].nama+'</p>'+
                            '<p>'+data[i].pesan+'</p>'+
                            '<hr>'+
                            '<small>'+data[i].waktu+'</small>'+
                            '</div>'+
                        '</div>' +
                        '</div>'
                    }
                    $('#total-pesan').val(data.length);
                    $('#chatku').html(html);
                   } else{
                       $('#chatku').html('<div class ="alert alert-success"  role="alert">'+
                            '<p class="text-center">Belum ada Chat</p>'+
                            '</div>');
                   }
                }
            });
        }

        
        function kirim_chat()
        {
            var pesan = {
                nama : $('#nama').val(),
                pesan: $('#pesan').val()
            }
            $.ajax({
                url : "<?=site_url('/admin/Chat/submit_pesan');?>",
                method : 'POST',
                data : pesan,
                async: true,
                dataType: 'json',
                cache: false,
                success : function(data){
                    console.log(data);
                    if (data.success == true) {
                        $('#chatku').append(`<div class="row mt-2">
                        <div class="col-2 text-center">
                            <img src="<?= base_url('/uploads/images/');?>`+data.foto+`" class="img-fluid rounded-circle" alt="foto" style="width: 40px;height:40px;">
                        </div>
                        <div class="col-10">
                            <div class ="alert alert-success"  role="alert">
                                <p>`+data.nama+`</p>
                                `+data.pesan+`
                                <hr>
                                <small>`+data.waktu+`</small>
                            </div>
                        </div>
                    </div>`);
                        $('#notif_audio')[0].play();
                        $("#chatku").stop().animate({ scrollTop: $("#chatku")[0].scrollHeight}, 1000);
                        
                        $('#pesan').val("");
                    } else if (data.success == false) {
                        $('#nama').val(data.nama);
                        $('#pesan').val(data.pesan);
                    }
                    
                }
            });
        }
        $('#tombol-kirim').on('click',function(){
            kirim_chat();
        });
        $('#pesan').on('keyup',function(e){
            if(e.keyCode === 13){
                kirim_chat();
            }
        });
        function pesan_baru()
        { 
            var pesan = $('#total-pesan').val();
            
            $.ajax({
                url : "<?=site_url('/admin/Chat/total_pesan');?>",
                method : 'post',
                async : true,
                dataType : 'json',
                success : function(data)
                {
                    console.log(data);
                    if(data > pesan)
                    {
                        $('#notif_audio')[0].play();
                        show_chat();
                        $("#chatku").stop().animate({ scrollTop: $("#chatku")[0].scrollHeight}, 1000);
                        
                    }
                }
            });
        }
        setInterval(pesan_baru,1000);
    });
</script>