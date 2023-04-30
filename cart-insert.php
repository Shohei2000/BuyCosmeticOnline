<?php session_start()?>
<?php require 'old/header2.php';?>

	<?php

	if(isset($_SESSION['customer'])){//ログインしていた場合はDBに追加

	    //ユーザーID＆商品IDが該当する行がカートに登録されているか確認するためのSQL
	    $sql = $pdo->prepare('select user_id, product_id, quantity, count(*) as current_count from cart where user_id = ? and product_id = ?');
	    $sql -> execute([$_SESSION['customer']['user_id'],$_REQUEST['product_id']]);
	    $count = 0;

	    foreach($sql as $row){
	    }

	    if($_REQUEST['quantity']!=0){//G3-2-1から送られてくる、$_REQUEST['quantity']のvalue値が0じゃなかった場合に実行する
	        if($row['current_count']==1){//カート内に同一商品がある場合(current_countの出力が1以上)
	            $count = $row['quantity'];//既に格納されている数
	            $sql2 = $pdo -> prepare('update cart set quantity = ? where user_id = ? and product_id = ?');//更新SQL
	            $sql2 -> execute([($count+$_REQUEST['quantity']),$_SESSION['customer']['user_id'],$_REQUEST['product_id']]);
	        }else{//カート内に同一商品がない場合(current_countの出力が0)
	            $sql3 = $pdo -> prepare('insert into cart values(?,?,?)');//追加SQL
	            $sql3 -> execute([$_SESSION['customer']['user_id'],$_REQUEST['product_id'],$_REQUEST['quantity']]);
	        }
	    }else{//G3-2-1から送られてくる、$_REQUEST['quantity']のvalue値が0だった場合は、何もしない。

	    }


	}else{//ログインしていない場合はセッションに追加
	    $product_id=$_REQUEST['product_id'];

	    if(!isset($_SESSION['cart'])){
	        $_SESSION['cart']=[];
	    }
	    $quantity = 0;
	    if(isset($_SESSION['cart'][$product_id])){
	        $quantity = $_SESSION['cart'][$product_id]['quantity'];
	    }

	    $_SESSION['cart'][$product_id]=[
	        'product_name'=>$_REQUEST['product_name'],
	        'price'=>$_REQUEST['price'],
	        'quantity'=>$quantity+$_REQUEST['quantity'],
	        'image_path_1'=>$_REQUEST['image_path_1']
	    ];
	}
	?>


<!-- 	商品詳細ページに移動 パラメーター：product_id -->
	<script>
		location.href = "G3-2-1.php?product_id=<?php echo $_REQUEST['product_id']?>";
	</script>

<?php require 'old/fotter2.php';?>