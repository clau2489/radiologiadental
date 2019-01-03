<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-header" data-background-color="blue">
        <h4 class="title">Nueva Cobertura</h4>
      </div>
      <div class="card-content table-responsive">
		    <form class="form-horizontal" method="post" id="addcoverage" action="index.php?view=addcoverage" role="form">
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Identificacion</label>
            <div class="col-md-8">
              <input type="text" name="name" required class="form-control" id="name" placeholder="Sigla">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-md-4">Nombre Completo</label>
            <div class="col-md-8">
              <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Nombre Completo">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-4 col-md-4 col-md-offset-4">
              <button type="submit" class="btn btn-primary"><i class='fa fa-plus-circle'></i> Agregar Cobertura</button>
            </div>
          </div>
        </form>
      </div>
    </div>
	</div>
</div>