<!DOCTYPE html>
<html lang="es">

<?php require_once 'componentes/head.php' ?>

<body style="background-color:#F1F5F9; ">
    <?php require_once 'componentes/navbar.php'; ?>

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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Mensual -->
            <div class="col-md-4  mb-5">
                <div class="card text-center border-primary shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title bg-primary text-white p-2 rounded"><strong>Mensual</strong></h5>
                        <h2 class="card-price text-primary"><span id="price_mensual">$350.00</span><sup id="symbol_mensual">MXN/mes</sup></h2>
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
                        <h2 class="card-price text-primary"><span id="price_anual">$140.00</span><sup id="symbol_anual">MXN/mes</sup></h2>
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
                            </tbody>
                        </table>
                        <a href="#" class="btn btn-warning w-100">Probar demo pública gratis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Precios base en MXN
        const prices = {
            mensual: 350,
            anual: 140,
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
            document.getElementById('price_mensual').textContent = `$${(prices.mensual / exchangeRate).toFixed(2)}`;
            document.getElementById('price_anual').textContent = `$${(prices.anual / exchangeRate).toFixed(2)}`;
            document.getElementById('price_sem').textContent = `$${(prices.sem / exchangeRate).toFixed(2)}`;
            document.getElementById('price_sea').textContent = `$${(prices.sea / exchangeRate).toFixed(2)}`;

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