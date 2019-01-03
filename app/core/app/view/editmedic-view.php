<?php 
$user = MedicData::getById($_GET["id"]);
$categories = CategoryData::getAll();
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-header" data-background-color="blue">
          <h4 class="title">Editar Técnico</h4>
      </div>
      <div class="card-content table-responsive">
    		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatemedic" role="form">
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Apellido</label>
            <div class="col-md-8">
              <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
            </div>
          </div>          
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Nombre</label>
            <div class="col-md-8">
              <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Direccion*</label>
            <div class="col-md-8">
              <input type="text" name="address" value="<?php echo $user->address;?>" class="form-control" required id="username" placeholder="Direccion">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Email*</label>
            <div class="col-md-8">
              <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Matricula N°</label>
            <div class="col-md-8">
              <input type="text" name="phone"  value="<?php echo $user->phone;?>"  class="form-control" id="inputEmail1" placeholder="Telefono">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-4 col-md-4 col-md-offset-4">
            <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar Técnicos</button>
            </div>
          </div>
        </form>
      </div>
    </div>
	</div>
</div>
