<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="preciosAnuales">
            <label class="form-check-label" for="preciosAnuales">Precios Anuales</label>
        </div>
    </div>

    <!-- Bootstrap JS (si es necesario) -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

     <!-- Agrega jQuery para el funcionamiento del wizard -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        const checkbox = document.getElementById('preciosAnuales');

        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                // Acciones cuando el checkbox está marcado (Anual)
                console.log('Precios Anuales activados');
            } else {
                // Acciones cuando el checkbox está desmarcado (Mensual)
                console.log('Precios Anuales desactivados');
            }
        });
    </script>

</body>
</html>
