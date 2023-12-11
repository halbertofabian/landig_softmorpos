<?php
include_once 'config.php';

$nueva_url = str_replace("/api/public/", "", URL_SOFTMOR_POS);
$respuesta = file_get_contents(URL_SOFTMOR_POS . 'consultar-carrito/' . $_GET['tokenpay']);
$cto = json_decode($respuesta, true);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encabezado Similar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://kit.fontawesome.com/f24eb69f99.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="./css/checkout.css" />

    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body {
            background-color: #F8F9FA;
        }

        .bg-primary {
            background-color: #1560F9 !important;
            /* Asegúrate de usar el color de tu marca */
        }

        .logo {
            max-width: 100px;
            /* Ajusta el tamaño de tu logo */
        }

        .countdown {
            display: flex;
            justify-content: center;
        }

        .countdown h3 {
            font-size: 2rem;
        }

        .countdown p {
            font-size: 0.8rem;
            text-align: center;
        }

        @media (max-width: 768px) {
            .countdown h3 {
                font-size: 1.5rem;
            }

            .countdown p {
                font-size: 0.7rem;
            }
        }



        /* Resto de estilos previos */

        /* Para igualar la altura de las tarjetas, podemos usar Flexbox en el contenedor de las tarjetas */
        /* .row.equal-height {
            display: flex;
            flex-wrap: wrap;
        } */

        /* .container {
            max-width: 960px;
        } */



        footer {
            background-color: #343a40;
            /* A darker shade if needed */
            /* Other styles if you need to adjust the font size or padding */
        }

        footer a.text-light:hover {
            text-decoration: underline;
        }


        /* Asegúrate de actualizar el "path-to-your-logo.png" con la ruta real de tu imagen de logo */
        .navbar-brand img {
            max-height: 50px;
            /* Ajusta la altura del logo a tu preferencia */
        }

        /* Si necesitas más control sobre el margen izquierdo, puedes añadir una clase personalizada o modificar directamente el estilo en línea */
        .payment-method {
            border: none;
        }

        .payment-method-header {
            background-color: #f8f9fa;
            cursor: pointer;
        }

        .payment-method-header:not(:first-of-type) {
            margin-top: 10px;
        }

        .payment-method-header h2 {
            font-size: 1rem;
            margin: 0;
        }

        .icon-container {
            display: flex;
            gap: 10px;
        }

        .icon-container img {
            width: 30px;
            /* Ajusta este valor según necesites */
        }

        @media (max-width: 768px) {

            .input-group.mb-3,
            .d-flex.justify-content-between {
                flex-direction: column;
                align-items: start;
            }
        }

        bg-light {
            background-color: #FFF;
        }
    </style>
</head>

