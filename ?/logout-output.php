<?php session_start();?>

<?php require 'template/header.php';?>
<?php require 'template/menu.php';?>

<?php
if(isset($_SESSION['customer'])){
    unset($_SESSION['customer']);
    echo 'ログアウトしました。';
}else{
    echo 'すでにログアウトしています。';
}
?>

<?php require 'template/fotter.php';?>