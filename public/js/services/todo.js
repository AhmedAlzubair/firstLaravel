
jQuery(document).ready(function($){
$('.savebtn').on('click',function (e){
    e.preventDefault();
    var type = "POST";
    var iddelete=$(this).attr('offerid');
    var iddelete2=$(this).attr('offercsrf');
    var urll=$(this).attr('url');
    var formData2= new FormData($('#dataForm')[0]);
    var urll=$(this).attr('url');
    $.ajax({
        type: type,
        enctype:"multipart/form-data",
        url: urll ,
        data:jQuery('#dataForm').serialize(),
        dataType: 'json',
        processData:false,
        contentTaype:false,
        // caches:false,
        success: function (data) {
          if(data.statuse==true)
          $('#btn-mes').show();
         $('.offer').append('<tr> <td>'+data.id+'</td> <td>'+data.name+'</td> </tr>');
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
