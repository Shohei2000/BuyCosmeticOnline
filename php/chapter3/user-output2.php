<?php require '../header.php'; ?>
<?php
if (isset($_REQUEST['user'])) {
	echo 'ようこそ、', $_REQUEST['user'], 'さん。';
}
?>
<?php require '../footer.php'; ?>
