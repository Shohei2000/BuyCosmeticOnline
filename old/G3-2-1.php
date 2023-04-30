<?php session_start();?>
<?php require 'old/header2.php';?>
<?php require 'old/array.php';?>

<?php //閲覧履歴DB(History)に追加する
    if(isset($_SESSION['customer'])){
        $today = date("Y-m-d");
        $sql = $pdo ->prepare('insert into history values(?,?,?)');//追加SQL
        $sql ->execute([$_SESSION['customer']['user_id'],$_GET['product_id'],$today]);
    }
?>

<?php
    //Product + Series + Category + Brand のSQL
    $sql = "select * from product as P
                inner join
                	series as S
                	on P.series_id = S.series_id
                inner JOIN
                	category as C
                	on S.category_id = C.category_id
                inner join
                	brand as B
                	on S.brand_id = B.brand_id
                where product_id = ?
                order by product_id
                DESC";

    $sql=$pdo->prepare($sql);
    $sql->execute([$_GET['product_id']]);//パラメーター変数に格納されている商品IDをSQL分の？に埋め込む

    foreach ($sql as $row){//該当商品を探して、$rowに格納する。
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $series_id=$row['series_id'];
    }
?>

<!-- 	container-fulid開始 -->
	<div class="container-fulid w-100 h-100 p-0">
<!-- 	row開始 -->
		<div class="main row w-100 h-100">
<!-- 			1列目開始 -->
			<div class="main1 col-sm-1" style="width:100%; height:auto; padding:0;">
<!-- 				item_image_container1開始 -->
				<div class="item_image_container1">
					<div class="content d-flex align-items-center h-100 w-100">
						<ul style="list-style:none; padding:0; margin:0.5vw;">

						</ul>
					</div>
				</div>
<!-- 				item_image_container1終了 -->
			</div>
<!-- 			1列目終了 -->

<!-- 			2列目開始 -->
			<div class="col-sm-3  d-flex align-items-center" style="width:100%; height:auto;">
					<?php
                        echo '<img class="topimage" src="'?> <?php echo $row['image_path_1']; ?> <?php echo '">'
					?>
			</div>
<!-- 			2列目終了 -->

