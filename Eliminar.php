<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilo1.css">
    <title>Eliminar</title>
</head>

<body>
    <main class="main">
        <div class="container">
            
            <h1>Clientes</h1>
            <br>
            <table id="t01" style="width:100%" border="2" >
                <tr>
                    <td>Cédula</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Usuario</td>
                    <td>Contraseña</td>	
                </tr>

                <?php 
                include("Conexion.php");
                $sql="SELECT * from registro";
                $result=mysqli_query($conexion,$sql);

                while($mostrar=mysqli_fetch_array($result)){
                ?>

                <tr>
                    <td><?php echo $mostrar['Cedula'] ?></td>
                    <td><?php echo $mostrar['Nombre'] ?></td>
                    <td><?php echo $mostrar['Apellido'] ?></td>
                    <td><?php echo $mostrar['Usuario'] ?></td>
                    <td><?php echo $mostrar['Contra'] ?></td>
                </tr>
                <?php 
                }
                ?>
            </table>
            <br><br><br>
            <p>
            <form action="Eliminar.php" method="Post">
                <h1>Eliminar Cliente</h1>
                    <p> Cédula: <input class="pedir" type = "text" name ="Cedula" minlength="10" maxlength="10" required="" pattern="[0-9]+" placeholder="Escriba la cédula"></p>
                
                <p> <input class="ir" type="submit" name="btn_eliminar" Value="Eliminar"></p>
            </form>

            </p>
            <?php 
            if (isset($_POST['btn_eliminar'])) {
                    @$Cedula = trim($_POST['Cedula']); 
                    @$ConsultaPro = "SELECT * FROM registro where Cedula=".$Cedula ;
                    @$QueryPro = mysqli_query($conexion,$ConsultaPro);
                    @$mostrar=mysqli_fetch_array($QueryPro);
                    if (isset($mostrar['Cedula'])!=$Cedula){
                        ?> 
                        <h3 class="error">¡Al parecer es una cédula inexistente!</h3>
                    <?php 
                    }else{                 
                        $consulta = "DELETE FROM registro where Cedula =".$Cedula;
                        $Query = mysqli_query($conexion,$consulta);
                        if ($Query) {
                            ?> 
                            <h3 class="ok">¡Datos elimanados correctamente!</h3>          
                        <?php         
                        } else {
                            ?> 
                            <h3 class="error">¡Al parecer no existe ese cliente!</h3>
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

