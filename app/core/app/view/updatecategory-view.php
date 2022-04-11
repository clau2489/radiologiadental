<?php

if(count($_POST)>0){
	$user = CategoryData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->color = $_POST["color"];
	$user->update();
print "<script>window.location='index.php?view=categories';</script>";
}
?>