<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<style type="text/css">
	table.dataTable tbody th, table.dataTable tbody td {
		padding: 3px 10px;
	}	
</style>
<div class="row">
	<div class="col-md-12">
		<div class="card">
		<h4 class="title">Odontólogos</h4>
  		<div class="card-content table-responsive">
			<div class="btn-group">
				<a href="index.php?view=newodontologo" class="btn btn-primary"><i class='fa fa-plus-circle'></i> Agregar Odontólogo</a>
			</div>
			<?php
			$users = OdontologoData::getAll();
			if(count($users)>0){
				// si hay usuarios
				?>
				<table id="example" class="stripe" style="width:100%">
				<thead>
				<th>Apellido y Nombre</th>
				<th>Dirección</th>
				<th>Localidad</th>
				<th>Email</th>
				<th>Teléfono</th>
				<th>Dias y Horarios de Atención</th>
				<th></th>
				</thead>
				<?php
				foreach($users as $user){
					?>
					<tr>
						<td><?php echo $user->lastname." ".$user->name; ?></td>
						<td><?php echo $user->address; ?></td>						
						<td><?php echo $user->city; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><?php echo $user->phone; ?></td>
						<td><?php echo $user->matricula; ?></td>
						<td style="width:150px;">
						<a href="index.php?view=editodontologo&id=<?php echo $user->id;?>" class="btn btn-dark btn-xs"><i class='fa fa-edit'></i></a>
						<a href="index.php?view=delodontologo&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs"><i class='fa fa-trash'></i></a>
						</td>
					</tr>
					<?php
					?>
				<?php
					}
				}else{
					echo "<p class='alert alert-danger'>No hay Odontologos cargados</p>";
				}
				?>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>