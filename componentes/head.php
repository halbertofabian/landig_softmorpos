<?php

// if (isset($_GET['ref'])) {
//     $_SESSION['ref'] = $_GET['ref'];
// }

// if (isset($_SESSION['ref'])) {
//     $registro = "registro.php?ref=" . $_SESSION['ref'];
//     $carrito = "carrito.php?ref=" . $_SESSION['ref'];
// } else {
//     $registro = "registro.php";
//     $carrito = "carrito.php";
// }
// if (isset($_GET['ref'])) {
//     $_SESSION['ref'] = $_GET['ref'];
// }

if (isset($_GET['ref'])) {
    $_SESSION['ref'] = $_GET['ref'];
}

if (isset($_SESSION['ref'])) {
    $registro = "registro?ref=" . $_SESSION['ref'];
    $carrito = "precios?ref=" . $_SESSION['ref'];
    $respuesta = file_get_contents(URL_SOFTMOR_POS . 'consultar-ref/' . $_SESSION['ref']);
    $datos = json_decode($respuesta, true);

    $cps = $datos['cps'];
} else {
    $registro = "registro";
    $carrito = "precios";
}

?>

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha384-EpkJPF1M9W5qAz3KprGh3J5eU6AKlTdhdwVGBC3tPQZvjoA9cqmzRnFRl1ArSXkU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="https://kit.fontawesome.com/f24eb69f99.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="./css/style-sp.css"> -->

    <!-- Agrega jQuery para el funcionamiento del wizard -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- <link rel="stylesheet" href="./css/checkout.css" /> -->
    <!-- <script src="https://js.stripe.com/v3/"></script> -->
    <link rel="stylesheet" href="./css/style-sp.css">


    <title>POS - Punto de venta #1 en México</title>
    <style>
        .c-pos {
            margin-top: 170px;
        }

        .text-pos-3 {
            font-size: 12px;
            color: #64748b;
            font-weight: 400;
        }

        .text-pos-4 {
            font-size: 18px;
            color: #0F172B;
            font-weight: 400;
        }

        .text-pos-2 {
            font-size: 22px;
            color: #0F172B;
            font-weight: 400;
        }

        .custom-list {
            list-style: none;
            /* Elimina los puntos de la lista */
        }

        .custom-list i {
            color: #005FF9;
            /* Cambia el color de los íconos */
            margin-right: 10px;
            /* Agrega un espacio entre el ícono y el texto */
        }

        /* Estilos generales para la lista */
        .list-register {
            display: flex;
            list-style: none;
            align-items: center;
            justify-content: center;
            text-align: center;
            /* Centra el texto horizontalmente */
        }

        .list-register li {
            gap: 5px;
            font-size: 16px;
            color: #fff;
            margin-right: 6px;
            display: flex;
            /* Para que los elementos estén en una fila */
            align-items: center;
        }

        .list-register img {
            display: inline;
        }

        /* Estilos para dispositivos móviles (ancho de pantalla <= 768px) */
        @media screen and (max-width: 768px) {
            .list-register {
                flex-direction: column;
                /* Cambia la dirección de la lista a columna */
            }

            .list-register li {
                margin-right: 0;
                /* Elimina el margen derecho para que los elementos estén alineados en el centro */
            }
        }



        /* Estilos para la animación del botón */
        .btn-primary {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Estilos para el fondo oscuro del footer */
        .dark-bg {
            background-color: #0F172B;
        }

        /* Estilos para el texto del footer */
        .footer-text {
            font-size: 14px;
            color: #777;
        }

        /* Estilos para el botón de WhatsApp */
        .whatsapp-btn {
            background-color: #25d366;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .whatsapp-btn:hover {
            background-color: #128c7e;
        }
    </style>
</head>