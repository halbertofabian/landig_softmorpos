<footer class="footer mt-auto py-3 white-bg ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center text-center">
                    <div>
                        <img src="./logo_taller_control.svg" width="100" alt="Logo de Softmor POS">
                        <p class="footer-text">Somos una startup SaaS que ofrece soluciones de punto de venta y administración para negocios de reparación y servicio técnico.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <span class="footer-text text-primary ">&copy; <?= date('Y') ?> <a target="_blank" href="https://softmor.com/">Softmor Studios.</a> Todos los derechos reservados.</span>
            </div>
            <div class="col-md-6 text-end">
                <a href="https://facebook.com/softmor" target="_blank" class="me-3 text-primary"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/softmormx/" target="_blank" class="me-3 text-primary"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com/softmormx" target="_blank" class="text-primary"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
</footer>



<!-- Bootstrap JS (si es necesario) -->

<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(document).on('click', '.btnEmpezarGratis', function() {
        var mensaje = "Hola, ¿podría obtener una cuenta demo de Taller Control, por favor?";
        var textoFormateado = encodeURIComponent(mensaje);
        var url = 'https://wa.me/5213334814671?text=' + textoFormateado;
        window.open(url, 'blank');
    });
</script>