<?php
@session_start();
include_once 'config.php';
?>
<!DOCTYPE html>
<html lang="es">

<?php require_once 'componentes/head.php' ?>

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
    if ($pqt['pqt_nombre'] == "DIAMANTE" && $pqt['pqt_caducidad'] == "1 month" && $pqt['pqt_precio'] == 500) {
        $pqt_diamante_mensual[] = $pqt;
    }

    if ($pqt['pqt_nombre'] == "BASIC" && $pqt['pqt_caducidad'] == "1 year" && $pqt['pqt_precio'] == 250) {
        $pqt_basic_anual[] = $pqt;
    }
    if ($pqt['pqt_nombre'] == "PLUS" && $pqt['pqt_caducidad'] == "1 year" && $pqt['pqt_precio'] == 350) {
        $pqt_plus_anual[] = $pqt;
    }
    if ($pqt['pqt_nombre'] == "DIAMANTE" && $pqt['pqt_caducidad'] == "1 year" && $pqt['pqt_precio'] == 500) {
        $pqt_diamante_anual[] = $pqt;
    }
}

$array_paquetes = array(
    // Precios mensuales
    'basic' => $pqt_basic_mensual[0]['pqt_precio'],
    'plus' => $pqt_plus_mensual[0]['pqt_precio'],
    'diamante' => $pqt_diamante_mensual[0]['pqt_precio'],
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
$_diamante_m = array(
    'precio_real' => $array_paquetes['diamante'],
    'precio_descuento' => $array_paquetes['diamante'] - ($array_paquetes['diamante'] * $arra_cupon['d_m'] / 100),
    'precio_descuento_r' => $array_paquetes['diamante'] - ($array_paquetes['diamante'] * $arra_cupon['dr_m'] / 100),
    'ahorro' => ($array_paquetes['diamante']) - ($array_paquetes['diamante'] - ($array_paquetes['diamante'] * $arra_cupon['d_m'] / 100))
);

$_diamante_a = array(
    'precio_real' => $array_paquetes['diamante'],
    'precio_descuento' => $array_paquetes['diamante'] - ($array_paquetes['diamante'] * $arra_cupon['d_a'] / 100),
    'precio_descuento_r' => $array_paquetes['diamante'] - ($array_paquetes['diamante'] * $arra_cupon['dr_a'] / 100),
    'ahorro' => ($array_paquetes['diamante']) - ($array_paquetes['diamante'] - ($array_paquetes['diamante'] * $arra_cupon['d_a'] / 100))
);
?>


<body style="background-color:#F1F5F9; position: relative;">

    <?php require_once 'componentes/navbar.php';?>




    <div class="header-price  c-pos ">
        <h1 class="text-pos-2  text-center">Planes de Softmor POS</h1>
       

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="preciosAnuales">
            <label class="form-check-label m-2" for="preciosAnuales"> Precios Anuales</label>
        </div>
    </div>
    <div class="container mb-5">
                <div class="row justify-content-center mt-1 paquete-mensual ">
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
                                        renovación $ <?= $_basic_m['precio_descuento_r'] ?> MXN
                                        <p class="text-pos-3 "> <strong> <s>ANTES</s> <s>$ <?= $_basic_m['precio_real'] ?> </s> <s>MXN</s> <s>/MES</s> <i>Ahorra $ <?= $_basic_m['ahorro'] ?> MXN</i> <br> </strong> </p>


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
                                        renovación $ <?= $_plus_m['precio_descuento_r'] ?> MXN
                                        <p class="text-pos-3 "> <strong> <s>ANTES</s> <s>$ <?= $_plus_m['precio_real'] ?> </s> <s>MXN</s> <s>/MES</s> <i>Ahorra $ <?= $_plus_m['ahorro'] ?> MXN</i> <br> </p></strong>
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
                    <div class="col-md-4 col-12 align-items-center justify-content-center">
                        <div class="card">
                            <?php if ($arra_cupon['d_m'] > 0) :  ?>
                                <div class="discount-circle"><?= $arra_cupon['d_m'] ?>%<br>OFF</div>
                            <?php endif; ?>
                            <div class="card-body d-flex flex-column align-items-center">
                                <h5 class="text-pos-2"><strong class="text-primary"><?= $pqt_diamante_mensual[0]['pqt_nombre'] ?></strong></h5>
                                <p><?= $pqt_diamante_mensual[0]['pqt_extracto'] ?></p>

                                <div>
                                    <?php if ($arra_cupon['d_m'] == 0) : ?>
                                        <h2 class="text-pos-1">$ <?= $_diamante_m['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>
                                    <?php else : ?>
                                        <span> Desde </span>
                                        <h2 class="text-pos-1">$ <?= $_diamante_m['precio_descuento'] ?> <sup class="text-pos-3"> <strong> MXN/MES </strong></sup> </h2>
                                        renovación $ <?= $_diamante_m['precio_descuento_r'] ?> MXN
                                        <p class="text-pos-3 "> <strong> <s>ANTES</s> <s>$ <?= $_diamante_m['precio_real'] ?> </s> <s>MXN</s> <s>/MES</s> <i>Ahorra $ <?= $_diamante_m['ahorro'] ?> MXN</i> <br> </strong> </p>


                                    <?php endif; ?>
                                </div>
                                <?= $pqt_diamante_mensual[0]['pqt_descripcion'] ?>
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
                                        <button class="btn btn-outline-primary btnAddCarrito" pqt_id="<?= $pqt_diamante_mensual[0]['pqt_id'] ?>" cto_token_pay="" btnAddCarrito" pqt_id="<?= $pqt_diamante_mensual[0]['pqt_id'] ?>" cto_token_pay="">Comprar</button>
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
                                        <h2 class="text-pos-1">$ <?= $_basic_a['precio_descuento'] * 12 ?> <sup class="text-pos-3"> <strong> MXN/AÑO </strong></sup> </h2>

                                    <?php else : ?>
                                        <span> Desde </span>
                                        <h2 class="text-pos-1">$ <?= $_basic_a['precio_descuento'] * 12 ?> <sup class="text-pos-3"> <strong> MXN/AÑO </strong></sup> </h2>
                                        renovación $ <?= $_basic_a['precio_descuento_r'] * 12 ?> MXN
                                        <p class="text-pos-3 "> <strong> <s>ANTES</s> <s>$ <?= $_basic_a['precio_real'] * 12 ?> </s> <s>MXN</s> <s>/AÑO</s> <i>Ahorra $ <?= $_basic_a['ahorro'] * 12 ?> MXN</i> </p></strong>
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
                                        <h2 class="text-pos-1">$ <?= $_plus_a['precio_descuento'] * 12 ?> <sup class="text-pos-3"> <strong> MXN/AÑO </strong></sup> </h2>
                                    <?php else : ?>
                                        <span> Desde </span>
                                        <h2 class="text-pos-1">$ <?= $_plus_a['precio_descuento'] * 12 ?> <sup class="text-pos-3"> <strong> MXN/AÑO </strong></sup> </h2>
                                        renovación $ <?= $_plus_a['precio_descuento_r'] * 12 ?> MXN
                                        <p class="text-pos-3 "> <strong> <s>ANTES</s> <s>$ <?= $_plus_a['precio_real'] * 12 ?> </s> <s>MXN</s> <s>/AÑO</s> <i>Ahorra $ <?= $_plus_a['ahorro'] * 12 ?> MXN</i> <br> </p></strong>
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
                    <div class="col-md-4 col-12 align-items-center justify-content-center">
                        <div class="card">
                            <?php if ($arra_cupon['d_a'] > 0) :  ?>
                                <div class="discount-circle"><?= $arra_cupon['d_a'] ?>%<br>OFF</div>
                            <?php endif; ?>
                            <div class="card-body d-flex flex-column align-items-center">
                                <h5 class="text-pos-2"><strong class="text-primary"><?= $pqt_diamante_anual[0]['pqt_nombre'] ?></strong></h5>
                                <p><?= $pqt_diamante_anual[0]['pqt_extracto'] ?></p>

                                <div>
                                    <?php if ($arra_cupon['d_a'] == 0) : ?>
                                        <h2 class="text-pos-1">$ <?= $_diamante_a['precio_descuento'] * 12 ?> <sup class="text-pos-3"> <strong> MXN/AÑO </strong></sup> </h2>

                                    <?php else : ?>
                                        <span> Desde </span>
                                        <h2 class="text-pos-1">$ <?= $_diamante_a['precio_descuento'] * 12 ?> <sup class="text-pos-3"> <strong> MXN/AÑO </strong></sup> </h2>
                                        renovación $ <?= $_diamante_a['precio_descuento_r'] * 12 ?> MXN
                                        <p class="text-pos-3 "> <strong> <s>ANTES</s> <s>$ <?= $_diamante_a['precio_real'] * 12 ?> </s> <s>MXN</s> <s>/AÑO</s> <i>Ahorra $ <?= $_diamante_a['ahorro'] * 12 ?> MXN</i> </p></strong>
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
                                <?= $pqt_diamante_anual[0]['pqt_descripcion'] ?>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-outline-primary btnAddCarrito" pqt_id="<?= $pqt_diamante_anual[0]['pqt_id'] ?>" cto_token_pay="">Comprar</button>
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
                            <th>DIAMANTE</th>
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
                                <td>
                                    <i class="fas fa-check text-success"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>Módulo de Mi taller</td>
                                <td colspan="3"><strong>Disponible</strong> en todos los planes</td>
                            </tr>
                            <tr>
                                <td>Módulo de usuarios</td>
                                <td colspan="3"><strong>Disponible</strong> en todos los planes</td>
                            </tr>
                            <tr>
                                <td>Módulo de cliente</td>
                                <td colspan="3"><strong>Disponible</strong> en todos los planes</td>
                            </tr>
                            <tr>
                                <td>Módulo de administración</td>
                                <td colspan="3"><strong>Disponible</strong> en todos los planes</td>
                            </tr>
                            <tr>
                                <td>Reportes de ventas y utilidades</td>
                                <td colspan="3"><strong>Disponible</strong> en todos los planes</td>
                            </tr>
                            <tr>
                                <td>Ifix ID</td>
                                <td colspan="3"><strong>Disponible</strong> en todos los planes</td>
                            </tr>
                            <tr>
                                <td>Control de turnos</td>
                                <td colspan="3"><strong>Disponible</strong> en todos los planes</td>
                            </tr>
                            <tr>
                                <td>Personalización de tickets (58mm, 80mm, tamaño carta, media carta, etc. )</td>
                                <td colspan="3"><strong>Disponible</strong> en todos los planes</td>
                            </tr>
                            <tr>
                                <td>Personalización de empresa (Nombre, logotipo, dirección, teléfonos, etc. )</td>
                                <td colspan="3"><strong>Disponible</strong> en todos los planes</td>
                            </tr>
                            <tr>
                                <td>Soporte y actualizaciones</td>
                                <td colspan="3"><strong>Disponible</strong> en todos los planes</td>
                            </tr>
                            <tr>
                                <td>Acceso a talleres y capacitaciones públicas </td>
                                <td colspan="3"><strong>Disponible</strong> en todos los planes</td>
                            </tr>
                            <tr>
                                <td>Capacitación privada </td>
                                <td colspan="3"><strong>Disponible</strong> en todos los planes anuales</td>
                            </tr>
                            <tr>
                                <td>Tienda en linea</td>
                                <td colspan="3"><strong>Próximamente...</strong> en todos los planes </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
    <?php require_once 'componentes/footer.php' ?>

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
            datos.append("cto_cupon", '')
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