<?php
$pacient = PacientData::getById($_GET["id"]);
?>
<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Estudios realizados por el Paciente</h4>
		<p>Paciente: <?php echo $pacient->name." ".$pacient->lastname;?></p>
  </div>
  <div class="card-content table-responsive">
		<?php
		$users = ReservationData::getAllByPacientId($_GET["id"]);
		if(count($users)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Fecha</th>
			<th>Hora</th>
			<th>Nombre del Paciente</th>
			<th>Técnico asignado</th>
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
				<td><?php $nueva_fecha = date("d-m-Y",strtotime($user->date_at)); echo $nueva_fecha; ?></td>
				<td><?php echo $user->time_at; ?></td>
				<td><?php echo $pacient->lastname." ".$pacient->name; ?></td>
				<td><?php echo $medic->lastname." ".$medic->name; ?></td>
				<td><?php echo $category->name; ?></td>
				<td><?php echo $payment_type->name; ?></td>
				<td>$ <?php echo $user->price; ?></td>
				</tr>
				<?php

			}
?>
</table>
</div>
</div>
<?php

		}else{
			echo "<p class='alert alert-danger'>No hay citas</p>";
		}


		?>


	</div>
</div>