<!-- 			3列目開始 -->
			<div class="col-sm-7 p-0" style="background-color:rightgray; height:auto;">
				<form action="cart-insert.php" method="post" name="form">
				<div class="container">
					<div class="row">
    					<div class="col-sm-12">
    						<label class="item_name1">商品名</label>
            				<label class="item_name2"><?php echo $row['product_name'];?></label>
            				<hr>
    					</div>
					</div>
				</div>
				<div class="container">
					<div class="row" style="min-height:100%;">
						<div class="col-sm-7" style="min-height:100%;">
							<div class="row">
								<div class="col-sm-12" style="height:10%;">
    								<label class="brand_name1">ブランド名</label>
            						<a class="brand_name_hover" href="G3-1-3.php?brand_id=<?php echo $brand_id.'&page=1';?>"><label class="brand_name2"><?php echo $row['brand_name']?></label></a>
            						<hr>
            						<p class="pt-3 mb-0">バリエーション</p>
								</div>
							</div>
							<div class="row mt-0">
								<?php
									 $pdo1 = new PDO('mysql:host=mysql1.php.xdomain.ne.jp; dbname=wws2020_wewillshopping; charset=utf8','wws2020_admin','wewillshopping');
									$sql1=$pdo1->prepare('select * from product where series_id=?');
									$sql1->execute([$series_id]);
									foreach($sql1 as $row1){
										$image_path=$row1['image_path_1'];
										$pd_id=$row1['product_id'];
										echo '<div class="col-sm-3  p-1">
												<a href="G3-2-1.php?product_id=',$pd_id,'"><img class="item_image2" src="',$image_path,'"></a></div>';

									}
								?>
							</div>
						</div>

						<div class="col-sm-5" style="min-height:100%;">
							<div class="row" style="height:30%; padding:1% 0;">
								<div class="col-sm-12 text-center">
									<?php require 'review-star-rate2.php';?>
    								<p class="review2"><a href="#review">レビューを見る</a></p>
								</div>
							</div>
							<div class="row" style="height:40%;">
								<div class="col-sm-12" style=";">
									<div class="row">
										<div class="col-sm-6">
											<p class="price1 text-left">価格</p>
        									<p class="point1 text-left">ポイント</p>
										</div>
										<div class="col-sm-6">
											<p class="price2 text-right"><?php echo "¥".$row['price']."円";?></p>
        									<p class="point2 text-right"><?php echo ($row['price']/10)."point";?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row" style="height:30%;">
								<div class="star_image_container col-sm-6 form_container">

      								<a href="#motal1" class="modal">
      									<i class="star_image fas fa-star"></i>
      								</a>


									<!-- 以下がモーダルで呼ばれる -->
                                      <div class="modalBox" id="motal1">
                                        <div class="modalInner">
                                          お気に入りに追加しました。
                                        </div>
                                      </div>
								</div>

								<div class="col-sm-6 form_container">
									<select class="count_selectbox" id="quantity" name="quantity" style="height:3.5vw; font-size:1vw;">
                        							<?php
                        					         echo	'<option value="0" selected>個数</option>';
                        							 $i=1;
                        							 for ($i=1; $i<=10; $i++) {
                        							     echo '<option value="', $i, '">', $i, '</option>';
                        							 }

                        							 echo '<input type="hidden" name="product_id" value="',$row['product_id'],'">';
                        							 echo '<input type="hidden" name="product_name" value="',$row['product_name'],'">';
                        							 echo '<input type="hidden" name="price" value="',$row['price'],'">';
                        							 echo '<input type="hidden" name="image_path_1" value="',$row['image_path_1'],'">';
                        							 ?>
                        			</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container" style="height:auto;">
						<div class="row no-gutters">
    						<div class="variation_container col-sm-9">
    							<div class="row">
    								<div class="col-sm-6">


    								</div>
    								<div class="col-sm-6" style="margin-top:0.5vw;">
    									<a href="#detail" class="button" style="width:70%; border-radius:0.5vw;">商品説明を見る</a>
    								</div>
    							</div>
    						</div>
							<div class="col-sm-3" style="margin-top:0.5vw;">
								<div style="width:100%; margin:0 auto;  padding:0;">
									<a class="button modal2" id="modal2" href="#motal2" style="width:100%; border-radius:0.5vw; margin:0;">カートに入れる</a>
								</div>
									<!-- 以下がモーダルで呼ばれる -->
									<div class="modalBox" id="motal2"><!-- idだけ変える -->
										<div id="modalInner" class="modalInner">
											カートに追加しました。
										</div>
									</div>
							</div>
						</div>

					<div class="row" style="height:100%;">
						<div class="variation_table_container" style="height:100%; margin:0.5vw 0.5vw 0 0.5vw;">
							<table class="variation_table" style="height:100%;">
    							<tr class="row_20">
    								<td class="td1">Brand</td>
    								<td class="td2"><?php echo $row['brand_name']?></td>
    							</tr>
    							<tr class="row_20">
    								<td class="td1">カテゴリ</td>
    								<td class="td2"><?php echo $row['category_name']?></td>
    							</tr>
    							<tr class="row_20">
    								<td class="td1">サイズ</td>
    								<td class="td2"><?php echo $row['size']?></td>
    							</tr>
    							<tr class="row_40">
    								<td class="td1 td3">商品コメント</td>
    								<td class="td3 td2"><?php echo $row['comment']?></td>
    							</tr>
							</table>
						</div>
					</div>
				</div>
			</form>
			</div>
<!-- 			3列目終了 -->
		</div>
<!-- 	main終了 -->

<?php require 'carousel1.php';?>

