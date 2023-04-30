<?php session_start()?>
<?php require 'old/header2.php';?>

	<?php

	$sql = $pdo->prepare('select user_id, product_id, quantity, count(*) as current_count from cart where user_id = ? and product_id = ?');
	$sql -> execute([$_SESSION['customer']['user_id'],$_GET['product_id']]);//GETでもREQUESTでも、URLパラメータは取得可能
	$count = 0;

	foreach($sql as $row){
	}

    if($row['current_count']==1){//カート内に同一商品がある場合(current_countの出力が1以上) current_countはSQL文内でASで名付け
        //何もしない
    }else{//カート内に同一商品がない場合(current_countの出力が0)
      $sql3 = $pdo -> prepare('insert into cart values(?,?,1)');//追加SQL
      $sql3 -> execute([$_SESSION['customer']['user_id'],$_REQUEST['product_id']]);
    }
	?>


	<script>
		location.href = "G4-1.php";
	</script>

<?php require 'old/fotter2.php';?>