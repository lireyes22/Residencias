<?php
	include '../InicioSessionSeg.php';
	include ('Alumfunciones.php');
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query="SELECT * FROM SolicitudProyecto 
    INNER JOIN BancoProyectos ON SolicitudProyecto.SPID = BancoProyectos.SPID 
    INNER JOIN Usuarios ON SolicitudProyecto.UIDResponsable = Usuarios.UID 
    INNER JOIN UsuariosDepartamentos ON Usuarios.UID=UsuariosDepartamentos.UID
    WHERE UsuariosDepartamentos.DID='5' ";
    $result = mysqli_query($link, $query);
	$candidato = candidato($_SESSION['id']); 
include 'headAlumnos.php';
?>

            <!-- Contenido principal -->
				<div class="col ms-sm-auto px-4">
				    <div class="container-fluid mt-3 text-center">
				        <h2>Banco de proyectos</h2>				        
				        <div class="text-start">
				        	<a href="AlumRegisProy.php" class="btn btn-success">
							    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
							        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
							        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
							    </svg>
							    Nuevo Proyecto
							</a>
							<button type="button" class="btn btn-info" id="toastbtn">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
								  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
								  <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
								</svg>
							</button>
					         <div class="toast">
							    <div class="toast-header">
							      <strong class="me-auto">Información</strong>
							      <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
							    </div>
							    <div class="toast-body">
							      <p>Puede ver la lista de proyectos disponibles o, si lo desea, puede registrar uno nuevo.</p>
							    </div>
							  </div>
							  <script>
								document.getElementById("toastbtn").onclick = function() {
								  var toastElList = [].slice.call(document.querySelectorAll('.toast'))
								  var toastList = toastElList.map(function(toastEl) {
								    return new bootstrap.Toast(toastEl)
								  })
								  toastList.forEach(toast => toast.show()) 
								}
								</script>
				        </div>

				        <div class="container-fluid text-start mb-4">
				        	<div class="table-responsive text-start">
					        	<table id="example" class="display table-striped table-hover" style="width:100%; background-color: #ededed;">
							        <thead>
							            <tr>
							                <th>Nombre del proyecto</th>
							                <th>Objetivo del proyecto</th>
							                <th>Descripción</th>
							                <th>Participantes</th>
							                <th></th>						                
							            </tr>
							        </thead>
							        <tbody>
							        	<?php
											$i = 0;
											while ($row = mysqli_fetch_array($result)) {
										?>
							        	<tr>
							                <td><?php echo $row['SPNombreProyecto']; ?></td>
											<td><?php echo $row['SPObjetivo']; ?></td>
											<td><?php echo $row['SPDescripcion']; ?></td>
											<td><?php echo $row['SPEstudiantesRequeridos']; ?></td>
							                <td>
							                	<?php if ($candidato['candidato']) { ?>
												    <form action="AlumSolicitudResidencia.php" method="Post">
												            <input type="hidden" name="SPID" value="<?php echo $row['SPID']; ?>">
												            <button type="submit" class="btn btn-outline-info" data-proyecto-id="<?php echo $row['SPEstatus']; ?>">
												                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
												                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
												                </svg>
												                Solicitar
												            </button>
												    </form>
												<?php } else { ?>
												        <button type="button" class="btn btn-outline-info" onclick="window.alert('Tu perfil no cumple los requisitos para solicitar una residencia')">
												            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
												                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
												            </svg>
												            Solicitar
												        </button>
												<?php } ?>
							                </td>
							            </tr>
							            <?php
												$i++;
											}
										?>
							        </tbody>
							        <tfoot>
							            <tr>
							                <th>Nombre del proyecto</th>
							                <th>Objetivo del proyecto</th>
							                <th>Descripción</th>
							                <th>Participantes</th>
							                <th></th>						                
							            </tr>
							        </tfoot>
							    </table>
					        </div>  
				        </div>
				                 
				        
				    </div>
				</div>



<?php
include 'footer.php';
?>