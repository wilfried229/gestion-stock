<script type="application/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgLogoCentreInteret').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    // on input
    $("#inputFileLogoCentreInteret").change(function(){
        readURL(this);
        updateBackgroundImage();
    });

    function updateBackgroundImage() {
        $('#imgLogoCentreInteret').removeClass('d-none');
        $('#bgImgLogoCentreInteret').css('background-color', $('#color').val());

        $('#nomCentreInteretDisplay').css('background-color', $('#color').val());
        $('#nomCentreInteretDisplay').css('opacity', 0.8);
        $('#nomCentreInteretDisplay').html($('#nom').val() || 'Nom du centre');
    }

    $('#color').on('input', function (){
        updateBackgroundImage();
    });
    $('#nom').on('input', function (){
        updateBackgroundImage();
    });
</script>
