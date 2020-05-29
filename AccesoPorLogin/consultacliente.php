<?php
$host ="localhost";
$user ="root";
$pass ="";
$db='consultaprueba';
$conn=mysqli_connect($host,$user,$pass,$db)or die("Error al Conectar");
mysqli_select_db($conn,$db)or die("No de pudo conectar con la base de datos ERROR 404 NOT FOUND");

$cons=$_POST["consulta"];
$r=$_POST["nrandom2"];
if ($cons == "cliente"){
	$sql = "select * from cliente where nombrer = '$r'";
    $consresult = mysqli_query($conn, $sql);
if (!$consresult) {
    // El commit falló!
    echo "<strong> Commit fallido error numero :</strong> ($conn->errno) ";
}
if (!$consresult) {
    printf("  <strong>Error provocado en:</strong> %s\n", $conn->error);
}else{$h = mysqli_num_rows($conresult);
    if ($h==0){
            echo "<strong>Error al encontrar resultados intente de nuevo";
            }else{
                while ( $row = mysqli_fetch_assoc($consresult)) {
                    echo "<strong>nombre:</strong> ";
                    echo $row["nombre"]."<br><br>";
                    echo "<strong>Primer Apellido:</strong> ";
                    echo $row["primerapellido"]."<br><br>";
                    echo "<strong>Segundo Apellido:</strong> ";
                    echo $row["segundoapellido"]."<br><br>";
                    echo "<strong>Edad:</strong> ";
                    echo $row["edad"]."<br><br>";
                    echo "<strong>Telefono:</strong> ";
                    echo $row["celular"]."<br><br>";
                    echo "<strong>Sucursal a la que asiste:</strong> ";
                    echo $row["sucursalcliente"]."<br>";
            }
        }
}

}

//Cierra la conexion a la base de datos
mysqli_close($conn);
?>