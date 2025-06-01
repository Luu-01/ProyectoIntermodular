<?php 
include 'database.php'; 
// Recuperamos todos los destinos de la base de datos
$stmt = $pdo->query("SELECT * FROM destinos"); // Aquí hacemos la consulta para obtener los destinos
$destinos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtenemos los resultados como un array asociativo
?>
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinos - Agencia de Viajes</title>
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
                </ul>
            </nav>
            <h1>Explora Nuestros Destinos</h1>
            <p>Encuentra el lugar perfecto para tu próxima aventura</p>
        </header>

        <section id="destinos">
            <h2>Nuestros Destinos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Pasaporte</th>
                        <th>Creado por</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($destinos as $destino): ?> <!-- por cada destino que tengamos en el array-->
                        <tr>
                            <td><?= htmlspecialchars($destino['nombre']) ?></td> <!--lo colocamos en esta tabla-->
                            <td><?= htmlspecialchars($destino['descripcion']) ?></td>
                            <td><?= htmlspecialchars($destino['pasaporte']) ?></td>
                            <td><?= htmlspecialchars($destino['created_por']) ?></td>
                            <td>
                            </td>
                            <!--me falta poner los que estén suscritos porque aun no está el formulario de inscripción-->
                        </tr>
                    <?php endforeach; ?>
                </div>
            </div>
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
