<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        /*  Este método llama al fichero validar_usuario.php y lo incluye 
            para que podamos emplear todas las variables y métodos que 
            hayamos programado
        */  

        /*  Este método llama al fichero base_de_datos.php y lo incluye 
            para que podamos utilizar la conexión a la base de datos
        */  
        require 'database.php';

        //  Si el nombre y la contraseña son correctos, los mostramos por pantalla y creamos el usuario en la base de datos
        if (isset($_POST["nombre"]) && isset($_POST["contrasena"])) {
            $nombre = $_POST["nombre"];
            $contrasena = $_POST["contrasena"];
            $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (usuario, contrasena)
                        VALUES ('$nombre','$hash_contrasena')";

            if ($conexion -> query($sql) === TRUE) {
                echo "Usuario registrado correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion -> error;
            }
        }
    }
    
?>
<h1>Registrarse</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" accept-charset="utf-8">
    Nombre: <input type="text" name="nombre">
    <span class="error">* <?php if (isset($err_nombre)) echo $err_nombre;?></span>
    <br><br>
    Contraseña: <input type="password" name="contrasena">
    <span class="error">* <?php if (isset($err_contrasena)) echo $err_contrasena;?></span>
    <br><br>
    <input type="submit" value="Enviar">
</form>
