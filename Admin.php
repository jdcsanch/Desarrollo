<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilo1.css">
    <title>Admin</title>
</head>

<body>
    <main class="main">
        <div class="container">
            <a class="logo">
                <div id="logotipo">
                    <img src="SoyAdmin.jpg">
                </div>
            </a>
            <h1>Usted es el administrador</h1>
            <br>
            <p>Si desea registrar un cliente</p>
            <form action="Registro.php" method="POST">
                <input class="ir" type="submit" name="btn_enviar" Value="Registrar">
            </form>
            <br><br<<br>
            <p>Si desea eliminar un cliente</p>
            <form action="Eliminar.php" method="POST">
                <input class="ir" type="submit" name="btn_enviar" Value="Eliminar">
            </form>              


            <p>Finalizar Sesión</p>
            <form action="Principal.php" method="POST">
                <input class="ir" type="submit" name="btn_cerrar" Value="Cerrar sesion">
                <?php
                if (isset($_POST['btn_cerrar'])) {
                    session_destroy();
                    header('Location: Principal.php');
                    
                }
                ?>
            </form>
            

        </div>

    </main>

    <footer class="footer">
        <div class="contanier">
            <p>Página diseñada por<br>
                - Grupo 3<br></p>
        </div>
    </footer>
</body>

</html>