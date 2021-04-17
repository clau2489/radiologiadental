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
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-content table-responsive">
          <form class="form-horizontal" role="form" method="post" action="./?action=updatereservation">
            <h4 class="title">Detalle del Turno</h4>
            <div id="divName">
              <div class="form-group">
                <label>Paciente</label>              
                <select name="pacient_id" class="form-control" required disabled>
                  <option value="">Seleccionar</option>
                  <?php foreach($pacients as $p):?>
                    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->pacient_id){ echo "selected"; }?>><?php echo $p->lastname." ".$p->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Edad</label>           
                <input class="form-control" value="<?php
                foreach($pacients as $p):
                if($p->id==$reservation->pacient_id){ 
                  $fecha = time() - strtotime($p->day_of_birth); 
                  $edad = floor((($fecha / 3600) / 24) / 360);
                  echo ''.$edad.' años';}
                  endforeach;
                  ?>"
                  >
                </div>            
                <div class="form-group">
                  <label>Tipo de Estudio</label>        
                  <select name="category_id" class="form-control" required disabled>
                    <option value="">Seleccionar</option>      
                    <?php foreach($categories as $p):?>
                      <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->category_id){ echo "selected"; }?>><?php echo $p->name; ?></option>      
                    <?php endforeach;?>
                  </select>
                </div> 
                <div class="form-group">
                  <label>Tecnico</label>
                  <select name="medic_id" class="form-control">
                    <option value="">Seleccionar</option>
                    <?php foreach($medics as $p):?>
                      <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->medic_id){ echo "selected"; }?>><?php echo $p->lastname." ".$p->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>  
                <div class="form-group">
                  <label>Fecha</label>  
                  <input type="date" name="date_at" value="<?php echo $reservation->date_at; ?>" required class="form-control" id="inputEmail1" placeholder="Fecha">
                </div>
                <div class="form-group">
                  <label>Hora</label>
                  <input type="time" name="time_at" value="<?php echo $reservation->time_at; ?>" required class="form-control" id="inputEmail1" placeholder="Hora">
                </div>           
                <div class="form-group">
                  <label>Estado del turno</label> 
                  <select name="status_id" class="form-control">
                    <?php foreach($statuses as $p):?>
                      <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->status_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Estado del pago</label>          
                  <select name="payment_id" class="form-control">
                    <?php foreach($payments as $p):?>
                      <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->payment_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputEmail1" class="col-md-4 ">Forma de pago</label>       
                  <select name="payment_type_id" class="form-control" required>
                    <?php foreach($payments_types as $p):?>
                      <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->payment_type_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Tipo de Cobertura</label>           
                  <select name="coverage_id" class="form-control" required>
                    <?php foreach($coverages as $p):?>
                      <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->coverage_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>                         
                <div class="form-group">
                  <label>Costo</label>    
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                    <input type="text" class="form-control" value="<?php echo $reservation->price;?>" name="price" placeholder="Costo" required>
                  </div>
                </div>          
                <div class="form-group">
                  <label>Informe</label>            
                  <textarea rows="5" class="form-control" name="info" id="medic"><?php echo $reservation->info;?></textarea>
                </div>
                <div class="form-group">
                  <label>Médico Solicitante</label>             
                  <input type="text" name="medic" class="form-control" value="<?php echo $reservation->medic;?>" id="medic" placeholder="Médico Solicitante">
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