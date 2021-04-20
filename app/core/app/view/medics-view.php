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
		<h4 class="title">Técnicos</h4>
  		<div class="card-content table-responsive">
			<div class="btn-group">
				<a href="index.php?view=newmedic" class="btn btn-primary"><i class='fa fa-plus-circle'></i> Agregar Técnico</a>
			</div>
			<?php
			$users = MedicData::getAll();
			if(count($users)>0){
				// si hay usuarios
				?>
				<table id="example" class="stripe" style="width:100%">
				<thead>
				<th>Nombre completo</th>
				<th>Email</th>
				<th>Matricula N°</th>
				<th></th>
				</thead>
				<?php
				foreach($users as $user){
					?>
					<tr>
						<td><?php echo $user->lastname." ".$user->name; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><?php echo $user->phone; ?></td>
						<td style="width:150px;">
						<a href="index.php?view=editmedic&id=<?php echo $user->id;?>" class="btn btn-dark btn-xs"><i class='fa fa-edit'></i></a>
						<a href="index.php?view=medichistory&id=<?php echo $user->id;?>" class="btn btn-success btn-xs"><i class='fa fa-bars'></i></a>
						<a href="index.php?view=delmedic&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs"><i class='fa fa-trash'></i></a>
						</td>
					</tr>
					<?php
					?>
				<?php
					}
				}else{
					echo "<p class='alert alert-danger'>No hay Técnicos cargados</p>";
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