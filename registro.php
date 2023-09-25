<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Bootstrap 5</title>

    <!-- Agrega el enlace al archivo CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/f24eb69f99.js" crossorigin="anonymous"></script>
    <link href="./css/select2.min.css" rel="stylesheet">
    <link href="./css/select2-bootstrap-5-theme.min.css" rel="stylesheet">
    <link href="./css/select2-bootstrap-5-theme.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <style>
        @media (max-width: 767px) {

            /* Estilos para dispositivos móviles */
            .custom-section {
                padding: 5px;
                /* La mitad de la altura en dispositivos móviles */
            }

            .footer-logo {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                /* background-color: #333; */
                /* Cambia el color de fondo según tu diseño */
                color: #fff;
                /* Cambia el color del texto según tu diseño */
                padding: 10px;
                /* Espaciado interior */
                text-align: center;
            }
        }

        @media (min-width: 768px) {

            /* Estilos para pantallas grandes (768px o más) */
            .custom-section {
                height: 100vh;
                /* Todo el height en pantallas grandes */
            }
        }

        /** Estilo de letras */
        .text-h1 {

            top: 15vh;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 500;
            font-size: 30px;
            line-height: 135.19%;
            text-align: center;
            color: #707070;
        }

        .text-h2 {

            top: 15vh;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 500;
            font-size: 18px;
            line-height: 135.19%;
            text-align: center;
            color: #707070;
        }

        .text-normal {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 500;
            font-size: 16px;
            line-height: 135.19%;
            text-align: center;
            color: #707070;
        }

        .text-p {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 500;
            font-size: 18px;
            line-height: 135.19%;
            text-align: center;
            color: #707070;
        }

        /* Estilos personalizados para el wizard */
        .wizard-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .wizard-header {
            text-align: center;
        }

        .wizard-step {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            /* border: 1px solid #ccc; */
            border-radius: 5px;
            display: none;
        }

        .wizard-step.active {
            display: block;
        }

        .wizard-nav {
            text-align: center;
            margin-top: 20px;
        }

        .wizard-nav button {
            margin-right: 10px;
        }

        .btn-link {
            text-decoration: none;
        }

        /* Estilo para el contenedor */
        .input-con-boton {
            display: inline-flex;
            align-items: center;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 4px;
        }

        /* Estilo para el botón */
        .input-con-boton button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
            margin-left: 5px;
        }

        /* Estilo para el borde verde */
        .borde-verde {
            border: 2px solid green;
        }

        .borde-rojo {
            border: 2px solid red;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sección con 8 columnas para el formulario -->
            <div class="col-md-7 d-flex align-items-center justify-content-center custom-section">
                <input type="hidden" id="ppt_id">
                <!-- Wizard de 4 >
                <div class="wizard-container">
                    <!-- <div class="wizard-header">
                            <h1 class="text-h1">¡Prueba Softmor POS gratis por 15 días 😀! </h1>
                        </div> -->
                <!-- Wizard Steps -->
                <div class="wizard-step active">
                    <h1 class="text-h1 d-none" id="encabezado1">¡Prueba Softmor POS gratis por 15 días 😀! </h1>
                    <h1 class="text-h1 d-none" id="encabezado2"> <strong class="text-primary" id="ads_nombre"></strong> te invita a probar Softmor POS gratis por 15 días 😀 </h1>
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label for="ppt_correo" class="text-normal">Correo electrónico</label>
                                <input type="text" class="form-control" id="ppt_correo" name="ppt_correo" required>
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label for="ppt_clave" class="text-normal">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="ppt_clave" name="ppt_clave" aria-describedby="passwordToggle" minlength="8" placeholder="Min. 8 caracteres" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="passwordToggle">
                                            <i class="far fa-eye"></i> <!-- Ícono inicial -->
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="button" class="btn btn-primary next-step mt-4" style="width: 100%;">CREAR CUENTA</button>
                    <div class="col-12 mt-4 text-center">
                        <a class="btn btn-link btnshowcode"><strong class="">¿Tienes un código promocional?</strong></a>
                        <div class="input-group d-none input-promocional">
                            <input type="text" class="form-control" id="codigo_promocional" name="codigo_promocional" aria-describedby="codigo_promocionalToggle" placeholder="Introduce tu código promocional">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="aplicar_boton">
                                    Aplicar
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="alert alert-danger d-none" role="alert">
                            <strong>¡ERROR!</strong> <span id="msg_error"></span>
                        </div>
                        <div class="wizard-step">
                            <h1 class="text-h1">¡Tus 15 días de prueba gratis comizan ahora!</h1>
                            <p class="text-p">Los comienzos son mucho más efectivos cuando se dan en equipo. 😎 <br> Déjanos tu número, nosotros te ayudamos al 100% en tu inicio con <br> Softmor POS </p>

                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="form-group">
                                      <input type="text" name="" id="" class="form-control" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <select id="paises" class="select2">
                                        <option value="">Seleciona tu país</option>
                                        <option value="México+52">🇲🇽 México (+52)</option>
                                        <option value="Argentina+54">🇦🇷 Argentina (+54)</option>
                                        <option value="Bolivia+591">🇧🇴 Bolivia (+591)</option>
                                        <option value="Brasil+55">🇧🇷 Brasil (+55)</option>
                                        <option value="Chile+56">🇨🇱 Chile (+56)</option>
                                        <option value="Colombia+57">🇨🇴 Colombia (+57)</option>
                                        <option value="Costa Rica+506">🇨🇷 Costa Rica (+506)</option>
                                        <option value="Cuba+53">🇨🇺 Cuba (+53)</option>
                                        <option value="Ecuador+593">🇪🇨 Ecuador (+593)</option>
                                        <option value="El Salvador+503">🇸🇻 El Salvador (+503)</option>
                                        <option value="Guatemala+502">🇬🇹 Guatemala (+502)</option>
                                        <option value="Honduras+504">🇭🇳 Honduras (+504)</option>
                                        <option value="México+52">🇲🇽 México (+52)</option>
                                        <option value="Nicaragua+505">🇳🇮 Nicaragua (+505)</option>
                                        <option value="Panamá+507">🇵🇦 Panamá (+507)</option>
                                        <option value="Paraguay+595">🇵🇾 Paraguay (+595)</option>
                                        <option value="Perú+51">🇵🇪 Perú (+51)</option>
                                        <option value="República Dominicana+1">🇩🇴 República Dominicana (+1)</option>
                                        <option value="Uruguay+598">🇺🇾 Uruguay (+598)</option>
                                        <option value="Venezuela+58">🇻🇪 Venezuela (+58)</option>
                                        <option value="España+34">🇪🇸 España (+34)</option>
                                        <option value="Estados Unidos+1">🇺🇸 Estados Unidos (+1)</option>
                                    </select>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" placeholder="Teléfono" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <button class="btn btn-primary prev-step">Anterior</button> -->
                    <button class="btn btn-primary next-step float-end" id="btnNextWelcome">Siguiente</button>
                </div>
                <div class="wizard-step">
                    <h1 class="text-h1">Información de tu empresa </h1>
                    <h2 class="text-h2">Agrega el nombre de tu empresa, este dato aparecerá en tus tickets</h2>
                    <input type="text" class="form-control mb-5" id="ppt_nombre_empresa" placeholder="Nombre de la empresa" required>
                    <button class="btn btn-primary prev-step">Anterior</button>
                    <button class="btn btn-primary next-step float-end" id="btnNextEmpresa">Siguiente</button>
                </div>
                <div class="wizard-step">
                    <h1 class="text-h1">¡Tus 15 días de prueba gratis comizan ahora!</h1>
                    <p class="text-p">Los comienzos son mucho más efectivos cuando se dan en equipo. 😎 <br> Déjanos tu número, nosotros te ayudamos al 100% en tu inicio con <br> Softmor POS </p>

                    <div class="row">
                        <div class="col-4">
                            <select id="paises" class="select2">
                                <option value="">Seleciona tu país</option>
                                <option value="México+52">🇲🇽 México (+52)</option>
                                <option value="Argentina+54">🇦🇷 Argentina (+54)</option>
                                <option value="Bolivia+591">🇧🇴 Bolivia (+591)</option>
                                <option value="Brasil+55">🇧🇷 Brasil (+55)</option>
                                <option value="Chile+56">🇨🇱 Chile (+56)</option>
                                <option value="Colombia+57">🇨🇴 Colombia (+57)</option>
                                <option value="Costa Rica+506">🇨🇷 Costa Rica (+506)</option>
                                <option value="Cuba+53">🇨🇺 Cuba (+53)</option>
                                <option value="Ecuador+593">🇪🇨 Ecuador (+593)</option>
                                <option value="El Salvador+503">🇸🇻 El Salvador (+503)</option>
                                <option value="Guatemala+502">🇬🇹 Guatemala (+502)</option>
                                <option value="Honduras+504">🇭🇳 Honduras (+504)</option>
                                <option value="México+52">🇲🇽 México (+52)</option>
                                <option value="Nicaragua+505">🇳🇮 Nicaragua (+505)</option>
                                <option value="Panamá+507">🇵🇦 Panamá (+507)</option>
                                <option value="Paraguay+595">🇵🇾 Paraguay (+595)</option>
                                <option value="Perú+51">🇵🇪 Perú (+51)</option>
                                <option value="República Dominicana+1">🇩🇴 República Dominicana (+1)</option>
                                <option value="Uruguay+598">🇺🇾 Uruguay (+598)</option>
                                <option value="Venezuela+58">🇻🇪 Venezuela (+58)</option>
                                <option value="España+34">🇪🇸 España (+34)</option>
                                <option value="Estados Unidos+1">🇺🇸 Estados Unidos (+1)</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="telefono" placeholder="Teléfono" required>
                        </div>
                    </div>
                    <!-- <button class="btn btn-primary prev-step">Anterior</button> -->
                    <button class="btn btn-primary next-step mt-4" style="width: 100%;">Empezar mi prueba</button>
                    <!-- Aquí puedes agregar un botón para finalizar el proceso si lo deseas -->
                </div>
            </div>
            <!-- Sección con 4 columnas y fondo de color -->
            <div class="col-md-5 bg-primary d-flex align-items-center justify-content-center custom-section footer-logo">
                <!-- Logotipo centrado vertical y horizontalmente -->
                <img src="logo-light.svg" width="200" alt="Logotipo" style="max-width: 100%; max-height: 100%; margin-right: 3px; padding: 10px;"> <sup class="text-white ml-3" style="font-size: 12px;"> v5.0</sup>
            </div>
        </div>
    </div>


    <!-- Agrega el enlace al archivo JS de Bootstrap 5 (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <!-- Agrega jQuery para el funcionamiento del wizard -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#ppt_correo").focus();
            var currentStep = 0;
            var steps = $(".wizard-step");

            // Muestra la primera sección
            steps.eq(currentStep).addClass("active");

            // Navegación a la siguiente sección
            var validar;
            $(".next-step").click(function() {
                if (currentStep == 0) {
                    var ppt_correo = $("#ppt_correo").val();
                    var ppt_clave = $("#ppt_clave").val();
                    // Expresión regular para validar un correo electrónico
                    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

                    if (ppt_correo == "") {
                        validar = 2;
                        toastr.error("El correo es obligatorio", '¡ERROR!');
                        setTimeout(function() {
                            $("#ppt_correo").focus();
                        }, 100);
                        return false;
                    } else if (!emailPattern.test(ppt_correo)) {
                        validar = 2;
                        toastr.error("Por favor, ingresa un correo electrónico válido.", '¡ERROR!');
                        setTimeout(function() {
                            $("#ppt_correo").focus();
                        }, 100);
                        return false;
                    } else if (ppt_clave == "") {
                        validar = 2;
                        toastr.error("La contraseña es obligatoria", '¡ERROR!');
                        setTimeout(function() {
                            $("#ppt_clave").focus();
                        }, 100);
                        return false;
                    } else if (ppt_clave.length < 8) {
                        // La contraseña no cumple con el requisito mínimo de longitud, muestra un mensaje de error
                        validar = 2;
                        toastr.error("La contraseña debe tener al menos 8 caracteres", '¡ERROR!');
                        setTimeout(function() {
                            $("#ppt_clave").focus();
                        }, 100);
                        return false; // Evita que se avance al siguiente paso
                    }

                    guardarProspecto().then(function(resultado) {
                        if (resultado) {
                            validar = 1;
                            avanzarPaso();
                        } else {
                            validar = 2;
                        }
                    }).catch(function() {
                        validar = 2; // Manejo de error en caso de que la promesa sea rechazada
                    });

                }
                if (currentStep == 1) {
                    if ($("input[name='tipoUsuario']:checked").length === 0) {
                        validar = 2;
                        toastr.error('Por favor, selecciona una opción de tipo de usuario.', '¡ERROR!');
                        return false;
                    }
                    guardarTipo().then(function(resultado) {
                        if (resultado) {
                            validar = 1;
                            setTimeout(function() {
                                $("#ppt_nombre_empresa").focus();
                            }, 100);
                            avanzarPaso();
                        } else {
                            validar = 2;
                        }
                    }).catch(function() {
                        validar = 2; // Manejo de error en caso de que la promesa sea rechazada
                    });

                }
                if (currentStep == 2) {
                    var ppt_nombre_empresa = $("#ppt_nombre_empresa").val();
                    if (ppt_nombre_empresa == "") {
                        validar = 2;
                        toastr.error('Por favor, escriba el nombre de la empresa.', '¡ERROR!');
                        setTimeout(function() {
                            $("#ppt_nombre_empresa").focus();
                        }, 100);
                        return false;
                    }
                    guardarEmpresa().then(function(resultado) {
                        if (resultado) {
                            validar = 1;
                            setTimeout(function() {
                                $("#ppt_nombre_empresa").focus();
                            }, 100);
                            avanzarPaso();
                        } else {
                            validar = 2;
                        }
                    }).catch(function() {
                        validar = 2; // Manejo de error en caso de que la promesa sea rechazada
                    });
                }

                steps.eq(currentStep).removeClass("active");
                if (validar === 1) {
                    currentStep++;
                }
                if (currentStep >= steps.length) {
                    currentStep = steps.length - 1;
                }
                steps.eq(currentStep).addClass("active");
                updateButtons();
            });

            function avanzarPaso() {
                steps.eq(currentStep).removeClass("active");
                currentStep++;
                if (currentStep >= steps.length) {
                    currentStep = steps.length - 1;
                }
                steps.eq(currentStep).addClass("active");
                updateButtons();
            }

            // Navegación a la sección anterior
            $(".prev-step").click(function() {
                steps.eq(currentStep).removeClass("active");
                currentStep--;
                if (currentStep < 0) {
                    currentStep = 0;
                }
                steps.eq(currentStep).addClass("active");
                updateButtons();
            });

            // Actualiza la visibilidad de los botones según la sección actual
            function updateButtons() {
                $(".wizard-nav .prev-step").toggleClass("d-none", currentStep === 0);
                $(".wizard-nav .next-step").text(currentStep === steps.length - 1 ? "Finalizar" : "Siguiente");
            }

            // Captura el elemento del botón y el campo de contraseña
            const passwordToggle = document.getElementById("passwordToggle");
            const passwordField = document.getElementById("ppt_clave");

            // Variable para rastrear el estado actual del campo de contraseña
            let passwordVisible = false;

            // Agrega un evento clic al botón para alternar entre los íconos y el tipo de entrada del campo de contraseña
            passwordToggle.addEventListener("click", function() {
                if (!passwordVisible) {
                    passwordField.type = "text";
                    passwordToggle.innerHTML = '<i class="far fa-eye-slash"></i>'; // Ícono de ocultar
                    passwordVisible = true;
                } else {
                    passwordField.type = "password";
                    passwordToggle.innerHTML = '<i class="far fa-eye"></i>'; // Ícono de mostrar
                    passwordVisible = false;
                }
            });

            // Captura el botón "¿Tienes un código promocional?"
            $(".btnshowcode").click(function() {
                // Muestra el campo de código promocional
                $(".input-promocional").removeClass("d-none");
                // Activa el enfoque en el campo de código promocional
                $(".input-promocional").focus();
            });

            // Obtener el elemento de entrada y el botón
            var inputCodigoPromocional = document.getElementById('codigo_promocional');
            // var botonAplicar = document.getElementById('aplicar_boton');

            // Manejar el clic en el botón
            $("#aplicar_boton").on('click', function() {
                if (inputCodigoPromocional.value.trim() == "") {
                    inputCodigoPromocional.classList.add('borde-rojo');
                    $(inputCodigoPromocional).focus();
                    $(".alert-danger").removeClass("d-none");
                    $("#msg_error").text("El cupón es obligatorio")
                    return;
                } else {
                    var cps_codigo = inputCodigoPromocional.value.trim();
                    $.ajax({
                        type: 'GET',
                        url: 'http://localhost/softmor-pos/api/public/consultar-cupon/' + cps_codigo,
                        // data: datos,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(res) {
                            if (res.status) {
                                $(".alert-danger").addClass("d-none");
                                $("#codigo_promocional").attr("readonly", true);
                                $("#codigo_promocional").removeClass('borde-rojo');
                                $("#codigo_promocional").addClass('borde-verde');
                            } else {
                                $(".alert-danger").removeClass("d-none");
                                $("#codigo_promocional").attr("readonly", false);
                                $("#codigo_promocional").removeClass('borde-verde');
                                $("#codigo_promocional").addClass('borde-rojo');
                                $("#msg_error").text(res.mensaje);
                            }
                        }
                    });

                }
                // Agregar la clase 'borde-verde' al input
            });
        });


        // In your Javascript (external .js resource or <script> tag)
        $('.select2').each(function() {
            $(this).select2({
                theme: 'bootstrap-5',
                dropdownParent: $(this).parent(),
            });
        });

        $('#paises').on('change', function() {
            setTimeout(function() {
                $("#telefono").focus();
            }, 100);
        });

        function guardarProspecto() {
            return new Promise(function(resolve, reject) {
                var ppt_correo = $("#ppt_correo").val();
                var ppt_clave = $("#ppt_clave").val();
                var codigo_promocional = $("#codigo_promocional").val();
                var datos = new FormData()
                datos.append('ppt_correo', ppt_correo);
                datos.append('ppt_clave', ppt_clave);
                datos.append('ppt_cupon', codigo_promocional);
                datos.append('btnGuardarProspecto', true);
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/softmor-pos/api/public/prospectos/guardar',
                    data: datos,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status) {
                            toastr.success(res.mensaje, '¡Muy bien!');
                            $("#ppt_id").val(res.ppt_id);
                            resolve(true);
                        } else {
                            toastr.error(res.mensaje, '¡ERROR!');
                            resolve(false);
                        }
                    },
                    error: function() {
                        reject(false); // Rechaza la promesa en caso de error
                    }
                });
            });
        }

        function guardarTipo() {
            return new Promise(function(resolve, reject) {
                var ppt_tipo_usuario = $("input[name='tipoUsuario']:checked").val();
                var ppt_id = $("#ppt_id").val();
                var datos = new FormData()
                datos.append('ppt_tipo_usuario', ppt_tipo_usuario);
                datos.append('ppt_id', ppt_id);
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/softmor-pos/api/public/prospectos/guardar/tipo',
                    data: datos,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status) {
                            toastr.success(res.mensaje, '¡Muy bien!');
                            resolve(true);
                        } else {
                            toastr.error(res.mensaje, '¡ERROR!');
                            resolve(false);
                        }
                    },
                    error: function() {
                        reject(false); // Rechaza la promesa en caso de error
                    }
                });
            });
        }
        function guardarEmpresa() {
            return new Promise(function(resolve, reject) {
                var ppt_nombre_empresa = $("#ppt_nombre_empresa").val();
                var ppt_id = $("#ppt_id").val();
                var datos = new FormData()
                datos.append('ppt_nombre_empresa', ppt_nombre_empresa);
                datos.append('ppt_id', ppt_id);
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/softmor-pos/api/public/prospectos/guardar/empresa',
                    data: datos,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.status) {
                            toastr.success(res.mensaje, '¡Muy bien!');
                            resolve(true);
                        } else {
                            toastr.error(res.mensaje, '¡ERROR!');
                            resolve(false);
                        }
                    },
                    error: function() {
                        reject(false); // Rechaza la promesa en caso de error
                    }
                });
            });
        }
    </script>

