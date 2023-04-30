<?php require '../old/header2.php';?>

	<?php

	$sql1 = 'select * from product product_id ASC';//古い順
	$sql2 = 'select * from product product_id ASC';//新着順

	$sql3 = 'select *,sum(details.order_qty) as total_qty from details,orders,customer,product,series
        	where
                details.order_id = orders.order_id and
                details.product_id = product.product_id and
                orders.user_id = customer.user_id and
                product.series_id = series.series_id and
                customer.gd_class = 1
                    group by product.product_id
                        having total_qty > 0
                            order by total_qty DESC;';//男性用ランキング
	$sql4 = 'select * from product where present > 0 order by present DESC';//プレゼントランキング
	//G-3-1-4画面のSQL(商品表示)終了

	//G-3-1-4画面のSQL(ページネーション(カウント))開始
	$sql1_page ='select count(*) as count from product left outer join series on product.product_id = series.series_id';
	$sql2_page ='';
	$sql3_page ='';
	$sql4_page ='';

	//G-3-1-4画面のSQL(ページネーション(カウント))終了

	$sort_sql_ary = array('1' => "$sql1",'2' => "$sql2",'3' => "$sql3",'4' => "$sql4");//商品表示SQL
	$sort_page_ary = array('1' => "$sql1_page",'2' => "$sql2_page",'3' => "$sql3_page",'4' => "$sql4_page");//ページネーション用SQL
	$sort_name_ary = array('1' => 'New','2' => '女性用ランキング','3' => '男性用ランキング','4' => 'プレゼントランキング');

	//-------------------------------------------------

	if(isset($_GET['page'])){
	    $sql = $sort_sql_ary['$page'];
	}else{
	    $sql = "select * from product";
	}
	   $sql = $pdo -> prepare($sql);
	   $sql -> execute();

	   foreach ($sql as $row){
	       echo $row['product_id'];
	       echo '     ';
	       echo $row['product_name'];
	       echo '<br>';
	   }
	?>

	<form action="Sort.php" method="post">
		<select name="sort">
			<option value="1">古い順</option>
			<option value="2">新しい順</option>
		</select>
	</form>



<?php require '../old/fotter2.php';?>