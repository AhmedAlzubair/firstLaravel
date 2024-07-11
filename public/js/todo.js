
jQuery(document).ready(function($){
$('.dataForm').on('submit',function (e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
//     var iddelete2=$(this).attr('offercsrf');
//    var formData = {
//     "_token":iddelete2,
//     "name_ar": jQuery('#name_ar').val(),
//     "name_en": jQuery('#name_en').val(),
//     "price": jQuery('#price').val(),
//     "detail_ar": jQuery('#detail_ar').val(),
//     "detail_en": jQuery('#detail_en').val(),
//     "photo": jQuery('#photo').val(),
// };
    var type = "POST";
   // var formData2= new FormData($('#dataForm')[0]);
    var urll=$('.dataForm').attr('urll');
    $.ajax({
        type: type,
        enctype:"multipart/form-data",
        url: urll ,
        data:jQuery('.dataForm').serialize(),
        dataType: 'json',
        processData:false,
        contentTaype:false,
        // caches:false,
        success: function (data) {
          if(data.statuse==true)
          $('#btn-mes').show();
        //  $('.offer'+data.id).add;
        },
        error: function (data) {
           // console.log(data);
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
// var state = jQuery('#saveData').val();
//jQuery('#dataForm').serialize()
