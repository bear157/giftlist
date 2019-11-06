$(document).ready(function()
{
    $(".simple-datatable").DataTable({
        "fixedHeader": true, 
        "info": false, 
        "ordering": false, 
        "lengthChange": false 
    }); 

    $("[data-toggle='tooltip']").tooltip(); 

    $(".alert").fadeTo(3000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });

    $(".star_ranking").rating({
        hoverOnClear: false,
        theme: 'krajee-fas',
        containerClass: 'is-star', 
        showCaption: false, 
        showClear: false, 
        size: "sm"
    });



}); 

//========= preview image before upload =========//
function readURL(input, image_id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+image_id).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
