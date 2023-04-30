<?php session_start();?>
<?php require 'old/header2.php';?>

	<?php

	if(isset($_SESSION['customer'])){//ログイン時は、DBから該当商品をプラスする
	    $sql = $pdo->prepare('select * from cart where user_id = ? and product_id = ?');//カートから該当する商品を出力するSQL
	    $sql -> execute([$_SESSION['customer']['user_id'],$_GET['product_id']]);//カスタマーIDと商品IDを?に格納

	    foreach ($sql as $row){//検索をかける
	    }

	    $count = $row['quantity'];//既に、格納されている該当商品数

	    $sql2 = $pdo -> prepare('update cart set quantity = ? where user_id = ? and product_id = ?');//更新SQL
	    $sql2 -> execute([($count+1),$_SESSION['customer']['user_id'],$_GET['product_id']]);


	}else{//非ログイン時は、セッションから該当商品をプラスする

	    $product_id=$_GET['product_id'];

	    $_SESSION['cart'][$product_id]['quantity']+=1;

	}
	?>

	<script>
		location.href = "G5-1-1.php";
	</script>

<?php require 'old/fotter2.php';?>