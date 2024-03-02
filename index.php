<?php
@session_start();
include_once 'config.php';
?>
<!DOCTYPE html>
<html lang="es">

<?php include_once 'componentes/head.php'; ?>

<body style="background-color:#F1F5F9; position: relative;">



    <?php include_once 'componentes/navbar.php'; ?>
    <div class="container c-pos">
        <div class="row section-pos0">
            <div class="col-md-6 text-pos-c">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-pos-3 "> <strong> Software de Punto de Venta Especializada para Taller de Reparaciones </strong></h3>
                        <h2 class="text-pos-2 ">
                            ¿Quieres llevar la gestión y organización de tu taller de reparaciones al próximo nivel?
                            <br> <strong class="text-primary"> ¡Softmor POS es tu solución! </strong> 
                        </h2>
                        <h6 class="text-pos-3 ">
                        Transformará tu taller, ofreciendo una gestión y organización eficiente de los equipos de tus clientes.
                        </h6>
                        
                    </div>

                    <div class="col-12 text-center mt-5">
                        

                        <h5>Software de 5 entrellas</h5>
                        <img src="./icons8-cinco-de-cinco-estrellas-100.png" width="120px" alt="">
                    </div>
                    <div class="col-12 ">
                        <a class="btn btn-lg btn-primary mt-4" type="button" href="<?= $registro ?>">Empieza gratis</a>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="./img_portada_2.svg" alt="" class="img-fluid w-100">
            </div>
        </div>
        <?php include_once 'componentes/section-pos1.php'; ?>
        <div class="row section-pos2">
            <div class="col-12 text-center">
                <h2 class="text-pos-2">
                    Gestiona tus servicios técnicos con <br> ¡Con la<strong class="text-primary"> mejor opción </strong> en software.
                </h2>
            </div>
            <div class="col-md-6">
                <img src="./imagen_3.png" alt="" class="img-fluid w-100">
            </div>
            <div class="col-md-6 text-center mt-5 d-flex justify-content-center align-items-center flex-column">
                <h6 class="text-pos-4 mb-5">Taller Simplificado: Softmor Pos para una Administración Eficiente</h6>
                <ul class="custom-list">
                    <li><i class="fas fa-check"></i> Acceso completo desde cualquier dispositivo.</li>
                    <li><i class="fas fa-check"></i> Gestión eficiente desde cualquier lugar.</li>
                    <li><i class="fas fa-check"></i> Simplifica la administración de talleres.</li>
                </ul>
                <a class="btn btn-lg btn-primary " type="button" href="<?= $registro ?>">Empieza gratis</a>
            </div>
        </div>
        <div class="row section-pos3">


            <div class="col-md-6 text-center mt-5 d-flex justify-content-center align-items-center flex-column">
                <h6 class="text-pos-4 mb-5">Transforma tu Negocio con Softmor Pos</h6>
                <ul class="custom-list">
                    <li><i class="fas fa-check"></i> Optimiza tu gestión empresarial con reportes detallados.</li>
                    <li><i class="fas fa-check"></i> Controla tu inventario de forma eficiente y precisa..</li>
                    <li><i class="fas fa-check"></i> Potencia tus ventas con un sistema de punto de venta confiable.</li>
                </ul>
                <a class="btn btn-lg btn-primary mt-4" type="button" href="<?= $registro ?>">Empieza gratis</a>
            </div>

            <div class="col-md-6">
                <img src="./imagen_4.png" alt="" class="img-fluid w-100">
            </div>
        </div>
        <?php include_once 'componentes/section-pos4.php'; ?>
        <?php include_once 'componentes/section-pos5.php'; ?>

    </div>

    <!-- Footer -->
    <?php include_once 'componentes/footer.php'; ?>

</body>