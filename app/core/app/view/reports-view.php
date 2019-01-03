<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="blue">
			  <h4 class="title">Reportes</h4>
			</div>
			<div class="card-content table-responsive">
			<form class="form-horizontal" role="form">
				<input type="hidden" name="view" value="reports">
		        <?php
				$coverages = CoverageData::getAll();
				$medics = MedicData::getAll();
				$statuses = StatusData::getAll();
				$payments = PaymentData::getAll();
		        ?>

			  	<div class="form-group">
			  		<h5>Filtrar por:</h5>
					<div class="col-md-2">
						<div class="input-group">
						  <span>Cobertura</span>
							<select name="coverage_id" class="form-control">
							<option value="">Seleccionar</option>
							  <?php foreach($coverages as $p):?>
							    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["coverage_id"]) && $_GET["coverage_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
							  <?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="input-group">
						  <span >Técnico</span>
							<select name="medic_id" class="form-control">
							<option value="">Seleccionar</option>
							  <?php foreach($medics as $p):?>
							    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["medic_id"]) && $_GET["medic_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
							  <?php endforeach; ?>
							</select>
						</div>
					</div>
				    <div class="col-md-2">
						<div class="input-group">
						  <span >Estado del turno</span>
							<select name="status_id" class="form-control">
							  <?php foreach($statuses as $p):?>
							    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["status_id"]) && $_GET["status_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
							  <?php endforeach; ?>
							</select>
						</div>
				    </div>
				    <div class="col-md-2">
						<div class="input-group">
						  <span >Estado del pago</span>
							<select name="payment_id" class="form-control">
							  <?php foreach($payments as $p):?>
							    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["payment_id"]) && $_GET["payment_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
							  <?php endforeach; ?>
							</select>
						</div>
				    </div>    
				    <div class="col-md-2">
						<div class="input-group">
						  <span >Desde</span>
						  <input type="date" name="start_at" value="<?php if(isset($_GET["start_at"]) && $_GET["start_at"]!=""){ echo $_GET["start_at"]; } ?>" class="form-control" placeholder="Palabra clave">
						</div>
				    </div>
				    <div class="col-md-2">
						<div class="input-group">
						  <span >Hasta</span>
						  <input type="date" name="finish_at" value="<?php if(isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){ echo $_GET["finish_at"]; } ?>" class="form-control" placeholder="Palabra clave">
						</div>
				    </div>	
					<div class="row">
					    <div class="col-md-2">
					    	<button class="btn btn-primary btn-block">Procesar</button>
					    </div>
					</div>
				</div>
			</form>
<?php
$users= array();
if((isset($_GET["status_id"]) && isset($_GET["payment_id"]) && isset($_GET["coverage_id"]) && isset($_GET["medic_id"]) && isset($_GET["start_at"]) && isset($_GET["finish_at"]) ) && ($_GET["status_id"]!="" ||$_GET["payment_id"]!="" || $_GET["coverage_id"]!="" || $_GET["medic_id"]!="" || ($_GET["start_at"]!="" && $_GET["finish_at"]!="") ) ) {
$sql = "select * from reservation where ";
if($_GET["status_id"]!=""){
	$sql .= " status_id = ".$_GET["status_id"];
}

if($_GET["payment_id"]!=""){
if($_GET["status_id"]!=""){
	$sql .= " and ";
}
	$sql .= " payment_id = ".$_GET["payment_id"];
}


if($_GET["coverage_id"]!=""){
if($_GET["status_id"]!=""||$_GET["payment_id"]!=""){
	$sql .= " and ";
}
	$sql .= " coverage_id = ".$_GET["coverage_id"];
}

if($_GET["medic_id"]!=""){
if($_GET["status_id"]!=""||$_GET["coverage_id"]!=""||$_GET["payment_id"]!=""){
	$sql .= " and ";
}

	$sql .= " medic_id = ".$_GET["medic_id"];
}



if($_GET["start_at"]!="" && $_GET["finish_at"]){
if($_GET["status_id"]!=""||$_GET["coverage_id"]!="" ||$_GET["medic_id"]!="" ||$_GET["payment_id"]!="" ){
	$sql .= " and ";
}

	$sql .= " ( date_at >= \"".$_GET["start_at"]."\" and date_at <= \"".$_GET["finish_at"]."\" ) ";
}

//echo $sql;
		$users = ReservationData::getBySQL($sql);

}else{
		$users = ReservationData::getAllPendings();

}
if(count($users)>0){
	// si hay usuarios
	$_SESSION["report_data"] = $users;
	?>
	<div id="divName" class="panel panel-default">
		<div class="panel-heading">Reportes</div>
		<table class="table table-bordered table-hover">
			<thead>
				<th>Paciente</th>
				<th>Atendido por</th>
				<th>Fecha</th>
				<th>hora</th>
				<th>Estado</th>
				<th>Pago en</th>
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
				<td><?php echo $pacient->lastname." ".$pacient->name; ?></td>
				<td><?php echo $medic->name." ".$medic->lastname; ?></td>
				<td><?php $nueva_fecha = date("d-m-Y",strtotime($user->date_at)); echo $nueva_fecha; ?></td>
				<td><?php echo $user->time_at; ?></td>
				<td><?php echo $user->getStatus()->name; ?></td>
				<td><?php echo $user->getPayment_type()->name; ?></td>
				<td>$ <?php echo number_format($user->price,2,".",",");?>						
				<?php
				$total += $user->price;}
				echo "</table>";
				?></td>
				</tr>
		</table>
		<h3>Total: $ <?php echo number_format($total,2,".",",");?></h3>
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