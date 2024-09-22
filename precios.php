<?php
@session_start();
include_once 'config.php';





?>
<!DOCTYPE html>
<html lang="es">

<?php require_once 'componentes/head.php' ?>



<body style="background-color:#F1F5F9; ">

    <?php require_once 'componentes/navbar.php';
    ?>

    <br><br><br><br><br>

    <div style="text-align: center; margin-top: 20px;">
        <p><strong>Moneda</strong></p>
        <label>
            <input type="radio" name="currency" value="MXN" checked>
            🇲🇽 MXN
        </label>
        &nbsp;&nbsp;&nbsp;
        <label>
            <input type="radio" name="currency" value="USD">
            🇺🇸 USD
        </label>
    </div>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <label for="coupon">¿Tienes un cupón?</label>
                    <div class="input-group">
                        <input type="text" id="coupon" class="form-control" placeholder="Ingresa tu cupón" aria-describedby="apply-button">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button" id="apply-button">Aplicar</button>
                        </div>
                    </div>
                    <small id="helpId" class="text-muted">Ingresa tu código de cupón y presiona "Aplicar".</small>
                </div>
            </div>
            <div class="col-md-8 mb-4"></div>
            <!-- Mensual -->
            <div class="col-md-4  mb-5">
                <div class="card text-center border-primary shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title bg-primary text-white p-2 rounded"><strong>Mensual</strong></h5>
                        <h2 class="card-price text-dark"><span id="price_mensual">$350.00</span><sup id="symbol_mensual">MXN/mes</sup></h2>
                        <p class="card-text">Facturación <strong>mensual</strong></p>
                        <table class="table table-borderless text-start">
                            <tbody>
                                <tr>
                                    <td>✔ 1 sucursal</td>
                                </tr>
                                <tr>
                                    <td>✔ Sucursal extra <span id="price_sem">$150.00</span><sup id="symbol_sem">MXN/mes</sup></td>
                                </tr>
                                <tr>
                                    <td>✔ 10 usuarios</td>
                                </tr>
                                <tr>
                                    <td>✔ Multi caja (3 cajas)</td>
                                </tr>
                                <tr>
                                    <td>✔ Soporte</td>
                                </tr>
                                <tr>
                                    <td>✔ Actualizaciones</td>
                                </tr>
                                <tr>
                                    <td>✔ Capacitación pública</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="btn btn-primary w-100">Comprar</a>
                    </div>
                </div>
            </div>

            <!-- Anual (destacada) -->
            <div class="col-md-4 mb-5">
                <div class="card text-center border-primary shadow-lg position-relative">
                    <div class="card-body">
                        <h5 class="card-title bg-primary text-white p-2 rounded">Anual</h5>
                        <h2 class="card-price text-dark"><span id="price_anual">$140.00</span><sup id="symbol_anual">MXN/mes</sup></h2>
                        <p class="card-text">Facturación <strong>anual</strong></p>
                        <table class="table table-borderless text-start">
                            <tbody>
                                <tr>
                                    <td>✔ 1 sucursal</td>
                                </tr>
                                <tr>
                                    <td>✔ Sucursal extra <span id="price_sea">$80.00</span><sup id="symbol_sea">MXN/mes</sup></td>
                                </tr>
                                <tr>
                                    <td><strong>✔ Usuarios ilimitados</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>✔ Multi caja (ilimitadas)</strong></td>
                                </tr>
                                <tr>
                                    <td>✔ Soporte</td>
                                </tr>
                                <tr>
                                    <td>✔ Actualizaciones</td>
                                </tr>
                                <tr>
                                    <td>✔ Capacitación <strong>privada</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="btn btn-primary w-100">Comprar</a>
                    </div>
                </div>
            </div>

            <!-- Prueba gratis -->
            <div class="col-md-4 mb-5">
                <div class="card text-center border-dark shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title bg-dark text-white p-2 rounded">Prueba gratis</h5>
                        <h2 class="card-price text-dark">$0.00<sup id="symbol_prueba">MXN</sup></h2>
                        <table class="table table-borderless text-start">
                            <tbody>
                                <tr>
                                    <td>✔ 1 sucursal</td>
                                </tr>
                                <tr>
                                    <td>✔ Usuarios ilimitados</td>
                                </tr>
                                <tr>
                                    <td>✔ Multi caja (ilimitadas)</td>
                                </tr>
                                <tr>
                                    <td>✔ Soporte</td>
                                </tr>
                                <tr>
                                    <td>✔ Actualizaciones</td>
                                </tr>
                                <tr>
                                    <td>✔ Capacitación pública</td>
                                </tr>
                                <tr>
                                    <td>✔ Cuenta pública (solo pruebas)</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="btn btn-warning w-100  btnEmpezarGratis" type="button" href="javascript:void(0)">Probar demo pública gratis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row">
            <!-- Card General de Beneficios -->
            <div class="col-md-12">
                <div class="card text-center border-primary shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title bg-primary text-white p-2 rounded">Beneficios de Taller Control</h3>
                        <p class="card-text">Gestiona tu taller de manera rápida y organizada desde cualquier lugar.</p>
                        <table class="table table-borderless text-start">
                            <tbody>
                                <!-- General -->
                                <tr>
                                    <td>🌍 Compatible con cualquier sistema operativo.</td>
                                </tr>
                                <tr>
                                    <td>⬇️ Sin necesidad de instalación.</td>
                                </tr>
                                <tr>
                                    <td>💻 Accede desde cualquier lugar y dispositivo.</td>
                                </tr>
                                <tr>
                                    <td>👥 Gestión multiusuario con diferentes niveles de acceso.</td>
                                </tr>
                                <tr>
                                    <td>🏢 Control de múltiples sucursales.</td>
                                </tr>
                                <tr>
                                    <td>🖋️ Personaliza con el logotipo y datos de tu negocio.</td>
                                </tr>
                                <tr>
                                    <td>🖨️ Compatible con impresoras láser y térmicas.</td>
                                </tr>
                                <tr>
                                    <td>📝 Diversos formatos de impresión: 58mm, 80mm, carta, media carta.</td>
                                </tr>
                                <tr>
                                    <td>📦 Compatible con impresoras de etiquetas y lectores de códigos de barras.</td>
                                </tr>
                                <tr>
                                    <td>🎧 Soporte y atención al cliente de primera calidad.</td>
                                </tr>

                                <!-- Gestión de Servicios -->
                                <tr>
                                    <th colspan="2" class="text-primary">Gestión de Servicios</th>
                                </tr>
                                <tr>
                                    <td>🛠️ Registro detallado de servicios.</td>
                                </tr>
                                <tr>
                                    <td>📍 Ubicación y seguimiento de equipos.</td>
                                </tr>
                                <tr>
                                    <td>📷 Añade evidencias con fotos del equipo a reparar.</td>
                                </tr>
                                <tr>
                                    <td>💵 Facilita pagos anticipados y abonos.</td>
                                </tr>
                                <tr>
                                    <td>🔍 Consulta en línea el estado de las reparaciones.</td>
                                </tr>
                                <tr>
                                    <td>📄 Catálogo personalizable de servicios.</td>
                                </tr>
                                <tr>
                                    <td>🎫 Etiquetas y tickets de servicio.</td>
                                </tr>
                                <tr>
                                    <td>💬 Notificaciones automáticas por WhatsApp sobre el estado del servicio.</td>
                                </tr>
                                <tr>
                                    <td>🔧 Agrega refacciones a las órdenes de servicio.</td>
                                </tr>
                                <tr>
                                    <td>📊 Reportes técnicos y de comisiones por técnico.</td>
                                </tr>
                                <tr>
                                    <td>📈 Reportes completos: por estado, servicios reparados, entregados, pendientes y más.</td>
                                </tr>

                                <!-- Gestión de Mercancías -->
                                <tr>
                                    <th colspan="2" class="text-primary">Gestión de Mercancías</th>
                                </tr>
                                <tr>
                                    <td>📋 Registro e importación masiva de productos vía Excel.</td>
                                </tr>
                                <tr>
                                    <td>📤 Exportación de inventarios.</td>
                                </tr>
                                <tr>
                                    <td>⚠️ Reportes de productos por agotarse y traspaso entre sucursales.</td>
                                </tr>
                                <tr>
                                    <td>🛒 Control de compras y reportes de inventarios.</td>
                                </tr>

                                <!-- Caja -->
                                <tr>
                                    <th colspan="2" class="text-primary">Caja</th>
                                </tr>
                                <tr>
                                    <td>🧾 Caja-mostrador con opción multi-cajero.</td>
                                </tr>
                                <tr>
                                    <td>💸 Registra múltiples cobros, ingresos y gastos.</td>
                                </tr>
                                <tr>
                                    <td>💳 Gestiona ventas por efectivo, tarjeta, transferencia o depósito.</td>
                                </tr>
                                <tr>
                                    <td>📅 Reportes detallados por corte, fecha, ingresos y gastos.</td>
                                </tr>

                                <!-- Funciones Administrativas -->
                                <tr>
                                    <th colspan="2" class="text-primary">Funciones Administrativas</th>
                                </tr>
                                <tr>
                                    <td>📊 Reportes de ingresos, gastos y utilidades.</td>
                                </tr>
                                <tr>
                                    <td>🔒 Control de clientes y usuarios con accesos limitados.</td>
                                </tr>
                                <tr>
                                    <td>🕰️ Restricción de horarios y accesos por sucursal.</td>
                                </tr>
                            </tbody>
                        </table>
                        <center><button class="btn btn-success">Contactar a ventas</button></center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos personalizados -->
    <style>
        .card-price {
            font-size: 2.5rem;
            color: #2C3E50;
        }

        .btn-primary {
            background-color: #2C3E50;
            border-color: #2C3E50;
        }

        .btn-primary:hover {
            background-color: #1A252F;
            border-color: #1A252F;
        }

        .btn-warning {
            background-color: #FFC107;
            border-color: #FFC107;
            color: #000;
        }

        .btn-warning:hover {
            background-color: #E0A800;
            border-color: #E0A800;
        }

        .card {
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .shadow-lg {
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
        }

        .shadow-sm {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            background-color: #2C3E50;
            padding: 0.5rem;
            border-radius: 0.25rem;
            color: white;
        }

        sup {
            font-size: 12px;
        }

        table td {
            font-size: 1rem;
            padding: 0.5rem 0;
        }
    </style>
    <br><br><br><br>

    <script>
        // Precios base en MXN
        const prices = {
            mensual: 350,
            anual: 150,
            sem: 150,
            sea: 80,
            prueba: 0
        };

        // Función para obtener las tasas de cambio desde la API
        async function fetchExchangeRate(currency) {
            if (currency === 'USD') {
                const response = await fetch('https://v6.exchangerate-api.com/v6/fbd02d6c5c82c1aa60adb7d8/latest/USD');
                const data = await response.json();
                return data.conversion_rates.MXN || 20; // Tasa por defecto
            }
            return 1; // Si es MXN, la tasa es 1
        }

        // Función para actualizar los precios según la moneda seleccionada
        async function updatePrices() {
            const selectedCurrency = document.querySelector('input[name="currency"]:checked').value;
            const exchangeRate = await fetchExchangeRate(selectedCurrency);

            // Actualizar precios
            let priceMensual = (prices.mensual / exchangeRate).toFixed(2);
            let priceAnual = (prices.anual / exchangeRate).toFixed(2);
            let priceSem = (prices.sem / exchangeRate).toFixed(2);
            let priceSea = (prices.sea / exchangeRate).toFixed(2);

            // Actualiza los elementos en el DOM con los precios y el símbolo
            document.getElementById('price_mensual').textContent = `$${priceMensual}`;
            document.getElementById('price_anual').textContent = `$${priceAnual}`;
            document.getElementById('price_sem').textContent = `$${priceSem}`;
            document.getElementById('price_sea').textContent = `$${priceSea}`;

            // Guardar los valores numéricos para uso posterior (sin el símbolo)
            let numPriceMensual = parseFloat(priceMensual);
            let numPriceAnual = parseFloat(priceAnual);
            let numPriceSem = parseFloat(priceSem);
            let numPriceSea = parseFloat(priceSea);

            // Actualizar símbolos de moneda
            const symbol = selectedCurrency === 'USD' ? 'USD' : 'MXN';
            document.querySelectorAll('sup').forEach(sup => sup.textContent = `${symbol}/mes`);
        }

        // Event listener para los cambios en la selección de moneda
        document.querySelectorAll('input[name="currency"]').forEach(radio => {
            radio.addEventListener('change', updatePrices);
        });

        // Ejecutar actualización de precios al cargar la página
        window.onload = updatePrices;
    </script>
    <?php require_once 'componentes/footer.php' ?>


</body>

</html>