$('form').submit(function(){
    var form = $(this);
    var error = false;
    form.find('input[type=text]').css('border-color', '#dcdcdc');
    form.find('input[type=text]').each(function(){
        if($(this).val() == ''){
            $(this).css('border-color', '#ff0a22');
            error = true;
        }
    });
    if(!error){
        var data = form.serialize();
        var $processData = true,
            $contentType = 'application/x-www-form-urlencoded';
        $.ajax({
            type: 'POST',
            processData: $processData,
            contentType: $contentType,
            url: 'sendmail.php',
            data: data,
            success: function(data){if (data['error']){alert(data['error']);}else{
                    $.arcticmodal('close');
                    $('#thanks').arcticmodal({
                        overlay    :{ 
                            css:{
                                opacity: 0.8
                            } 
                        }
                    });
                    form[0].reset();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {alert(xhr.status);alert(thrownError);},
            complete: function(data) {form.find('input[type="submit"]').prop('disabled', false);}         
        });
    }
    return false;     
});
});