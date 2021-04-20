<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<style type="text/css">
table.dataTable tbody th, table.dataTable tbody td {
    padding: 3px 10px;
}
table.dataTable tbody th, table.dataTable tbody td {
    padding: 0px 5px;
}
table.dataTable tbody th, table.dataTable tbody td {
    padding: 0px 0px 0px 10px;
    text-transform: uppercase;
}	
</style>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h4 class="title">Pacientes</h4>
			<div class="card-content table-responsive">
				<a href="index.php?view=newpacient" class="btn btn-primary"><i class='fa fa-plus-circle'></i> Nuevo Paciente</a>
				<?php
				$users = PacientData::getAll();
				if(count($users)>0){
					// si hay usuarios
					?>
					<table id="example" class="stripe" style="width:100%">
					<thead>
					<th>Nombre completo</th>
					<th>Documento</th>
					<th>Direccion</th>
					<th>Localidad</th>
					<th>Telefono</th>
					<th>Acciones</th>
					</thead>
					<?php
					foreach($users as $user){
						?>
						<tr>
						<td><?php echo $user->lastname." ".$user->name; ?></td>
						<td><?php echo $user->document; ?></td>
						<td><?php echo $user->address; ?></td>
						<td><?php echo $user->city; ?></td>
						<td><?php echo $user->phone; ?></td>
						<td style="width:150px;">
						<a alt="Buscar" href="index.php?view=editpacient&id=<?php echo $user->id;?>" class="btn btn-dark btn-xs"><i class='fa fa-edit'></i></a>
						<a href="index.php?view=pacienthistory&id=<?php echo $user->id;?>" class="btn btn-success btn-xs"><i class='fa fa-bars'></i></a>
						<a href="index.php?view=delpacient&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs"><i class='fa fa-trash'></i></a>
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