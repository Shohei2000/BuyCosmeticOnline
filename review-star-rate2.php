<?php

//★★★★★(5点/5点)のレイアウト(商品詳細ページの上部用)
//パラメータ使用,GETで取得

$sql = $pdo ->prepare('select count(*) as count, sum(evaluation) as sum from review where product_id = ?');
$sql -> execute([$_GET['product_id']]);

foreach ($sql as $review_row){
    $review_count=$review_row['count'];//何件レビューがあるか
    $review_sum=$review_row['sum'];//該当商品のレビュー評価の合計
    $overall=0;//総合評価の点数

    if($review_count>0){//該当商品のレビューが0より大きい場合
        $overall=(ceil($review_sum/$review_count));//総合評価の点数(5/5点)
    }

    for($i=0; $i<$overall; $i++){//黄色星表示
        echo '<i class="fas fa-star" style="color:#ffdc00;"></i>️';
    }
    for($i=5; $i>$overall; $i--){
        echo '<i class="fas fa-star" style="color:#eae8e1;"></i>️';
    }

    echo'(',$overall,'点/5点)️</label>';

}
?>