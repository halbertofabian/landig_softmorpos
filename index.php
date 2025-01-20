<?php
@session_start();
include_once 'config.php';
?>
<!DOCTYPE html>
<html lang="es">

<?php include_once 'componentes/head.php'; ?>

<body style="background-color:#F1F5F9; position: relative;">

<style>
    .highlight {
      color: #5550FF; /* Color primario */
      font-weight: bold; 
    }
  </style>

    <?php include_once 'componentes/navbar.php'; ?>
    <div class="container c-pos">
        <div class="row section-pos0">
            <div class="col-md-5 text-pos-c">
                <div class="row">
                    <div class="col-12">
                        <h1 style="font-size: 30px;"><span class="highlight">Taller Control:</span> La solución para gestionar tu taller de reparación de forma eficiente.</h1>

                        <p>Controla tu <span class="highlight">inventario</span>, <span class="highlight">servicios</span> y <span class="highlight">ventas</span> desde cualquier lugar con nuestro software de punto de venta especializado.</p>

                        <p><span class="highlight">Transformará tu taller</span>, ofreciendo una gestión y organización eficiente de los equipos de tus clientes.</p>


                    </div>


                    <div class="col-lg-10 col-xs-12 d-none">
                        <div class="input-group ">
                            <input type="text" class="form-control" placeholder="Ingresa tu correo" aria-label="Ingresa tu correo" aria-describedby="button-addon2">

                            <button class="btn btn-outline-primary" type="button" id="button-addon2" >Comenzar la prueba</button>

                        </div>
                        <span class="badge rounded-pill" style="background-color: #5550FF;">Prueba gratis por 14 días</span>
                    </div>

                    <div class="col-12 text-center mt-5">


                        <h4>Software <strong style="color: #5550FF;">#1</strong> para gestión de dispositivos electrónicos </h4>
                        <img src="./img/icons8-cinco-de-cinco-estrellas-100.png" width="120px" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <img src="./img/img_portada_tc_3.svg" alt="" class="img-fluid w-100">
            </div>
        </div>
        <?php include_once 'componentes/section-pos1.php'; ?>
        <div class="row section-pos2">
            <div class="col-12 text-center">
                <h2 class="text-pos-2">
                    Transforma tu negocio<br> ¡Con<strong class="text-primary"> taller control</strong>!
                </h2>
            </div>
            <div class="col-md-6">
                <img src="./img/imagen_3.png" alt="" class="img-fluid w-100">
            </div>
            <div class="col-md-6  mt-5 d-flex justify-content-center align-items-center flex-column">
                <h6 class="text-pos-4 mb-5 text-center">Gestiona tu taller de forma rápida y organizada, ahorrando tiempo y recursos.</h6>
                <ul class="custom-list">
                    <li><i class="li-price"></i> Controla tu inventario.</li>
                    <li><i class="li-price"></i> Mejora la atención al cliente.</li>
                    <li><i class="li-price"></i> Accede desde cualquier lugar.</li>
                    <li><i class="li-price"></i> Incrementa tus ventas.</li>
                </ul>
                <div class="row text-center d-none">
                    <div class="col-lg-12 col-xs-12 ">
                        <span class="badge rounded-pill" style="background-color: #5550FF;">Prueba gratis por 14 días</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row section-pos3">


            <div class="col-md-6  mt-5 d-flex justify-content-center align-items-center flex-column">
                <h6 class="text-pos-4 mb-5">Todo lo que necesitas para gestionar tu taller</h6>
                <ul class="custom-list">
                    <li><i class="li-price"></i> Gestión de servicios (registro, seguimiento, fotos, notificaciones).</li>
                    <li><i class="li-price"></i> Gestión de inventario (importación/exportación, control de compras).</li>
                    <li><i class="li-price"></i> Punto de venta (multi-cajero, diferentes métodos de pago).</li>
                    <li><i class="li-price"></i> Reportes detallados (servicios, inventario, ventas, finanzas).</li>
                    <li><i class="li-price"></i> Control de usuarios y accesos.</li>
                    <li><i class="li-price"></i> Y otras características relevantes que consideres importantes.</li>
                </ul>
                <div class="row d-none">
                    <div class="col-lg-12 col-xs-12 ">

                        <span class="badge rounded-pill" style="background-color: #5550FF;">Prueba gratis por 14 días</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <img src="./img/imagen_4.png" alt="" class="img-fluid w-100">
            </div>
        </div>
        <?php include_once 'componentes/section-pos4.php'; ?>
        <?php include_once 'componentes/section-pos5.php'; ?>
        <?php include_once 'componentes/section-pos6.php'; ?>

    </div>

    <!-- Footer -->
    <?php include_once 'componentes/footer.php'; ?>

</body>