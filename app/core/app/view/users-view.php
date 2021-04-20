<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<style type="text/css">
	table.dataTable tbody th, table.dataTable tbody td {
		padding: 3px 10px;
	}	
</style>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h4 class="title">Usuarios</h4>
			<div class="card-content table-responsive">
				<a href="index.php?view=newuser" class="btn btn-primary"><i class='fa fa-user'></i> Nuevo Usuario</a>
				<br>
				<?php
/*
$u = new UserData();
print_r($u);
$u->name = "Agustin";
$u->lastname = "Ramos";
$u->email = "evilnapsis@gmail.com";
$u->password = sha1(md5("l00lapal00za"));
$u->add();


$f = $u->createForm();
print_r($f);
echo $f->label("name")." ".$f->render("name");
*/
?>
<?php

$users = UserData::getAll();
if(count($users)>0){
// si hay usuarios
	?>
	<table id="example" class="stripe" style="width:100%">
		<thead>
			<th>Nombre completo</th>
			<th>Nick</th>
			<th>Email</th>
			<th>Activo</th>
			<th>Admin</th>
			<th></th>
		</thead>
		<?php
		foreach($users as $user){
			?>
			<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->email; ?></td>
				<td><?php echo $user->username; ?></td>
				<td>
					<?php if($user->is_active):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if($user->is_admin):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td style="width:30px;"><a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-dark btn-xs"><i class="fa fa-edit"></i></a></td>
			</tr>
			<?php

		}
		?>
	</table>
	<?php



}else{
// no hay usuarios
}


?>

</div>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>