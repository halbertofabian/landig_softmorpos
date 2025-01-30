<?php
include_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sistema punto de venta y gestión de ordenes de servicio #1 en México</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="./img/taller_control_isotipo.svg" type="image/x-icon">
    <link rel="stylesheet" href="./css/style-registro.css">
    <!-- Agrega jQuery para el funcionamiento del wizard -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container d-flex">
        <!-- Left Section -->
        <div class="left-section col-12 col-md-6">
            <img src="https://tallercontrol.com/img/logo_taller_control.svg" alt="Logo Pulpos" class="mb-3">
            <p class="badge bg-primary text-white">Prueba gratis por 14 días</p>
            <h3 class="mb-4">Ingresa tus datos para comenzar</h3>
            <p>¿Ya estás registrado? <a href="#">Ingresa a tu cuenta</a></p>
            <form id="formDemo2025" method="post">
                <div class="mb-3">
                    <label for="propietario" class="form-label">Correo electónico</label>
                    <input type="email" class="form-control" id="propietario" name="propietario" placeholder="Ingresa tu email" value="<?= base64_decode($_GET['email']) ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre completo" autofocus>

                </div>
                <div class="mb-3">
                    <label for="scs_pais" class="form-label">Teléfono de WhatsApp</label>
                    <div class="input-group">

                        <select class="input-group-text" name="scs_pais" id="scs_pais">
                            <option value="México+521">+521 🇲🇽</option>
                            <option value="Argentina+54">+54 🇦🇷</option>
                            <option value="Bolivia+591">+591 🇧🇴</option>
                            <option value="Brasil+55">+55 🇧🇷</option>
                            <option value="Chile+56">+56 🇨🇱</option>
                            <option value="Colombia+57">+57 🇨🇴</option>
                            <option value="Costa Rica+506">+506 🇨🇷</option>
                            <option value="Cuba+53">+53 🇨🇺</option>
                            <option value="Ecuador+593">+593 🇪🇨</option>
                            <option value="El Salvador+503">+503 🇸🇻</option>
                            <option value="Guatemala+502">+502 🇬🇹</option>
                            <option value="Honduras+504">+504 🇭🇳</option>
                            <option value="México+521">+521 🇲🇽</option>
                            <option value="Nicaragua+505">+505 🇳🇮</option>
                            <option value="Panamá+507">+507 🇵🇦</option>
                            <option value="Paraguay+595">+595 🇵🇾</option>
                            <option value="Perú+51">+51 🇵🇪</option>
                            <option value="República Dominicana+1">+1 🇩🇴</option>
                            <option value="Uruguay+598">+598 🇺🇾</option>
                            <option value="Venezuela+58">+58 🇻🇪</option>
                            <option value="España+34">+34 🇪🇸</option>
                            <option value="Estados Unidos+1">+1 🇺🇸</option>


                        </select>
                        <input type="text" class="form-control" id="scs_whatsapp" name="scs_whatsapp" placeholder="Ingresa tu teléfono">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Define tu contraseña">
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Repite tu contraseña">
                </div>
                <button type="submit" id="btnEmpezarDemo" class="btn btn-primary w-100">¡Comenzar la prueba!</button>
            </form>
            <p class="mt-3 text-muted">No necesitas tarjeta de crédito para comenzar</p>
        </div>

        <!-- Right Section -->
        <div class="right-section col-12 col-md-6">
            <div class="feature-container d-flex flex-column justify-content-center">
                <i class="fas fa-upload fa-3x mb-3 text-primary"></i>
                <h5 class="fw-bold">Cargamos tu inventario gratis</h5>
                <p>Nuestro equipo te ayudará a que tengas todo listo</p>
            </div>
            <div class="feature-container d-flex flex-column justify-content-center">
                <i class="fas fa-tags fa-3x mb-3 text-primary"></i>
                <h5 class="fw-bold">A partir de $175 MXN por mes</h5>
                <p>Un precio claro y simple</p>
            </div>
            <div class="feature-container d-flex flex-column justify-content-center">
                <i class="fas fa-mobile-alt fa-3x mb-3 text-primary"></i>
                <h5 class="fw-bold">Flexible</h5>
                <p>Puedes usarlo en cualquier dispositivo</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <script>
        $("#formDemo2025").on("submit", function(e) {
            e.preventDefault();
            alert("Hola, si funciono");
            var formDemo2025 = new FormData(this);

            // Llamada AJAX
            $.ajax({
                type: "POST",
                url: '<?= base64_decode($_GET['ruta']) . 'suscripcion/demo/registro' ?>', // Cambia esta URL por la de tu API
                data: formDemo2025,
                dataType: "json",
                processData: false,
                contentType: false, // Especifica el tipo de contenido
                beforeSend: function() {
                    $("#btnEmpezarDemo").attr('disabled', true);
                    $("#btnEmpezarDemo").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');
                },
                success: function(res) {


                    alert(res.mensaje)

                    if (res.status) {

                        window.location.href = res.pagina



                    } else {


                    }
                    $("#btnEmpezarDemo").attr('disabled', false);
                    $("#btnEmpezarDemo").html('¡Comenzar la prueba!');

                },
                error: function(xhr, status, error) {
                    $('#response').html('<p style="color: red;">Error: ' + xhr.responseText + '</p>');
                }
            });


        })
    </script>


</body>

</html>