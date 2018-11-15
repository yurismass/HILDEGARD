<?php //session_start();
//LOCAL HOST ES EL NOMBRE DEL SERVIDOR, ROOT ES EL USUARIO , NOMBRE  DE BASE DE DATOS ESPACIO EN BLANCO SON CONTRASEÑAS AL SERVIDOR
//mysqli::set_charset -- mysqli_set_charset // Establece el conjunto de caracteres predeterminado del cliente
$mysqli = new mysqli("localhost", "root","","hildegard");
// $mysqli = new mysqli("fdb16.awardspace.net", "2373032_sigesvi","paselibre2017","2373032_sigesvi");


//Comprueba la Conexion
if (mysqli_connect_errno()) {

    printf("Error al conectar con la BD %s ", $mysqli_connect_error());
    exit();
}
?>
