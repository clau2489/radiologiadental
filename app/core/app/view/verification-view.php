<?php
if(count($_POST)>0){

	$document = $_POST["document"];

    $query = PacientData::getBySearch($document);

    if (count($query)>0) {
        $_SESSION['document'] = $query['document'];
        print "<script>window.location='index.php?view=home';</script>";
    }
    else{
        print "<script>window.location='index.php?view=login';</script>";
    }
}
?>