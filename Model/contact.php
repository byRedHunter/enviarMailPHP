<?php
    $nombre = $_POST['nombre'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    // Las 2 primeras lineas habilitan el informe de errores
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );

    // de quien es el mensaje
    $from = $correo;
    // para quien es el mensaje
    $to = "jhonny.quispejl@gmail.com";
    // asunto del mensaje
    $subject = "Mensaje de Contácto !IMPORTANTE!";
    // cual es el mensaje
    $mensaje = "
        <html>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Prueba de Correo</title>
        
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
        
                .container {
                    widht: 98%;
                    max-width: 1000px;
                    margin: 0 auto;
                    padding: 10px;
                }
        
                body {
                    font-size: 16px;
                    color: #222;
                }
        
                h1 {
                    text-align: center;
                    color: #324785;
                    background-color: #e78624;
                    padding: 15px;
                    border-radius: 8px;
                }
        
                p {
                    padding: 5px;
                    margin-top: 10px;
                }
        
                b {
                    display: block;
                    margin-bottom: 10px;
                    text-align: center;
                }
        
                .linea {
                    height: 3px;
                    width: 100%;
                    background: #ed88df
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Hola $nombre</h1> 
        
                <p> 
                    <b>Bienvenidos a mi correo electrónico de prueba</b> 
                </p> 
        
                <div class='linea'></div>
        
                <p>
                    $mensaje
                </p>
        
                <p>
                    Puedes contactar conmigo a: $celular
                </p>
            </div>
        </body>
        </html>
    ";
    //para el envío en formato HTML 
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // More headers
    $headers .= "From: <$correo>" . "\r\n";
    $headers .= "Cc: $to" . "\r\n";

    // esta funcion ejecuta el correo PHP
    $sendMail = mail($to, $subject, $mensaje, $headers);

    if( $sendMail ) {
        echo "Mensaje Enviado 😉";
    } else {
        echo "Hubo un problema al enviar su mensaje. Intentélo mas terde.";
    }
?>