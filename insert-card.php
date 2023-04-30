<?php session_start();?>
<?php require 'old/header2.php';?>


<?php
$sql = $pdo -> prepare('insert into card values(?,?,?,?)');
$sql -> execute([$_REQUEST['card_number'],$_SESSION['customer']['user_id'],$_REQUEST['term'],null]);

?>
<script>
	location.href = "G4-4-3.php";
</script>



