<?php session_start();?>
<?php require 'old/header2.php';?>

<?php
    $today = date("Y-m-d");
    $sql=$pdo->prepare('insert into review values(?,?,?,?,?,?)');
    $sql->execute([$_SESSION['product_id'],
                    $_SESSION['customer']['user_id'],
                    $today,
                    $_SESSION['rating'],
                    $_SESSION['reviewtitle'],
                    $_SESSION['reviewcontent']
    ]);
?>

    <div class="main-container" style="margin:5% 10%">
        <div class="row"  >
            <div class="col-sm-12">
                <p class="display-4">完了</p>
            </div>
        </div>

        <div class="row" style="margin:0.5% 1%">
            <div class="col-sm-12">
                <h4>レビューを書いて頂きありがとうございました。<br>引き続きショッピングをお楽しみください。</h4>
            </div>
        </div>

        <div class="row" style="margin:2vw 0;">
            <div class="col-sm-2">
                <div style="width:100%; height:100%;">
                    <img src="<?php echo $_SESSION['image_path_1'];?>" style="width:100%; border:1px solid black;">
                </div>
            </div>
            <div class="col-sm-10">
            <h6><?php echo $_SESSION['product_name'];?></h6>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <hr>
            </div>
        </div>

        <div class="button_container">
			<a class="button" href="Mainpage.php" type="submit" style="width:20%; height:50%; line-height:3vw;">メインページへ戻る</a>
        </div>
	</div>

	<?php
	unset($_SESSION['product_id']);
	unset($_SESSION['reviewtitle']);
	unset($_SESSION['reviewcontent']);
	unset($_SESSION['rating']);
	?>

<style>
p,h4,hr{
    margin:0;
    padding:0;
}
.button_container{
    margin:2vw 5%;
    height:6vw;
    background-color:gray;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:1vw;
}
</style>


<?php require 'old/fotter2.php';?>