<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-content table-responsive">
        <form class="form-horizontal" method="post" id="addcoverage" action="index.php?view=addcoverage" role="form">
          <h4 class="title">Nueva Cobertura</h4>
          <div class="form-group">
            <label>Identificacion</label>
            <input type="text" name="name" required class="form-control" id="name" placeholder="Sigla">
          </div>
          <div class="form-group">
            <label>Nombre Completo</label>
            <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Nombre Completo">
          </div>
          <div class="form-group">
            <div class="col-md-offset-4 col-md-4 col-md-offset-4">
              <button type="submit" class="btn btn-default btn-block"><i class='fa fa-plus-circle'></i> Agregar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>