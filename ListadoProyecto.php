<!DOCTYPE html>
<html>

<head>
	<title>Listado De Proyectos</title>
	<link rel="stylesheet" href="style/style.css">
</head>

<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="a.html">
					<h2><span style="margin-right: 10px;">Alumno</span></h2>
					<img src="img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h2>LISTADO DE PROYECTOS</h2>
			</div>
			<div class="right-column">
				<a href="a.html"><img src="img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
			<a href="a.html" class="button-link">Solicitud de residencia</a>
			<a href="a.html" class="button-link">Proyectos</a>
			<a href="a.html" class="button-link">Reporte</a>
			<a href="a.html" class="button-link">Asesorias</a>
			<a href="a.html" class="button-link">Faq &nbsp;<img src="img/pregunta.jpg" width="20px"></a>
		</div>
	</div>
	<div>
		
		Buscar:&nbsp;<input name='buscar' type='text' size="50" value="">
		 
		 <input type="file" name="archivo" >

		 <body>
			<table border=1>
				<head>
					<td>CveArticulo</td>
					<td>Descripcion</td>
					<td>Descuento</td>
					<td>Iva</td>
					<td>Precio</td>
					<td>Actualizar</td>
					<td>Eliminar</td>
				</head>
				<body>
					<?php foreach ($listaArticulos as $articulo) {?>
					<tr>
						<td><?php echo $articulo->getCveArticulo() ?></td>
						<td><?php echo $articulo->getDescripcion() ?></td>
						<td><?php echo $articulo->getDescuento() ?></td>
						<td><?php echo $articulo->getIva() ?></td>
						<td><?php echo $articulo->getPrecio() ?></td>
						<td><a href="actualizar.php?cveArticulo=<?php echo $articulo->getCveArticulo()?>&accion=a">Actualizar</a> </td>
						<td><a href="admin_articulo.php?cveArticulo=<?php echo $articulo->getCveArticulo()?>&accion=e">Eliminar</a>   </td>
					</tr>
					<?php }?>
				</body>
			</table>
			<a href="index.html">Volver</a>
		</body>
	</div>

</body>
</html>
