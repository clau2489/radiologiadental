<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<div class="row">
	<div class="col-md-12">
		<div class="card">
		<div class="text-center">
            <img src="../img/header-bg.jpg" style="width: 40%">
        </div>
			<h4 class="title">A continuación le pedimos que ingrese su DNI para realizar la busqueda de turnos asociados.</h4>				
				<div class="jumbotron" style="background-color: #e9e9e9; padding: 1em">
					<form class="form-inline" action="" method="POST">
					  <div class="form-group mx-sm-3 mb-2">
					    <label style="margin-right: 1em;">N° de Documento</label>
					    <input class="form-control" type="text" id="keywords" name="keywords" size="30" maxlength="30">
					  </div>
					  <input class="btn btn-success" type="submit" name="search" id="search" value="Buscar Paciente">
					</form>
				</div>
				<small style="text-transform: none; font-size: 10px">* La búsqueda se realizará UNICAMENTE por DNI</small>
		</div>
	</div>
</div>

<?php
//Si se ha pulsado el botón de buscar
if (isset($_POST['search'])) {
    //Recogemos las claves enviadas
    $keywords = $_POST['keywords'];

    $user = PacientData::getBySearch($keywords);

    //Si ha resultados
    if (count($user)>0) {
    	?>

		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Apellido y Nombre</th>
		      <th scope="col">Documento</th>
		      <th scope="col">Dirección</th>
		      <th scope="col">Ciudad</th>
		      <th scope="col">Teléfono</th>
		      <th>Acciones</th>
		    </tr>
		  </thead>
		  <tbody>
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
		  </tbody>
		</table>
    	<?php
    }
    else {
        echo '
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Apellido y Nombre</th>
		      <th scope="col">Documento</th>
		      <th scope="col">Dirección</th>
		      <th scope="col">Ciudad</th>
		      <th scope="col">Teléfono</th>
		      <th>Acciones</th>
		    </tr>
		  </thead>
			<tbody>
		    	<tr>
					<td><strong>No hay turnos registrados con el DNI ingresado. Por favor, actualice su información de paciente desde <a href="./?view=newpacient">Mi Perfil</a> </strong></td>
				</td>
		    </tr>
		  </tbody>
		</table>
        ';

    }
}
?>
 
<script type="text/javascript">
    function validarForm(formulario) 
    {
        if(formulario.palabra.value.length==0) 
        { //¿Tiene 0 caracteres?
            formulario.palabra.focus();  // Damos el foco al control
            alert('Debes rellenar este campo'); //Mostramos el mensaje
            return false; 
         } //devolvemos el foco  
         return true; //Si ha llegado hasta aquí, es que todo es correcto 
     }   
</script>