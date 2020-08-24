<script>
    $(document).ready(function() {
        $.ajax({
            url: "<?= site_url('/admin/Kandidat/get_data'); ?>",
            method: 'post',
            dataType: 'json',
            async: false,
            success: function(respon) {
                let data = respon.data;
                $.each(data, function(i, item) {
                    $('#kartu-kandidat').append(`<div class="col-6 col-sm-4 col-md-3 text-center">
                    <figure class="figure">
                        <img src="<?=base_url('/uploads/images/');?>`+item.foto+`" class="figure-img img-fluid rounded">
                        <figcaption class="figure-caption text-center">
                            <h5>`+item.ketua+`</h5>
                            <h5>`+item.wakil+`</h5>
                            <p>Paslon `+item.id+`</p>
                        </figcaption>
                        <a href="<?=site_url('/Voting/detail/')?>`+item.id+`" class="btn btn-primary">Lihat</a>
                    </figure>
                </div>`);

                });
            }
        });
    });
</script>
</body>

</html>