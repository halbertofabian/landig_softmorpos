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

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="mdlPruebaGratis" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Prueba demo
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formCrearCuentaDemo">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="">Nombre</label>
                            <input type="hidden" name="ppt_cupon" id="ppt_cupon">
                            <input type="text" name="ppt_nombre" id="ppt_nombre" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="ppt_correo" class="text-normal">Correo electrónico</label>
                            <input type="email" class="form-control" id="ppt_correo" name="ppt_correo" placeholder="example@gmail.com" required>
                        </div>
                        <div class="col-md-4 col-12">
                            <label for="">Pais</label>
                            <select id="paises" name="paises" class="form-control select2" required>
                                <option value="">Seleciona tu país</option>
                                <option value="México+521">🇲🇽 México (+521)</option>
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
                                <option value="México+521">🇲🇽 México (+521)</option>
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
                        <div class="col-md-8 col-12">
                            <label for="">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="ppt_telefono" placeholder="Teléfono" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary w-100 btn-load">Obtener demo</button>
                    <p>Al dar clic en "Obtener demo" recibíras las credenciales de acceso vía whatsapp y correo electrónico</p>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Bootstrap JS (si es necesario) -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(document).on('click', '.btnEmpezarGratis', function() {
        // var mensaje = "Hola, ¿podría obtener una cuenta demo de Taller Control, por favor?";
        // var textoFormateado = encodeURIComponent(mensaje);
        // var url = 'https://wa.me/5213334814671?text=' + textoFormateado;
        // window.open(url, 'blank');

        $("#mdlPruebaGratis").modal('show');

    });

    $('#mdlPruebaGratis').on('shown.bs.modal', function(e) {
        $("#ppt_nombre").focus();
    });
    $('#mdlPruebaGratis').on('hidden.bs.modal', function(e) {
        $("#formCrearCuentaDemo")[0].reset();
        $('#paises').val("");
        // $('#paises').val("").select2().trigger('change:select2');
    });


    $('#formCrearCuentaDemo').on('submit', function(e) {
        e.preventDefault();
        var datos = new FormData(this)
        // datos.append('btnGuardarProspecto', true);
        $.ajax({
            type: 'POST',
            url: '<?= URL_SOFTMOR_POS ?>' + 'prospectos/guardar/prueba',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function() {
                startLoadButton()
            },
            success: function(res) {
                stopLoadButton('Obtener demo');
                if (res.status) {
                    window.location.href = res.pagina;
                } else {
                    swal('Oops', res.mensaje, 'error');
                }
            }
        });
    });

    function startLoadButton() {
        $(".btn-load").attr("disabled", true);
        $(".btn-load").html(` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Por favor espere...`)
    }

    function stopLoadButton(label) {
        $(".btn-load").attr("disabled", false);
        if (label == "") {
            $(".btn-load").html("ACEPTAR");
        } else {
            $(".btn-load").html(label);
        }
    }
</script>

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
                    $("#ppt_cupon").val(res.cps.cps_codigo ? res.cps.cps_codigo : "");
                } else {
                    $("#ppt_cupon").val("");
                }
            }
        });
    </script>
<?php else :
?>
    <script>
        $("#ppt_cupon").val("");
    </script>
<?php endif; ?>