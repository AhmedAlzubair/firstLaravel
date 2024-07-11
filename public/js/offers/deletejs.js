jQuery(document).ready(function($){
    $('.btndelete').on('click',function (e){
        e.preventDefault();
        var type = "POST";
        var iddelete=$(this).attr('offerid');
        var iddelete2=$(this).attr('offercsrf');
        var urll=$(this).attr('url');
        $.ajax({
            type: type,
            enctype:"multipart/form-data",
            url: urll ,
            data: {
              '_token':iddelete2,
              'id':iddelete,
            },
            dataType: 'json',
            success: function (data) {
              if(data.statuse==true)
              $('#btn-mes').show();
              $('.offer'+data.id).remove();
            },
            error: function (data) {
               // console.log(data);
            }
        });
    });
    });