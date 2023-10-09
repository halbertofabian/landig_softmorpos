<?php
@session_start();
include_once 'config.php';
if (isset($_GET['ref'])) {
    $_SESSION['ref'] = $_GET['ref'];
}

if (isset($_SESSION['ref'])) {
    $registro = "registro.php?ref=" . $_SESSION['ref'];
    $carrito = "carrito.php?ref=" . $_SESSION['ref'];
    $respuesta = file_get_contents(URL_SOFTMOR_POS . 'consultar-ref/' . $_SESSION['ref']);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://kit.fontawesome.com/f24eb69f99.js" crossorigin="anonymous"></script>
    <title>POS - Punto de venta #1 en México</title>
    <link rel="stylesheet" href="./css/style-sp.css">
</head>


<?php

// API PARA CONSULTAR PAQUETES 
$respuesta = file_get_contents(URL_SOFTMOR_POS . 'obtener-paquetes');
$paquetes = json_decode($respuesta, true);
$pqt_basic_mensual = array();
$pqt_plus_mensual = array();

$pqt_basic_anual = array();
$pqt_plus_anual = array();
foreach ($paquetes as $key => $pqt) {
    if ($pqt['pqt_nombre'] == "BASIC" && $pqt['pqt_caducidad'] == "1 month" && $pqt['pqt_precio'] == 250) {
        $pqt_basic_mensual[] = $pqt;
    }
    if ($pqt['pqt_nombre'] == "PLUS" && $pqt['pqt_caducidad'] == "1 month" && $pqt['pqt_precio'] == 350) {
        $pqt_plus_mensual[] = $pqt;
    }

    if ($pqt['pqt_nombre'] == "BASIC" && $pqt['pqt_caducidad'] == "1 year" && $pqt['pqt_precio'] == 250) {
        $pqt_basic_anual[] = $pqt;
    }
    if ($pqt['pqt_nombre'] == "PLUS" && $pqt['pqt_caducidad'] == "1 year" && $pqt['pqt_precio'] == 350) {
        $pqt_plus_anual[] = $pqt;
    }
}

$array_paquetes = array(
    // Precios mensuales
    'basic' => $pqt_basic_mensual[0]['pqt_precio'],
    'plus' => $pqt_plus_mensual[0]['pqt_precio']
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
                        <h5 class="text-pos-2"><strong class="text-primary"><?= $pqt_basic_mensual[0]['pqt_nombre'] ?></strong></h5>
                        <p><?= $pqt_basic_mensual[0]['pqt_extracto'] ?></p>

                        <div>
                            <?php if ($arra_cupon['d_m'] == 0) : ?>
                                <h2 class="text-pos-1">$ <?= $_basic_m['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>
                            <?php else : ?>
                                <span> Desde </span>
                                <h2 class="text-pos-1">$ <?= $_basic_m['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>

                                <p class="text-pos-3 "> <strong> <s>ANTES</s> <s>$ <?= $_basic_m['precio_real'] ?> </s> <s>MXN</s> <s>/MES</s> <i>Ahorra $ <?= $_basic_m['ahorro'] ?> MXN</i> <br> renovación $ <?= $_basic_m['precio_descuento_r'] ?> MXN </strong> </p>


                            <?php endif; ?>
                        </div>
                        <?= $pqt_basic_mensual[0]['pqt_descripcion'] ?>
                        <!-- <ul>
                            <li><i class="fas fa-check text-success"></i> Licencia para <strong>1</strong> sucursal</li>
                            <li><i class="fas fa-check text-success"></i> 5 Usuarios con acceso a la plataforma</li>
                            <li><i class="fas fa-check text-success"></i> Módulo <strong> Mi taller </strong></li>
                            <li><i class="fas fa-check text-success"></i> Mono caja (1 caja para realizar cobros)</li>
                            <li><i class="fas fa-check text-success"></i> Soporte y actualizaciones</li>
                            <li><i class="fas fa-check text-success"></i> Acceso a los talleres Softmor POS</li>
                            <li><i class="fas fa-times  text-danger"></i> <span style="color:#999">Módulo Inventario</span> </li>
                            <li><i class="fas fa-times  text-danger"></i> <span style="color:#999">Módulo Cotizaciones</span> </li>
                            <li><i class="fas fa-times  text-danger"></i> <span style="color:#999">Módulo POS (Venta de productos)</span> </li>
                        </ul> -->
                        <div class="row">
                            <div class=" col-12">
                                <button class="btn btn-outline-primary btnAddCarrito" pqt_id="<?= $pqt_basic_mensual[0]['pqt_id'] ?>" cto_token_pay="" btnAddCarrito" pqt_id="<?= $pqt_basic_mensual[0]['pqt_id'] ?>" cto_token_pay="">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 align-items-center justify-content-center">
                <div class="card card-recomendado">
                    <div class="recommended-header">Recomendado</div>
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="text-pos-2"><strong class="text-primary"><?= $pqt_plus_mensual[0]['pqt_nombre'] ?></strong></h5>
                        <p><?= $pqt_plus_mensual[0]['pqt_extracto'] ?></p>
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
                        <?= $pqt_plus_mensual[0]['pqt_descripcion'] ?>
                        <!-- <ul>
                            <li><i class="fas fa-check text-success"></i> Licencia para <strong>1</strong> sucursal</li>
                            <li><i class="fas fa-check text-success"></i> <strong>10</strong> Usuarios con acceso a la plataforma</li>
                            <li><i class="fas fa-check text-success"></i> Módulo <strong> Mi taller </strong></li>
                            <li><i class="fas fa-check text-success"></i> <strong>Multi caja </strong>(3 cajas para realizar cobros simultaneos)</li>
                            <li><i class="fas fa-check text-success"></i> Soporte y actualizaciones</li>
                            <li><i class="fas fa-check text-success"></i> Acceso a los talleres Softmor POS</li>
                            <li><i class="fas fa-check text-success"></i> Módulo Inventario </li>
                            <li><i class="fas fa-check text-success"></i> Módulo Cotizaciones </li>
                            <li><i class="fas fa-check text-success"></i> Módulo POS (Venta de productos) </li>
                        </ul> -->


                        <div class="row">
                            <div class=" col-12">
                                <button class="btn btn-outline-primary btnAddCarrito" pqt_id="<?= $pqt_plus_mensual[0]['pqt_id'] ?>" cto_token_pay="">Comprar</button>
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
                        <h5 class="text-pos-2"><strong class="text-primary"><?= $pqt_basic_anual[0]['pqt_nombre'] ?></strong></h5>
                        <p><?= $pqt_basic_anual[0]['pqt_extracto'] ?></p>

                        <div>
                            <?php if ($arra_cupon['d_a'] == 0) : ?>
                                <h2 class="text-pos-1">$ <?= $_basic_a['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>
                            <?php else : ?>
                                <span> Desde </span>
                                <h2 class="text-pos-1">$ <?= $_basic_a['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>
                                <p class="text-pos-3 "> <strong> <s>ANTES</s> <s>$ <?= $_basic_a['precio_real'] ?> </s> <s>MXN</s> <s>/MES</s> <i>Ahorra $ <?= $_basic_a['ahorro'] * 12 ?> MXN</i> <br> renovación $ <?= $_basic_a['precio_descuento_r'] ?> MXN </p></strong>
                            <?php endif; ?>
                        </div>
                        <!-- <ul>
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
                        </ul> -->
                        <?= $pqt_basic_anual[0]['pqt_descripcion'] ?>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-outline-primary btnAddCarrito" pqt_id="<?= $pqt_basic_anual[0]['pqt_id'] ?>" cto_token_pay="">Comprar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 align-items-center justify-content-center">
                <div class="card card-recomendado">
                    <div class="recommended-header">Recomendado</div>
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="text-pos-2"><strong class="text-primary"><?= $pqt_plus_anual[0]['pqt_nombre'] ?></strong></h5>
                        <p><?= $pqt_plus_anual[0]['pqt_extracto'] ?></p>
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
                        <!-- <ul>
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
                        </ul> -->
                        <?= $pqt_plus_anual[0]['pqt_descripcion'] ?>
                        <div class="row">
                            <div class=" col-12">
                                <button class="btn btn-outline-primary btnAddCarrito" pqt_id="<?= $pqt_plus_anual[0]['pqt_id'] ?>" cto_token_pay="">Comprar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 table-responsive">
            <h1 class="text-pos-2  text-center">Más características</h1>
            <table class=" table" style="font-size:18px;color: #64748B;">
                <thead class="text-center">
                    <th>Características</th>
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
                        <td>Personalización de tickets (58mm, 80mm, tamaño carta, media carta, etc. )</td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Personalización de empresa (Nombre, logotipo, dirección, teléfonos, etc. )</td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Soporte y actualizaciones</td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Acceso a talleres y capacitaciones públicas </td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes</td>
                    </tr>
                    <tr>
                        <td>Capacitación privada </td>
                        <td colspan="2"><strong>Disponible</strong> en todos los planes anuales</td>
                    </tr>
                </tbody>
            </table>
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
            <div class="col-12 mb-5">
                <!-- <h4 class="text-pos-2 text-center">  frecuentes</h4> -->
                <h2 class="text-pos-2 text-center">
                    Explora las <br> <strong class="text-primary"> preguntas </strong> frecuentes.
                </h2>

            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center text-center">
                <div>
                    <h3 class="text-pos-3">¿Tienes dudas sobre cómo esta plataforma puede beneficiarte?</h3>
                    <p>¡Descubre por qué necesitas adquirir nuestro software!</p>
                    <a href="https://wa.me/527341006945?text=Hola,%20me%20interesa%20en%20Softmor%20POS.%20¿Puedes%20proporcionarme%20más%20información?" target="_blank" class="btn btn-outline-primary mb-3">Recibir más información</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                ¿Cómo instalo y configuro el software POS en mi negocio?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Nuestro software es basado en la nube, lo que significa que no necesitas realizar una instalación complicada.
                                <ol>
                                    <li>Accede a la URL del sistema en <a href="https://softmorpos.com">https://softmorpos.com</a>.</li>
                                    <li>Inicia sesión con tus credenciales de usuario y contraseña.</li>
                                    <li>Configura tu sucursal proporcionando su nombre y detalles relevantes.</li>
                                    <li>Personaliza el sistema agregando el logotipo de tu negocio.</li>
                                    <li>Selecciona el formato de impresión predeterminado.</li>
                                    <li>Nuestro equipo de soporte estará disponible para ayudarte en todo momento.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                ¿Cuáles son los requisitos técnicos para utilizar este software?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Nuestro software es flexible y se adapta a una variedad de configuraciones de hardware para simplificar la gestión de tu negocio.
                                <ul>
                                    <li>No necesitas mucho en hardware, solo una computadora o cualquier otro dispositivo (preferiblemente con una pantalla grande).</li>
                                    <li>Utiliza cualquier navegador web, aunque se recomienda Google Chrome.</li>
                                    <li>Cualquier lector de código de barras es compatible con nuestro sistema.</li>
                                    <li>Puedes usar cualquier impresora, ya sea térmica o láser, pero se recomienda una térmica de 80 mm.</li>
                                    <li>Si deseas un cajón de dinero, es compatible y fácil de configurar para abrir automáticamente.</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                ¿Qué funciones y características ofrece este POS?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Este sistema POS ofrece una amplia gama de funciones y características para satisfacer tus necesidades comerciales. Estas incluyen, pero no se limitan a:
                                <ul>
                                    <li>Cotizaciones: Capacidad para generar cotizaciones para clientes.</li>
                                    <li>Encargos: Gestión de encargos de productos para clientes.</li>
                                    <li>Productos: Facilita la administración de productos y servicios en tu inventario.</li>
                                    <li>Gestión de inventario: Control total sobre el inventario, incluyendo seguimiento de existencias y alertas de bajo stock.</li>
                                    <li>Reportes de ventas: Informes detallados sobre las ventas realizadas y el desempeño de tu negocio.</li>
                                    <li>Utilidades: Funciones útiles para simplificar la operación diaria, como cálculo de impuestos y descuentos.</li>
                                    <li>Compras: Registro de compras de productos o materiales para tu negocio.</li>
                                    <li>Traspasos entre sucursales: Facilita el movimiento de productos entre diferentes ubicaciones de tu negocio.</li>
                                </ul>
                                Estas son solo algunas de las funciones que ofrece el sistema POS. Además, se están realizando mejoras continuas y se implementan nuevas características a medida que evoluciona el sistema, asegurando que siempre tengas acceso a las herramientas necesarias para gestionar eficazmente tu negocio.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                ¿Es posible personalizar los recibos con mi logotipo y detalles comerciales?
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Sí, es posible personalizar los recibos con tu logotipo y detalles comerciales. Esto te permite darle un toque personalizado a las transacciones y asegurarte de que reflejen la identidad de tu negocio.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                ¿El software POS es compatible con la impresión de etiquetas de código de barras?
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Sí, nuestro software POS es compatible con la impresión de etiquetas de código de barras. Puedes configurar el tamaño de las etiquetas según tus necesidades, incluyendo los datos que contendrán. Además, puedes utilizar esta función para generar etiquetas para los productos que vendes y también para los dispositivos que ingresan a tus servicios.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                ¿Ofrecen soporte técnico o asistencia en caso de problemas?
                            </button>
                        </h2>
                        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Sí, en todo momento que lo necesites, recibe asesoría gratuita de un equipo especializado a través de teléfono, correo electrónico o chat.
                            </div>
                        </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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


        $(".btnAddCarrito").on("click", function() {
            var pqt_id = $(this).attr("pqt_id")
            var cto_token_pay = $(this).attr("cto_token_pay")

            var datos = new FormData();
            datos.append("pqt_id", pqt_id);
            datos.append("cto_token_pay", cto_token_pay);
            datos.append("ref", '<?= isset($_SESSION['ref']) ? $_SESSION['ref'] : "" ?>');
            datos.append("btnAddCarrito", true);
            $.ajax({

                url: '<?= URL_SOFTMOR_POS ?>' + 'prospectos/carrito/add',
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btnAddCarrito').prop('disabled', true); // Deshabilitar el botón
                    $('.btnAddCarrito').text('Cargando...'); // 
                    //startLoadButton()
                },
                success: function(respuesta) {
                    // stopLoadButton()
                    if (respuesta.status) {
                        toastr.success(respuesta.mensaje, '¡Muy bien!');
                        setTimeout(function() {
                            window.location.href = respuesta.pagina;
                        }, 2000);
                    } else {
                        // toastr.info(respuesta.mensaje, 'Algo salio mal')

                        toastr.error(respuesta.mensaje, '¡Error!');
                        setTimeout(function() {
                            window.location.href = respuesta.pagina;
                        }, 700);

                        $('.btnAddCarrito').prop('disabled', false); // Habilitar el botón nuevamente
                        $('.btnAddCarrito').text('Agregar al carrito');
                    }


                }
                /************ */
            })
        })
    </script>
</body>