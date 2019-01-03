<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-header" data-background-color="blue">
        <h4 class="title">Nuevo usuario</h4>
      </div>
      <div class="card-content table-responsive">
    		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=adduser" role="form">
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4 ">Nombre*</label>
            <div class="col-md-8">
              <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4 ">Apellido*</label>
            <div class="col-md-8">
              <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4 ">Nombre de usuario*</label>
            <div class="col-md-8">
              <input type="text" name="username" class="form-control" required id="username" placeholder="Nombre de usuario">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4 ">Email*</label>
            <div class="col-md-8">
              <input type="text" name="email" class="form-control" id="email" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4 ">Contrase&ntilde;a</label>
            <div class="col-md-8">
              <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4 ">Es administrador</label>
            <div class="col-md-8">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="is_admin"> 
                </label>
              </div>
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