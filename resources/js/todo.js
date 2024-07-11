
jQuery(document).ready(function($){

    //----- Open model CREATE -----//
    // jQuery('#btn-add').click(function () {
    //     jQuery('#btn-save').val("add");
    //     jQuery('#myForm').trigger("reset");
    //     jQuery('#formModal').modal('show');
    // });

    // CREATE
    // $("#btn-save").onclick()
    jQuery("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var state = jQuery('#saveData').val();
        var type = "POST";
        var btn_mes = jQuery('#btn-mes').val();
        var ajaxurl = "{{route('ajxFstore')}}";
        $.ajax({
            type: type,
            enctype:"multipart/form-data",
            url: ajaxurl,
            data: formData2,
            dataType: 'json',
            success: function (data) {
              if(data.statuse==true)
              state.show();
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});

// var formData = {
//     name_ar: jQuery('#name_ar').val(),
//     name_en: jQuery('#name_en').val(),
//     price: jQuery('#price').val(),
//     detail_ar: jQuery('#detail_ar').val(),
//     detail_en: jQuery('#detail_en').val(),
//     photo: jQuery('#photo').val(),
// };
// var formData2= new FormData($('#dataForm')[0]);