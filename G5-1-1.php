<?php session_start()?>
<?php require 'old/header2.php';?>

	<div class="main_container container-fulid">

<!-- 帯バー部分開始 -->
		<div class="row" style="margin:0 10%;">
			<div class="col-sm-12">
				<h4 style="color:gray; margin:0;">Shopping Cart</h4>
			</div>
		</div>
		<div class="location_container row justify-content-center">
			<div class="location col-sm-2" style="background-color:hotpink;">
				<i class="fas fa-shopping-cart"></i>
				<label class="location_label">カート</label>
			</div>
			<div class="location col-sm-2">
				<i class="fas fa-user-check"></i>
				<label class="location_label">お客様情報</label>
			</div>
			<div class="location col-sm-2">
				<i class="fas fa-truck-moving"></i>
				<label class="location_label">発送支払方法</label>
			</div>
			<div class="location col-sm-2">
				<i class="far fa-check-square"></i>
				<label class="location_label">内容確認</label>
			</div>
		</div>
		<div class="row" style="margin:0 10%;">
			<div class="col-sm-12">
				<hr>
			</div>
		</div>
		<div class="row" style="margin:1em 10%;">
			<div class="col-sm-12" style="text-align:center;">
				<p style="margin:0; color:gray; font-size:1.5vw;">まだ商品の購入は完了していません。また複数ご注文される場合には「買い物を続ける」ボタンを押してください。</p>
			</div>
		</div>

<!-- 		カート部分開始 -->
		<div class="row" style="margin:0 10%; border:1px solid gray; padding:0 0.5vw;">
			<div class="col-sm-12">
				<div class="row">
