<?php session_start();?>
<?php require 'old/header2.php';?>

<div class ="container mt-3 mb-1">
    <div class = "row m-0">
        <div class = "col offset-1">
            <h3 class="pl-3 pt-3">カード情報</h3>
        </div>
    </div>
    <div class="row pr-5">
        <div class = "col-3 offset-9 pb-3">
        	<input type="button" value="カード情報を追加する" onclick=location.href="G4-4-2.php">
        </div>
    </div>
</div>

<?php 
	$sql=$pdo->prepare('select * from card where user_id=?');
    $sql->execute([$_SESSION['customer']['user_id']]);
	echo '<div class="container">';
    foreach($sql as $row){
		$cardnumber = $row['card_number'];
        $num = $cardnumber%10000;
		echo   '<div class="row mb-5 ml-5 mr-5">
					<div class="col border p-0 mr-5 ml-5 ">
						<div class="row mt-2 mr-5 ml-5 ">
							<div class="col-6 m-3">
								<h5>カード番号</h5>
                     			<p class = "mt-3">**** **** **** ',$num,'</p>
                    		</div>
                    		<div class="col-2 offset-3 d-flex align-items-end pb-3">
                    			<div class="row">
                    				<a class="text-right" href="delete-card.php?card_number=', $cardnumber,'">削除</a>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                </div>';
	}
?>
		</div>
<?php require 'old/fotter2.php';?>
