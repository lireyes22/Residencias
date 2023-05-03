
//ESTO AGREGALO EN LA PARTE SUPERIOR--- DE AQUI
include('funciones.php'); //EL NOMBRE DE TU ARCHIVO DE FUNCIONES
$link = conn();
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
//HASTA AQUI
//SI NO VAS A USAR VARIABLES
$query = "SELECT nombre, apellido FROM alumno WHERE alumno.estado = 'INSCRITO'"; //AQUI VA LA CONSULTA SQL
$result = mysqli_fetch_array(mysqli_query($link, $query)); //AQUI SE GUARDA COMO ARREGLO, EJEMPLO SI QUIERO USAR 'Apellido' uso $result[1] (POSICION 1 DEL RESULTADO DE LA CONSULTA) 

$var1 = "PENDIENTE"; //SI VAS A USAR VARIABLES USALAS DE LA SIGUIENTE MANERA EN LA CONSULTA
$query = "SELECT nombre, apellido FROM alumno WHERE alumno.estado = '$var1'"; //IMPORTANTE poner las comillas simples
$result = mysqli_fetch_array(mysqli_query($link, $query)); //EL RESULTADO ES EL MISMO QUE EL ANTERIOR

//SI VAS A HACER USO DE UNA CONSULTA EN LA CUAL TRAERA A MAS DE UNA FILA (CUANDO NO USAS WHERE)
$query = "SELECT nombre, apellido FROM alumno"; //SI TE DAS CUENTA ESTA CONSULTA TRAE MAS DE UNA FILA (VARIOS ALUMNOS)
$prev = mysqli_query($link, $query); //EL FETCH LO HACEMOS EN EL CICLO
while ($result = mysqli_fetch_array($prev)){ //POR CADA VUELTA SACA UNA FILA DE DATOS Y TERMINA CUANDO NO HAY MAS
	echo $result[0]; //IMRPIME EL PRIMER VALOR
	echo $result[1]; //IMPRIME EL SEGUNDO VALOR
}
//EJEMPLO, EL ANTERIOR CODIGO IMPRIMIRIA ALGO COMO ESTO:
	//COMIENZA EL CICLO
	Cesar	//IMRPIME EL PRIMER VALOR DE LA PRIMERA FILA
	Xiu	//IMPRIME EL SEGUNDO VALOR DE LA PRIMERA FILA
	//AQUI HAY UN CICLO
	Pepe	//IMRPIME EL PRIMER VALOR DE LA SEGUNDA FILA
	Perez	//IMPRIME EL SEGUNDO VALOR DE LA SEGUNDA FILA
	//AQUI TERMINA EL CICLO
//RECUERDA QUE LAS CONSULTAS Y COMANDOS MYSQLI VAN DENTRO DE ETIQUETAS PHP

/*Por seguridad y que no te vayas a hacer bolas te recomiendo cambiar el nombre de la variable donde haces las consulta, lo que son $query, $result y $prev*/
Por cada consulta que hagas cambias nombres, al unico que no le cambias nombres es a $link y $tildes