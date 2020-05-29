<?php

$host ="localhost";
$user ="root";
$pass ="";
$db='consultaprueba';
$conn= mysqli_connect($host,$user,$pass,$db)or die("Error al Conectar");
mysqli_select_db($conn,$db)or die("No de pudo conectar con la base de datos ERROR 404 NOT FOUND");
$cons=$_POST["consulta"];
$r=$_POST["nrandom1"];

if ($cons == "sucursal"){
	$sql = "select nombre,primerapellido from clientes where sucursalcliente = '$r'";
    $consresult = mysqli_query($conn, $sql);

if (!$consresult) {
    // El commit falló!
    echo "<strong> Commit fallido error numero :</strong> ($conn->errno)";
}

if (!$consresult) {
    printf("  <strong>Error provocado en:</strong> %s\n", $conn->error);
}else{
    $h = mysqli_num_rows($consresult);
	if ($h==0){
		echo "No se Encontro reultado";
		}else{
		echo "<strong>Clientes de la sucursal:</strong> ", $r."<br><br>";
		while ( $row = mysqli_fetch_assoc($consresult)) {
            echo $row["nombre"]."<br>";
			echo $row["primerapellido"]."<br><br>";

		}
	}}
    }else{
    echo "Error 404 NOT FOUND xd";
	}
//Cierra la conexion a la base de datos
mysqli_close($conn);
?>