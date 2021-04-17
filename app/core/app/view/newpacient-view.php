<?php
$coverage = CoverageData::getAll();
?>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-content table-responsive">
        <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addpacient" role="form">
          <h4 class="title">Nuevo Paciente</h4>
          <div class="form-group">
            <label>Apellido*</label>
            <input type="text" name="lastname"  class="form-control" id="lastname" placeholder="Apellido">
          </div>        
          <div class="form-group">  
            <label>Nombre*</label>
            <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
          </div>
          <div class="form-group">
            <label>N° Documento (Campo Obligatorio)</label>
            <input name="document"  class="form-control" id="document" placeholder="Número de Documento">
          </div>
          <div class="form-group">
            <label>Genero*</label>
            <br>
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox1" name="gender" required value="h"> Hombre
            </label>
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox2" name="gender" required value="m"> Mujer
            </label>
          </div>
          <div class="form-group">
            <label>Fecha de Nacimiento</label>
            <input type="date" name="day_of_birth" class="form-control"  id="address1" placeholder="Fecha de Nacimiento">
          </div>
          <div class="form-group">
            <label>Direccion*</label>
            <input type="text" name="address" class="form-control"  id="address1" placeholder="Direccion">
          </div>
          <div class="form-group">
            <label>Localidad</label>
            <input type="text" name="city" class="form-control"  id="city" placeholder="Localidad">
          </div>        
          <div class="form-group">
            <label>Email*</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label>Telefono*</label>
            <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono">
          </div>
          <div class="form-group">
            <label>Tipo de Cobertura</label>
            <br>
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox1" name="coverage" required value="p"> Particular
            </label>
            <label class="checkbox-inline">
              <input type="radio" id="inlineCheckbox2" name="coverage" required value="o"> Obra Social
            </label>
          </div>
          <div class="form-group">
            <label>Obra Social</label>
            <select name="obra" class="form-control" id="obra">
              <option value="">Seleccionar</option>      
              <?php foreach($coverage as $cov):?>
                <option value="<?php echo $cov->id; ?>"><?php echo $cov->name; ?></option>      
              <?php endforeach;?>
            </select>
          </div>
          <div class="form-group">
            <label>N° Carnet/ Socio:</label>
            <input type="text" name="sick" class="form-control" id="sick" placeholder="Numero de Carnet/Socio">
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