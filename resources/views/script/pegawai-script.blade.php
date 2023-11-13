<script type="text/javascript">
    console.log("script pegawai running");

    $(document).ready(function() {
        if ($('#toastNotification').hasClass("show")) {
            if ($('#toast-header').hasClass("text-success")) {
                setTimeout(function() {
                    $('#toastNotification').toast('hide');
                }, 2000);
            }

            if ($('#toast-header').hasClass("text-danger")) {
                setTimeout(function() {
                    $('#toastNotification').toast('hide');
                }, 10000);
            }
        }
    });

    $(document).on('click', '#hapusPegawai', function() {
        let id = $(this).attr('data-id');
        let nama = $(this).attr('data-nama');
        $('#id_hapus').val(id);
        $('#nama_hapus').val(nama);
    });
</script>
