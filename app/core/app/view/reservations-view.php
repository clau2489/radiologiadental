<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h4 class="title">Turnos Pendientes</h4>
			<div class="card-content table-responsive">
				<div class="row">
					<div class="col-md-2">
						<a href="./index.php?view=newreservation" class="btn btn-block btn-default"><i class='fa fa-plus-circle'></i> Nuevo Turno</a>						
					</div>
					<div class="col-md-2">
						<a href="./index.php?view=oldreservations" class="btn btn-block btn-default"><i class='fa fa-folder-open'></i> Anteriores</a>						
					</div>					
				</div>
				<br>
				<br>
				<?php
				$users= array();
				if((isset($_GET["q"]) && isset($_GET["pacient_id"]) && isset($_GET["medic_id"]) && isset($_GET["date_at"])) && ($_GET["q"]!="" || $_GET["pacient_id"]!="" || $_GET["medic_id"]!="" || $_GET["date_at"]!="") ) {
					$sql = "select * from reservation where ";
					if($_GET["q"]!=""){
						$sql .= " title like '%$_GET[q]%' and note like '%$_GET[q] %' ";
					}

					if($_GET["pacient_id"]!=""){
						if($_GET["q"]!=""){
							$sql .= " and ";
						}
						$sql .= " pacient_id = ".$_GET["pacient_id"];
					}

					if($_GET["medic_id"]!=""){
						if($_GET["q"]!=""||$_GET["pacient_id"]!=""){
							$sql .= " and ";
						}

						$sql .= " medic_id = ".$_GET["medic_id"];
					}



					if($_GET["date_at"]!=""){
						if($_GET["q"]!=""||$_GET["pacient_id"]!="" ||$_GET["medic_id"]!="" ){
							$sql .= " and ";
						}

						$sql .= " date_at = \"".$_GET["date_at"]."\"";
					}

					$users = ReservationData::getBySQL($sql);

				}else{
					$users = ReservationData::getAll();
				}
				if(count($users)>0){
				// si hay usuarios
					?>
					<table id="example" class="cell-border" style="width:100%">
						<thead>
							<th>Fecha</th>
							<th>Hora</th>				
							<th>Nombre del Paciente</th>
							<th>Técnico asignado</th>
							<th></th>
						</thead>
						<?php
						foreach($users as $user){
							$pacient  = $user->getPacient();
							$medic = $user->getMedic();
							$category = $user->getCategory();
							?>
							<tr>
								<td><?php date_default_timezone_set('America/Argentina/Buenos_Aires'); $nueva_fecha = date("d-m-Y",strtotime($user->date_at)); echo $nueva_fecha; ?></td>
								<td><?php echo $user->time_at; ?></td>					
								<td><?php echo $pacient->lastname." ".$pacient->name; ?></td>
								<td><?php echo $medic->lastname." ".$medic->name; ?></td>
								<td>
									<div class="dropdown">
										<button class="btn btn-default btn-block">Opciones</button>
										<div class="dropdown-content">
											<a target="_blank" href="https://api.whatsapp.com/send?phone=549<?php echo $pacient->phone?>&text=Sr/a%20<?php echo $pacient->name." ".$pacient->lastname; ?>%20nos%20contactamos%20de%20Radiologia%20Dental%20para%20informarte%20que%20el%20dia%20<?php echo $nueva_fecha; ?>%20a%20las%20<?php echo $user->time_at; ?>hs%20tenés%20reservado%20un%20turno%20para%20realizar%20el%20estudio:%20<?php echo $category->name; ?>%20con%20el%20Tecnico:%20<?php echo $medic->name." ".$medic->lastname; ?> "> Enviar Mensaje</a>

											<a href="index.php?view=editreservation&id=<?php echo $user->id;?>"> Ver Turno</a>

										</div>
									</div>
								</td>
							</tr>
							<?php
						}
						?>
					</table>
				</div>
			</div>
			<?php
		}else{
			echo "<p class='alert alert-danger'>No hay pacientes</p>";
		}
		?>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>