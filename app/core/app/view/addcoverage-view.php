<?php
if(count($_POST)>0){
	$user = new CoverageData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->add();
print "<script>window.location='index.php?view=coverages';</script>";
}
?>