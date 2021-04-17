<?php
$client = OdontologoData::getById($_GET["id"]);
$client->del();
Core::redir("./index.php?view=odontologos");
?>