	<div style="text-align:right; margin:0 1em;">
		<?php
        	if(isset($_SESSION['customer'])){
        	    echo   'こんにちは'."、".$_SESSION['customer']['name']." 様";
        	}else{
        	    echo   '<a href="G1-2-1.php">会員登録(無料)</a>';
        	}
	   ?>
	</div>