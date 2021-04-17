<?php 
$user = OdontologoData::getById($_GET["id"]);
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-content table-responsive">
    		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateodontologo" role="form">
          <h4 class="title">Editar Odontologo</h4>
          <div class="form-group">
            <label>Apellido</label>
              <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
          </div>          
          <div class="form-group">
            <label>Nombre</label>            
              <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
          </div>
          <div class="form-group">
            <label>Direccion*</label>         
              <input type="text" name="address" value="<?php echo $user->address;?>" class="form-control" required id="username" placeholder="Direccion">
          </div>
          <div class="form-group">
            <label>Localidad</label>           
              <input type="text" name="city" value="<?php echo $user->city;?>" class="form-control" required id="username" placeholder="Direccion">
          </div>          
          <div class="form-group">
            <label>Email*</label>          
              <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label>Teléfono</label>           
              <input type="text" name="phone"  value="<?php echo $user->phone;?>"  class="form-control" id="inputEmail1" placeholder="Telefono">
          </div>
          <div class="form-group">
            <label>Días y Horarios de Atención</label>           
              <input type="text" name="matricula" value="<?php echo $user->matricula;?>"  class="form-control" id="inputEmail1" placeholder="Telefono">
          </div>          
          <div class="form-group">
            <div class="col-md-offset-4 col-md-4 col-md-offset-4">
            <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar Odontologo</button>
            </div>
          </div>
        </form>
      </div>
    </div>
	</div>
</div>
