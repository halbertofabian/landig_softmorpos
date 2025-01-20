<style>
    .card-title {
        font-size: 2rem;
        /* Ajustar según se necesite */
    }

    .table td,
    .table th {
        vertical-align: middle;
        /* Centrar verticalmente el contenido de las celdas */
    }

    .card {
        border: 1px solid #ddd;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .mas-vendido {
        background-color: #5550FF;
        color: white;
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .precio {
        font-size: 2rem;
        font-weight: bold;
        color: #5550FF;
        margin-top: 10px;
    }

    .precio-anterior {
        text-decoration: line-through;
        color: #999;
        font-size: 1rem;
    }

    .btn-plan {
        background-color: #5550FF;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        margin-top: 20px;
        width: 100%;
    }

    .renovacion {
        font-size: 0.8rem;
        color: #666;
        margin-top: 10px;
    }

    ul {
        list-style-type: none;
        padding: 0;
        text-align: left;
    }

    li {
        margin-bottom: 10px;
    }

    .li-price::before {
        content: "\2713";
        color: #5550FF;
        margin-right: 10px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h5 class="card-title">Mensual</h5>
                    <p class="precio-anterior">$350.00 MXN/mes</p>
                    <p class="precio">$150.00 MXN/mes</p>
                    <p>+ 2 meses GRATIS</p>
                    <button class="btn-plan">Elegir plan</button>
                    <p class="renovacion">MX$ 159.99/mes al renovar</p>
                    <ul>
                        <li class="li-price">Licencia para 1 sucursal</li>
                        <li class="li-price">10 usuarios</li>
                        <li class="li-price">Multi caja (3 cajas)</li>
                        <li class="li-price">Soporte</li>
                        <li class="li-price">Actualizaciones</li>
                        <li class="li-price">Capacitación pública</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <span class="mas-vendido">MÁS VENDIDO</span>
                    <h5 class="card-title">Anual</h5>
                    <p class="precio-anterior">$460.00 MXN/mes</p>
                    <p class="precio">$133.00 MXN/mes</p>
                    <p>+ 2 meses GRATIS</p>
                    <button class="btn-plan">Elegir plan</button>
                    <p class="renovacion">MX$ 333.99/mes al renovar</p>
                    <ul>
                        <li class="li-price">Licencia para 1 sucursal</li>
                        <li class="li-price">Usuarios ilimitados</li>
                        <li class="li-price">Multi caja (ilimitadas)</li>
                        <li class="li-price">Soporte</li>
                        <li class="li-price">Actualizaciones</li>
                        <li class="li-price">Capacitación privada</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card  shadow-sm mb-3">
                <div class="card-body">
                    <h3 class="card-title">Caracteristicas de Taller Control</h3>
                    <p class="card-text">Gestiona tu taller de manera rápida y organizada desde cualquier lugar.</p>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-header bg-primary text-white">General</div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-globe me-2"></i> Compatible con cualquier sistema operativo.</li>
                                        <li><i class="fas fa-download me-2"></i> Sin necesidad de instalación.</li>
                                        <li><i class="fas fa-laptop me-2"></i> Accede desde cualquier lugar y dispositivo.</li>
                                        <li><i class="fas fa-users me-2"></i> Gestión multiusuario con diferentes niveles de acceso.</li>
                                        <li><i class="fas fa-building me-2"></i> Control de múltiples sucursales.</li>
                                        <li><i class="fas fa-pen me-2"></i> Personaliza con el logotipo y datos de tu negocio.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header bg-primary text-white">Impresión</div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-print me-2"></i> Compatible con impresoras láser y térmicas.</li>
                                        <li><i class="fas fa-file-alt me-2"></i> Diversos formatos de impresión.</li>
                                        <li><i class="fas fa-box me-2"></i> Compatible con impresoras de etiquetas.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-header bg-primary text-white">Gestión de Servicios</div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-tools me-2"></i> Registro detallado de servicios.</li>
                                        <li><i class="fas fa-map-marker-alt me-2"></i> Ubicación y seguimiento de equipos.</li>
                                        <li><i class="fas fa-camera me-2"></i> Añade evidencias con fotos.</li>
                                        <li><i class="fas fa-dollar-sign me-2"></i> Facilita pagos anticipados.</li>
                                        <li><i class="fas fa-search me-2"></i> Consulta en línea el estado de las reparaciones.</li>
                                        <li><i class="fas fa-list me-2"></i> Catálogo personalizable de servicios.</li>
                                        <li><i class="fas fa-ticket-alt me-2"></i> Etiquetas y tickets de servicio.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-header bg-primary text-white">Más Funciones</div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li><i class="fab fa-whatsapp me-2"></i> Notificaciones por WhatsApp.</li>
                                        <li><i class="fas fa-wrench me-2"></i> Agrega refacciones a las órdenes.</li>
                                        <li><i class="fas fa-chart-bar me-2"></i> Reportes técnicos y de comisiones.</li>
                                        <li><i class="fas fa-chart-line me-2"></i> Reportes completos.</li>
                                        <li><i class="fas fa-clipboard-list me-2"></i> Importación de productos vía Excel.</li>
                                        <li><i class="fas fa-upload me-2"></i> Exportación de inventarios.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header bg-primary text-white">Caja y Administración</div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-cash-register me-2"></i> Caja-mostrador multi-cajero.</li>
                                        <li><i class="fas fa-money-bill-wave me-2"></i> Registra cobros, ingresos y gastos.</li>
                                        <li><i class="fas fa-credit-card me-2"></i> Gestiona ventas por diferentes métodos.</li>
                                        <li><i class="fas fa-calendar-alt me-2"></i> Reportes detallados por corte y fecha.</li>
                                        <li><i class="fas fa-chart-pie me-2"></i> Reportes de ingresos, gastos y utilidades.</li>
                                        <li><i class="fas fa-user-lock me-2"></i> Control de clientes y usuarios.</li>
                                        <li><i class="fas fa-clock me-2"></i> Restricción de horarios y accesos.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <center><a href="https://wa.me/5213334814671" target="_blank" class="btn btn-primary">Contactar a ventas</a></center>
                </div>
            </div>
        </div>
    </div>
</div>





<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>