<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Bootstrap 5</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/select2.min.css" rel="stylesheet">

    <link href="./css/select2-bootstrap-5-theme.min.css" rel="stylesheet">
    <link href="./css/select2-bootstrap-5-theme.rtl.min.css" rel="stylesheet">

    <style>
        @media (max-width: 767px) {

            /* Estilos para dispositivos móviles */
            .custom-section {
                height: 50vh;
                /* La mitad de la altura en dispositivos móviles */
            }
        }

        @media (min-width: 768px) {

            /* Estilos para pantallas grandes (768px o más) */
            .custom-section {
                height: 100vh;
                /* Todo el height en pantallas grandes */
            }
        }

        /* Estilos personalizados para el wizard */
        .wizard-container {
            background-color: #f5f5f5;
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
            border: 1px solid #ccc;
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

        /* Estilos adicionales */
        .wizard-nav .next-step {
            width: auto;
            /* Ancho automático para el botón "Siguiente" */
        }

        .wizard-nav .prev-step {
            float: left;
            /* Botón "Anterior" a la izquierda */
        }

        .wizard-nav .next-step {
            float: right;
            /* Botón "Siguiente" a la derecha */
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
                    <div class="wizard-header">
                        <h1>Wizard de 4 Secciones</h1>
                    </div>
                    <!-- Wizard Steps -->
                    <div class="wizard-step active">
                        <h2>Sección 1</h2>
                        <p>Contenido de la primera sección.</p>
                        <button class="btn btn-primary prev-step">Anterior</button>
                        <button class="btn btn-primary next-step" style="width: 100%;">CREAR CUENTA</button>
                    </div>
                    <div class="wizard-step">
                        <h2>Sección 2</h2>
                        <p>Contenido de la segunda sección.</p>
                        <button class="btn btn-primary prev-step">Anterior</button>
                        <button class="btn btn-primary next-step">Siguiente</button>
                    </div>
                    <div class="wizard-step">
                        <h2>Sección 3</h2>
                        <p>Contenido de la tercera sección.</p>
                        <button class="btn btn-primary prev-step">Anterior</button>
                        <button class="btn btn-primary next-step">Siguiente</button>
                    </div>
                    <div class="wizard-step">
                        <h2>Sección 4</h2>
                        <p>Contenido de la cuarta sección.</p>
                        <button class="btn btn-primary prev-step">Anterior</button>
                        <!-- Aquí puedes agregar un botón para finalizar el proceso si lo deseas -->
                    </div>
                </div>
            </div>
            <!-- Sección con 4 columnas y fondo de color -->
            <div class="col-md-5 bg-primary d-flex align-items-center justify-content-center custom-section">
                <!-- Logotipo centrado vertical y horizontalmente -->
                <img src="https://softmorpos.com/img/logo-light.svg" width="200" alt="Logotipo" style="max-width: 100%; max-height: 100%;"> <sup class="text-white ml-2" style="font-size: 12px;"> v5.0</sup>
            </div>
        </div>
    </div>

    <!-- Agrega el enlace al archivo JS de Bootstrap 5 (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <!-- Agrega jQuery para el funcionamiento del wizard -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        });
    </script>
</body>

<script src="./js/select2.min.js"></script>

</html>