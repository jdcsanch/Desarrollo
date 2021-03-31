<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilo1.css">
    <title>Kia: Michael García</title>
</head>

<body>
    <main class="main">
        <div class="container">

            <h1>Login</h1>
            <br>
            <form method="Post">
                <label class="labeles" >Digite el Usuario</label><br>
                <input class="pedir" type = "text" name ="User" required="" placeholder="Escriba su usuario"></p><br>
                <label class="labeles" >Digite la contraseña</label><br>
                <input class="pedir" type = "password" name ="Pass" required="" placeholder="Escriba su contraseña"></p><br>
                <input class="ir" type="submit" name="btn_enviar" Value="Iniciar sesión">  <br><br><br>
            </form>

            <form action="Registro.php" method="POST">
                <input class="ir" type="submit" name="btn_enviar" Value="Registrarse">
            </form>
            <?php
             if (isset($_POST['btn_enviar'])) {
                @$User = trim($_POST['User']);
                @$Pass = trim($_POST['Pass']);
                @$ConsultaPro = "SELECT * FROM registro";
                @$QueryPro = mysqli_query($conexion,$ConsultaPro);
                @$mostrar=mysqli_fetch_array($QueryPro);
                    if ($User=="admin" and $Pass="admin"){
                        header('Location: Admin.php');                   
                    }elseif((isset($mostrar['Usuario'])==$User) and (isset($mostrar['Contra'])==$Pass)){
                        ?> 
                            <h3 class="error">¡Usuario o Password!</h3>          
                        <?php         
                    }else{
                        ?> 
                            <h3 class="error">¡Usuario o Password incorrectos!</h3>          
                        <?php     
                    }
                }
                        ?>
            

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