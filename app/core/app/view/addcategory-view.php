<?php
if(count($_POST)>0){
	$user = new CategoryData();
	$user->name = $_POST["name"];
	$user->color = $_POST["color"];
	$user->add();
print "<script>window.location='index.php?view=categories';</script>";
}
?>