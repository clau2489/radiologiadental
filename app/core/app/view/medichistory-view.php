<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<?php
$pacient = MedicData::getById($_GET["id"]);
?>
<div class="row">
	<div class="card">
  	<h4 class="title">Historial de Turnos por Técnico</h4>
  	<h5>Técnico: <?php echo $pacient->name." ".$pacient->lastname;?></h5>
  	<div class="card-content table-responsive">
			<div class="col-md-12">
				<div class="btn-group pull-right">
				</div>
				<?php
				$users = ReservationData::getAllByMedicId($_GET["id"]);
				if(count($users)>0){
					// si hay usuarios
					?>
					<table id="example" class="cell-border" style="width:100%">
					<thead>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Paciente</th>
					<th>Estudio Realizado</th>
					<th>Pagado en</th>
					<th>Importe Abonado</th>
					</thead>
					<?php
					foreach($users as $user){
						$pacient  = $user->getPacient();
						$medic = $user->getMedic();
						$category = $user->getCategory();
						$payment_type = $user->getPayment_type();						
						?>
						<tr>
						<td><?php date_default_timezone_set('America/Argentina/Buenos_Aires'); $nueva_fecha = date("d-m-Y",strtotime($user->date_at)); echo $nueva_fecha; ?></td>
						<td><?php echo $user->time_at; ?></td>
						<td><?php echo $pacient->lastname." ".$pacient->name; ?></td>
						<td><?php echo $category->name; ?></td>
						<td><?php echo $payment_type->name; ?></td>
						<td>$ <?php echo $user->price; ?></td>
						</tr>
						<?php
					}
				?>
				</table>
				<?php
				}else{
					echo "<p class='alert alert-danger'>No hay citas</p>";
				}
				?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>