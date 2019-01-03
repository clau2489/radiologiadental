<?php
$coverage = CoverageData::getAll();
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-header" data-background-color="blue">
        <h4 class="title">Nuevo Paciente</h4>
      </div>
      <div class="card-content table-responsive">
      <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addpacient" role="form">
        <div class="form-group">
          <label for="inputEmail1" class="col-md-4 ">Apellido*</label>
          <div class="col-md-8">
            <input type="text" name="lastname"  class="form-control" id="lastname" placeholder="Apellido">
          </div>
        </div>        
        <div class="form-group">
          <label for="inputEmail1" class="col-md-4 ">Nombre*</label>
          <div class="col-md-8">
            <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-4 ">DNI</label>
          <div class="col-md-8">
            <input name="document"  class="form-control" id="document" placeholder="Número de Documento">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-4 ">Genero*</label>
          <div class="col-md-8">
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox1" name="gender" required value="h"> Hombre
            </label>
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox2" name="gender" required value="m"> Mujer
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-4 ">Fecha de Nacimiento</label>
          <div class="col-md-8">
            <input type="date" name="day_of_birth" class="form-control"  id="address1" placeholder="Fecha de Nacimiento">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-4 ">Direccion*</label>
          <div class="col-md-8">
            <input type="text" name="address" class="form-control"  id="address1" placeholder="Direccion">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-4 ">Localidad</label>
          <div class="col-md-8">
            <input type="text" name="city" class="form-control"  id="city" placeholder="Localidad">
          </div>
        </div>        
        <div class="form-group">
          <label for="inputEmail1" class="col-md-4 ">Email*</label>
          <div class="col-md-8">
            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-4 ">Telefono*</label>
          <div class="col-md-8">
            <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-4 ">Tipo de Cobertura</label>
          <div class="col-md-8">
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox1" name="coverage" required value="p"> Particular
            </label>
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox2" name="coverage" required value="o"> Obra Social
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-4">Obra Social</label>
          <div class="col-md-8">
          <select name="obra" class="form-control" id="obra">
          <option value="">Seleccionar</option>      
          <?php foreach($coverage as $cov):?>
          <option value="<?php echo $cov->id; ?>"><?php echo $cov->name; ?></option>      
          <?php endforeach;?>
          </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-md-4 ">N° Carnet/ Socio:</label>
          <div class="col-md-8">
            <input type="text" name="sick" class="form-control" id="sick" placeholder="Numero de Carnet/Socio">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-offset-4 col-md-4 col-md-offset-4">
            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class='fa fa-plus-circle'></i> Agregar Paciente</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>