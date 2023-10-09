<?php
include_once 'config.php';
if (isset($_GET['tokenpay'])) {
    $respuesta = file_get_contents(URL_SOFTMOR_POS . 'consultar-carrito/' . $_GET['tokenpay']);
    $cto = json_decode($respuesta, true);
    if ($cto['cto_correo_suscriptor'] !== "") {
        $mostrar_correo = "";
        $mostrar_auth = 'd-none';
    } else {
        $mostrar_correo = 'd-none';
        $mostrar_auth = "";
    }
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
    <!-- <link rel="stylesheet" href="./css/style-sp.css"> -->

    <!-- Agrega jQuery para el funcionamiento del wizard -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->


    <link rel="stylesheet" href="./css/checkout.css" />

    <script src="https://js.stripe.com/v3/"></script>

    <style>
        @media (min-width: 768px) {
            .fixed-div {
                position: fixed;
                /* top: 100px; */
                right: 10px;
                /* background-color: #8EC2A9; */
                /* padding: 10px; */
                border-radius: 5px;
                z-index: 1000;
            }
        }
    </style>
</head>

<body style="background-color:#F8F9FA;">

    <div class="container-fluid">
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="https://softmorpos.com/img/logo.png" alt="" width="150">
                </a>
                <div class="d-flex align-items-center">
                    <img src="./candado.png" alt="" width="40" class="me-3">
                    <strong> Compra Segura </strong>
                </div>
            </div>
        </nav>
        <div class="row mt-3">

            <div class="col-md-8">
                <div class="row">
                    <div class="col-12 mb-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center">Identificate</h4>
                                <div class="row pos-auttetication-on <?= $mostrar_correo ?>">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for=""> Correo electronico suscriptor</label>
                                            <input type="text" name="" id="" class="form-control" placeholder="" value="<?= $cto['cto_correo_suscriptor'] ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row pos-auttetication-registro d-none">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Correo electronico</label>
                                            <input type="text" name="" id="" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Contraseña </label>
                                            <input type="text" name="" id="" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for=""> Nombre </label>
                                            <input type="text" name="" id="" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> País </label>
                                            <input type="text" name="" id="" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Número teléfono </label>
                                            <input type="text" name="" id="" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary mt-3">Guadar</button>
                                    </div>
                                </div>

                                <div class="row pos-auttetication-off <?= $mostrar_auth ?>">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Correo electronico</label>
                                            <input type="text" name="" id="usr_id" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Contraseña </label>
                                            <input type="password" name="" id="usr_clave" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-12 text-end">
                                        <button type="button" class="btn btn-primary mt-3" id="btnIniciarSesion">Iniciar sesión</button>
                                    </div>
                                    <div class="col-12 text-center mt-4 align-items-center">
                                        <p>¿Aún no tienes cuenta? <a href="javascript:void(0);" id="btnRegistrarGratis">Registrate gratis</a> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center">Metodos de pago</h4>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="payStripe">
                                                    <label class="form-check-label" for="payStripe">
                                                        Tarjeta crédito/débito
                                                    </label>
                                                </div>
                                            </div>


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
                                                        <span id="button-text">Pagar</span>
                                                    </button>
                                                    <div id="payment-message" class="hidden"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="">
                                                    <label class="form-check-label" for="">
                                                        PayPal
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="card-body d-none">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="">
                                                    <label class="form-check-label" for="">
                                                        Transferencía / Deposito
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="card-body d-none">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 fixed-div">
                <div class="card">
                    <div class="card-header text-center">
                        Resumén de compra
                    </div>
                    <div class="card-body">
                        <!-- -->
                        <div class="pos-paquete">

                            <div class="row pos-carrito text-center">
                                <div class="col-12">
                                    <span class="">Plan <strong><?= $cto['pqt_nombre'] ?></strong> </span>
                                </div>
                                <div class="col-12">
                                    <span class=""><?= $cto['pcto_periodo'] == "1 month" ? "Facturación mensual" : "Facturación anual" ?></span>
                                </div>
                                <div class="col-12">
                                    <span class=""><?= $cto['pcto_costo'] ?> / <?= $cto['pcto_periodo'] == "1 month" ? "1 mes" : "1 año" ?> </span>
                                </div>
                            </div>

                            <hr>
                            <div class="row pos-cuenta">



                                <P class="text-center mb-3">¿Tienes un cupón?</P>
                                <input type="text" class="form-control" id="cps_codigo" value="" readonly>
                                <small id="text-cupon" class="mb-4">Cupón aplicado</small>

                                <hr>

                                <table style="font-size:17px">
                                    <tr>
                                        <td>
                                            <p>Descuento del cupon ....</p>
                                        </td>
                                        <th class="text-end">
                                            <p id="descuento_cupon"></p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Sub total ....</p>
                                        </td>
                                        <th class="text-end">
                                            <p id="subtotal"></p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Total del pedido ....</p>
                                        </td>
                                        <th class="text-end">
                                            <p id="total"> </p>
                                        </th>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <p style="font-size:10px">Tu plan se renovará el 28 de cada año
                            por un valor de $ 4,050 MXN.
                            Puedes cancelar tu plan en cualquier momento.
                            Al pagar, aceptas los Términos y condiciones. <a href="">Terminos y condiciones</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Bootstrap JS (si es necesario) -->

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


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
                    return_url: "http://localhost/mp/success.php",
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

        $("#payStripe").on("click", function() {
            initialize();
            checkStatus();
            $(".cardStrype").removeClass('d-none')
        })

        $('#btnRegistrarGratis').on('click', function() {
            $(".pos-auttetication-registro").removeClass("d-none");
            $(".pos-auttetication-off").addClass("d-none");
        });

        $('#btnIniciarSesion').on('click', function() {
            var usr_id = $("#usr_id").val();
            var usr_clave = $("#usr_clave").val();

            if (usr_id == "") {
                $("#usr_id").focus();
                return toastr.warning("El correo es obligatorio.", '¡ADVERTENCIA!');
            }
            if (usr_clave == "") {
                $("#usr_clave").focus();
                return toastr.warning("La contraseña es obligatoria.", '¡ADVERTENCIA!');
            }

            $.ajax({
                type: 'POST',
                url: '<?= URL_SOFTMOR_POS ?>loginSoftmorPosV2',
                data: JSON.stringify({
                    'usr_id': usr_id,
                    'usr_clave': usr_clave,
                    'cto_id': '<?= $cto['cto_id'] ?>'
                }),
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.status) {
                        toastr.success(res.mensaje, '¡Muy bien!');
                        // $(".pos-auttetication-on").removeClass("d-none");
                        // $(".pos-auttetication-off").addClass("d-none");

                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        toastr.error(res.mensaje, '¡ERROR!');
                    }
                }
            });
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
<?php
if (isset($_GET['ref'])) :
?>
    <script>
        $.ajax({
            type: 'GET',
            url: '<?= URL_SOFTMOR_POS ?>' + 'consultar-ref/' + '<?= $_GET['ref'] ?>',
            // data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status) {
                    $("#cps_codigo").val(res.cps.cps_codigo);
                    $("#text-cupon").addClass("text-success");
                    $("#text-cupon").removeClass("text-danger");
                    // $(".input-promocional").removeClass("d-none");

                    var desc_cupon = '<?= $cto['pcto_costo'] ?>' - ('<?= $cto['pcto_costo'] ?>' * res.cps.cps_descuento_a / 100);
                    var descuento = desc_cupon * 12;
                    var subtotal = '<?= $cto['pcto_costo'] ?>' * 12;
                    var descuento_total = subtotal - descuento;
                    var total = subtotal - descuento_total;

                    $("#descuento_cupon").text("MX " + formatearMoneda(descuento_total))
                    $("#subtotal").text("MX " + formatearMoneda(subtotal))
                    $("#total").text("MX " + formatearMoneda(total))

                } else {
                    $("#cps_codigo").val("");
                    $("#text-cupon").addClass("text-danger");
                    $("#text-cupon").removeClass("text-success");

                    var subtotal = '<?= $cto['pcto_costo'] ?>' * 12;
                    var descuento_total = 0;
                    var total = subtotal - descuento_total;

                    $("#descuento_cupon").text("MX " + formatearMoneda(descuento_total))
                    $("#subtotal").text("MX " + formatearMoneda(subtotal))
                    $("#total").text("MX " + formatearMoneda(total))
                }
            }
        });
    </script>
<?php else :
?>
    <script>
        $("#cps_codigo").val("");
        $("#text-cupon").addClass("text-danger");
        $("#text-cupon").removeClass("text-success");

        var subtotal = '<?= $cto['pcto_costo'] ?>' * 12;
        var descuento_total = 0;
        var total = subtotal - descuento_total;

        $("#descuento_cupon").text("MX " + formatearMoneda(descuento_total))
        $("#subtotal").text("MX " + formatearMoneda(subtotal))
        $("#total").text("MX " + formatearMoneda(total))
    </script>
<?php endif; ?>