<!-- 					商品部分(左側) -->
					<div class="col-sm-8">
						<div class="row" style="margin-right:0.1vw;">
							<?php
    						if(isset($_SESSION['customer'])){//ログイン時は、カート情報をDBから表示
    							//Product + Series + Category + Brand のSQL
    							$sql = "select * from cart as Cart
                                        	inner join
                                            	customer as Customer
                                                 on Cart.user_id = Customer.user_id
                                        	inner JOIN
                                            	product as Product
                                              	 on Cart.product_id = Product.product_id
                                           	inner JOIN
                                            	series as Series
                                                 on Product.series_id = Series.series_id
                                            where Cart.user_id = ?;";
    							$sql = $pdo->prepare($sql);
    							$sql -> execute([$_SESSION['customer']['user_id']]);

    							//カートに商品が何種類追加されているかSQL
    							$sql2 = "select count(*) as allcount from cart where user_id = ?";
    							$sql2 = $pdo->prepare($sql2);
    							$sql2 -> execute([$_SESSION['customer']['user_id']]);
    							foreach ($sql2 as $row2){
    							}
    							if($row2['allcount']!=0){
        							foreach ($sql as $row){
            							echo '<div class="col-sm-12" style="border:1px solid gray; padding:0.5vw; margin:0.5vw 0;"><!-- 商品１つ目開始 -->
            								<div class="row" style="height:15vw;">
            									<div class="col-sm-12 w-100 h-100">
            										<div class="row w-100 h-100">
            											<div class="col-sm-4 w-100 h-90" style="padding-right:0;">
            												<a href="G3-2-1.php?product_id='?> <?php echo $row['product_id']; ?> <?php echo '"><img class="item_image" src="'?> <?php echo $row['image_path_1']; ?> <?php echo '" style="height:15vw; border:1px solid gray;"></a>
            											</div>
            											<div class="col-sm-8">
            												<div class="row" style="height:30%;">
            													<div class="col-sm-12">
            														<a class="a_link_color" href="G3-2-1.php?product_id='?> <?php echo $row['product_id']; ?> <?php echo '"><p style="font-size:1.5vw;">'?> <?php echo $row['product_name']; ?> <?php echo '</p></a>
            													</div>
            												</div>
            												<div class="row" style="height:70%">
            													<div class="col-sm-6" style="position:relative;">
            														<div style="position:absolute; bottom:0;">
            															<label style="font-size:1.5vw; margin:0;">数量：'?><?php echo $row['quantity']; ?> <?php echo '</label>
            															<div style="margin-top:0.4vw; margin-left:0.4vw;">
            																<a href="plus.php?product_id='?> <?php echo $row['product_id']; ?> <?php echo '"><i class="far fa-plus-square" style="font-size:2vw;"></i></a>
            																<a href="minus.php?product_id='?> <?php echo $row['product_id']; ?> <?php echo '"><i class="far fa-minus-square" style="font-size:2vw;"></i></a>
            															</div>
            														</div>
            													</div>
            													<div class="col-sm-6" style="text-align:right; padding-right:0; position:relative;">
            														<div style="position:absolute; bottom:0; right:0;">
            															<p style="font-size:1vw; margin-bottom:1vw;">商品単価：¥'?> <?php echo $row['price']; ?> <?php echo '円</p>
            															<p style="font-size:1vw; margin-bottom:1vw;">小計：¥'?> <?php echo $row['price']*$row['quantity']; ?> <?php echo '円</p>
            															<a href="delete.php?product_id='?> <?php echo $row['product_id']; ?> <?php echo '" style="color:blue; font-size:1vw; margin:0;">削除</a>
            														</div>
            													</div>
            												</div>
            											</div>
            										</div>
            									</div>
            								</div>
            							</div><!-- 商品１つ目終了 -->';
        							}
    							}else{
                                    echo '<h5 style="margin:1vw;">カートに商品がありません。</h5>';
    							}

    						}else{//非ログイン時は、カート情報をセッションから表示
    						    if(!empty($_SESSION['cart'])){//セッションがある場合は、カート情報を表示
    						        $total=0;//カートに格納されている商品合計
    						        $count=0;//カートに格納されている商品の種類数
    						        foreach ($_SESSION['cart'] as $product_id=>$cart){

    						            echo '<div class="col-sm-12" style="border:1px solid gray; padding:0.5vw; margin:0.5vw 0;"><!-- 商品１つ目開始 -->
            								<div class="row" style="height:15vw;">
            									<div class="col-sm-12 w-100 h-100">
            										<div class="row w-100 h-100">
            											<div class="col-sm-4 w-100 h-90" style="padding-right:0;">
            												<a href="G3-2-1.php?product_id='?> <?php echo $product_id; ?> <?php echo '"><img class="item_image" src="'?> <?php echo $cart['image_path_1']; ?> <?php echo '" style="height:15vw; border:1px solid gray;"></a>
            											</div>
            											<div class="col-sm-8">
            												<div class="row" style="height:30%;">
            													<div class="col-sm-12">
            														<a class="a_link_color" href="G3-2-1.php?product_id='?> <?php echo $product_id; ?> <?php echo '"><p style="font-size:1.5vw;">'?> <?php echo $cart['product_name']; ?> <?php echo '</p></a>
            													</div>
            												</div>
            												<div class="row" style="height:70%">
            													<div class="col-sm-6" style="position:relative;">
            														<div style="position:absolute; bottom:0;">
            															<label style="font-size:1.5vw; margin:0;">数量：'?><?php echo $cart['quantity']; ?> <?php echo '</label>
            															<div style="margin-top:0.4vw; margin-left:0.4vw;">
                                                                        '?><?php
//     						                           なんかよく分からんけど、プラスマイナス・削除はこんな風にせんと動いてくれない...
            															     echo '<a href="plus.php?product_id=', $product_id, '"><i class="far fa-plus-square" style="font-size:2vw;"></i></a>';
            															     echo '<a href="minus.php?product_id=', $product_id, '"><i class="far fa-minus-square" style="font-size:2vw;"></i></a>';
            															?><?php echo '
            															</div>
            														</div>
            													</div>

            													<div class="col-sm-6" style="text-align:right; padding-right:0; position:relative;">
            														<div style="position:absolute; bottom:0; right:0;">
            															<p style="font-size:1vw; margin-bottom:1vw;">商品単価：¥'?> <?php echo $cart['price']; ?> <?php echo '円</p>
            															<p style="font-size:1vw; margin-bottom:1vw;">小計：¥'?> <?php echo $cart['price']*$cart['quantity']; ?> <?php echo '円</p>
                                                                        '?><?php
//     						                           なんかよく分からんけど、プラスマイナス・削除はこんな風にせんと動いてくれない...
            															echo '<a href="delete.php?product_id=', $product_id, '">削除</a>';?>
                                                                        <?php echo '
            														</div>
            													</div>
            												</div>
            											</div>
            										</div>
            									</div>
            								</div>
            							</div><!-- 商品１つ目終了 -->';

            							$count+=$cart['quantity'];
            							$subtotal = $cart['price']*$cart['quantity'];
                                        $total += $subtotal;

    						        }//foreach終了();

    						    }else{
    						        echo '<h5 style="margin:1vw;">カートに商品がありません。(非ログイン時)</h5>';
    						    }
    						}//非ログイン時if文終了

                            ?>
						</div>
					</div>
