<?php 
$reservation = ReservationData::getById($_GET["id"]);
$pacients = PacientData::getAll();
$medics = MedicData::getAll();
$statuses = StatusData::getAll();
$payments = PaymentData::getAll();
$payments_types = Payment_typeData::getAll();
$categories = CategoryData::getAll();
$coverages = CoverageData::getAll();
?>
<div class="card">
  <div class="row">
    <div class="card-header" data-background-color="blue">
      <h4 class="title">Detalle del Turno</h4>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-content table-responsive">
          <form class="form-horizontal" role="form" method="post" action="./?action=updatereservation">
            <div id="divName">
            <div class="form-group">
              <label for="inputEmail1" class="col-md-4">Paciente</label>
              <div class="col-md-8">
                <select name="pacient_id" class="form-control" required disabled>
                <option value="">Seleccionar</option>
                <?php foreach($pacients as $p):?>
                  <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->pacient_id){ echo "selected"; }?>><?php echo $p->lastname." ".$p->name; ?></option>
                <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-md-4">Tipo de Estudio</label>
              <div class="col-md-8">
              <select name="category_id" class="form-control" required disabled>
              <option value="">Seleccionar</option>      
              <?php foreach($categories as $p):?>
              <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->category_id){ echo "selected"; }?>><?php echo $p->name; ?></option>      
              <?php endforeach;?>
              </select>
              </div>
            </div> 
            <div class="form-group">
              <label for="inputEmail1" class="col-md-4">Tecnico</label>
              <div class="col-md-8">
                <select name="medic_id" class="form-control">
                  <option value="">Seleccionar</option>
                  <?php foreach($medics as $p):?>
                    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->medic_id){ echo "selected"; }?>><?php echo $p->lastname." ".$p->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>            
            </div>  
            <div class="form-group">
              <label for="inputEmail1" class="col-md-4">Fecha/Hora</label>
              <div class="col-md-4">
                <input type="date" name="date_at" value="<?php echo $reservation->date_at; ?>" required class="form-control" id="inputEmail1" placeholder="Fecha">
              </div>
              <div class="col-md-4">
                <input type="time" name="time_at" value="<?php echo $reservation->time_at; ?>" required class="form-control" id="inputEmail1" placeholder="Hora">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-md-4">Estado del turno</label>
              <div class="col-md-8">
                <select name="status_id" class="form-control">
                <?php foreach($statuses as $p):?>
                  <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->status_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
                <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-md-4">Estado del pago</label>
              <div class="col-md-8">
                <select name="payment_id" class="form-control">
                <?php foreach($payments as $p):?>
                  <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->payment_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
                <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-md-4 ">Forma de pago</label>
              <div class="col-md-8">
              <select name="payment_type_id" class="form-control" required>
                <?php foreach($payments_types as $p):?>
                  <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->payment_type_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
                <?php endforeach; ?>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-md-4 ">Tipo de Cobertura</label>
              <div class="col-md-8">
              <select name="coverage_id" class="form-control" required>
                <?php foreach($coverages as $p):?>
                  <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->coverage_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
                <?php endforeach; ?>
              </select>
              </div>
            </div>             
            <div class="form-group">
              <label for="inputEmail1" class="col-md-4">Costo</label>
              <div class="col-md-8">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                  <input type="text" class="form-control" value="<?php echo $reservation->price;?>" name="price" placeholder="Costo" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-md-4">Informe</label>
              <div class="col-md-8">
              <textarea rows="5" class="form-control" name="info" id="medic"><?php echo $reservation->info;?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-md-4">Médico Solicitante</label>
              <div class="col-md-8">
              <input type="text" name="medic" class="form-control" value="<?php echo $reservation->medic;?>" id="medic" placeholder="Médico Solicitante">
              </div>
            </div>              
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <input type="hidden" name="id" value="<?php echo $reservation->id; ?>">
                  <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-retweet"></i> Actualizar Cita </button>
                </div>
                <div class="col-md-4">
                  <a type="button" class="btn btn-primary btn-lg btn-block" onclick="printDiv('divName')" value="Imprimir Constancia"><i class="fa fa-print"></i> Imprimir Constancia</a>
                </div>
                <div class="col-md-4">
                  <a href="index.php?action=delreservation&id=<?php echo $reservation->id;?>" class="btn btn-primary btn-lg btn-block"><i class="fa fa-trash"></i> Eliminar Turno</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>  
</div>
