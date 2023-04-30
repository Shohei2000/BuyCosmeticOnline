<?php session_start();?>
<?php require 'old/header2.php';?>
<?php

$sql = $pdo -> prepare('delete from card where card_number = ?');
$sql -> execute([$_GET['card_number']]);

?>
<script>
	location.href = "G4-4-1.php";
</script>


