<?php require '../template/header.php';?>

<div style=background:red class="th0">商品番号</div>
<div class="th1">商品名</div>
<div class="th1">商品価格</div>

<form action="edit3.php" method="post">
    <input type="hidden" name="command" value="insert">
    <div class="td0"></div>
    <div class="td1"><input type="text" name="name"></div>
</form>

