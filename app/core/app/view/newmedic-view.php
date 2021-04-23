<?php
$categories = CategoryData::getAll();
?>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-content table-responsive">
        <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addmedic" role="form">
          <h4 class="title">Nuevo Técnico</h4>
          <div class="form-group">
            <label>Apellido*</label>
            <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
          </div>          
          <div class="form-group">
            <label>Nombre*</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
          </div>
          <div class="form-group">
            <label>Estudios que realiza</label>
            <select name="category_id" class="form-control">
              <option value="">Seleccionar</option>      
              <?php foreach($categories as $cat):?>
                <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>      
              <?php endforeach;?>
            </select>
          </div> 
          <div class="form-group">
            <label>Dirección*</label>
            <input type="text" name="address" class="form-control"  id="address" placeholder="Direccion">
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
            <label>Teléfono*</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Telefono">
          </div>
          <div class="form-group">
            <label>Matrícula N°</label>
            <input type="text" name="matricula" class="form-control" id="matricula" placeholder="Número de Matrícula">
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