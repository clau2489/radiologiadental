<?php
$coverage = CoverageData::getById($_GET["id"]);
$coverage->del();
Core::redir("./index.php?view=coverages");
?>