<!-- 					合計部分(右側) -->
					<?php
					if(isset($_SESSION['customer'])){
    					$sql = "select sum(Series.price*Cart.quantity)as sum_price, sum(Cart.quantity) as sum_quantity
                                        from cart as Cart
                                        	inner join
                                            	customer as Customer
                                                 on Cart.user_id = Customer.user_id
                                        	inner JOIN
                                            	product as Product
                                              	 on Cart.product_id = Product.product_id
                                           	inner JOIN
                                            	series as Series
                                                 on Product.series_id = Series.series_id
                                            where Cart.user_id = ?;";

    					$sql = $pdo->prepare($sql);
    					$sql -> execute([$_SESSION['customer']['user_id']]);

    					foreach($sql as $row){
    					}
					}
					?>
					<div class="col-sm-4" style="margin:0.5vw 0;">
						<div class="row">
							<div class="col-sm-12" style="border:1px solid gray;">
								<div class="row justify-content-center">
									<div class="col-sm-6" style="display:flex; justify-content:flex-end; padding-right:0;">
										<label class="allprice price_left">商品合計(<?php if(isset($_SESSION['customer'])){
    										                                                  if($row['sum_quantity']==0){
                                                                                                echo '0';
    										                                                  }else{
    										                                                    echo $row['sum_quantity'];
    										                                                  }
                                                                                          }else{//非ログイン時は、セッションから
                                                                                              if(isset($count)){
                                                                                                  echo $count;
                                                                                              }else{
                                                                                                  echo '0';
                                                                                              }
                                                                                          }
										                                           ?>点)</label>
									</div>
									<div class="col-sm-6" style="display:flex; justify-content:flex-end;">
										<label class="allprice price_right">￥<?php if(isset($_SESSION['customer'])){
    										                                                  if($row['sum_price']==0){
                                                                                                echo '0';
    										                                                  }else{
    										                                                    echo $row['sum_price'];
    										                                                  }
                                                                                          }else{//非ログイン時は、セッションから
                                                                                              if(isset($total)){
                                                                                                  echo $total;
                                                                                              }else{
                                                                                                  echo '0';
                                                                                              }
                                                										  }
										                                           ?>円</label>
									</div>
								</div>
								<div class="row justify-content-center">
									<div class="col-sm-6" style="display:flex; justify-content:flex-end; padding-right:0;">
										<label class="allprice price_left">送料</label>
									</div>
									<div class="col-sm-6" style="display:flex; justify-content:flex-end;">
										<label class="allprice price_right">￥360円</label>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<hr class="allprice">
									</div>
								</div>
								<div class="row justify-content-center">
									<div class="col-sm-6" style="display:flex; justify-content:flex-end; padding-right:0;">
										<label class="allprice price_left" style="font-weight:bold;">合計</label>
									</div>
									<div class="col-sm-6" style="display:flex; justify-content:flex-end;">
										<label class="allprice price_right" style="font-weight:bold;">￥<?php if(isset($_SESSION['customer'])){
                        										                                                  echo $row['sum_price']+360;
                                                                                                              }else{//非ログイン時は、セッションから
                                                                                                                  if(isset($total)){
                                                                                                                      echo $total+360;
                                                                                                                  }else{
                                                                                                                      echo '360';
                                                                                                                  }
                                                                                                              }
                    										                                           ?>円</label>
									</div>
								</div>
								<div class="row justify-content-center" style="padding:1.5vw 0;">
									<div class="col-sm-8" style="display:flex; justify-content:center; padding:0 0.5vw;">
										<a class="button" href="Mainpage.php">買い物を続ける</a>
									</div>
									<div class="col-sm-4" style="display:flex; justify-content:center; padding:0 0.5vw;">
										<a class="button" href="<?php if(!empty($_SESSION['cart']) || $row2['allcount']!=0){
                                                                        echo 'G5-1-2.php';
                                										}else{
                                										    echo '';
                                										}
										                                  ?>">次へ</a>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

<!-- CSS開始 -->
	<style>
/* 	メインCSS開始 */
	   .main_container{
	       padding:1vw 0;
	   }
/*  メインCSS終了 */
/* 	   帯バーCSS開始 */
	   .location_container{
	       margin:0.5vw 0;
	   }
	   .location{
	       height:2.5vw;
	       text-align:center;
	       background-color:gray;
	       border:2px solid lightgray;
	       display: flex;
           justify-content: center;
           align-items: center;
           color:white;
	   }
	   .location_label{
	       font-size:1vw;
            margin:0 0 0 0.3vw;
	   }
	   hr{
	       margin:0;
	   }
	   i{
	       font-size:1.5vw;
	       margin-top:1%;
	   }
/* 	   帯バーCSS終了 */
/* 右側CSS開始 */
    .allprice{
        font-size:1.5vw;
        margin:0;
        margin-top:1vw;
    }
/* 右側CSS終了 */
/* ボタンCSS開始 */
/* button */
    .button {
      width: 100%;
    }
/* ボタンCSS終了 */
/* リンクの色変CSS */
    .a_link_color{
        color:black;
    }
	</style>
<!-- CSS終了 -->

<?php require 'old/fotter2.php';?>