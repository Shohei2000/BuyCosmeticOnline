<?php session_start();?>
<?php require 'old/header2.php';?>
	<?php
	    $sql = $pdo->prepare('insert into favorite values(?,?)');
	    $sql -> execute([$_SESSION['customer']['user_id'],$_GET['product_id']]);
	?>

	<script>
		location.href = "G4-1.php";
	</script>

<?php require 'old/fotter2.php';?>