<body style="margin-bottom: 200px;">
    <nav class="navbar navbar-expand-lg  mb-5" style="background-color: #fff;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://prueba.softmor.com/upload/ifixit_cliente/6ed53c635a48fc87236d2aaaa684e4c7/medios/655febd58f452.svg" alt="Logo" style="margin-left: 25%;">
            </a>
            <!-- <div class="ms-auto">
                <button class="btn btn-outline-primary" type="button">Iniciar sesión</button>
            </div> -->
        </div>
    </nav>

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <span class="float-end">¿Ya tienes cuenta? <a href="https://app.softmor.com">Iniciar sesión</a> </span>
                        </div>
                        <div class="form-group mt-2 mb-1">
                            <label for="correo_registro"> <strong style="font-size:18px" >Registrate</strong> </label>
                            <input type="text" name="correo_registro" id="correo_registro" class="form-control" placeholder="Correo electrónico" required>
                            <small id="helpId_correo" class="form-text text-muted text-danger d-none"></small>
                        </div>
                        <div class="form-group ">
                            <button type="button" class="btn btn-primary float-end mt-1" id="btnContinuar">Continuar</button>
                        </div>
                    </div>
                    <div class="col-12 d-none div-carrito">
                        <div class="container my-3">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="card m-2">
                                        <img src="https://prueba.softmor.com/upload/ifixit_cliente/6ed53c635a48fc87236d2aaaa684e4c7/medios/655febd58f452.svg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">SOFTMOR POS ANUAL</h5>
                                            <p class="card-text"> <s>$4200.00</s> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" placeholder="Código de descuento o tarjeta de regalo">
                                        <button class="btn btn-outline-secondary" type="button">Aplicar</button>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Subtotal</span>
                                        <span>$4,200.00</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Descuento (50%)</span>
                                        <span>$2,100.00</span>
                                    </div>
                                    <div class="d-flex justify-content-between my-3">
                                        <span><strong>Total</strong></span>
                                        <span><strong>MXN $2,100.00</strong></span>
                                    </div>
                                    <!-- <div class="d-flex justify-content-between my-3 nota d-none">
                                <p> <strong>Nota:</strong> Este método de pago es manual. Después de realizar tu pago, por favor sube tu comprobante de pago. A continuación, un agente de ventas confirmará la activación de tu cuenta. Una vez activada, podrás hacer clic en <strong>"Continuar"</strong> para proceder. </p>
                            </div>
                            <div class="form-group mb-3  nota d-none">
                                <button class="btn btn-primary btnContinuar" type="button">Continuar</button>
                            </div> -->
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-md-6 d-none div-metodos-pago">
                <!-- <h4 class="">Pago</h4> -->
                <strong style="font-size:18px" >Pago</strong><br>
                <span>Todas las transacciones son seguras y están encriptadas.</span>
                <div class="accordion" id="paymentMethods">

                    <div class="accordion-item payment-method">
                        <h2 class="accordion-header payment-method-header" id="headingtwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#creditCard" aria-expanded="false" aria-controls="creditCard">
                                Tarjeta de crédito
                            </button>
                        </h2>
                        <div id="creditCard" class="accordion-collapse collapse" aria-labelledby="headingtwo" data-bs-parent="#paymentMethods">
                            <div class="accordion-body">
                                <!-- Contenido del formulario de tarjeta de crédito aquí -->
                                <div class="card-body d-none cardStrype ">
                                    <!-- Display a payment form -->

                                    <form id="payment-form">
                                        <div id="link-authentication-element">
                                            <!--Stripe.js injects the Link Authentication Element-->
                                        </div>
                                        <div id="payment-element">
                                            <!--Stripe.js injects the Payment Element-->
                                        </div>
                                        <button id="submit">
                                            <div class="spinner hidden" id="spinner"></div>
                                            <span id="button-text">Continuar</span>
                                        </button>
                                        <div id="payment-message" class="hidden"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item payment-method">
                        <h2 class="accordion-header payment-method-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#transfer" aria-expanded="false" aria-controls="transfer">
                                Transferencia
                            </button>
                        </h2>
                        <div id="transfer" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#paymentMethods">
                            <div class="accordion-body">
                                <!-- Contenido del formulario de tarjeta de crédito aquí -->
                                <table class="table">
                                    <tr>
                                        <th>Banco</th>
                                        <td>STP</td>
                                    </tr>
                                    <tr>
                                        <th>CLABE interbancaria</th>
                                        <td>646017206890351424</td>
                                    </tr>
                                    <tr>
                                        <th>Nombre</th>
                                        <td>Softmor Tecnología</td>
                                    </tr>
                                    <tr>
                                        <th>Referencia de pago</th>
                                        <td><?= $cto['cto_referencia'] ?></td>
                                    </tr>

                                </table>
                                <p> <strong>Nota:</strong> Este método de pago es manual. Después de realizar tu pago, por favor sube tu comprobante de pago. A continuación, un agente de ventas confirmará la activación de tu cuenta. Una vez activada, podrás hacer clic en <strong>"Continuar"</strong> para proceder. </p>
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="btn-group w-100" role="group" aria-label="Button group name">
                                            <button type="button" class="btn btn-danger btnCargarComprobante" item="local"><i class="fa fa-image"></i> Cargar comprobante</button>
                                            <button type="button" class="btn btn-dark btnCargarComprobante" item="qr"><i class="fa fa-qrcode"></i> QR</button>
                                        </div>
                                    </div>
                                    <div class="col-12 cto_comprobante d-none">
                                        <form id="formGuardarComprobante">
                                            <div class="form-group">
                                                <label for="pds_imagen">Subir imagen</label>
                                                <input type="hidden" name="token" value="<?= $_GET['tokenpay'] ?>">
                                                <input type="file" class="form-control" name="pds_imagen" id="" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-load">Subir comprobante</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-12 cto_qr d-none text-center">
                                        <span>Escanea este código QR para subir el comprobante de pago</span><br>
                                        <a href="<?= $nueva_url ?>/file_landing.php?token=<?= $_GET['tokenpay'] ?>" target="_blank" id="enlace-con-token">
                                            <img src="" id="img-QR" width="250" alt=""><br>
                                        </a>
                                    </div>
                                    <div class="form-group mb-3">
                                        <button class="btn btn-primary btnContinuar" type="button">Continuar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item payment-method">
                        <h2 class="accordion-header payment-method-header" id="headingfour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#deposit" aria-expanded="false" aria-controls="deposit">
                                Deposito en OXXO o ventanilla BBVA
                            </button>
                        </h2>
                        <div id="deposit" class="accordion-collapse collapse " aria-labelledby="headingfour" data-bs-parent="#paymentMethods">
                            <div class="accordion-body">
                                <!-- Contenido del formulario de tarjeta de crédito aquí -->
                                <table class="table">
                                    <tr>
                                        <th>Banco</th>
                                        <td>BBVA</td>
                                    </tr>
                                    <tr>
                                        <th>Número de cuenta</th>
                                        <td>4152 3136 7828 3263</td>
                                    </tr>
                                    <tr>
                                        <th>Nombre</th>
                                        <td>Héctor Alberto López Fabián</td>
                                    </tr>
                                    <tr>
                                        <th>Referencia de pago</th>
                                        <td><?= $cto['cto_referencia'] ?></td>
                                    </tr>

                                </table>
                                <p> <strong>Nota:</strong> Este método de pago es manual. Después de realizar tu pago, por favor sube tu comprobante de pago. A continuación, un agente de ventas confirmará la activación de tu cuenta. Una vez activada, podrás hacer clic en <strong>"Continuar"</strong> para proceder. </p>
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="btn-group w-100" role="group" aria-label="Button group name">
                                            <button type="button" class="btn btn-danger btnCargarComprobante2" item="local"><i class="fa fa-image"></i> Cargar comprobante</button>
                                            <button type="button" class="btn btn-dark btnCargarComprobante2" item="qr"><i class="fa fa-qrcode"></i> QR</button>
                                        </div>
                                    </div>
                                    <div class="col-12 cto_comprobante2 d-none">
                                        <form id="formGuardarComprobante2">
                                            <div class="form-group">
                                                <label for="pds_imagen">Subir imagen</label>
                                                <input type="hidden" name="token" value="<?= $_GET['tokenpay'] ?>">
                                                <input type="file" class="form-control" name="pds_imagen" id="" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-load">Subir comprobante</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-12 cto_qr2 d-none">
                                        <span>Escanea este código QR para subir el comprobante de pago</span><br>
                                        <a href="<?= $nueva_url ?>/file_landing.php?token=<?= $_GET['tokenpay'] ?>" target="_blank" id="enlace-con-token">
                                            <img src="" id="img-QR2" width="250" alt=""><br>
                                        </a>
                                    </div>
                                    <div class="form-group mb-3">
                                        <button class="btn btn-primary btnContinuar" type="button">Continuar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item payment-method">
                        <h2 class="accordion-header payment-method-header" id="headingTree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paypal" aria-expanded="false" aria-controls="paypal">
                                PayPal
                            </button>
                        </h2>
                        <div id="paypal" class="accordion-collapse collapse" aria-labelledby="headingTree" data-bs-parent="#paymentMethods">
                            <div class="accordion-body">
                                <!-- Contenido del formulario de PayPal aquí -->
                                Paypal
                            </div>
                        </div>
                    </div>

                    <!-- Repite la estructura para los otros métodos de pago -->
                </div>
            </div>
        </div>
    </div>







    <footer class="bg-dark text-light py-3 footer fixed-bottom mt-5">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p>&copy; 2004-2023 softmor.com</p>
                    <a href="#" class="text-light mx-2">Términos de servicio</a>
                    <a href="#" class="text-light mx-2">Política de privacidad</a>
                    <p>Nuestra misión es facilitar la vida de los desarrolladores de sitios web y sus clientes. Lo hacemos ofreciendo servicios de hosting web fáciles de usar, rápidos y confiables.</p>
                </div>
            </div>
        </div>
    </footer>





    <!-- Modal -->
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLoginLabel">Iniciar Sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Aquí el contenido que aparece al hacer clic en "Iniciar sesión" -->
                    <p>Contenido que aparece por encima de los elementos...</p>
                </div>
            </div>
        </div>
    </div>



    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        $(document).on('click', '.btnCargarComprobante', function() {
            var item = $(this).attr('item');
            if (item == 'local') {
                $(".cto_comprobante").removeClass('d-none');
                $(".cto_qr").addClass('d-none');
            } else {
                generarQR();

            }
        });

        function generarQR() {
            $.ajax({
                type: 'GET',
                url: '<?= URL_SOFTMOR_POS ?>' + 'generar/QR/' + '<?= $_GET['tokenpay'] ?>',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(res) {
                    var dir = '<?= $nueva_url ?>' + '/upload/qr_generator/files';
                    var filename = dir + "/f_" + '<?= $_GET['tokenpay'] ?>' + '.jpg';
                    $("#img-QR").attr("src", filename);
                    $(".cto_comprobante").addClass('d-none');
                    $(".cto_qr").removeClass('d-none');
                }
            });
        }
        $(document).on('click', '.btnCargarComprobante2', function() {
            var item = $(this).attr('item');
            if (item == 'local') {
                $(".cto_comprobante2").removeClass('d-none');
                $(".cto_qr2").addClass('d-none');
            } else {
                generarQR2();

            }
        });

        function generarQR2() {
            $.ajax({
                type: 'GET',
                url: '<?= URL_SOFTMOR_POS ?>' + 'generar/QR/' + '<?= $_GET['tokenpay'] ?>',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(res) {
                    var dir = '<?= $nueva_url ?>' + '/upload/qr_generator/files';
                    var filename = dir + "/f_" + '<?= $_GET['tokenpay'] ?>' + '.jpg';
                    $("#img-QR2").attr("src", filename);
                    $(".cto_comprobante2").addClass('d-none');
                    $(".cto_qr2").removeClass('d-none');
                }
            });
        }

        $('#formGuardarComprobante').on('submit', function(e) {
            e.preventDefault();
            var datos = new FormData(this)
            datos.append('btnGuardarComprobante', true);
            $.ajax({
                type: 'POST',
                url: '<?= URL_SOFTMOR_POS ?>' + 'guardar/comprobante',
                data: datos,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function() {
                    startLoadButton()
                },
                success: function(res) {
                    stopLoadButton("Subir comprobante");
                    if (res.status) {
                        swal({
                            title: '¡Bien!',
                            text: res.mensaje,
                            type: 'success',
                            icon: 'success'
                        }).then(function() {
                            $('#formGuardarComprobante')[0].reset();

                        });

                    } else {
                        swal('Oops', res.mensaje, 'error');
                    }
                },
            });
        });
        $('#formGuardarComprobante2').on('submit', function(e) {
            e.preventDefault();
            var datos = new FormData(this)
            datos.append('btnGuardarComprobante', true);
            $.ajax({
                type: 'POST',
                url: '<?= URL_SOFTMOR_POS ?>' + 'guardar/comprobante',
                data: datos,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function() {
                    startLoadButton()
                },
                success: function(res) {
                    stopLoadButton("Subir comprobante");
                    if (res.status) {
                        swal({
                            title: '¡Bien!',
                            text: res.mensaje,
                            type: 'success',
                            icon: 'success'
                        }).then(function() {
                            $('#formGuardarComprobante2')[0].reset();

                        });

                    } else {
                        swal('Oops', res.mensaje, 'error');
                    }
                },
            });
        });

        function startLoadButton() {
            $(".btn-load").attr("disabled", true);
            $(".btn-load").html(` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Por favor espere...`)
        }

        function stopLoadButton(label) {
            $(".btn-load").attr("disabled", false);
            if (label == "") {
                $(".btn-load").html("ACEPTAR");
            } else {
                $(".btn-load").html(label);
            }
        }
        $(document).on('click', '#btnContinuar', function() {
            var correo_registro = $.trim($("#correo_registro").val());
            if (correo_registro == "") {
                swal('Oops', '¡El correo es obligatorio!', 'error');
                return false;
            }
            var datos = new FormData();
            datos.append('correo_registro', correo_registro);
            datos.append('btnCorreoRegitro', true);
            $.ajax({
                type: 'POST',
                url: '<?= URL_SOFTMOR_POS ?>' + 'guardar/correo',
                data: datos,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.status) {
                        $("#correo_registro").removeClass('border-danger');
                        $("#correo_registro").addClass('border-success');
                        $("#correo_registro").attr('readonly', true);
                        $("#helpId_correo").addClass("d-none");
                        $("#helpId_correo").text("");

                        $("#btnContinuar").addClass('d-none');
                        $(".div-metodos-pago").removeClass('d-none');
                        $(".div-carrito").removeClass('d-none');
                    } else {
                        $("#correo_registro").removeClass('border-success');
                        $("#correo_registro").addClass('border-danger');
                        $("#helpId_correo").removeClass("d-none");
                        $("#helpId_correo").text(res.mensaje);
                    }
                }
            });
        });

        $('#paymentMethods').on('show.bs.collapse', function(event) {
            var panelId = $(event.target).attr('id');
            if (panelId == 'transfer' || panelId == 'deposit') {
                $(".nota").removeClass('d-none');
            } else {
                $(".nota").addClass('d-none');
            }
        });

        $('#paymentMethods').on('hide.bs.collapse', function(event) {
            var panelId = $(event.target).attr('id');
            if (panelId == 'creditCard') {
                $(".nota").addClass('d-none');
            }

        });
        document.addEventListener('DOMContentLoaded', (event) => {
            const targetDate = new Date("2023-12-31T23:59:59").getTime(); // Ajusta esta fecha a tu objetivo

            const countdownFunction = setInterval(function() {
                const now = new Date().getTime();
                const distance = targetDate - now;

                document.getElementById('days').innerText = Math.floor(distance / (1000 * 60 * 60 * 24));
                document.getElementById('hours').innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                document.getElementById('minutes').innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                document.getElementById('seconds').innerText = Math.floor((distance % (1000 * 60)) / 1000);

                if (distance < 0) {
                    clearInterval(countdownFunction);
                    document.getElementById('countdown').innerHTML = "¡La oferta ha finalizado!";
                }
            }, 1000);
        });

        document.querySelectorAll('.plan-radio-button').forEach((radioButton) => {
            radioButton.addEventListener('change', (event) => {
                if (event.target.checked) {
                    // Aquí puedes manejar lo que sucede cuando un plan es seleccionado
                    console.log(`Plan seleccionado: ${event.target.value}`);
                }
            });
        });

        document.querySelectorAll('.plan-card').forEach((card) => {
            card.addEventListener('click', () => {
                const radioButton = card.querySelector('.plan-radio-button');
                radioButton.checked = true;
                // Aquí podrías disparar otros cambios o efectos visuales cuando se selecciona un plan.
            });
        });

        // Opcional: si también deseas cambiar la selección al hacer clic en la etiqueta
        document.querySelectorAll('.plan-label').forEach((label) => {
            label.addEventListener('click', (e) => {
                e.stopPropagation(); // Previene que el evento se propague al card y active dos veces el radio
                const radioButton = document.getElementById(label.getAttribute('for'));
                radioButton.checked = true;
                // Aquí también podrías disparar otros cambios o efectos visuales cuando se selecciona un plan.
            });
        });

        document.querySelectorAll('.plan-card').forEach((card) => {
            card.addEventListener('click', () => {
                // Desmarca todos los radio buttons
                document.querySelectorAll('.plan-radio-button').forEach((radio) => {
                    const parentCard = radio.closest('.plan-card');
                    parentCard.style.borderColor = 'transparent'; // Restablece el borde
                });

                // Marca el radio button seleccionado y cambia el color del borde
                const radioButton = card.querySelector('.plan-radio-button');
                radioButton.checked = true;
                card.style.borderColor = '#1560F9'; // Establece el color del borde del card seleccionado
            });
        });

        document.getElementById('togglePassword').addEventListener('click', function(e) {
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash'); // Cambiar el ícono a un ojo tachado
        });
    </script>

    <script>
        // This is your test publishable API key.
        const stripe = Stripe("pk_test_51Jc9pJJjDdZvQZOABnRMlqkQBBFEh6XZS7dYrnP9FI3IBeXFj12JQZ5ljqpXQknojlpVCAJ11DcmXN6NbgU1asjL00WOGfaglD");

        // The items the customer wants to buy
        const items = [{
            token_pay: "35t554gs782kl09s-23"
        }];

        let elements;



        document
            .querySelector("#payment-form")
            .addEventListener("submit", handleSubmit);

        let emailAddress = '';
        // Fetches a payment intent and captures the client secret
        async function initialize() {
            const {
                clientSecret
            } = await fetch("process_payment.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    items
                }),
            }).then((r) => r.json());

            elements = stripe.elements({
                clientSecret
            });

            const linkAuthenticationElement = elements.create("linkAuthentication");
            linkAuthenticationElement.mount("#link-authentication-element");

            const paymentElementOptions = {
                layout: "tabs",
            };

            const paymentElement = elements.create("payment", paymentElementOptions);
            paymentElement.mount("#payment-element");
        }

        async function handleSubmit(e) {
            e.preventDefault();
            setLoading(true);

            const {
                error
            } = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    // Make sure to change this to your payment completion page
                    return_url: "http://localhost/landig-page-sp/success.php",
                    receipt_email: emailAddress,
                },
            });

            // This point will only be reached if there is an immediate error when
            // confirming the payment. Otherwise, your customer will be redirected to
            // your `return_url`. For some payment methods like iDEAL, your customer will
            // be redirected to an intermediate site first to authorize the payment, then
            // redirected to the `return_url`.
            if (error.type === "card_error" || error.type === "validation_error") {
                showMessage(error.message);
            } else {
                showMessage("An unexpected error occurred.");
            }

            setLoading(false);
        }

        // Fetches the payment intent status after payment submission
        async function checkStatus() {
            const clientSecret = new URLSearchParams(window.location.search).get(
                "payment_intent_client_secret"
            );

            if (!clientSecret) {
                return;
            }

            const {
                paymentIntent
            } = await stripe.retrievePaymentIntent(clientSecret);

            switch (paymentIntent.status) {
                case "succeeded":
                    showMessage("Payment succeeded!");
                    break;
                case "processing":
                    showMessage("Your payment is processing.");
                    break;
                case "requires_payment_method":
                    showMessage("Your payment was not successful, please try again.");
                    break;
                default:
                    showMessage("Something went wrong.");
                    break;
            }
        }

        // ------- UI helpers -------

        function showMessage(messageText) {
            const messageContainer = document.querySelector("#payment-message");

            messageContainer.classList.remove("hidden");
            messageContainer.textContent = messageText;

            setTimeout(function() {
                messageContainer.classList.add("hidden");
                messageContainer.textContent = "";
            }, 4000);
        }

        // Show a spinner on payment submission
        function setLoading(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                document.querySelector("#submit").disabled = true;
                document.querySelector("#spinner").classList.remove("hidden");
                document.querySelector("#button-text").classList.add("hidden");
            } else {
                document.querySelector("#submit").disabled = false;
                document.querySelector("#spinner").classList.add("hidden");
                document.querySelector("#button-text").classList.remove("hidden");
            }
        }



        $("#v-pills-credit-tab").on("click", function() {

            // $(").removeClass('d-none')
        })

        $('#paymentMethods').on('show.bs.collapse', function(event) {
            var panelId = $(event.target).attr('id');
            if (panelId == 'creditCard') {
                $(".cardStrype").removeClass('d-none');
                initialize();
                checkStatus();
            } else {
                $(".cardStrype").addClass('d-none');

            }
        });

        $('#btnRegistrarGratis').on('click', function() {
            $(".pos-auttetication-registro").removeClass("d-none");
            $(".pos-auttetication-off").addClass("d-none");
        });


        function formatearMoneda(valor) {
            // Formatear el número en moneda mexicana con 2 decimales
            return valor.toLocaleString('es-MX', {
                style: 'currency',
                currency: 'MXN',
                minimumFractionDigits: 2
            });
        }
    </script>



</body>

</html>