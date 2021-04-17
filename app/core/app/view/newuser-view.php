<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-content table-responsive">
        <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=adduser" role="form">
          <h4 class="title">Nuevo usuario</h4>
          <div class="form-group">
            <label>Nombre*</label>            
            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
          </div>
          <div class="form-group">
            <label>Apellido*</label>            
            <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
          </div>
          <div class="form-group">
            <label>Nombre de usuario*</label>            
            <input type="text" name="username" class="form-control" required id="username" placeholder="Nombre de usuario">
          </div>
          <div class="form-group">
            <label>Email*</label>            
            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label>Contrase&ntilde;a</label>            
            <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
          </div>
          <div class="form-group">
            <label>Es administrador</label>            
            <div class="checkbox">
              <label>
                <input type="checkbox" name="is_admin"> Tilde esta opcion si el usuario es administrador 
              </label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-4 col-md-4 col-md-offset-4">
              <button type="submit" class="btn btn-primary"><i class='fa fa-plus-circle'></i> Agregar Usuario</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>