</body>

</html>

<?php
if (isset($_GET['ref'])) :
?>
    <script>
        $("#encabezado1").addClass("d-none");
        $("#encabezado2").removeClass("d-none");
        $.ajax({
            type: 'GET',
            url: 'http://localhost/softmor-pos/api/public/consultar-ref/' + '<?= $_GET['ref'] ?>',
            // data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status) {
                    var primerNombre = "";
                    var segundoNombre = "";
                    var palabras = res.ads.ads_nombre_completo.split(' ');
                    // Verificar si hay al menos dos palabras
                    if (palabras.length >= 2) {
                        // Obtener los dos primeros nombres
                        primerNombre = palabras[0];
                        segundoNombre = palabras[1];
                        $("#ads_nombre").text(primerNombre + " " + segundoNombre);
                    } else {
                        primerNombre = palabras[0];
                        $("#ads_nombre").text(primerNombre);
                    }

                    $("#codigo_promocional").val(res.cps.cps_codigo);
                    $(".input-promocional").removeClass("d-none");
                    setTimeout(() => {
                        $("#aplicar_boton").trigger("click");

                    }, 100);
                } else {

                }
            }
        });
    </script>
<?php else :
?>
    <script>
        $("#encabezado2").addClass("d-none");
        $("#encabezado1").removeClass("d-none");
    </script>
<?php endif; ?>