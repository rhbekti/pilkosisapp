<script>
    $(document).ready(function() {
        
        load_pesan();
        function load_pesan()
        {
            $.ajax({
                url : "<?= site_url('/Chat/user_list');?>",
                method : 'post',
                dataType : 'json',
                async : false,
                success : function(data){
                    $.each(data,function(i,item){
                        $('#tbluser').append(`
                        <tr>
                        <td>`+item.nama+`</td>
                        <td><i class="`+item.icon+`"></i></td></tr>`);
                    });
                } 
            })
        }
        
        $('#kirim').click(function() {

            var pesan = {
                nama : $('#nama').val(),
                pesan: $('#pesan').val()
            }
            $.ajax({
                type: "post",
                url: "<?= base_url('/Chat/submit_pesan'); ?>",
                data: pesan,
                dataType: 'json',
                cache: false,
                success: function(data) {
                    console.log(data);
                    $('#pesan').val('');

                    if (data.success == true) {
                        // var socket = io.connect('http://' + window.location.hostname + ':3000');
                        // $('#chatku').append('Oke');
                        
                        $('#chatku').append(`<div class="row mt-2">
                        <div class="col-2  text-center">
                            <img src="<?= base_url('/assets/images/');?>default.png" class="img-fluid rounded-circle" alt="foto" style="width: 40px;height:40px;">
                        </div>
                        <div class="col-10">
                            <ul class="list-group" id="chatanku">
                                <li class="list-group-item border-0 bg-success text-white">
                                <p>`+data.nama+`</p>
                                `+data.pesan+`
                                </li>
                            </ul>
                        </div>
                    </div>`);
                        $('#notif_audio')[0].play();
                        $("#chatku").stop().animate({ scrollTop: $("#chatku")[0].scrollHeight}, 1000);
                        // socket.emit('new_message', {
                        //     pesan: data.pesan
                        // });
                    } else if (data.success == false) {
                        $('#nama').val(data.nama);
                        $('#pesan').val(data.pesan);
                    }
                },
                error: function(xhr, status, error) {
                    alert(error);
                },
            });

        });
        // var socket = io.connect('http://' + window.location.hostname + ':3000');

        // socket.on('new_count_message', function(data) {

        //     $("#new_count_message").html(data.new_count_message);
        //     $('#notif_audio')[0].play();

        // });
        // socket.on( 'new_message', function( data ) {
        
        // $( "#chatanku" ).prepend(`<li class="list-group-item border-0 bg-success text-white">
        //                         <p>`+data.nama+`</p>
        //                         `+data.pesan+`
        //                         </li>`);
        // $( "#no-message-notif" ).html('');
        // $( "#new-message-notif" ).html('<div class="alert alert-success" role="alert"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>New message ...</div>');
        // });
    });
</script>
</body>

</html>