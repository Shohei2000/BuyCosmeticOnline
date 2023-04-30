<?php require '../header.php'; ?>
<p>店舗を選択してください。</p>
<form action="store-output.php" method="post">
<select name="code">
<option value="100">新宿</option>
<option value="101">秋葉原</option>
<option value="102">上野</option>
<option value="200">横浜</option>
<option value="201">川崎</option>
<option value="300">札幌</option>
<option value="400">仙台</option>
<option value="500">名古屋</option>
<option value="600">京都</option>
<option value="700">博多</option>
</select>
<p><input type="submit" value="確定"></p>
</form>
<?php require '../footer.php'; ?>