<!-- 	item_detail_container開始 -->
        <div id="detail" class="container-fulid item_detail_container" style="width:95%; margin:0 auto; padding-top:4em; margin-top:-4em;">
    		<div class="row">
    			<div class="col-sm-12">
					<label class="item_detail_name m-1">商品の説明</label>
					<hr>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-sm-12">
    				<?php
    				    $sql = $pdo->prepare('select * from product,series where product.series_id = series.series_id and product_id = ?');
                        $sql->execute([$_GET['product_id']]);
                        foreach ($sql as $row){
                            $product_explanation = $row['product_explanation'];
                        }
    				?>
    				<p class="item_detail m-2"><?php echo $product_explanation;?></p>
    			</div>
    		</div>
        </div>
<!-- item_detail_container終了 -->


<!--        カスタマーレビュー開始 -->
		<div id="review" class="review_container" style="width:95%; margin:0 auto;">
			<div class="row">
				<div class="col-sm-12">
					<label class="m-0" style="font-size:1.5vw;">カスタマーレビュー</label>
					<hr>
				</div>
			</div>
			<div class="row" style="width:90%; margin:0 auto;">
				<div class="col-sm-12">
					<?php require 'review-star-rate1.php';?>
				</div>

			</div>
			<div class="row" style="width:90%; height:3vw; margin:0 auto;">
				<div class="col-sm-6" style="display:flex; justify-content:flex-start; align-items:center;">
					<label style="margin:0; font-size:1.5vw; margin-left:0.5vw;"><?php echo $review_count?>件のレビュー️</label>
					<a class="button" href="<?php if(isset($_SESSION['customer'])){echo 'G6-1-1.php?product_id='.$_GET['product_id'];}else{ echo 'login_input.php';};?>" style="width:40%; margin-left:0.5vw;">レビューを書く</a>
				</div>
			</div>
			<div class="row" style="width:90%; margin:0 auto;">
				<div class="col-sm-12">
					<?php
					$sql = $pdo ->prepare('select * from review,customer where customer.user_id = review.user_id and product_id = ?');
					$sql ->execute([$_GET['product_id']]);

					if($review_count>0){
    					foreach ($sql as $row){
    					    $user_id=$row['user_id'];
    					    $gd_class=$row['gd_class'];
    					    $post_date=$row['post_date'];
    					    $evaluation=$row['evaluation'];
    					    $review_title=$row['review_title'];
    					    $review_body=$row['review_body'];

    					    echo '<div class="review_detail_container" style="margin-top:1vw; padding:1vw; border:1px solid black;">';
    					    echo '<div class="age_gender" style="font-size:1.5vw; line-height:1.5vw;">';
    					    echo '<label style="margin-left:1vw;">',$gender_ary[$gd_class],'</label>';
    					    echo '</div>';
    					    echo '<div class="" style="font-size:1.5vw; line-height:1.5vw; margin-left:1vw;">';
    					    require 'review-star-rate3.php';//星評価
    					    echo '<label style="margin-left:1vw;">',$review_title,'</label>';
    					    echo '</div>';
    					    echo '<div class="" style="font-size:1.5vw; line-height:1.5vw; margin-left:1vw;">';
    					    echo '<label>投稿日：</label>';
    					    echo '<label style="margin-left:1vw;">',$post_date,'</label>';
    					    echo '</div>';
    					    echo '<hr style="margin:0 1vw;">';
    					    echo '<div class="" style="font-size:1vw; margin:1vw 3vw;">';
    					    echo '<p>',$review_body,'</p>';
    					    echo '</div>';
    					    echo '</div>';
    					}//foreach文終了
					}else{
					    echo '<p style="margin:0;">まだカスタマーレビューはありません。</p>';
					}
					?>
				</div>
			</div>
		</div>
<!--        カスタマーレビュー終了 -->
	</div>
<!-- container-fulid終了 -->

    <div id="content" class="top">
        <!-----ここにコンテンツが入る----->
        <a href="#" id="topBtn">TOP</a>
    </div>

