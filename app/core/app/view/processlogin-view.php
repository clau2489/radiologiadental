<?php
if(Session::getUID()=="") {
	$user = $_POST['mail'];
	$pass = sha1(md5($_POST['password']));
	$base = new Database();
	$con = $base->connect();
	$sql = "select * from user where (email= \"".$user."\" or username= \"".$user."\") and password= \"".$pass."\" and is_active=1";
	$query = $con->query($sql);
	$found = false;
	$userid = null;
	while($r = $query->fetch_array()){
		$found = true ;
		$userid = $r['id'];
		$is_admin = $r['is_admin'];
		$document = $r['document'];
	}
	if($found==true) {
		$_SESSION['user_id']=$userid ;
		$_SESSION['is_admin']=$is_admin ;
		$_SESSION['document']=$document;
		print "Cargando ... $user";
		if($_SESSION['is_admin'] == "0"){
			print "<script>window.location='index.php?view=reservationpacient';</script>";
		}else{
			print "<script>window.location='index.php?view=home';</script>";
		}
	}else {
		print "<script>window.location='index.php?view=login';</script>";
	}
}else{
	print "<script>window.location='index.php?view=home';</script>";
}
