<?php session_start();?>
<?php require 'old/header2.php';?>

<div class ="container mt-3 mb-0">
    <div class = "row m-0">
        <div class = "col offset-1">
            <h3 class="pl-3 pt-3">カード情報追加</h3>
        </div>
    </div>
</div>

<div class="container">
<div class = "row">
<div class = "col-2">
</div>
<div class= " col-8 border">
	<form action="insert-card.php" method="post">
    	<div class="row">
        	<div class="col-sm-12">
            	<div class="w-100">
              		<h5>カード番号</h5>
            	</div>

            	<div class="w-100">
                	<input type="textbox" name="card_number">
            	</div>
        	</div>
		</div>

    	<div class="row">
        	<div class="col-sm-6">
            	<div class="w-50">
              		<h5>有効期限</h5>
            	</div>
				<div class="w-100">
                	<input type="textbox" name="term">
            	</div>
        	</div>
        	<div class="col-sm-6">
            	<div class="w-50">
              		<h5>CVV</h5>
            	</div>
            	<div class="w-100">
                	<input type="textbox" name="cvv">
            	</div>
        	</div>

    	</div>

        <div class="row">
            <div class = "col-3 offset-9 ">
            	<input type="submit" value="追加">
        	</div>
        </div>
    </form>
</div>
</div>
<div class = "col-2">
</div>
</div>
<style>
p,div{
    margin:5;
    padding:10px;
}

.border
</style>


<?php require 'old/fotter2.php';?>