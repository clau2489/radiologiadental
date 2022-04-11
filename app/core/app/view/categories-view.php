<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
 <div class="row">
	<div class="col-md-12">
		<div class="card">
			<h4 class="title">Tipos de estudios</h4>
			<div class="card-content table-responsive">
				<a href="index.php?view=newcategory" class="btn btn-default"><i class='fa fa-plus-circle'></i> Agregar Estudio</a>
				<?php
				$users = CategoryData::getAll();
				if(count($users)>0){
					// si hay usuarios
					?>

				<table id="example" class="cell-border" style="width:100%">
					<thead>
					<th>Nombre</th>
					<th>Color Asignado</th>
					<th style="width:80px;"></th>
					</thead>
					<?php
					foreach($users as $user){
						?>
						<tr>
						<td><?php echo $user->name." ".$user->lastname; ?></td>
						<td style="background-color: <?php echo $user->color; ?>; width: 20px"></td>
						<td>
							<div class="dropdown">
								<button class="btn btn-default btn-block">Opciones</button>
								<div class="dropdown-content">
									<a href="index.php?view=editcategory&id=<?php echo $user->id;?>"> Editar datos</a>
									<a href="index.php?view=delcategory&id=<?php echo $user->id;?>"> Eliminar</a>
								</div>
							</div>
						</td>
						</tr>
						<?php
					}
					?>
				</table>
				<?php
				}else{
					echo "<p class='alert alert-danger'>No hay estudios</p>";
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