<style>
.main{
    padding:1vw 1vw 0 1vw;
}
/* 1列目開始 */
.item_image_container1{
    width:85%;
    height:100%;
    margin:0 auto;
}
.item_image{
    width:100%;
    height:auto;
    border:1px solid lightgray;
}
/* 1列目終了 */
/* 2列目開始 */
.topimage{
    width:100%;
    margin:1vw 0;
    border:1px solid lightgray;
}
/* 2列目終了 */
/* 3列目開始 */
.brand_name_hover{
    color:black;
}
.brand_name_hover:hover{
    color:gray;
}
.item_name1{
    font-size:2vw;
    margin:0 1vw 0 0;
}
.item_name2{
    font-size:1.5vw;
    margin:0;
}
.brand_name1{
    font-size:1.5vw;
    margin:0 1vw 0 0;
}
.brand_name2{
    font-size:1.5vw;
    margin:0;
}
hr{
    margin:0;
    border:1px solid black;
    border-right: none;
    border-bottom: none;
    border-left: none;
}
.item_image2{
    width:100%;
    border:1px solid lightgray;
}
.review1{
    font-size:1.5vw;
    margin:0;
}
.review2{
    font-size:1vw;
    margin:0;
}
.price1,.price2,.point1,.point2{
    margin:0;
    font-size:1.5vw;
}
.point1,.point2{
    margin-top:0.5vw;
}
.form_container{
    width:100%;
    margin:0.2vw 0;
    padding:0;
    display:flex;
    justify-content:center;
    align-items:center;
}
.star_image_container{
    text-align:right;
    position: relative;
    z-index:0;
}
.star_image{
    font-size:3vw;
    margin-right:0.5vw;
    color:#fff352;
}
.star_image:active{
    position: relative;
    top: -0.2vw;
}
.count_selectbox{
    width:90%;
    height:100%;
}
/* 3列目終了 */
/* バリエーション */
.variation_container{
    text-align:center;
}
.variation_table_container{
    width:100%;
    height:auto;
    text-align:center;
}
.variation{
    margin:0;
    font-size:1.5vw;
}
.variation_table{
    width:100%;
}
table,td,th{
    border:1px solid black;
}
td{
    font-size:1vw;
}
.td1{
    background-color:whitesmoke;
}
.td2{
    text-align:left;
    padding:0 1vw;
}
.td3{
    height:4vw;
}
.row_20{
    height:3vw;
}
.row_40{
    height:70%;
}
/* 商品の詳細 */
.item_detail_name{
    font-size:1.5vw;
}
.item_detail{
    font-size:1vw;
}
/* おすすめの商品 */
.recomend_carousel-container{
    background-color:lightgray;
    height:10vw;
    margin:1vw 0;
}
.recomned_carousel_inner{
    width:80%;
    height:100%;
    margin:0 auto;
    padding:0;
}
.recomend_carousel_item{
    width:100%;
    height:100%;
    margin:0;
}
.recomend_items_container{
    height:8vw;
    margin:1vw 0;
    padding:0 0 0 2vw;
    list-style:none;
}
.recomend_item_li{
    width:10%;
    height:8vw;
    margin:0 2%;
    float:left;
}
.recomend_image{
    width:100%;
    height:100%;
    border:1px solid black;
    background-color:white;
}
/* トップへ戻るボタン */
        #content{
            position: relative;
        }

        #topBtn {
            /*-----必須-----*/
            position: fixed;
            bottom: 10px;
            right: 10px;

            /*-----装飾-----*/
            width: 64px;
            height: 64px;
            line-height: 64px;
            text-align: center;
            background-color: #333;
            color: #fff;
        }
