<?php session_start();?>
<?php require 'old/header2.php';?>
<div class="container mt-5">
	<div class="row border-bottom">
		<div class="col-9"><h3 style="margin-left:2vw;">注文履歴<h3></div>
		<div class="col-3"></div>
	</div>
	<div class="row mt-3 border-bottom">
		<?php
			$sql=$pdo->prepare('select * from orders,details,product,series where orders.user_id=? and orders.order_id=details.order_id and details.product_id=product.product_id and product.series_id=series.series_id ');
			$sql->execute([$_SESSION['customer']['user_id']]);
			$count=0;
			foreach($sql as $row){
				$count+=1;
			}
			echo '<div class="col-8"><h6 style="margin-left:3vw;">全',$count,'件</h6></div>
	</div>';
			if($count==0){
				echo '<div class="row m-3">
					  	<div class="col-6 offset-5">
							<p>注文した商品がありません</p>
						</div>
					  </div>';
			}
		?>

	<?php
		$sql=$pdo->prepare('select * from orders,details,product,series where orders.user_id=? and orders.order_id=details.order_id and details.product_id=product.product_id and product.series_id=series.series_id order by buy_time DESC');
		$sql->execute([$_SESSION['customer']['user_id']]);
		foreach($sql as $row){
			$product_name=$row['product_name'];
			$buy_time=$row['buy_time'];
			$order_qty=$row['order_qty'];
			$subtotal=$row['subtotal'];
			$image_path_1=$row['image_path_1'];
			$price=$row['price'];
			$product_id=$row['product_id'];
			echo '

				 <div class="container border m-3">
				  <div class="row border-bottom m-2">
					<div class="col-2">
						<p class="m-0">注文日</p>
						<p class="m-0">',$buy_time,'</p>
		            </div>
		            <div class="col-1 offset-1">
		            	<p class="m-0">単価</p>
		            	<p class="m-0">￥',$price,'</p>
		            </div>
		            <div class="col-1">
		            	<p class="m-0">個数</p>
		            	<p class="m-0">',$order_qty,'個</p>
		            </div>
		            <div class="col-1">
		            	<p class="m-0">合計</p>
		            	<p class="m-0">￥',$subtotal,'</p>
		            </div>
		          </div>


				  <div class="row">
					<div class="col-2 pl-5">
						<a href="G3-2-1.php?product_id=',$product_id,'"><img src="',$image_path_1,'" class="img-fluid img-thumbnail w-40"></a>
					</div>
					<div class="col-8 pl-5">
						<div class="row mt-4">
							<a href="G3-2-1.php?product_id=',$product_id,'" class="text-body"><h5>',$product_name,'</h5></a>
							<p style="margin-left:0.5vw;">'?><?php require 'review-star-rate4.php';?><?php echo'</p>
						</div>
						<div class="row">
							<a href="Mainpage.php">関連の商品を見る</a>
						</div>

					</div>
					<div class="col-2 pr-5 mt-3">
						<div class="row">

						</div>
						<div class="row">
							<a class="btn btn-warning w-100" href="G6-1-1.php?product_id=',$product_id,'" role="button">レビューをかく</a>
						</div>
						<div class="row">
							<a class="btn btn-light w-100" href="G3-2-1.php?product_id=',$product_id,'" role="button">詳細ページへ</a>
						</div>
					</div>
				  </div>
				 </div>';
		}
	?>
</div>
</div>
<?php require 'old/fotter2.php';?>