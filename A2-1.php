<?php require 'old/header3.php';?>
<body style="background-color:#d1d1d190;">

    <table style="width: 60%; text-align: center;">

        <tr>

            <td style="border:solid 1px #FFFFFF; background-color:#9fd0ffff;"><h4 style="padding-top:5px; color:white;">出品リスト</h4></td>
            <td style="border:solid 1px #FFFFFF; background-color:#444444e5;"><h4 style="padding-top:5px; color:white;">受注リスト</h4></td>
            <td style="border:solid 1px #FFFFFF; background-color:#444444e5;"><h4 style="padding-top:5px; color:white;">新規出品</h4></td>

        </tr>

    </table>

    <h3 style="margin:40px 0px 0px 95px;">出品リスト</h3>
    <form action="A2-1.php" method="get">

        <p style="margin:20px 0px 0px 95px;">

            <input type="text" name="name" style="width:40%; height:36px; background:#f7f7f790;">
            <input type="button" value="検索" style="background-color:#000000; color:white; padding: 5px; width:100px; margin-bottom:3px; border-radius:3px;">

            <a style="margin-left:15px;">絞り込み</a>
            <select name="product1" style="background:#FFFFFF;border:2px solid #6b6b6b90;border-radius: 5px;color: #000000;font-size: 14px;height: 40px;line-height: 30px;text-align: left;text-indent: 5px;vertical-align: middle;width: 150px;margin:-2px 0px 0px 10px;">
                <option value="All" <?php if (filter_input(INPUT_GET, 'product1') == 'All') { echo 'selected'; } ?>>全ての商品</option>
                <option value="リップ" <?php if (filter_input(INPUT_GET, 'product1') == 'リップ') { echo 'selected'; } ?>>リップ</option>
                <option value="コンシーラー" <?php if (filter_input(INPUT_GET, 'product1') == 'コンシーラー') { echo 'selected'; } ?>>コンシーラー</option>
                <option value="アイライナー" <?php if (filter_input(INPUT_GET, 'product1') == 'アイライナー') { echo 'selected'; } ?>>アイライナー</option>
            </select>

            <a style="margin-left:15px;">並び替え</a>
            <select name="product2" style="background:#14141490;border:2px solid#000000;color:#FFFFFF;border-radius: 5px;font-size: 14px;height:40px;line-height:30px;text-align:left;text-indent:5px;vertical-align:middle;width: 150px;margin:-2px 0px 0px 10px;">
                <option value="1" <?php if (filter_input(INPUT_GET, 'product2') == '1') { echo 'selected'; } ?>>商品ID順</option>
                <option value="2" <?php if (filter_input(INPUT_GET, 'product2') == '2') { echo 'selected'; } ?>>シリーズ順</option>
                <option value="3" <?php if (filter_input(INPUT_GET, 'product2') == '3') { echo 'selected'; } ?>>価格の低い</option>
                <option value="4" <?php if (filter_input(INPUT_GET, 'product2') == '4') { echo 'selected'; } ?>>価格の高い</option>
                <option value="5" <?php if (filter_input(INPUT_GET, 'product2') == '5') { echo 'selected'; } ?>>お気に入りが低い</option>
                <option value="6" <?php if (filter_input(INPUT_GET, 'product2') == '6') { echo 'selected'; } ?>>お気に入りが高い</option>
                <option value="7" <?php if (filter_input(INPUT_GET, 'product2') == '7') { echo 'selected'; } ?>>在庫が少ない</option>
                <option value="8" <?php if (filter_input(INPUT_GET, 'product2') == '8') { echo 'selected'; } ?>>在庫が多い</option>
            </select>

        </p>

    </form>


    <table style="width: 87%; text-align: center; margin:20px 0px 0px 95px;">

        <tr>

           <th style="border:solid 1px #000000;"><h4 style="padding-top:5px;">商品ID/シリーズID</h4></th>
           <th style="border:solid 1px #000000;"><h4 style="padding-top:5px;">商品名</h4></th>
           <th style="border:solid 1px #000000;"><h4 style="padding-top:5px;">画像</h4></th>
           <th style="border:solid 1px #000000;"><h4 style="padding-top:5px;">在庫</h4></th>
           <th style="border:solid 1px #000000;"><h4 style="padding-top:5px;">価格</h4></th>
           <th style="border:solid 1px #000000;"><h4 style="padding-top:5px;">公開日</h4></th>
           <th style="border:solid 1px #000000;"><h4 style="padding-top:5px;">★</h4></th>
           <th style="border:solid 1px #000000;"><h4 style="padding-top:5px;">-</h4></th>

        </tr>

    <?php
    $product1 = filter_input(INPUT_GET, 'product1');
    $product2 = filter_input(INPUT_GET, 'product2');
    $pdo = new PDO('mysql:host=localhost; dbname=we will shopping; charset=utf8','root');
    if(strcmp($product1, "All") == 0){
        foreach($pdo->query('select * from series,product where series.series_id=product.series_id')as $row){
            echo '<tr>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
            echo '</tr>';
        }
    }else{
        foreach($pdo->query('select * from series,product,category where series.series_id=product.series_id and series.category_id=category.category_id and category.category_name="',$product1,'"')as $row){
            echo '<tr>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
                echo '<td>',$row['product_id'],'</td>';
            echo '</tr>';
    }
}
    ?>
    </table>


<script type="text/javascript" src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
        $(function(){
            $('select').change(function(){
                $('form').submit();
            });
        });
</script>
</body>
</html>