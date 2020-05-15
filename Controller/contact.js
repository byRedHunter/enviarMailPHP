/* --Validamos el campo nombre para que no puedan ingresar numeros */
$('#nombre').keyup(function (e) { 
    let valorNombre = e.target.value

    $('#nombre').val(valorNombre
        // no permitimos que ingrese numeros
        .replace(/[0-9]/g, ''))
})

/* --Validamos el campo celular para no poder ingresar letras */
$('#celular').keyup(function (e) {
    let valorCelular = e.target.value
    
    /* --Verificamos que el campo del celular sea menor a 12 */
    if( valorCelular.length < 12 ) {
        $('#celular').val(valorCelular
            // eliminamos espacio en blanco
            .replace(/\s/g, '')
            // eliminamos las letras
            .replace(/\D/g, '')
            // ponemos un espacio cada 3 numeros
            .replace(/([0-9]{3})/g, '$1 ')
            // eliminamos el ultimo espacio
            .trim())

        valorFinal = valorCelular
    } else {
        /* --Si no cumple, cortamos el valor en 11 caracteres */
        let valorFinal = $('#celular').val().slice(0, 11)
        /* --Lo asignamos al campo celular */
        $('#celular').val(valorFinal)
    }
})

/* --Validamos el campo correo */
$('#correo').keyup(function (e) { 
    let valorCorreo = e.target.value

    $('#correo').val(valorCorreo
    //eliminar los espacios
    .replace(/\s/g, '')
    //convertimos las mayusculas en minusculas
    .toLowerCase()
    //elimina el ultimo espaciado
    .trim())
})

/* --Evento submit para el formulario */
$('#form-contacto').submit(function (e) { 
    /* --Cancelamos que el formulario recargue cuando presiones el boton enviar */
    e.preventDefault()

    // creamos la expresion que nos ayudara a validar la estructura del correo
    let expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/

    /* --Verificamos que los campos no esten vacios */
    if( $('#nombre').val() == '' || $('#celular').val() == '' || $('#correo').val() == '' || $('#mensaje').val() == '' ) {
        swal("Uhmmnnn...!!! 🤔", "Asegúrese de completar todos los datos", "warning")
    /* --Validamos la estructura del correo */
    } else if( !expresion.exec($('#correo').val()) ) {
        swal("Que mal !!! 😕", "Asegurese de escribir bien su email", "error")
    /* --Si cumplen todas las condicionales enviaremos los datos */
    } else {

        $.ajax({
            url: "Model/contact.php",
            type: "POST",
            dataType: "json",
            /* captura los datos del formulario */
            data: $(this).serialize(),
            /* antes de enviar hacemos... */
            beforeSend: function() {
                // que el nombre del boton cambie a Validando...
                $('#enviar').val('Enviando...')
            },
            success: function(response) {
                if(response.responseText === 'Mensaje Enviado 😉') {
                    swal("Genial!!! 😁", response.responseText, "success")
                    $('#form-contacto')[0].reset()
                } else {
                    swal("Uhmmnnn...!!! 🤔", response.responseText, "warning")
                }
            },
            error: function(response) {
                if(response.responseText === 'Mensaje Enviado 😉') {
                    swal("Genial!!! 😁", response.responseText, "success")
                    $('#form-contacto')[0].reset()
                } else {
                    swal("Uhmmnnn...!!! 🤔", response.responseText, "warning")
                }
            }
        })

    }       
})