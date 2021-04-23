<?php $user = CategoryData::getById($_GET["id"]);?>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="card-content table-responsive">
        <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatecategory" role="form">
          <h4 class="title">Editar estudios</h4>
          <div class="form-group">
            <label>Nombre *</label>
            <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">

          </div>
          <div class="form-group">
            <div class="col-md-offset-4 col-md-4 col-md-offset-4">
              <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
              <button type="submit" class="btn btn-default btn-block"><i class="fa fa-retweet"></i> Actualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>