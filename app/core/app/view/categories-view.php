 <div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Tipos de estudios</h4>
			</div>
			<div class="card-content table-responsive">
				<a href="index.php?view=newcategory" class="btn btn-primary"><i class='fa fa-plus-circle'></i> Agregar Estudio</a>
				<?php
				$users = CategoryData::getAll();
				if(count($users)>0){
					// si hay usuarios
					?>

				<table class="table table-bordered table-hover">
					<thead>
					<th>Nombre</th>
					<th style="width:80px;"></th>
					</thead>
					<?php
					foreach($users as $user){
						?>
						<tr>
						<td><?php echo $user->name." ".$user->lastname; ?></td>
						<td style="width:100px;">
							<a href="index.php?view=editcategory&id=<?php echo $user->id;?>" rel="tooltip" title="Editar"class="btn btn-dark btn-xs"><i class='fa fa-edit'></i></a>
							<a href="index.php?view=delcategory&id=<?php echo $user->id;?>" rel="tooltip" title="Eliminar" class="btn btn-danger btn-xs"><i class='fa fa-trash'></i></a>
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