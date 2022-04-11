<style type="text/css">
	.fc-title {
    text-transform: initial;
    color: white;
}
</style>

<?php
// Lo mismo que error_reporting(E_ALL);
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
ini_set('error_reporting', E_ALL);
$thejson=null;
$events = ReservationData::getEvery();
foreach($events as $event){
	$category = $event->getCategory();
	$pacient = $event->getPacient();
	$status = $event->getStatus();
	$thejson[] = array("title"=>$event->time_at."hs - ".$category->name, 
		"url"=>"./?view=editreservation&id=".$event->id, 
		"start"=>$event->date_at, 
		"description"=>" Tipo de Estudio: " .$category->name. " Estado:".$status->name,
		"tooltip"=>$pacient->lastname." ".$pacient->name." DNI:".$pacient->document,
		"color"=> $category->color,
	);
}
?>
<script>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},		
			eventRender: function (eventObj, $el) {
				$el.popover({
					title: eventObj.tooltip,
					content: eventObj.description,
					trigger: 'hover',
					placement: 'top',
					container: 'body'
				});
			},
			defaultDate: '<?php echo date('Y-m-d');?>',
			editable: false,
			//eventColor: "#" + <?php $category->id ?> + "dcdcd",
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo json_encode($thejson); ?>
});
	});
</script>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Calendario de Turnos</h4>
			</div>
			<div class="card-content table-responsive">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
</div>