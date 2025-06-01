<?php
include 'database.php'; // Conectar a la base de datos
$stmt = $pdo->query("SELECT id, username FROM usuario"); // Consulta para obtener id y username de la tabla 'usuario'
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC); // Recupera los resultados en un array asociativo
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de usuarios - Agencia de Viajes</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <header class="hero">
            <nav class="navbar">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="create.php">Creación de Destinos</a></li>
                    <li><a href="login.php">Identificación</a></li>
                    <li><a href="createguide.php">Creación de Guía</a></li>
                    <li><a href="users.php">Listado de usuarios</a></li>
                </ul>
            </nav>
            <h1>Listado de usuarios</h1>
            <p>Aquí encontrarás todos nuestros usuarios:</p>
        </header>

        <section id="usuarios">
            <h2>Nuestros Usuarios</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre de usuario</th>
                        <th> Editar usuario </th>
                    </tr>
                </thead>
                <tbody>
                      <?php foreach ($usuarios as $usuario): ?> <!--por cada usuario que encuentre en el array de usuarios -->
                        <tr>
                            <td><?= htmlspecialchars($usuario['username']) ?></td> <!-- lista su nombre-->
                            <td>
                                <a href="edituser.php?id=<?= $usuario['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <footer>
            <p>© 2025 Agencia de Viajes. Todos los derechos reservados.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </footer>
    </div>
</body>
</html>
</html>
