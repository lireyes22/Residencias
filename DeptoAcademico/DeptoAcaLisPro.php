<?php 
	include ('funcionesDepto.php');
	include ('../InicioSessionSeg.php');
	$UID = $_SESSION['id'];
	$DID = mysqli_fetch_array(DID($UID));
	$NombDepto = mysqli_fetch_array(nombreDepartamento($DID[0]));
    $result = listSolicProyAcep($DID[0]); 
	$SPIDs = [];
	$docentes = listaDocentes2($DID[0]);
?>
<?php
include 'headDeptoAca.php';
?>
<script>
			function activarFiltro(divItems,animacionAceptar,buttonHidden){
				const listaProfesores = divItems+' *'
				//console.log(listaProfesores)
				$(".filtroAsesor").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				var last = null, coincide = 0;
				$(listaProfesores).filter(function() {
				var exito = $(this).toggle($(this).text().normalize("NFD").replace(/[\u0300-\u036f]/g, '').toLowerCase().indexOf(value) > -1)
				if((exito.attr("style")+'') == 'undefined' || (exito.attr("style")+'') == ''){
					last = exito;
					coincide++
				}else{
					exito.removeAttr("selected");
				}
				});
				if(!$.isEmptyObject(last)){
					$(".coincidencias").text((coincide));
					$(".coincidencias").attr("class", "coincidencias badge bg-success")
					last.attr("selected", "selected")
				}else{
					$(".coincidencias").text(('0'));
					$(".coincidencias").attr("class", "coincidencias badge bg-danger")
				}
			});
			$(animacionAceptar).click(function(e){
					//e.preventDefault();
					e.stopImmediatePropagation();
					$(buttonHidden).animate({
						height: 'toggle'
					});
					if($(animacionAceptar).prop('checked')){
						$(".divAceptar").animate({
							left: '250px',
							opacity: '0.5'
						});
						$(".divRechazar").animate({
							left: '250px',
							opacity: '0.5'
						});
					}else{
						$(".divAceptar").animate({
							left: '40px',
							opacity: '1'
						});
						$(".divRechazar").animate({
							left: '40px',
							opacity: '1'
						});
					}
			});
			}

	</script>
<!-- Contenido principal -->
<div class="col ms-sm-auto px-4">
	<div class="container-fluid mt-3 text-center">
		<h2>Gestión de proyectos activos</h2>
		<div class="container-fluid text-start mb-4">
			<div class="table-responsive text-start">
				<table id="example" class="display table-striped table-hover"
					style="width:100%; background-color: #ededed;">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Objetivo</th>
							<th>Número de estudiantes</th>
							<th>Tiempo Estimado</th>
							<th>Docente responsable</th>
							<th>Asesor interno</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
							while ($SPID = mysqli_fetch_array($result)){ 
								$row = mysqli_fetch_array(basicInfoProy($SPID[0])); 
								$SPIDs[$i] = $row[0];
								$i++;
								?>
						<tr>
							<td>
								<p><?php echo $row[1];?></p>
							</td>
							<td>
								<p><?php echo $row[2];?></p>
							</td>
							<td>
								<p><?php echo $row[3];?></p>
							</td>
							<td><?php echo $row[4]?> MESES</td>
							<td><?php if (!empty($row[5])){  echo $row[5];}else{ echo "Sin Responsable";} ?></td>
							<?php 
												$BPID = mysqli_fetch_array(existeBanco($row[0]));
												$asesor = mysqli_fetch_array(asesorInterno($BPID[0]));
									?>
							<td><?php 
										if (!empty($asesor[1])){  
											echo $asesor[1];
											$asigna = 'hidden';//
											$reasigna = "";
										}else{ 
											echo "Asesor Interno No Asignado";
											$asigna = '';
											$reasigna = "hidden";//
										} ?></td>
							<?php
								/*
								<form action="deptoAcaAsigAsesor.php" method="POST" target ="blank">
										<td class="tb-th-asp">
											<input type="hidden" name="SPID" value="<?php echo $row[0];?>">
							<?php 
												$BPID = mysqli_fetch_array(existeBanco($row[0]));
												$asesor = mysqli_fetch_array(asesorInterno($BPID[0]));
												if(empty($asesor)){
													$asigna = 'submit';
													$reasigna = "hidden";
												}else{
													$asigna = 'hidden';
													$reasigna = "submit";
												}
											?>
							<input type="<?php echo $asigna; ?>" value="Asignar">
							</td>
							</form>
							<form action="deptoAcaReasigAsesor.php" method="POST" target="blank">
								<th class="tb-th-asb">
									<input type="hidden" name="SPID" value="<?php echo $row[0];?>">
									<input type="<?php echo $reasigna; ?>" value="Reasignar">
								</th>
							</form>
							*/
							?>
							<td> <!-- BOTONES -->
								<div class="container">
									<div class="row">
										<div class="col container-fluid">
											<button <?php echo $asigna; ?> type="button" class="btn btn-outline-success"
												data-bs-toggle="modal" data-bs-target="#Asignar<?php echo $i - 1; ?>" onclick="activarFiltro('#elegirProfesorA<?php echo $i - 1; ?>','#checkA<?php echo $i - 1; ?>','#buttonHidA<?php echo $i - 1; ?>')">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
													fill="currentColor" class="bi bi-person-plus-fill"
													viewBox="0 0 16 16">
													<path
														d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
													<path fill-rule="evenodd"
														d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
												</svg>
												<style>
													.btn-outline-success:hover::before {
														content: "Asignar";
													}
												</style>
											</button>
										</div>
										<div class="col container-fluid">
											<button <?php echo $reasigna; ?> type="button" class="btn btn-outline-warning"
												data-bs-toggle="modal" data-bs-target="#Reasignar<?php echo $i - 1; ?>" onclick="activarFiltro('#elegirProfesorR<?php echo $i - 1; ?>','#checkR<?php echo $i - 1; ?>','#buttonHidR<?php echo $i - 1; ?>')">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
													fill="currentColor" class="bi bi-person-fill-gear"
													viewBox="0 0 16 16">
													<path
														d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
												</svg>
												<style>
													.btn-outline-warning:hover::before {
														content: "Reasignar";
													}
												</style>
											</button>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<?php 
								} //TERMINA CICLO
							?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- PERO QUERIAN USAR MODALES, AHORA SE AGUANTAN -->
