$(document).ready(function() {

    $('#file').change(function() {
        if (this.files.length > 0) {
            $('#upload-button').prop('disabled', false).css('opacity', 1);
            } else {
            $('#upload-button').prop('disabled', true).css('opacity', 0.5);
            }
    });

    $('#upload-form').submit(function(e){

        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: 'upload_ajax.php',
            data: formData,
            cache: false,
            contentType: false, // Fixed typo
            processData: false,
            success: function(response) {
                $('#status').html(response); // Display actual response from PHP
            },
            error: function() {
                $('#status').html("Terjadi kesalahan saat mengunggah file");
            }
        });

    });

});
