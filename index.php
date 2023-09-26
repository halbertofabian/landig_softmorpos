<?php 
include_once 'config.php';

if(isset($_GET['ref'])){
    $registro = "registro.php?ref=" . $_GET['ref'];
}else{
    $registro = "registro.php";
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

<body style="background-color:#F1F5F9; position: relative;">

    <div class="curved-bg"></div> <!-- Fondo con curvas -->

    <nav class="navbar fixed-top navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-center" href="#">
            <span class="d-none d-md-inline"><center>Llámanos al (734) 100 6945 - Lunes a Viernes 8:00 a 19:00 Sabado 8:00 a 12:00</center></span>
            <span class="d-inline d-md-none text-center" style="font-size: 12px;">
                <center>Tel: (734) 100 6945  Lun-Vie: 8:00 - 19:00 Sáb: 8:00 - 12:00</center>
            </span>
        </a>
    </div>
</nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mt-5 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://softmorpos.com/img/logo.png" alt="" width="150" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
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
                        <a class="nav-link" href="#">Planes</a>
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

    <div class="container c-pos">
        <div class="row">
            <div class="col-md-6 text-pos-c">
                <h3 class="text-pos-3 text-center">Solución de Punto de Venta Especializada para Taller de Reparaciones</h3>
                <h2 class="text-pos-2">
                    ¿Necesitas vender y generar notas en cuestión de segundos? <br> ¡Con <strong class="text-primary">Softmor POS </strong> , es posible!
                </h2>
                <h6 class="text-pos-3">
                    Optimiza tu proceso de ventas y brinda a tus clientes una experiencia de compra única y rápida. Di adiós a las largas colas en tus momentos más concurridos.
                </h6>
                <a class="btn btn-lg btn-primary mt-4" type="button" href="<?= $registro ?>">Empieza gratis</a>

                <h5>Software de 5 entrellas
                    <img src="./icons8-cinco-de-cinco-estrellas-100.png" width="120px" alt="">
                </h5>


            </div>
            <div class="col-md-6">
                <img src="./img_portada_sp_4.png" alt="" class="img-fluid w-100">
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
        <div class="row">
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
        <div class="row">


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

        <div class="row">

        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 dark-bg">
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@