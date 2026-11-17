<?php
require_once 'conexion.php';

$gastos = $conexion->query("SELECT * FROM gastos ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Gastos</title>
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

    <div class="card">
        <h2>Tabla de Gastos</h2>

        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Concepto</th>
                    <th>Monto</th>
                    <th>Categoría</th>
                </tr>

                <?php while ($g = $gastos->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $g['id']; ?></td>
                        <td><?php echo htmlspecialchars($g['concepto']); ?></td>
                        <td>$<?php echo number_format((float)$g['monto'], 2); ?></td>
                        <td><?php echo htmlspecialchars($g['categoria']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>

</div>

<footer>
    <p>Redes Sociales</p>
    <p>Prácticas</p>
</footer>

</body>
</html>