<?php
require_once 'conexion.php';

$mensaje = "";
$tipoMensaje = "";

if (isset($_POST['guardar_gasto'])) {
    $concepto = trim($_POST['concepto']);
    $monto = floatval($_POST['monto']);
    $categoria = trim($_POST['categoria']);

    $stmt = $conexion->prepare("INSERT INTO gastos (concepto, monto, categoria) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $concepto, $monto, $categoria);

    if ($stmt->execute()) {
        $mensaje = "Gasto registrado con éxito.";
        $tipoMensaje = "alert-success";
    } else {
        $mensaje = "Error al registrar: " . $stmt->error;
        $tipoMensaje = "alert-error";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Gastos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
    <h1>Control de Gastos</h1>
    <h2>Bienvenidos</h2>
</header>

<nav>
    <a href="index.php">Agregar gastos</a>
    <a href="VerProducts.php">Ver Gastos</a>
</nav>

<div class="container">

    <?php if ($mensaje != ""): ?>
        <div class="<?php echo $tipoMensaje; ?>">
            <?php echo htmlspecialchars($mensaje); ?>
        </div>
    <?php endif; ?>

    <div class="card">
        <h2>Formulario de Gastos</h2>

        <form action="" method="POST">
            <div class="form-group">
                <label>Concepto:</label>
                <input type="text" name="concepto" required>
            </div>

            <div class="form-group">
                <label>Monto:</label>
                <input type="number" step="0.01" min="0" name="monto" required>
            </div>

            <div class="form-group">
                <label>Categoría:</label>
                <input type="text" name="categoria" required>
            </div>

            <button type="submit" name="guardar_gasto" class="btn-primary">
                Guardar gasto
            </button>
        </form>
    </div>

</div>

<footer>
    <p>Redes Sociales</p>
    <p>Prácticas</p>
</footer>

</body>
</html>