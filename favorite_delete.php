<?php session_start();?>
<?php require 'old/header2.php';?>
	<?php
	    $sql = $pdo->prepare('delete from favorite where user_id = ? and product_id = ?');
	    $sql -> execute([$_SESSION['customer']['user_id'],$_GET['product_id']]);
	?>
	<script>
		location.href = "G4-3.php";
	</script>

<?php require 'old/fotter2.php';?>