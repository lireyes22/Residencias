<!DOCTYPE html>
<html>

<head>
    <title>Listado De Proyectos</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/mystyle.css">
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
    <br>
    <img src="img/lupa.png" height="20" widt="20">&nbsp;&nbsp;<input name='buscar' type='text' size="20" value="" align="right">
         
        <select name="Selecion" id="Seleccion">
        <option value="Enero">Seleccione uno...</option>
        <option value="Febrero">Objetivo Proyecto</option>
        <option value="Marzo">Participantes</option>
        <option value="Abril">Campos</option>
        <option value="Mayo">Descripción</option>
        <option value="Junio">Nombre del Proyecto</option>
      </select>
      <div id="tabla-scroll">
    <div id="contenedor-tabla">
    <table>
            <tr> 
                <td class="sticky">Nombre del proyecto</td>
                <td class="sticky">Objetivo</td>
                <td class="sticky">Numero Estudiantes</td>
                <td class="sticky">Tiempo Estimado</td>
                <td class="sticky">Docente responsable</td>
                <td class="sticky">Asignar a: </td>
                <td class="sticky">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
            <?php
                $i = 0;
                while ($i < 100) {
                    ?>
                    <tr <?php if($i%2==0) echo "class='par'" ?> >
                        <th>Nombre</th>
                        <th>Objetivo</th>
                        <th>Numero Estudiantes</th>
                        <th>Tiempo Estimado</th>
                        <th>Docente responsable</th>
                        <th>Asignar</th>
                        <th><input type="submit" value="Solicitar"/></th>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </tr>
        </table>
    </div>
    </div>
