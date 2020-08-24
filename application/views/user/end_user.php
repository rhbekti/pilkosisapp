<script>
    $(document).ready(function(){
        const flashData = $('.flashdata').data('flashdata');
        if(flashData){
            Swal.fire({
                title : 'Pemberitahuan',
                text : flashData,
                type : 'error'
            });
        }
    });
</script>
</body>
</html>