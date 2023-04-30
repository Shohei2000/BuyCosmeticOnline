<?php

//★★★★★(5点/5点)のレイアウト(商品詳細画面最下部の顧客ごとのレビュー表示)
//sql2,row2の「2」にしている理由は、3-2-1画面を作っていた頃はforeachの使い方がかわらず、$row[]に利用していたため
//ここでsql,rowとやると、この下の部分のプログラムに影響が出る為です。

//ユーザーIDとパラメータ使用


$sql2 = $pdo ->prepare('select * from review,customer where customer.user_id = review.user_id and customer.user_id = ? and review.product_id = ? ');
$sql2 ->execute([$user_id,$_GET['product_id']]);

    foreach ($sql2 as $row2){
        $evaluation=$row2['evaluation'];

        for($i=0; $i<$evaluation; $i++){//黄色星表示
            echo '<i class="fas fa-star" style="color:#ffdc00;"></i>️';
        }
        for($i=5; $i>$evaluation; $i--){//灰色星表示
            echo '<i class="fas fa-star" style="color:#eae8e1;"></i>️';
        }

        echo '(',$evaluation,'点/5点)';
    }

?>