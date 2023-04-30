<?php



$pref_ary = array(
    '1'=>'北海道','2'=>'青森県','3'=>'岩手県','4'=>'宮城県','5'=>'秋田県','6'=>'山形県','7'=>'福島県','8'=>'茨城県','9'=>'栃木県','10'=>'群馬県',
    '11'=>'埼玉県','12'=>'千葉県','13'=>'東京都','14'=>'神奈川県','15'=>'新潟県','16'=>'富山県','17'=>'石川県','18'=>'福井県','19'=>'山梨県','20'=>'長野県',
    '21'=>'岐阜県','22'=>'静岡県','23'=>'愛知県','24'=>'三重県','25'=>'滋賀県','26'=>'京都府','27'=>'大阪府','28'=>'兵庫県','29'=>'奈良県','30'=>'和歌山県',
    '31'=>'鳥取県','32'=>'島根県','33'=>'岡山県','34'=>'広島県','35'=>'山口県','36'=>'徳島県','37'=>'香川県','38'=>'愛媛県','39'=>'高知県',"40"=>'福岡県',
    '41'=>'佐賀県','42'=>'長崎県','43'=>'熊本県','44'=>'大分県','45'=>'宮崎県','46'=>'鹿児島県','47'=>'沖縄県');

$gender_ary = array('0' => '未選択','1' => '男性','2' => '女性');

$how_deliver_ary = array('1' => 'ゆうパック','2' => '宅急便');

$time_deliver_ary = array('1' => '9:00〜12:00','2' => '12:00〜15:00','3' => '16:00〜18:00','4' => '19:00〜21:00');

$which_payment_ary = array('1' => '代金引換','2' => 'カード支払い');


//G-3-1-4画面のSQL(商品表示)開始
$sql1 = 'select * from product left outer join series on product.series_id = series.series_id order by product_id DESC';//新着順
$sql2 = 'select *,sum(details.order_qty) as total_qty from details,orders,customer,product,series
        	where
                details.order_id = orders.order_id and
                details.product_id = product.product_id and
                orders.user_id = customer.user_id and
                product.series_id = series.series_id and
                customer.gd_class = 2
                    group by product.product_id
                        having total_qty > 0
                            order by total_qty DESC';//女性用ランキング

$sql3 = 'select *,sum(details.order_qty) as total_qty from details,orders,customer,product,series
        	where
                details.order_id = orders.order_id and
                details.product_id = product.product_id and
                orders.user_id = customer.user_id and
                product.series_id = series.series_id and
                customer.gd_class = 1
                    group by product.product_id
                        having total_qty > 0
                            order by total_qty DESC';//男性用ランキング

$sql4 = 'select * from product,series where product.series_id = series.series_id and present > 0 order by present DESC';//プレゼントランキング
//G-3-1-4画面のSQL(商品表示)終了

//G-3-1-4画面のSQL(ページネーション(カウント))開始
$sql1_page ='select count(*) as count from product left outer join series on product.product_id = series.series_id';
$sql2_page ='select count(*) as count from (select details.product_id from details,orders,customer where details.order_id = orders.order_id AND orders.user_id = customer.user_id and customer.gd_class = 2 GROUP by details.product_id)as T';
$sql3_page ='select count(*) as count from (select details.product_id from details,orders,customer where details.order_id = orders.order_id AND orders.user_id = customer.user_id and customer.gd_class = 1 GROUP by details.product_id)as T';
$sql4_page ='select count(*) as count from product where present > 0';
//G-3-1-4画面のSQL(ページネーション(カウント))終了

$sort1 = 'order by product_id DESC ';//新着順
$sort2 = 'order by series.price DESC ';//価格高い順
$sort3 = 'order by series.price ASC ';//価格低い順

?>

<?php
$sort_sql_ary = array('1' => "$sql1",'2' => "$sql2",'3' => "$sql3",'4' => "$sql4");//商品表示SQL
$sort_page_ary = array('1' => "$sql1_page",'2' => "$sql2_page",'3' => "$sql3_page",'4' => "$sql4_page");//ページネーション用SQL
$sort_name_ary = array('1' => 'New',
                        '2' => '<i class="fas fa-chess-queen"></i> 女性用ランキング',
                        '3' => '<i class="fas fa-chess-king"></i> 男性用ランキング',
                        '4' => '<i class="fas fa-gifts"></i> プレゼントランキング');

$select_sort_ary = array('1' => "$sort1",'2' => "$sort2",'3' => "$sort3");

?>