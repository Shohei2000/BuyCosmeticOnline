<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=we will shopping;charset=utf8','root', '');
	$sql=$pdo->prepare('select * from product inner join series on product.series_id = series.series_id');
$sql->execute([$_REQUEST['product_id']]);

foreach ($sql as $row) {
	echo '<form action="cart-insert.php" method="post">';
	echo '<p>商品番号：', $row['product_id'], '</p>';
	echo '<p>商品名：', $row['product_name'], '</p>';
	echo '<p>価格：', $row['price'], '</p>';
    
	echo '<p>個数：<select name="count">';
	for ($i=1; $i<=10; $i++) {
		echo '<option value="', $i, '">', $i, '</option>';
	}
	echo '</select></p>';
    
	echo '<input type="hidden" name="id" value="', $row['product_id'], '">';
	echo '<input type="hidden" name="name" value="', $row['product_name'], '">';
	echo '<input type="hidden" name="price" value="', $row['price'], '">';
	echo '<p><input type="button" onclick="javascript:form.submit()" value="カートに追加"></p>';
	echo '</form>';

}
?>
<?php require '../footer.php'; ?>
