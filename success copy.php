<?php
include_once 'config.php';
$respuesta = file_get_contents(URL_SOFTMOR_POS . 'consultar-carrito/cto_id_pay/' . $_GET['payment_intent_client_secret']);
$cto = json_decode($respuesta, true);

$respuesta2 = file_get_contents(URL_SOFTMOR_POS . 'consultar/facturacion/' . base64_encode($cto['cto_correo_suscriptor']));
$ftra = json_decode($respuesta2, true);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Compra</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluir FontAwesome para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
        .notification-panel {
            background-color: #5cb85c;
            color: white;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            height: 140px;
        }

        .notification-header {
            /* display: flex; */
            align-items: center;
            justify-content: start;
        }

        .notification-icon {
            font-size: 24px;
            margin-right: 10px;
        }

        .purchase-item {
            background-color: #fff;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
        }

        .purchase-item-img {
            width: 50px;
            /* Ajusta el tamaño según necesites */
            height: auto;
            border-radius: 50%;
        }

        .btn-continue {
            background-color: #5cb85c;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0 mb-5">
        <div class="notification-panel d-flex justify-content-center ">
            <div class="notification-header text-center">
                <i class="fas fa-check-circle notification-icon"></i>
                <h4>¡Tu compra ha sido exitosa!</h4>
                <p>Te hemos enviado un comprobante de pago a tu correo</p>
            </div>
        </div>
        <div class="container">
            <!-- Artículo de ejemplo -->
            <div class="purchase-item">
                <div class="d-flex align-items-center">
                    <img src="ruta_a_la_imagen_del_producto" alt="Producto" class="purchase-item-img me-3">
                    <div>
                        <h5>Nombre del producto</h5>
                        <p>Llega entre el 10 y el 14 de Diciembre</p>
                    </div>
                </div>
            </div>
            <!-- Repite el bloque de arriba para más artículos, asegurándote de dejar el último sin el margen inferior -->

            <!-- <div class="text-center mt-3">
                <button class="btn btn-continue"></button>
            </div> -->

            <div class="card">
                <div class="card-body">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-factura">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefactura" aria-expanded="false" aria-controls="flush-collapsefactura">
                                    <strong>Solicita tu factura</strong>
                                </button>
                            </h2>
                            <div id="flush-collapsefactura" class="accordion-collapse collapse" aria-labelledby="flush-factura" data-bs-parent="#accordionFlushExample">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <form id="formGuardarDatosFacturacion">
                                            <div class="row mt-3">
                                                <p class="text-center"> <strong>Confirma tus datos de facturación</strong> </p>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-group">
                                                        <label for="ftra_rfc">RFC</label>
                                                        <input type="hidden" name="ftra_correo" id="ftra_correo" value="<?= $cto['cto_correo_suscriptor'] ?>">
                                                        <input type="text" name="ftra_rfc" id="ftra_rfc" class="form-control text-uppercase" placeholder="" value="<?= ($ftra['ftra_save_datos'] == 1) ? $ftra['ftra_rfc'] : "" ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-group">
                                                        <label for="ftra_nombre">NOMBRE</label>
                                                        <input type="text" name="ftra_nombre" id="ftra_nombre" class="form-control" required placeholder="" value="<?= ($ftra['ftra_save_datos'] == 1) ? $ftra['ftra_nombre'] : "" ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-group">
                                                        <label for="ftra_pais">PAÍS</label>
                                                        <input type="text" name="ftra_pais" id="ftra_pais" class="form-control" placeholder="" value="MÉXICO" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-group">
                                                        <label for="ftra_regimen_fiscal">REGIMEN FISCAL</label>
                                                        <select class="form-control" name="ftra_regimen_fiscal" id="ftra_regimen_fiscal" required value="<?= ($ftra['ftra_save_datos'] == 1) ? $ftra['ftra_regimen_fiscal'] : "" ?>">
                                                            <option value="ejemplo">ejemplo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-group">
                                                        <label for="ftra_codigo_postal">CÓDIGO POSTAL</label>
                                                        <input type="text" name="ftra_codigo_postal" id="ftra_codigo_postal" class="form-control" required placeholder="" value="<?= ($ftra['ftra_save_datos'] == 1) ? $ftra['ftra_codigo_postal'] : "" ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label for="ftra_colonia" class="form-label">COLONIA</label>
                                                    <select class="form-select" name="ftra_colonia" id="ftra_colonia" required>

                                                    </select>
                                                </div>
                                                <div class="col-md-8 mb-2">
                                                    <div class="form-group">
                                                        <label for="ftra_calle">CALLE</label>
                                                        <input type="text" name="ftra_calle" id="ftra_calle" class="form-control" required placeholder="" value="<?= ($ftra['ftra_save_datos'] == 1) ? $ftra['ftra_calle'] : "" ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mb-2">
                                                    <div class="form-group">
                                                        <label for="ftra_no_exterior">EXTERIOR</label>
                                                        <input type="text" name="ftra_no_exterior" id="ftra_no_exterior" class="form-control" placeholder="" value="<?= ($ftra['ftra_save_datos'] == 1) ? $ftra['ftra_no_exterior'] : "" ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mb-2">
                                                    <div class="form-group">
                                                        <label for="ftra_no_interior">INTERIOR</label>
                                                        <input type="text" name="ftra_no_interior" id="ftra_no_interior" class="form-control" placeholder="" value="<?= ($ftra['ftra_save_datos'] == 1) ? $ftra['ftra_no_interior'] : "" ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-group">
                                                        <label for="ftra_estado">ESTADO</label>
                                                        <input type="text" name="ftra_estado" id="ftra_estado" class="form-control" readonly placeholder="" value="<?= ($ftra['ftra_save_datos'] == 1) ? $ftra['ftra_estado'] : "" ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-group">
                                                        <label for="ftra_municipio">MUNICIPIO</label>
                                                        <input type="text" name="ftra_municipio" id="ftra_municipio" class="form-control" readonly placeholder="" value="<?= ($ftra['ftra_save_datos'] == 1) ? $ftra['ftra_municipio'] : "" ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-group">
                                                        <label for="ftra_localidad">LOCALIDAD</label>
                                                        <input type="text" name="ftra_localidad" id="ftra_localidad" class="form-control" placeholder="" value="<?= ($ftra['ftra_save_datos'] == 1) ? $ftra['ftra_localidad'] : "" ?>">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3 form-check">
                                                        <?php if ($ftra['ftra_save_datos'] == 1) {
                                                            $checked = "checked";
                                                        } else {
                                                            $checked = "";
                                                        } ?>
                                                        <input type="checkbox" class="form-check-input" name="ftra_save_datos" id="is_factura" <?= $checked ?> />
                                                        <label class="form-check-label" for="is_factura">Guardar mis datos y emitir factura automáticamente en futuras transacciones</label>
                                                    </div>

                                                </div>
                                                <div class="col-8">
                                                    <button type="submit" class=" btn btn-success float-end">Guardar datos</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <button class="btn btn-continue">Regresar al sistema</button>
            </div>

        </div>
    </div>
    <?php
    echo '<pre>', var_dump($_GET), '</pre>';
    ?>

    <!-- Incluir Bootstrap JS y Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        if ('<?= $ftra['ftra_save_datos'] ?>' == 1) {
            $("#ftra_codigo_postal").change();
            setTimeout(() => {
                $("#ftra_colonia").val('<?= $ftra['ftra_colonia'] ?>');
            }, 500);
        }
    })
    $('#formGuardarDatosFacturacion').on('submit', function(e) {
        e.preventDefault();
        var datos = new FormData(this)
        datos.append('btnNewUser', true);
        $.ajax({
            type: 'POST',
            url: '<?= URL_SOFTMOR_POS ?>' + 'facturacion/guardar',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status) {
                    toastr.success(res.mensaje, '¡Muy bien!');
                } else {
                    toastr.error(res.mensaje, '¡ERROR!');
                }
            }
        });
    });

    $("#ftra_codigo_postal").on("change", function() {
        var codigo = $(this).val();
        if (codigo == "") {
            return;
        }
        $('#ftra_colonia option').remove();
        $.ajax({
            type: "GET",
            url: 'https://app.softmor.com/api/public/codigos_postales/codigo/' + codigo,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(res) {
                console.log(res)
                res.forEach(element => {
                    $("#ftra_estado").val(element.cp_estado);
                    $("#ftra_municipio").val(element.cp_municipio);
                    $("#ftra_colonia").append(`<option value="${element.cp_asentamiento}">${element.cp_asentamiento}</option>`);
                });

            }
        });
    });
</script>