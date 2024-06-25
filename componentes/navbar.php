

<div class="curved-bg"></div> <!-- Fondo con curvas -->

<nav class="navbar fixed-top navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-center" href="#">
            <span class="d-none d-md-inline">
                <center>Llámanos al (734) 100 6945 - Lunes a Viernes 8:00 a 19:00 Sabado 8:00 a 12:00</center>
            </span>
            <span class="d-inline d-md-none text-center" style="font-size: 12px;">
                <center>Tel: (734) 100 6945 Lun-Vie: 8:00 - 19:00 Sáb: 8:00 - 12:00</center>
            </span>
        </a>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light mt-5 fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= HTTP_HOST ?>">
            <img src="./logo_taller_control.svg" alt="" width="200" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= HTTP_HOST ?>">Inicio</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Soluciones
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item disabled" href="#">Tienda</a></li>
                        <li><a class="dropdown-item disabled" href="#">Punto de venta para cualquier nicho</a></li>
                        <li><a class="dropdown-item" href="./">Taller control</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="https://softmor.com" target="_blank" >Software empresarial</a></li>
                        <li><a class="dropdown-item" href="https://softmor.com/e-commerce-development/" target="_blank" >Desarrollo de E-Commerce</a></li>
                        <li><a class="dropdown-item" href="https://softmor.com/mobile-development/" target="_blank" >Desarrollo Mobile</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $carrito ?>">Precios</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li> -->
            </ul>
            <form class="d-flex">
                <a class="btn btn-outline-dark m-1" href="https://app.tallercontrol.com/">Ingresa</a>
                <a class="btn btn-primary m-1 btn-primary btn-lg animate__animated animate__pulse animate__infinite btnEmpezarGratis" type="button" href="javascript:void(0)">Prueba gratis</a>
            </form>
        </div>
    </div>
</nav>