<?php
@session_start();
include_once 'config.php';
if (isset($_GET['ref'])) {
    $_SESSION['ref'] = $_GET['ref'];
}

if (isset($_SESSION['ref'])) {
    $registro = "registro.php?ref=" . $_SESSION['ref'];
    $carrito = "carrito.php?ref=" . $_SESSION['ref'];
    $respuesta = file_get_contents(URL_SOFTMOR_POS. 'consultar-ref/' . $_SESSION['ref']);
    $datos = json_decode($respuesta, true);
    $cps = $datos['cps'];
    
} else {
    $registro = "registro.php";
    $carrito = "carrito.php";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha384-EpkJPF1M9W5qAz3KprGh3J5eU6AKlTdhdwVGBC3tPQZvjoA9cqmzRnFRl1ArSXkU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://kit.fontawesome.com/f24eb69f99.js" crossorigin="anonymous"></script>
    <title>POS - Punto de venta #1 en México</title>
    <style>
        .c-pos {
            margin-top: 170px;
        }

        .text-pos-3 {
            font-size: 14px;
            color: #64748b;
            font-weight: 400;
        }

        .text-pos-4 {
            font-size: 20px;
            color: #0F172B;
            font-weight: 400;
        }

        .text-pos-2 {
            font-size: 28px;
            color: #0F172B;
            font-weight: 400;
        }

        .text-pos-1 {
            font-size: 40px;
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

        .form-check.form-switch {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* Estilos personalizados para la lista */
        ul {
            list-style: none;
            /* Quita los puntos por defecto */
        }

        li {
            margin-left: 1em;
            /* Agrega un margen a la izquierda para los iconos */
            position: relative;
            /* Permite posicionar el icono */
        }



        .recommended-header {
            position: absolute;
            top: 0;
            left: 50%;
            background-color: #007BFF;
            /* Fondo de color primario */
            color: white;
            /* Texto blanco */
            padding: 5px 10px;
            /* Espaciado interno para el encabezado */
            transform: translateX(-50%);
            /* Centra horizontalmente */
            border-radius: 5px;
            /* Bordes redondeados para el encabezado */
        }

        .card-recomendado {
            border: 2px solid #007BFF;
            /* Borde de color primario */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 20px;
            /* Espaciado interno */
            /* text-align: center; Alineación de texto al centro */
            position: relative;
            /* Para posicionar el encabezado */
        }

        .discount-circle {
            position: absolute;
            top: 10px;
            /* Ajusta la posición vertical */
            right: 10px;
            /* Ajusta la posición horizontal */
            width: 75px;
            /* Ancho del círculo */
            height: 75px;
            /* Altura del círculo */
            background-color: red;
            /* Fondo rojo */
            border-radius: 5%;
            /*Círculo con bordes redondeados*/
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            /* Texto blanco */
        }
    </style>
</head>


<?php

// API PARA CONSULTAR PAQUETES 


$array_paquetes = array(
    // Precios mensuales
    'basic' => 250,
    'plus' => 350
);





$arra_cupon = array(
    // Cupon
    'cupon' => isset($cps['cps_codigo']) ? $cps['cps_codigo'] : "",
    'd_m' => isset($cps['cps_descuento_m']) ? $cps['cps_descuento_m'] : 0,
    'd_a' => isset($cps['cps_descuento_a']) ? $cps['cps_descuento_a'] : 0,
    'dr_m' => isset($cps['cps_descuento_mr']) ? $cps['cps_descuento_mr'] : 0,
    'dr_a' => isset($cps['cps_descuento_ar']) ? $cps['cps_descuento_ar'] : 0
);



$_basic_m = array(
    'precio_real' => $array_paquetes['basic'],
    'precio_descuento' => $array_paquetes['basic'] - ($array_paquetes['basic'] * $arra_cupon['d_m'] / 100),
    'precio_descuento_r' => $array_paquetes['basic'] - ($array_paquetes['basic'] * $arra_cupon['dr_m'] / 100),
    'ahorro' => ($array_paquetes['basic']) - ($array_paquetes['basic'] - ($array_paquetes['basic'] * $arra_cupon['d_m'] / 100))
);

$_basic_a = array(
    'precio_real' => $array_paquetes['basic'],
    'precio_descuento' => $array_paquetes['basic'] - ($array_paquetes['basic'] * $arra_cupon['d_a'] / 100),
    'precio_descuento_r' => $array_paquetes['basic'] - ($array_paquetes['basic'] * $arra_cupon['dr_a'] / 100),
    'ahorro' => ($array_paquetes['basic']) - ($array_paquetes['basic'] - ($array_paquetes['basic'] * $arra_cupon['d_a'] / 100))
);

$_plus_m = array(
    'precio_real' => $array_paquetes['plus'],
    'precio_descuento' => $array_paquetes['plus'] - ($array_paquetes['plus'] * $arra_cupon['d_m'] / 100),
    'precio_descuento_r' => $array_paquetes['plus'] - ($array_paquetes['plus'] * $arra_cupon['dr_m'] / 100),
    'ahorro' => ($array_paquetes['plus']) - ($array_paquetes['plus'] - ($array_paquetes['plus'] * $arra_cupon['d_m'] / 100))
);

$_plus_a = array(
    'precio_real' => $array_paquetes['plus'],
    'precio_descuento' => $array_paquetes['plus'] - ($array_paquetes['plus'] * $arra_cupon['d_a'] / 100),
    'precio_descuento_r' => $array_paquetes['plus'] - ($array_paquetes['plus'] * $arra_cupon['dr_a'] / 100),
    'ahorro' => ($array_paquetes['plus']) - ($array_paquetes['plus'] - ($array_paquetes['plus'] * $arra_cupon['d_a'] / 100))
);







?>


<body style="background-color:#F1F5F9; position: relative;">

    <div class="curved-bg"></div> <!-- Fondo con curvas -->

    <nav class="navbar fixed-top navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-center" href="#">
                <span class="d-none d-md-inline">
                    <center>Llámanos al (734) 100 6945 - Lunes a Viernes 8:00 a 19:00 Sabado 8:00 a 12:00</center>
                </span>
                <span class="d-inline d-md-none text-center" style="font-size: 12px;">
                    <center>Tel: (734) 100 6945 Lun-Vie: 8:00 - 19:00 Sáb: 8:00 - 12:00</center>
                </span>
            </a>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mt-5 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= HTTP_HOST ?>">
                <img src="https://softmorpos.com/img/logo.png" alt="" width="150" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= HTTP_HOST ?>">Inicio</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Soluciones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $carrito ?>">Planes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-dark m-1">Ingresa</button>
                    <a class="btn btn-primary m-1 btn-primary btn-lg animate__animated animate__pulse animate__infinite" type="button" href="<?= $registro ?>">Empieza gratis</a>
                </form>
            </div>
        </div>
    </nav>

    <div class="header-price  c-pos ">
        <h1 class="text-pos-2  text-center">Planes de Softmor POS</h1>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="preciosAnuales">
            <label class="form-check-label m-2" for="preciosAnuales"> Precios Anuales</label>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row justify-content-center mt-4 paquete-mensual ">
            <div class="col-md-4 col-12 align-items-center justify-content-center">
                <div class="card">
                    <?php if ($arra_cupon['d_m'] > 0) :  ?>
                        <div class="discount-circle"><?= $arra_cupon['d_m'] ?>%<br>OFF</div>
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="text-pos-2"><strong class="text-primary">Basic</strong></h5>
                        <p>Ideal para tus primeros inicios.</p>

                        <div>
                            <?php if ($arra_cupon['d_m'] == 0) : ?>
                                <h2 class="text-pos-1">$ <?= $_basic_m['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>
                            <?php else : ?>
                                <span> Desde </span>
                                <h2 class="text-pos-1">$ <?= $_basic_m['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>

                                <p class="text-pos-3 "> <strong> <s>ANTES</s> <s>$ <?= $_basic_m['precio_real'] ?> </s> <s>MXN</s> <s>/MES</s> <i>Ahorra $ <?= $_basic_m['ahorro'] ?> MXN</i> <br> renovación $ <?= $_basic_m['precio_descuento_r'] ?> MXN </strong> </p>


                            <?php endif; ?>
                        </div>
                        <ul>
                            <li><i class="fas fa-check text-success"></i> Licencia para <strong>1</strong> sucursal</li>
                            <li><i class="fas fa-check text-success"></i> 5 Usuarios con acceso a la plataforma</li>
                            <li><i class="fas fa-check text-success"></i> Módulo <strong> Mi taller </strong></li>
                            <li><i class="fas fa-check text-success"></i> Mono caja (1 caja para realizar cobros)</li>
                            <li><i class="fas fa-check text-success"></i> Soporte y actualizaciones</li>
                            <li><i class="fas fa-check text-success"></i> Acceso a los talleres Softmor POS</li>
                            <!-- <li><i class="fas fa-times  text-danger"></i>  <span style="color:#999">Capacitación privada</span> </li> -->
                            <li><i class="fas fa-times  text-danger"></i> <span style="color:#999">Módulo Inventario</span> </li>
                            <li><i class="fas fa-times  text-danger"></i> <span style="color:#999">Módulo Cotizaciones</span> </li>
                            <li><i class="fas fa-times  text-danger"></i> <span style="color:#999">Módulo POS (Venta de productos)</span> </li>
                        </ul>
                        <div class="row">
                            <div class=" col-12">
                                <button class="btn btn-outline-primary w-100">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 align-items-center justify-content-center">
                <div class="card card-recomendado">
                    <div class="recommended-header">Recomendado</div>
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="text-pos-2"><strong class="text-primary">Plus</strong></h5>
                        <p>Ideal para dar el siguiente paso.</p>
                        <?php if ($arra_cupon['d_m'] > 0) :  ?>
                            <div class="discount-circle"><?= $arra_cupon['d_m'] ?>%<br>OFF</div>
                        <?php endif; ?>
                        <div>
                            <?php if ($arra_cupon['d_m'] == 0) : ?>
                                <h2 class="text-pos-1">$ <?= $_plus_m['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>
                            <?php else : ?>
                                <span> Desde </span>
                                <h2 class="text-pos-1">$ <?= $_plus_m['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>
                                <p class="text-pos-3 "> <strong> <s>ANTES</s> <s>$ <?= $_plus_m['precio_real'] ?> </s> <s>MXN</s> <s>/MES</s> <i>Ahorra $ <?= $_plus_m['ahorro'] ?> MXN</i> <br> renovación $ <?= $_plus_m['precio_descuento_r'] ?> MXN </p></strong>
                            <?php endif; ?>
                        </div>
                        <ul>
                            <li><i class="fas fa-check text-success"></i> Licencia para <strong>1</strong> sucursal</li>
                            <li><i class="fas fa-check text-success"></i> <strong>10</strong> Usuarios con acceso a la plataforma</li>
                            <li><i class="fas fa-check text-success"></i> Módulo <strong> Mi taller </strong></li>
                            <li><i class="fas fa-check text-success"></i> <strong>Multi caja </strong>(3 cajas para realizar cobros simultaneos)</li>
                            <li><i class="fas fa-check text-success"></i> Soporte y actualizaciones</li>
                            <li><i class="fas fa-check text-success"></i> Acceso a los talleres Softmor POS</li>
                            <!-- <li><i class="fas fa-times  text-danger"></i>  <span style="color:#999">Capacitación privada</span> </li> -->
                            <li><i class="fas fa-check text-success"></i> Módulo Inventario </li>
                            <li><i class="fas fa-check text-success"></i> Módulo Cotizaciones </li>
                            <li><i class="fas fa-check text-success"></i> Módulo POS (Venta de productos) </li>
                        </ul>


                        <div class="row">
                            <div class=" col-12">
                                <button class="btn btn-outline-primary w-100">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4 paquete-anual d-none">
            <div class="col-md-4 col-12 align-items-center justify-content-center">
                <div class="card">
                    <?php if ($arra_cupon['d_a'] > 0) :  ?>
                        <div class="discount-circle"><?= $arra_cupon['d_a'] ?>%<br>OFF</div>
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="text-pos-2"><strong class="text-primary">Basic</strong></h5>
                        <p>Ideal para tus primeros inicios.</p>

                        <div>
                            <?php if ($arra_cupon['d_a'] == 0) : ?>
                                <h2 class="text-pos-1">$ <?= $_basic_a['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>
                            <?php else : ?>
                                <span> Desde </span>
                                <h2 class="text-pos-1">$ <?= $_basic_a['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>
                                <p class="text-pos-3 "> <strong> <s>ANTES</s> <s>$ <?= $_basic_a['precio_real'] ?> </s> <s>MXN</s> <s>/MES</s> <i>Ahorra $ <?= $_basic_a['ahorro'] * 12 ?> MXN</i> <br> renovación $ <?= $_basic_a['precio_descuento_r'] ?> MXN </p></strong>
                            <?php endif; ?>
                        </div>
                        <ul>
                            <li><i class="fas fa-check text-success"></i> Licencia para <strong>1</strong> sucursal</li>
                            <li><i class="fas fa-check text-success"></i> 10 Usuarios con acceso a la plataforma</li>
                            <li><i class="fas fa-check text-success"></i> Módulo <strong> Mi taller </strong></li>
                            <li><i class="fas fa-check text-success"></i> Mono caja (3 caja para realizar cobros)</li>
                            <li><i class="fas fa-check text-success"></i> Soporte y actualizaciones</li>
                            <li><i class="fas fa-check text-success"></i> Acceso a los talleres Softmor POS</li>
                            <li><i class="fas fa-check  text-success"></i><strong> Capacitación privada </strong> </li>
                            <li><i class="fas fa-times  text-danger"></i> <span style="color:#999">Módulo Inventario</span> </li>
                            <li><i class="fas fa-times  text-danger"></i> <span style="color:#999">Módulo Cotizaciones</span> </li>
                            <li><i class="fas fa-times  text-danger"></i> <span style="color:#999">Módulo POS (Venta de productos)</span> </li>
                        </ul>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-outline-primary w-100">Comprar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 align-items-center justify-content-center">
                <div class="card card-recomendado">
                    <div class="recommended-header">Recomendado</div>
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="text-pos-2"><strong class="text-primary">Plus</strong></h5>
                        <p>Ideal para dar el siguiente paso.</p>
                        <?php if ($arra_cupon['d_a'] > 0) :  ?>
                            <div class="discount-circle"><?= $arra_cupon['d_a'] ?>%<br>OFF</div>
                        <?php endif; ?>
                        <div>
                            <?php if ($arra_cupon['d_a'] == 0) : ?>
                                <h2 class="text-pos-1">$ <?= $_plus_a['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>
                            <?php else : ?>
                                <span> Desde </span>
                                <h2 class="text-pos-1">$ <?= $_plus_a['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>
                                <p class="text-pos-3 "> <strong> <s>ANTES</s> <s>$ <?= $_plus_a['precio_real'] ?> </s> <s>MXN</s> <s>/MES</s> <i>Ahorra $ <?= $_plus_a['ahorro'] * 12 ?> MXN</i> <br> renovación $ <?= $_plus_a['precio_descuento_r'] ?> MXN </p></strong>
                            <?php endif; ?>
                        </div>
                        <ul>
                            <li><i class="fas fa-check text-success"></i> Licencia para <strong>1</strong> sucursal</li>
                            <li><i class="fas fa-check text-success"></i> Usuarios <strong>ilimitados</strong> con acceso a la plataforma</li>
                            <li><i class="fas fa-check text-success"></i> Módulo <strong> Mi taller </strong></li>
                            <li><i class="fas fa-check text-success"></i> <strong>Multi caja </strong>(cajas ilimitadas para realizar cobros simultaneos)</li>
                            <li><i class="fas fa-check text-success"></i> Soporte y actualizaciones</li>
                            <li><i class="fas fa-check text-success"></i> Acceso a los talleres Softmor POS</li>
                            <li><i class="fas fa-check  text-success"></i> <strong>Capacitación privada </strong> </li>
                            <li><i class="fas fa-check text-success"></i> Módulo Inventario </li>
                            <li><i class="fas fa-check text-success"></i> Módulo Cotizaciones </li>
                            <li><i class="fas fa-check text-success"></i> Módulo POS (Venta de productos) </li>
                        </ul>
                        <div class="row">
                            <div class=" col-12">
                                <button class="btn btn-outline-primary w-100">Comprar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 table-responsive">
            <h1 class="text-pos-2  text-center">Más caracteristicas</h1>
            <table class=" table" style="font-size:18px;color: #64748B;">
                <thead class="text-center">
                    <th>Caracteriticas</th>
                    <th>BASIC</th>
                    <th>PLUS</th>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>Módulo de inventario</td>
                        <td>
                            <i class="fas fa-times  text-danger"></i>
                        </td>
                        <td>
                            <i class="fas fa-check text-success"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Módulo Cotizaciones</td>
                        <td>
                            <i class="fas fa-times  text-danger"></i>
                        </td>
                        <td>
                            <i class="fas fa-check text-success"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Módulo POS (Venta de productos)</td>
                        <td>
                            <i class="fas fa-times  text-danger"></i>
                        </td>
                        <td>
                            <i class="fas fa-check text-success"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Módulo de Mi taller</td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Módulo de usuarios</td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Módulo de cliente</td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Módulo de administración</td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Reportes de ventas y utilidades</td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Ifix ID</td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Control de turnos</td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Personalización de tickets (58mm, 80mm, tamaño carta, media carta, etc.)</td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Personalización de empresa (Nombre, logotipo, dirección, telefonos, etc. )</td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Soporte y actualizaciones</td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Acceso a talleres y capacitaciones publicos </td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="p-5 mb-4 bg-dark rounded-3">
                        <div class="container-fluid py-5 text-center">
                            <h1 class="display-5 fw-bold text-white text-pos-2">Empieza hoy a darle miles de posibilidades a tu negocio con Softmor POS</h1>
                            <p class="text-white">Prueba todas nuestras funcionalidades durante 15 días de a grapa. Más de 500 negocios nos eligen..</p>
                            <a class="btn btn-lg btn-outline-light mt-5" type="button" href="<?= $registro ?>">Empieza gratis</a>
                            <ul class="list-register inter-font font-weight-600 text-left mt-3">
                                <li><img loading="lazy" src="./accountant-check-icon.svg"> Sin contratos de permanencia</li>
                                <li><img loading="lazy" src="./accountant-check-icon.svg"> Sin descargas</li>
                                <li><img loading="lazy" src="./accountant-check-icon.svg"> Sin tarjetas de crédito</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col-md-4">
                <div class="card">
                    <center><img class="m-2" src="./icons8-nube-100.png" width="80" alt=""></center>
                    <div class="card-body text-center">
                        <h4 class=" mb-4 card-title">Sin descargas</h4>
                        <p class=" mb-4 card-text">Accede desde cualquier dispositivo y lugar, manteniendo tu información segura en la nube.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <center> <img class="m-2" src="./icons8-soporte-en-línea-80.png" width="80" alt=""></center>
                    <div class="card-body text-center">
                        <h4 class=" mb-4 card-title">Soporte tecnico</h4>
                        <p class=" mb-4 card-text">Recibe asesoría gratuita de un equipo especializado a través de teléfono, correo electrónico o chat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <center><img class="m-2" src="./icons8-actualizaciones-disponibles-80.png" width="80" alt=""></center>
                    <div class="card-body text-center">
                        <h4 class=" mb-4 card-title">Actualizaciones</h4>
                        <p class=" mb-4 card-text">Disfruta de actualizaciones constantes sin costos adicionales y mantente siempre al día.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 dark-bg mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center text-center">
                        <div>
                            <img src="https://softmorpos.com/img/logo.png" width="100" alt="Logo de Softmor POS">
                            <p class="footer-text">Softmor POS: un sistema web que resuelve problemas comunes de los técnicos en reparación de equipos de cómputo y más.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <span class="footer-text text-white ">&copy; 2024 Softmor Studios. Todos los derechos reservados.</span>
                </div>
                <div class="col-md-6 text-end">
                    <a href="https://facebook.com/softmor" target="_blank" class="me-3 text-white"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/softmormx/" target="_blank" class="me-3 text-white"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com/softmormx" target="_blank" class="text-white"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap JS (si es necesario) -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Agrega jQuery para el funcionamiento del wizard -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->
    <script>
        const checkbox = document.getElementById('preciosAnuales');

        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                // Acciones cuando el checkbox está marcado (Anual)
                console.log('Precios Anuales activados');
                $(".paquete-mensual").addClass('d-none')
                $(".paquete-anual").removeClass('d-none')
            } else {
                // Acciones cuando el checkbox está desmarcado (Mensual)
                console.log('Precios Anuales desactivados');
                $(".paquete-mensual").removeClass('d-none')
                $(".paquete-anual").addClass('d-none')
            }
        });
    </script>
</body>