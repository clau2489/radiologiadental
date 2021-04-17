<?php $user = UserData::getById($_GET["id"]);?>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-content table-responsive">
        <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateuser" role="form">
          <h4 class="title">Editar Usuario</h4>
          <div class="form-group">
            <label>Nombre*</label>
            <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
          </div>
          <div class="form-group">
            <label>Apellido*</label>
            <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
          </div>
          <div class="form-group">
            <label>Nombre de usuario*</label>
            <input type="text" name="username" value="<?php echo $user->username;?>" class="form-control" required id="username" placeholder="Nombre de usuario">
          </div>
          <div class="form-group">
            <label>Email*</label>
            <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label>Contrase&ntilde;a</label>
            <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
            <p class="help-block">La contrase&ntilde;a solo se modificará si escribes algo, en caso contrario no se modifica.</p>
          </div>
          <div class="form-group">
            <label >Esta activo</label>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="is_active" <?php if($user->is_active){ echo "checked";}?>> 
              </label>
            </div>
          </div>
          <div class="form-group">
            <label >Es administrador</label>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="is_admin" <?php if($user->is_admin){ echo "checked";}?>> 
              </label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-4 col-md-4 col-md-offset-4">
              <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
              <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>