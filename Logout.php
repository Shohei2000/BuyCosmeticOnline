<?php session_start()?>
<?php require 'old/header1.php';?>

	<?php
	   unset($_SESSION['customer']);
	?>

	<script>
		location.href = "login_input.php";
	</script>

<?php require 'old/fotter1.php';?>