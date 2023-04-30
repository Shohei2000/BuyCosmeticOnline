<?php require '../template/header.php';?>

<?php
    if(isset($_REQUEST['mail'])){
        echo 'お買い得情報のメールをお送りさせていただきます。';
    }else{
        echo 'お買い得情報のメールはお送りさせていただきません。';
    }

?>

<?php require '../template/fotter.php';?>