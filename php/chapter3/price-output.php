<?php require '../header.php'; ?>
<?php
echo $_REQUEST['price'], '円×';
echo $_REQUEST['count'], '個＝';
echo $_REQUEST['price']*$_REQUEST['count'], '円';
?>
<?php require '../footer.php'; ?>
