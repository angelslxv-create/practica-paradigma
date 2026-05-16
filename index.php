<?php
// Asegúrate de haber renombrado el archivo a "connection.php" con doble c
include("connection.php");
$con = conection();

// Consultamos los usuarios existentes en la base de datos
$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="users-form">
        <h2>Crear Usuario</h2>
        <form action="insert_user.php" method="POST">
            <input type="text" name="name" placeholder="Nombre" required>
            <input type="text" name="lastname" placeholder="Apellido" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="submit" value="Agregar usuario">
        </form>
    </div>

    <div class="users-table">
        <h2>Usuarios Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['lastname'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['email'] ?></td>
                        
                        <td><a href="update_user.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a></td>
                        <td><a href="delete_user.php?id=<?= $row['id'] ?>" class="users-table--delete" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>