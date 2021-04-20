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
			<h4 class="title">Tipos de coberturas</h4>
			<div class="card-content table-responsive">
				<a href="index.php?view=newcoverage" class="btn btn-primary"><i class='fa fa-plus-circle'></i> Agregar Cobertura</a>
				<?php
				$users = CoverageData::getAll();
				if(count($users)>0){
					// si hay usuarios
					?>

				<table id="example" class="stripe" style="width:100%">
					<thead>
					<th>Siglas</th>
					<th>Denominación</th>
					<th style="width:80px;"></th>
					</thead>
					<?php
					foreach($users as $user){
						?>
						<tr>
						<td><?php echo $user->name; ?></td>
						<td><?php echo $user->lastname; ?></td>
						<td style="width:100px;">
							<a href="index.php?view=editcoverage&id=<?php echo $user->id;?>" rel="tooltip" title="Editar"class="btn btn-dark btn-xs"><i class='fa fa-edit'></i></a>
							<a href="index.php?view=delcoverage&id=<?php echo $user->id;?>" rel="tooltip" title="Eliminar" class="btn btn-danger btn-xs"><i class='fa fa-trash'></i></a>
						</td>
						</tr>
						<?php
					}
					?>
				</table>
				<?php
				}else{
					echo "<p class='alert alert-danger'>No hay coberturas cargadas</p>";
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