<?php session_start();?>
<?php require 'old/header2.php';?>

	<?php

	if(isset($_SESSION['customer'])){//ログイン時は、DBから該当商品を削除
	    $sql = $pdo->prepare('delete from cart where user_id = ? and product_id = ?');
	    $sql -> execute([$_SESSION['customer']['user_id'],$_GET['product_id']]);
	}else{//非ログイン時は、セッションから該当商品を削除

	    unset($_SESSION['cart'][$_GET['product_id']]);

	}

	?>

	<script>
		location.href = "G5-1-1.php";
	</script>


<?php require 'old/fotter2.php';?>