<?php 
	//echo mysqli_fetch_array($docentes)[0];
	$optionProfesores = '';
	while ($profesor = mysqli_fetch_array($docentes)){
		$optionProfesores = $optionProfesores.'<option value="'.$profesor[0].'">'.$profesor[1].'</option>';
	}
	for ($j = 0; $j < $i;$j++){
		$BPID = mysqli_fetch_array(bancoSPID($SPIDs[$j]));
		$anterior = mysqli_fetch_array(asesorInterno($BPID[0]));
		$Residentes = alumnosResidencia($BPID[0]);
		$solicitudResidencia = mysqli_fetch_array(existeBanco($SPIDs[$j]));
		$nombreEmpresa = mysqli_fetch_array(empresa($SPIDs[$j]));
		$nombresResidentes = [];
		$n = 0;
		while ($Residente = mysqli_fetch_array($Residentes)) {
			$nombresResidentes[$n] = ''.$Residente[0].' - '.$Residente[1].'';
			$n++;
		}
	echo '
	<div class="modal fade" id="Asignar'.$j.'">
		<div class="modal-dialog modal-dialog-centered modal-xl">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Asignación de asesor</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<!-- Modal body --> 
				<div class="modal-body">
					<!--Formulario-->
					<form action="exc/insert.php" class="was-validated" method="POST">
					<input type="hidden" name="IDfuncion" value="asignacion">
					<input type="hidden" name="origin" value="../DeptoAcaLisPro.php">
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="oficio" class="form-label">Numero de oficio:</label>
								<input type="text" class="form-control" id="oficio" placeholder="Número de oficio"
									name="noOficio" value="">
							</div>
							<div class="col-md-6 mb-3">
								<label for="profesor" class="form-label">Profesor:</label>
								<input class="filtroAsesor" type="text" placeholder="Buscar..."><span class="coincidencias badge bg-success" id="">0</span>
								<select name="docente" id="elegirProfesorA'.$j.'" class="form-select">
								'.$optionProfesores.'
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="oficio" class="form-label">Periodo de Realización:</label>
								<input type="text" class="form-control" id="oficio" name="periodo" readonly value="'.$solicitudResidencia[5].'">
							</div>
							<div class="col-md-6 mb-3">
								<label for="profesor" class="form-label">Empresa:</label>
								<input type="text" class="form-control" id="oficio" name="oficio" readonly value="'.$nombreEmpresa[0].'">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="profesor" class="form-label">Departamento:</label>
								<input type="text" class="form-control" id="oficio" name="oficio" readonly value="'.$NombDepto[0].'">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="oficio" class="form-label">Estudiantes inscritos:</label>';
								for ($m = 0; $m < $n;$m++){
									echo '<input type="text" class="form-control" id="oficio" name="oficio" readonly value="'.$nombresResidentes[$m].'">';
								}
								if($n==0){
									echo '<input type="text" class="form-control" id="oficio" name="oficio" readonly value="SIN RESIDENTES">';
								}
	echo '
							</div>
						</div>
						<div class="form-check mb-3">
							<input class="form-check-input" type="checkbox" id="checkA'.$j.'" name="remember" required>
							<label class="form-check-label" for="checkA'.$j.'">¿Esta seguro de la asignación?.</label>
							<div class="divAceptar valid-feedback" style="position:absolute;">Aceptado.</div>
							<div class="divRechazar invalid-feedback" style="position:absolute;">Acepte para continuar.</div>
						</div>
						<input type="hidden" name="periodo" value="'.$solicitudResidencia[5].'"> <br> <br>
						<input type="hidden" name="BPID" value="'.$BPID[0].'">
						<div id="buttonHidA'.$j.'" style="display:none;"">
							<button type="submit" class="btn btn-success">Enviar</button>
						</div>
					</form>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	';
	//---------------------- SEGUNDA MODAL -----------------------------------------------------------
	if(isset($anterior)){
		$nuevosAsesores = listaDocentes($DID[0], $anterior[0]);
		$optionProfesores2 = '';
		while ($profesores = mysqli_fetch_array($nuevosAsesores)){
			$optionProfesores2 = $optionProfesores2.'<option value="'.$profesores[0].'">'.$profesores[1].'</option>';
		}
		echo '
		<div class="modal fade" id="Reasignar'.$j.'">
			<div class="modal-dialog modal-dialog-centered modal-xl">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Asignación de asesor</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<!-- Modal body --> 
					<div class="modal-body">
						<!--Formulario-->
						<form action="exc/insert.php" class="was-validated" method="POST">
						<input type="hidden" name="IDfuncion" value="reAsignacion">
						<input type="hidden" name="origin" value="../DeptoAcaLisPro.php">
							<div class="row">
								<div class="col-md-6 mb-3">
									<label for="oficio" class="form-label">Numero de oficio:</label>
									<input type="text" class="form-control" id="oficio" placeholder="Número de oficio"
										name="noOficio" value="">
								</div>
								<div class="col-md-6 mb-3">									
									<label for="profesor" class="form-label">Nuevo Asesor:</label>
									<input class="filtroAsesor" type="text" placeholder="Buscar..."><span class="coincidencias badge bg-success" id="">0</span>
									<select name="docente" id="elegirProfesorR'.$j.'" class="form-select">
									'.$optionProfesores2.'
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<label for="oficio" class="form-label">Periodo de Realización:</label>
									<input type="text" class="form-control" id="oficio" name="periodo" readonly value="'.$solicitudResidencia[5].'">
								</div>
								<div class="col-md-6 mb-3">
									<label for="profesor" class="form-label">Asesor Actual:</label>
									<input type="text" class="form-control" id="oficio" name="oficio" readonly value="'.$anterior[1].'">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<label for="profesor" class="form-label">Departamento:</label>
									<input type="text" class="form-control" id="oficio" name="oficio" readonly value="'.$NombDepto[0].'">
								</div>
								
								<div class="col-md-6 mb-3">
									<label for="profesor" class="form-label">Empresa:</label>
									<input type="text" class="form-control" id="oficio" name="oficio" readonly value="'.$nombreEmpresa[0].'">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-3">
									<label for="profesor" class="form-label">Razon de la Reasignación:</label>
									<input type="text" class="form-control" id="razon" name="razon" placeholder="¿Cual fue el motivo?">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-3">
									<label for="oficio" class="form-label">Estudiantes inscritos:</label>';
									for ($m = 0; $m < $n;$m++){
										echo '<input type="text" class="form-control" id="oficio" name="oficio" readonly value="'.$nombresResidentes[$m].'">';
									}
									if($n==0){
										echo '<input type="text" class="form-control" id="oficio" name="oficio" readonly value="SIN RESIDENTES">';
									}
		echo '
								</div>
							</div>
							<div class="form-check mb-3"> <!--- ANIMACION--!>
								<input class="aceptar form-check-input" type="checkbox" id="checkR'.$j.'" name="remember" required>
								<label class="form-check-label" for="checkR'.$j.'">¿Esta seguro de la reasignación?.</label>
								<div class="divAceptar valid-feedback" style="position:absolute;">Correcto</div>
								<div class="divRechazar invalid-feedback" style="position:absolute;">Acepte para continuar.</div>
							</div>
							<input type="hidden" name="periodo" value="'.$solicitudResidencia[5].'"> <br> <br>
							<input type="hidden" name="BPID" value="'.$BPID[0].'">
							<div id="buttonHidR'.$j.'" style="display:none;">
								<button type="submit" class="btn btn-success">Enviar</button>
							</div>
						</form>
					</div>
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
		';
	}
		} //TERMINA CICLO
	?>
	<script>
		
		$(document).ready(function(){
			
		});
	</script>
<?php
include 'footer.php';
?>