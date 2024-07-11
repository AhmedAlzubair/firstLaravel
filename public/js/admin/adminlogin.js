
jQuery(document).ready(function($){
    $('#dataForm').on('submit',function (e){
        e.preventDefault();
        var type = "POST";
        var formData2= new FormData($('#dataForm')[0]);
        $.ajax({
            type: type,
            enctype:"multipart/form-data",
            url: 'admincheckAge' ,
            data:jQuery('#dataForm').serialize(),
            dataType: 'json',
            processData:false,
            contentTaype:false,
            // caches:false,
            success: function (data) {
            // if(data.statuse==true)

            //  return redirect().route('admin');
             // $('#btn-mes').show();
            },
            error: function (data) {
               // console.log(data);
            }
        });
    });
    });