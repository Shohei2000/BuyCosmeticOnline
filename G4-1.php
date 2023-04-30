<?php session_start();?>
<?php require 'old/header2.php';?>
<div class="container mt-5">
	<div class="row border-bottom">
		<div class="col-9"><h3>閲覧履歴</h3></div>
		<div class="col-3"></div>
	</div>
	<div class="row mt-3 border-bottom">
		<?php
			$sql=$pdo->prepare('select * from history,product,series where history.user_id = ? and history.product_id = product.product_id and product.series_id = series.series_id');
			$sql->execute([$_SESSION['customer']['user_id']]);
			$count=0;
			foreach($sql as $row){
				$count+=1;
			}
			echo '<div class="col-8"><h6 style="margin-left:2vw;">全',$count,'件</h6></div>
	</div>';
			if($count==0){
				echo '<div class="row m-3">
					  	<div class="col-6 offset-5">
							<p>閲覧した商品がありません</p>
						</div>
					  </div>';
			}
		?>

	<?php
		$sql=$pdo->prepare('select * from history,product,series where history.user_id=? and history.product_id=product.product_id and product.series_id=series.series_id order by history_date DESC');
		$sql->execute([$_SESSION['customer']['user_id']]);
		foreach($sql as $row){
			$product_name=$row['product_name'];
			$image_path_1=$row['image_path_1'];
			$history_date=$row['history_date'];
			$price=$row['price'];
			$product_id=$row['product_id'];
			$category_id=$row['category_id'];

			echo '<div class="row">
					<div class="col-2 pl-5">
						<a href="G3-2-1.php?product_id=',$product_id,'"><img src="',$image_path_1,'" class="img-fluid img-thumbnail w-40"></a>
					</div>
					<div class="col-8 pl-5">
						<div class="row mt-4">
							<a href="G3-2-1.php?product_id=',$product_id,'" class="text-body"><h5>',$product_name,'</h5></a>
							<p style="margin-left:1vw;">'?><?php require 'review-star-rate4.php';?><?php echo'</p>
						</div>
						<div class="row">
							<a href="G3-1-2.php?category_id='?> <?php echo $category_id.'&page=1'; ?> <?php echo '">関連の商品を見る</a>
							<p style="margin-left:1vw;">',$history_date,'</p>
						</div>
						<div class="row justify-content-end">
							<div class="col-2 offset-10">
								<a class="text-right" href="history_delete.php?product_id=',$product_id,'">削除</a>
							</div>
						</div>
					</div>
					<div class="col-2 pr-5 mt-3">
						<div class="row">
                            <input type="hidden" id="hidden" value="',$product_id,'">
							<h5>￥',$price,'</h5>
						</div>
						<div class="row">
							<a class="btn btn-danger modal2 w-100" id="modal2" href="#motal2" role="button">カートに入れる</a>
                            <!-- 以下がモーダルで呼ばれる -->
									<div class="modalBox" id="motal2"><!-- idだけ変える -->
										<div id="modalInner" class="modalInner">
											カートに追加しました。
										</div>
									</div>
				    	</div>
						<div class="row">
							<a class="btn btn-light modal w-100" href="#motal">お気に入り</a>
                            <div class="modalBox" id="motal"><!-- idだけ変える -->
										<div id="modalInner" class="modalInner">
											お気に入りに追加しました。
										</div>
									</div>
                            </div>
					</div>
				  </div>
				  <div class="row border-bottom">
				  </div>';

		}
	?>
	</div>
</div>

<style>
.btn{
    font-size:1vw;
}
h5{
    font-size:1.5vw;
}
/* モータルウィンドウ(カートに入れるボタン投下後、ぺろんって開くやつ) */
.modal{/*これをしておかないと表示されない*/
    position:static;
    display:flex;
    justify-content: center;      /* アイテムを右端に寄せる */
    align-items:center;
}
.modal:hover{
    text-decoration: none;
}
.modal2{/*これをしておかないと表示されない*/
    position:static;
    display:inline-block;
}

#modalWrap {
	display: none;
	background: none;
	width: 100%;
	height: 100%;
	position: fixed;
	top: 10%;
	left: 10%;
	z-index: 100;
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
	z-index: 1000;
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
	//hiddenから商品IDを入手してくる
	const str = document.getElementById("hidden").value;
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
		location.href = "favorite-insert2.php?product_id="+str;//お気に入り追加画面に遷移
	}

	//wrapクリックされたら
	wrap.on('click', function () {
		clickAction();
		return false;
	});

	//2秒後に消える
	setTimeout(clickAction, 1000);
	return false;
	location.href = "favorite-insert2.php?product_id="+str;//お気に入り追加画面に遷移
});

//-------------------------------------------------------

//カート追加
$('.modal2').on('click', function () {//カートに追加しましたと表示するモーダルウィンドウ
	//hiddenから商品IDを入手してくる
	const str = document.getElementById("hidden").value;
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
		location.href="cart-insert3.php?product_id="+str;//カート追加画面に遷移
	}

	//wrapクリックされたら
	wrap.on('click', function () {
		clickAction();
		return false;
	});

	//2秒後に消える
	setTimeout(clickAction, 1000);
	return false;
	location.href="cart-insert3.php?product_id="+str;//カート追加画面に遷移

});

</script>
<?php require 'old/fotter2.php';?>