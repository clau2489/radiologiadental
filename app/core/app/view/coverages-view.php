 <div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Tipos de coberturas</h4>
			</div>
			<div class="card-content table-responsive">
				<a href="index.php?view=newcoverage" class="btn btn-primary"><i class='fa fa-plus-circle'></i> Agregar Cobertura</a>
				<?php
				$users = CoverageData::getAll();
				if(count($users)>0){
					// si hay usuarios
					?>

				<table class="table table-bordered table-hover">
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