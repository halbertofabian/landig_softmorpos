<?php
echo '<pre>', var_dump($_GET), '</pre>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="facturarCheckbox">
                    <label class="form-check-label" for="facturarCheckbox">
                        ¿Necesitas facturar?
                    </label>
                </div>
            </div>
            <div class="card-body d-none">

                <h2 class="mb-4">Información para Facturación</h2>

                <form action="">
                    <div class="row">
                        <!-- RFC -->
                        <div class="col-md-4 col-12 mb-3">
                            <div class="form-group">
                                <label for="rfc">RFC</label>
                                <input type="text" name="rfc" id="rfc" class="form-control" placeholder="Ingrese su RFC" required>
                            </div>
                        </div>
                        <!-- Nombre -->
                        <div class="col-md-4 col-12 mb-3">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre" required>
                            </div>
                        </div>
                        <!-- País -->
                        <div class="col-md-4 col-12 mb-3">
                            <div class="form-group">
                                <label for="pais">País</label>
                                <select class="form-select" name="pais" id="pais">
                                    <option selected>México</option>
                                    <!-- Otras opciones de país si las necesitas -->
                                </select>
                            </div>
                        </div>
                        <!-- Régimen Fiscal -->
                        <div class="col-md-4 col-12 mb-3">
                            <div class="form-group">
                                <label for="regimenFiscal">Régimen Fiscal</label>
                                <select class="form-select" name="regimenFiscal" id="regimenFiscal">
                                    <option selected>Seleccione un régimen fiscal...</option>
                                    <option value="general">General de Ley Personas Morales</option>
                                    <option value="simplificadoConfianza">Régimen Simplificado de Confianza</option>
                                    <option value="actividadesEmpresarialesProfesionales">Régimen de Actividades Empresariales y Profesionales</option>
                                    <option value="incorporacionFiscal">Régimen de Incorporación Fiscal</option>
                                    <!-- ... opciones ... -->
                                </select>
                            </div>
                        </div>
                        <!-- Código Postal -->
                        <div class="col-md-4 col-12 mb-3">
                            <div class="form-group">
                                <label for="cp">Código Postal</label>
                                <input type="text" name="cp" id="cp" class="form-control" placeholder="Ingrese su código postal" required>
                            </div>
                        </div>
                        <!-- Colonia -->
                        <div class="col-md-4 col-12 mb-3">
                            <div class="form-group">
                                <label for="colonia">Colonia</label>
                                <input type="text" name="colonia" id="colonia" class="form-control" placeholder="Ingrese la colonia" required>
                            </div>
                        </div>
                        <!-- Calle -->
                        <div class="col-md-4 col-12 mb-3">
                            <div class="form-group">
                                <label for="calle">Calle</label>
                                <input type="text" name="calle" id="calle" class="form-control" placeholder="Ingrese la calle" required>
                            </div>
                        </div>
                        <!-- Exterior -->
                        <div class="col-md-4 col-12 mb-3">
                            <div class="form-group">
                                <label for="exterior">Exterior</label>
                                <input type="text" name="exterior" id="exterior" class="form-control" placeholder="Número exterior" required>
                            </div>
                        </div>
                        <!-- Interior -->
                        <div class="col-md-4 col-12 mb-3">
                            <div class="form-group">
                                <label for="interior">Interior</label>
                                <input type="text" name="interior" id="interior" class="form-control" placeholder="Número interior">
                            </div>
                        </div>
                        <!-- Estado -->
                        <div class="col-md-4 col-12 mb-3">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" id="estado" class="form-control" placeholder="Ingrese el estado" required>
                            </div>
                        </div>
                        <!-- Municipio -->
                        <div class="col-md-4 col-12 mb-3">
                            <div class="form-group">
                                <label for="municipio">Municipio</label>
                                <input type="text" name="municipio" id="municipio" class="form-control" placeholder="Ingrese el municipio" required>
                            </div>
                        </div>
                        <!-- Localidad -->
                        <div class="col-md-4 col-12 mb-3">
                            <div class="form-group">
                                <label for="localidad">Localidad</label>
                                <input type="text" name="localidad" id="localidad" class="form-control" placeholder="Ingrese la localidad" required>
                            </div>
                        </div>
                        <!-- Botón de enviar -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>