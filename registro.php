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
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- Sección con 8 columnas para el formulario -->
                <div class="col-md-7 d-flex align-items-center justify-content-center custom-section">
                    <!-- Wizard de 4 secciones -->
                    <div class="wizard-container">
                        <!-- <div class="wizard-header">
                            <h1 class="text-h1">¡Prueba Softmor POS gratis por 15 días 😀! </h1>
                        </div> -->
                        <!-- Wizard Steps -->
                        <div class="wizard-step active">
                            <!-- <h1 class="text-h1">¡Prueba Softmor POS gratis por 15 días 😀! </h1> -->
                            <h1 class="text-h1"> <strong class="text-primary"> HECTOR ALBERTO</strong> te invita a probar Softmor POS gratis por 15 días 😀 </h1>
                            <form action="">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label for="email" class="text-normal">Correo electrónico</label>
                                            <input type="text" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label for="password" class="text-normal">Contraseña</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordToggle" placeholder="Min. 8 caracteres">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" id="passwordToggle">
                                                        <i class="far fa-eye"></i> <!-- Ícono inicial -->
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <button class="btn btn-primary next-step mt-4" style="width: 100%;">CREAR CUENTA</button>
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
                                <br><span class="mt-5 text-normal" style="font-size: 12px;">Prueba gratis y sin tarjeta de crédito</span>
                                <div class="div-term">
                                    <br><br><span class="text-normal">¿Ya tienes una cuenta?</span><a class="btn btn-link btnIniciarSesion"><strong class="">Iniciar sesión</strong></a>
                                    <br><span class="text-normal">Al registrarme, acepto la</span><a class="btn btn-link btnpoliticas"><strong class="">Política de privacidad y terminos de servicio de Softmor POS.</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-step ">
                            <h1 class="text-h1">¡Hola 😀, te damos la bienvenida! </h1>
                            <h2 class="text-h2">Elige la opción que más te identifique y ayudanos a mejorar tu experiencia</h2>
                            <div class="row mb-5">
                                <div class="col-12">
                                    <div class="btn-group-vertical d-flex" role="group" aria-label="Tipo de Usuario">
                                        <input type="radio" class="btn-check" name="tipoUsuario" id="propietario" value="propietario" autocomplete="off">
                                        <label class="btn btn-outline-primary flex-grow-1" for="propietario">Soy dueño del negocio</label>

                                        <input type="radio" class="btn-check" name="tipoUsuario" id="tecnico" value="tecnico" autocomplete="off">
                                        <label class="btn btn-outline-primary flex-grow-1" for="tecnico">Estoy en el área técnica</label>

                                        <input type="radio" class="btn-check" name="tipoUsuario" id="administrativo" value="administrativo" autocomplete="off">
                                        <label class="btn btn-outline-primary flex-grow-1" for="administrativo">Estoy en el área administrativa</label>

                                        <input type="radio" class="btn-check" name="tipoUsuario" id="recepcion" value="recepcion" autocomplete="off">
                                        <label class="btn btn-outline-primary flex-grow-1" for="recepcion">Estoy en recepción y punto de venta</label>
                                    </div>
                                </div>
                            </div>
                            <!-- <button class="btn btn-primary prev-step">Anterior</button> -->
                            <button class="btn btn-primary next-step float-end">Siguiente</button>
                        </div>
                        <div class="wizard-step">
                            <h1 class="text-h1">Información de tu empresa </h1>
                            <h2 class="text-h2">Agrega el nombre de tu empresa, este dato aparecerá en tus tickets</h2>
                            <input type="text" class="form-control mb-5" placeholder="Nombre de la empresa" required>
                            <button class="btn btn-primary prev-step">Anterior</button>
                            <button class="btn btn-primary next-step float-end">Siguiente</button>
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
                            <!-- <button class="btn btn-primary prev-step">Anterior</button> -->
                            <button class="btn btn-primary next-step mt-4" style="width: 100%;">Empezar mi prueba</button>
                            <!-- Aquí puedes agregar un botón para finalizar el proceso si lo deseas -->
                        </div>
                    </div>
                </div>
                <!-- Sección con 4 columnas y fondo de color -->
                <div class="col-md-5 bg-primary d-flex align-items-center justify-content-center custom-section footer-logo">
                    <!-- Logotipo centrado vertical y horizontalmente -->
                    <img src="https://softmorpos.com/img/logo-light.svg" width="200" alt="Logotipo" style="max-width: 100%; max-height: 100%; margin-right: 3px; padding: 10px;"> <sup class="text-white ml-3" style="font-size: 12px;"> v5.0</sup>
                </div>
            </div>
        </div>

        <!-- Agrega el enlace al archivo JS de Bootstrap 5 (opcional) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
        <!-- Agrega jQuery para el funcionamiento del wizard -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="./js/select2.min.js"></script>

        <script>
            $(document).ready(function() {

                var currentStep = 0;
                var steps = $(".wizard-step");

                // Muestra la primera sección
                steps.eq(currentStep).addClass("active");

                // Navegación a la siguiente sección
                $(".next-step").click(function() {
                    steps.eq(currentStep).removeClass("active");
                    currentStep++;
                    if (currentStep >= steps.length) {
                        currentStep = steps.length - 1;
                    }
                    steps.eq(currentStep).addClass("active");
                    updateButtons();
                });

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
                const passwordField = document.getElementById("password");

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
                var botonAplicar = document.getElementById('aplicar_boton');

                // Manejar el clic en el botón
                botonAplicar.addEventListener('click', function() {
                    // Agregar la clase 'borde-verde' al input
                    inputCodigoPromocional.classList.add('borde-verde');
                });
            });









            // In your Javascript (external .js resource or <script> tag)
            $('.select2').each(function() {
                $(this).select2({
                    theme: 'bootstrap-5',
                    dropdownParent: $(this).parent(),
                });
            });
        </script>

    </body>
</html>