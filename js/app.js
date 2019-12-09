//alert ("hola porque tan bola");
$(document).on("submit", ".form_registro", function(event){
    event.preventDefaul();
    var $Form = $(this);
    var data_form = {
        correo =$("input[type]='correo'", $Form).val(),
        password =$("input[tipe]='password'", $Form).val()
    }
    
    if(data_form.correo.length < 16){
        $("#msg_error").text("Se necesita un correo valio").show();
        return false;
    }
    else if(data_form.password.length < 5 ){
        $("#msg_error").text("La contrase;a debe tener minimo5 caracteres").show();
        return false;
    }

    $("#msg_error").hide();
    var url_php = 'http://localhost/proyecto1/proyecto1/ajax/procesar_registro.php';

    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })

    .done(function ajaxDone(res){
        console.log(res); 
        if(res.error !== undefined){
             $("#msg_error").text(res.error).show();
             return false;
        } 
 
        if(res.redirect !== undefined){
         window.location = res.redirect;
     }
     })
     .fail(function ajaxError(e){
         console.log(e);
     })
     .always(function ajaxSiempre(){
         console.log('Final de la llamada ajax.');
     })
     return false;

    

    //console.log ("Form enviado.");
})