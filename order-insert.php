<?php session_start();?>
<?php require 'old/array.php';?>

<?php
    date_default_timezone_set('Asia/Tokyo');//日本時間に設定(デフォルトではイギリスのベルリン)
    $today = date("Y-m-d H:i:s");//その時間のデーターフォーマット

    try{//PDO呼び出し(ここで呼び出すことによって、下部で呼び出さなくて済む）
        $pdo = new PDO('mysql:host=localhost; dbname=we will shopping; charset=utf8','root');
    }catch(Exception $e){
        echo $e;
    }

    try{
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $pdo ->query('select count(*) as count from orders');
        $sql -> execute();
        foreach ($sql as $row){
            $current_orders_count = $row['count']+1;
        }
    }catch(ErrorException $e){
        echo $e;
    }

    //ordersテーブル(受注テーブル)に格納する場所 開始
    try{
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $pdo -> prepare('insert into orders values(?,?,?,?,?,?,?,?,?)');
        $check = $sql -> execute([$current_orders_count,$_SESSION['customer']['user_id'],$today,$_SESSION['ship_address'],$_SESSION['ship_method_id'],$_SESSION['ship_day'],$_SESSION['ship_time'],$_SESSION['pay_method_id'],$_SESSION['note']]);
    }catch(Exception $e){
        echo $e;
    }
    //ordersテーブル(受注テーブル)に格納する場所 終了

    try{
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $pdo ->prepare('select * from cart where user_id = ?');
        $sql ->execute([$_SESSION['customer']['user_id']]);
        foreach ($sql as $row){
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];

            //小計を求めるために、該当商品の価格を取り出す 開始
            $sql = $pdo ->prepare('select price from product inner join series on product.series_id = series.series_id where product_id = ?');
            $sql -> execute([$product_id]);
            foreach ($sql as $row){
                $price = $row['price'];//該当商品の価格
            }
            $subtotal = $price * $quantity;//該当商品の小計＝個数*価格
            //小計を求めるために、該当商品の価格を取り出す 終了

            //detailsテーブル(受注詳細テーブル)に格納する場所 開始
            $sql = $pdo ->prepare('insert into details values(?,?,?,?)');
            $sql ->execute([$current_orders_count,$product_id,$quantity,$subtotal]);
            //detailsテーブル(受注詳細テーブル)に格納する場所 終了

        }
    }catch(Exception $e){
        echo $e;
    }

    //--------------------------------------------------------------------------------------

    //プレゼントだった場合に、＋1する部分開始
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

    foreach ($sql as $row){
        $product_id = $row['product_id'];
        $current_present = $row['present'];//現在のプレゼント数
        $request_name = 'present-qty'.$product_id;//G5-1-4のセレクトボックスのname属性
        $present_qty = $_REQUEST[$request_name];//G5-1-4のモータルウィンドウ(プレゼント選択画面)から追加する

        if($present_qty>0){//YESの場合
            $sql = $pdo -> prepare('update product set present = ? where product_id = ?');
            $sql -> execute([$current_present+$present_qty,$product_id]);
        }
    }
    //プレゼントだった場合に、＋1する部分終了
    //----------------------------------------------------------------------------------------


    //受注テーブルに追加後、カート内を空っぽにする部分 開始
    $sql2 = $pdo -> prepare('delete from cart where user_id = ?');
    $sql2 -> execute([$_SESSION['customer']['user_id']]);
    //受注テーブルに追加後、カート内を空っぽにする部分 終了

?>

	<script>
		location.href = "G5-1-5.php";
	</script>
