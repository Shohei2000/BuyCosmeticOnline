<?php require '../old/header2.php';?>

	<?php

	   $sql = $pdo ->query('select * from product');

	   foreach ($sql as $row){
	       echo '<form action="cart-insert.php" method="post">';
	       echo '<p>商品番号：',$row['product_id'],'</p>';
	       echo '<p>商品名：',$row['product_name'],'</p>';
	       echo '<p>個数：<select name="count">';
	       for($i=1; $i<=10; $i++){
	           echo '<option value="',$i,'">',$i,'</option>';
	       }
	       echo '</select></p>';
	       echo '<input type="hidden" name="product_id" value="',$row['product_id'],'">';
	       echo '<input type="hidden" name="product_name" value="',$row['product_name'],'">';
	       echo '<input type="hidden" name="price" value="',$row['price'],'">';
	       echo '<p><input type="submit" value="カートに追加"></p>';
	       echo '</form>';
	       echo '<hr>';
	   }

	?>


<?php require '../old/fotter2.php';?>