/* モータルウィンドウ(カートに入れるボタン投下後、ぺろんって開くやつ) */
.modal{/*これをしておかないと表示されない*/
    position:absolute;
    display:flex;
    justify-content: flex-end;      /* アイテムを右端に寄せる */
    align-items:center;
}
.modal:hover{
    text-decoration: none;
}
.modal2{/*これをしておかないと表示されない*/
    position:static;
}

#modalWrap {
	display: none;
	background: none;
	width: 100%;
	height: 100%;
	position: fixed;
	top: 10%;
	left: 10%;
	z-index:100;
	overflow: hidden;
}

.modalBox {
	position: fixed;
	width: 85%;
	max-width: 420px;
	height: 0;
	top: 5vw;
    left:0;
    right:0;
    margin:auto;
	overflow: hidden;
	opacity: 1;
	display: none;
	border-radius: 3px;
	z-index:100;
}

.modalInner {
	padding: 10px;
	text-align: center;
	box-sizing: border-box;
	background: rgba(0, 0, 0, 0.7);
	color: #fff;
}
</style>

<script>
$('.modal').on('click', function () {//お気に入りに追加しましたと表示するモーダルウィンドウ
	//.modalについたhrefと同じidを持つ要素を探す
	var modalId = $(this).attr('href');
	var modalThis = $('body').find(modalId);
	//bodyの最下にwrapを作る
	$('body').append('<div id="modalWrap" />');
	var wrap = $('#modalWrap'); wrap.fadeIn('200');
	modalThis.fadeIn('200');
	//モーダルの高さを取ってくる
	function mdlHeight() {
		var wh = $(window).innerHeight();
		var attH = modalThis.find('.modalInner').innerHeight();
		modalThis.css({ height: attH });
	}
	mdlHeight();
	$(window).on('resize', function () {
		mdlHeight();
	});
	function clickAction() {
		modalThis.fadeOut('200');
		wrap.fadeOut('200', function () {
			wrap.remove();
		});
		location.href = "favorite-insert.php?product_id=<?php echo $row['product_id'];?>";//お気に入り追加画面に遷移
	}

	//wrapクリックされたら
	wrap.on('click', function () {
		clickAction();
		return false;
	});

	//2秒後に消える
	setTimeout(clickAction, 1000);
	return false;
	location.href = "favorite-insert.php?product_id=<?php echo $row['product_id'];?>";//お気に入り追加画面に遷移
});

//-------------------------------------------------------

$('.modal2').on('click', function () {//カートに追加しましたと表示するモーダルウィンドウ
	//セレクトボックスの値を取得
	const str = document.getElementById("quantity").value;
	const str2 = "カートに該当商品を"+str+"個追加しました";
	const str3 = "個数を選択してください。";
	//表示する文字を決めてあげる
	if(str>0){
		document.getElementById("modalInner").textContent = str2;
	}else{
		document.getElementById("modalInner").textContent = str3;
	}
	//.modalについたhrefと同じidを持つ要素を探す
	var modalId = $(this).attr('href');
	var modalThis = $('body').find(modalId);
	//bodyの最下にwrapを作る
	$('body').append('<div id="modalWrap" />');
	var wrap = $('#modalWrap'); wrap.fadeIn('200');
	modalThis.fadeIn('200');
	//モーダルの高さを取ってくる
	function mdlHeight() {
		var wh = $(window).innerHeight();
		var attH = modalThis.find('.modalInner').innerHeight();
		modalThis.css({ height: attH });
	}
	mdlHeight();
	$(window).on('resize', function () {
		mdlHeight();
	});

	function clickAction() {
		modalThis.fadeOut('200');
		wrap.fadeOut('200', function () {
			wrap.remove();
		});
		if(str>0){
			document.form.submit();//カート追加画面に遷移
		}
	}

	//wrapクリックされたら
	wrap.on('click', function () {
		clickAction();
		return false;
	});

	//2秒後に消える
	setTimeout(clickAction, 1000);
	return false;
	if(str>0){
		document.form.submit();//カート追加画面に遷移
	}
});
</script>

<?php require 'old/fotter2.php';?>