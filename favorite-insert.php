<?php session_start();?>
<?php require 'old/header2.php';?>
	<?php
	    $sql = $pdo->prepare('insert into favorite values(?,?)');
	    $sql -> execute([$_SESSION['customer']['user_id'],$_GET['product_id']]);
	?>

	<script>
		location.href = "G3-2-1.php?product_id=<?php echo $_GET['product_id']?>";
	</script>

<?php require 'old/fotter2.php';?>