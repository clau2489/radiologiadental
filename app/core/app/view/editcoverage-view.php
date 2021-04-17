<?php $user = CoverageData::getById($_GET["id"]);?>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-content table-responsive">
        <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatecoverage" role="form">
          <h4 class="title">Editar Cobertura</h4>
          <div class="form-group">
            <label>Identificación</label>
            <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Identificacion">
          </div>
          <div class="form-group">
            <label>Nombre Completo</label>
            <input type="text" name="lastname" value="<?php echo $user->lastname;?>" class="form-control" id="lastname" placeholder="Nombre Completo">
          </div>          
          <div class="form-group">
            <div class="col-md-offset-4 col-md-4 col-md-offset-4">
              <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar Cobertura</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>