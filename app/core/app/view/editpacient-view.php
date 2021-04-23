<?php 
$user = PacientData::getById($_GET["id"]);
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-content table-responsive">
      	<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatepacient" role="form">
          <h4 class="title">Editar Paciente</h4>
          <div class="form-group">
            <label>Apellido</label>            
            <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
          </div>          
          <div class="form-group">
            <label>Nombre</label>            
            <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
          </div>
          <div class="form-group">
            <label>DNI</label>            
            <input name="document" value="<?php echo $user->document;?>" required class="form-control" id="document" placeholder="Numero de Documento">
          </div>
          <div class="form-group">
            <label>Genero*</label>          
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox1" name="gender" required <?php if($user->gender=="h"){ echo "checked"; }?> value="h"> Hombre
            </label>
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox2" name="gender" required <?php if($user->gender=="m"){ echo "checked"; }?> value="m"> Mujer
            </label>
          </div>
          <div class="form-group">
            <label>Fecha de Nacimiento</label>          
            <input type="date" name="day_of_birth" class="form-control" value="<?php echo $user->day_of_birth; ?>"  id="address1" placeholder="Fecha de Nacimiento">
          </div>
          <div class="form-group">
            <label>Edad</label>           
            <input class="form-control" value="<?php $fecha = time() - strtotime($user->day_of_birth); $edad = floor((($fecha / 3600) / 24) / 360);echo ''.$edad.' años';?>">
          </div>
          <div class="form-group">
            <label>Direccion</label>          
            <input type="text" name="address" value="<?php echo $user->address;?>" class="form-control" required id="username" placeholder="Direccion">
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4 ">Localidad</label>          
            <input type="text" name="city" class="form-control" value="<?php echo $user->city;?>"  id="city" placeholder="Localidad">
          </div>          
          <div class="form-group">
            <label>Email*</label>            
            <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label>Telefono</label>
            <input type="text" name="phone"  value="<?php echo $user->phone;?>"  class="form-control" id="inputEmail1" placeholder="Telefono">
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4 ">Tipo de Cobertura</label>          
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox1" name="coverage" required <?php if($user->coverage=="p"){ echo "checked"; }?> value="p"> Particular
            </label>
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox2" name="coverage" required <?php if($user->coverage=="o"){ echo "checked"; }?> value="o"> Obra Social
            </label>
          </div>  
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4 ">Obra Social</label>            
            <input type="text" name="obra" class="form-control" id="obra" placeholder="Obra Social" value="<?php echo $user->obra;?>">
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4 ">N° Carnet/ Socio:</label>          
            <input type="text" name="sick" class="form-control" id="sick" placeholder="Numero de Carnet/Socio" value="<?php echo $user->sick;?>">
          </div>
          <div class="form-group">
            <div class="col-md-offset-4 col-md-4 col-md-offset-4">
              <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
              <button type="submit" class="btn btn-default btn-block"><i class="fa fa-retweet"></i> Actualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
</div>