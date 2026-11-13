
<?php
require_once 'conexion.php';

$usuarios = $conexion->query("SELECT * FROM usuarios ORDER BY id_usuario DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver usuarios</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<header>
    <h1>Tienda Web</h1>
    <h2>Bienvenidos</h2>
</header>

<nav>
    <a href="index.php">Agregar usuarios</a>
    <a href="VerProducts.php">Ver usuarios</a>
</nav>

<div class="container">

    <div class="card">
        <h2>Tabla de usuarios</h2>

        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>

                <?php while ($u = $usuarios->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $u['id_usuario']; ?></td>

                        <td>
                            <?php echo htmlspecialchars($u['nombre']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($u['correo']); ?>
                        </td>

                        <td>
                            <a class="btn btn-secondary"
                               href="editar.php?id=<?php echo $u['id_usuario']; ?>">
                                Editar
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </table>
        </div>

    </div>

</div>

<footer>
    <p>Redes Sociales</p>
    <p>Practicas</p>
</footer>

</body>
</html>
