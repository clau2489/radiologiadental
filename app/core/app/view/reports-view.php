<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="blue">
			  <h4 class="title">Reportes</h4>
			</div>
			<div class="card-content table-responsive">
				<div class="row">
					<div class="col-sm-offset-4 col-sm-4 text-center">
						<form class="form-vertical" role="form">
							<input type="hidden" name="view" value="reports">
							<?php
							$coverages = CoverageData::getAll();
							$medics = MedicData::getAll();
							$statuses = StatusData::getAll();
							$payments = PaymentData::getAll();
							?>
							<div class="form-group">
								<label>Desde Fecha:</label>
								<input class="form-control" type="date" name="start_at" value="<?php if(isset($_GET["start_at"]) && $_GET["start_at"]!=""){ echo $_GET["start_at"]; } ?>" class="form-control" placeholder="Palabra clave">
							</div>						
							<div class="form-group">
								<label>Hasta Fecha:</label>
								 <input class="form-control" type="date" name="finish_at" value="<?php if(isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){ echo $_GET["finish_at"]; } ?>" class="form-control" placeholder="Palabra clave">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-success btn-block" placeholder="Buscar Resultados">
							</div>						
						</form>					
					</div>					
				</div>


			<?php
			$users= array();
			
			if((isset($_GET["start_at"]) && isset($_GET["finish_at"]) )){
				$sql = "select * from reservation where ";
				$sql .= " ( date_at >= \"".$_GET["start_at"]."\" and date_at <= \"".$_GET["finish_at"]."\" ) ";
				$sqlv = $sql ."order by date_at, time_at ASC";
				$users = ReservationData::getBySQL($sqlv);
			}
			else{
				$users = ReservationData::getAllPendings();

			}
			if(count($users)>0){
				$_SESSION["report_data"] = $users;
				?>
				<div id="divName" class="panel panel-default">
					<div class="panel-heading">Reportes</div>
					<table class="table table-bordered table-hover">
						<thead>
							<th>Fecha</th>
							<th>hora</th>				
							<th>Paciente</th>
							<th>Atendido por</th>
							<th>Estado</th>
							<th>Pago en</th>
							<th>Medico Solicitante</th>
							<th>Costo</th>
						</thead>
						<?php
						$total = 0;
						foreach($users as $user){
							$pacient  = $user->getPacient();
							$medic = $user->getMedic();
							$coverage = $user->getCoverage();
							?>
							<tr>
							<td><?php $nueva_fecha = date("d-m-Y",strtotime($user->date_at)); echo $nueva_fecha; ?></td>
							<td><?php echo $user->time_at; ?></td>					
							<td><?php echo $pacient->lastname." ".$pacient->name; ?></td>
							<td><?php echo $medic->name." ".$medic->lastname; ?></td>
							<td><?php echo $user->getStatus()->name; ?></td>
							<td><?php echo $user->getPayment_type()->name; ?></td>
							<td><?php echo $user->medic; ?></td>
							<td>$ <?php echo number_format($user->price,2,".",",");?>
							<?php 
							$total += $user->price;}
							echo "</table>";
							?>
							</td>
							</tr>
					</table>
					<hr>
					<div class="row">
						<div class="col-sm-12">
							<p>En construcción, funciona solo con estos parametros</p>
						</div>
						<div class="col-sm-3">
							<h3>Total de Registros: <?php echo count($users);?></h3>
						</div>
						<div class="col-sm-3">
							<h3>Total: $ <?php echo number_format($total,2,".",",");?></h3>
						</div>
						<div class="col-sm-3">
							
						</div>																		
					</div>
				</div>
				<div class="panel-bodys">		
					<a type="button" class="btn btn-primary btn-lg btn-block" onclick="printDiv('divName')" value="Imprimir Constancia"><i class="fa fa-print"></i> Imprimir Reporte</a>
				</div>
				<?php
				}else{
					echo "<p class='alert alert-danger'>No existen registros</p>";
				}
				?>

			</div>
		</div>
	</div>
</div>