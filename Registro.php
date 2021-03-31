<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilo1.css">
    <title>Registro</title>
</head>

<body>
    <main class="main">
        <div class="container">
            <p>
            <h1>Registrar Cliente</h1>
            <br>
            <form method="Post">
                <p> Cédula: <input class="pedir" type = "text" name ="Cedula" minlength="10" maxlength="10" required="" pattern="[0-9]+" placeholder="Escriba su cédula"></p>
                <p> Nombre: <input class="pedir" type = "text" name ="Nombre" required="" pattern="[a-zA-Z]+" placeholder="Escriba su nombre"></p>
                <p> Apellido: <input class="pedir" type = "text" name ="Apellido" required="" pattern="[a-zA-Z]+" placeholder="Escriba su apellido"></p>
                <p> Usuario: <input class="pedir" type = "text" name ="User" required="" placeholder="Escriba su usuario"></p>
                <p> Contraseña: <input class="pedir" type = "text" name ="Pass" required="" placeholder="Escriba su Contraseña"></p>
            
            <p> <input class="ir" type="submit" name="btn_registrar" Value="Registrar"></p>
            </form>
            </p>
            <?php 
            include("Conexion.php");
            if (isset($_POST['btn_registrar'])) {
                    @$Cedula = trim($_POST['Cedula']);
                    @$Nombre = trim($_POST['Nombre']);
                    @$Apellido = trim($_POST['Apellido']);
                    @$User = trim($_POST['User']);
                    @$Pass = trim($_POST['Pass']);
                    @$ConsultaPro = "SELECT * FROM registro where Cedula=".$Cedula ;
                    @$QueryPro = mysqli_query($conexion,$ConsultaPro);
                    @$mostrar=mysqli_fetch_array($QueryPro);
                    if (isset($mostrar['Cedula'])==$Cedula){
                        ?> 
                        <h3 class="error">¡Al parecer es una cédula existente!</h3>
                    <?php 
                    }else{
                        $consulta = "INSERT INTO registro(Cedula, Nombre, Apellido, Usuario, Contra) VALUES ('$Cedula','$Nombre','$Apellido','$User', '$Pass')";
                        $Query = mysqli_query($conexion,$consulta);
                        if ($Query) {
                            ?> 
                            <h3 class="ok">¡Datos registrados correctamente!</h3>          
                        <?php         
                        } else {
                            ?> 
                            <h3 class="error">¡Al parecer ha ocurrido un error!</h3>
                        <?php
                        }
                    }
                }   
            ?>

            <form action="Admin.php" method="POST">
                <input class="ir" type="submit" name="btn_enviar" Value="Salir">
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

