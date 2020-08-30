<script>
    $(document).ready(function() {
        
        $.ajax({
            url: "<?= site_url('/Voting/get_data_kandidat'); ?>",
            method: 'post',
            dataType: 'json',
            async: false,
            success: function(data) {
                $.each(data, function(i, item) {
                    $('#kartu-kandidat').append(`<div class="col-12 col-md-3 text-center">
                    <figure class="figure">
                        <img src="<?=base_url('/uploads/images/');?>`+item.foto+`" class="figure-img img-fluid rounded">
                        <figcaption class="figure-caption text-center">
                            <h5>`+item.ketua+`</h5>
                            <h5>`+item.wakil+`</h5>
                            <p>Paslon `+item.id+`</p>
                        </figcaption>
                        <a href="<?=site_url('/Voting/detail/')?>`+item.id+`" class="btn btn-primary w-100">Lihat</a>
                        <form action="<?=site_url('/Voting/pilihanku/')?>" method="post">
                        <input type="hidden" name="vote" value="`+item.id+`">
                        <input type="hidden" name="user_id" value="`+<?=$user['id']?>+`" required>
                        <button type="submit" name="submit" class="btn btn-success mt-2 w-100">Vote</button></form>
                    </figure>
                </div>`);

                });
            }
        });
    });
</script>
</body>

</html>