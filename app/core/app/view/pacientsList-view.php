<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h4 class="title">Pacientes</h4>
			<div class="card-content table-responsive">
				<a href="index.php?view=newpacient" class="btn btn-default"><i class='fa fa-plus-circle'></i> Nuevo Paciente</a>
				<?php
				$users = PacientData::getAll();
				if(count($users)>0){
					// si hay usuarios
					?>
					<table id="example" class="cell-border" style="width:100%">
					<thead>
						<th>Nombre completo</th>
						<th>Documento</th>
						<th>Dirección</th>
						<th>Localidad</th>
						<th>Teléfono</th>
						<th></th>
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
						<td>
							<div class="dropdown">
								<button class="btn btn-default btn-block">Opciones</button>
								<div class="dropdown-content">
									<a href="index.php?view=pacienthistory&id=<?php echo $user->id;?>"> Ver Históricos</a>
									<a href="index.php?view=editpacient&id=<?php echo $user->id;?>"> Editar datos</a>
									<a href="index.php?view=delpacient&id=<?php echo $user->id;?>"> Eliminar</a>
								</div>
							</div>
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