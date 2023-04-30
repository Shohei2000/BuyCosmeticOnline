<?php

    $pdo = new PDO('mysql:host=localhost; dbname=we will shopping; charset=utf8','root');

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

    $sql->execute([$_REQUEST['number']]);

    echo $_REQUEST['number'];

    foreach ($sql as $row){
        echo $row['product_id'];
        echo $row['product_name'];
        echo $row['category_name'];
        echo $row['brand_name'];
    }






?>