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
                                        <div class="row mt-3">
                                            <p class="text-center"> <strong>Confirma tus datos de facturación</strong> </p>
                                            <div class="col-md-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">RFC</label>
                                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">NOMBRE</label>
                                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">PAÍS</label>
                                                    <input type="text" name="" id="" class="form-control" placeholder="" value="MÉXICO" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">REGIMEN FISCAL</label>
                                                    <select class="form-control" name="" id="">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">CÓDIGO POSTAL</label>
                                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">COLONIA</label>
                                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-8 mb-2">
                                                <div class="form-group">
                                                    <label for="">CALLE</label>
                                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <div class="form-group">
                                                    <label for="">EXTERIOR</label>
                                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <div class="form-group">
                                                    <label for="">INTERIOR</label>
                                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">ESTADO</label>
                                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">MUNICIPIO</label>
                                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <div class="form-group">
                                                    <label for="">LOCALIDAD</label>
                                                    <input type="text" name="" id="" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input" id="is_factura" checked />
                                                    <label class="form-check-label" for="is_factura">Guardar mis datos y emitir factura automáticamente en futuras transacciones</label>
                                                </div>

                                            </div>
                                            <div class="col-8">
                                                <button class=" btn btn-success float-end">Guardar datos</button>
                                            </div>
                                        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>