<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="container">
        <h1>Hola $nombre</h1> 

        <p> 
            <b>Bienvenidos a mi correo electrónico de prueba</b> 
        </p> 

        <div class="linea"></div>

        <p>
            $mensaje. 
        </p>

        <p>
            Puedes contactar conmigo a: $celular
        </p>
    </div>
</body>
</html>