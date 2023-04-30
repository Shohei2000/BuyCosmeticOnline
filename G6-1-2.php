<?php session_start()?>
<?php require 'old/header2.php';?>

<?php
    $_SESSION['rating']=$_REQUEST['rating'];
    $_SESSION['reviewtitle']=$_REQUEST['reviewtitle'];
    $_SESSION['reviewcontent']=$_REQUEST['reviewcontent'];

    $sql=$pdo->prepare('select * from product where product_id=?');
    $sql->execute([$_REQUEST['product_id']]);

    foreach($sql as $row){
        $_SESSION['product_id']=$row['product_id'];
        $_SESSION['product_name']=$row['product_name'];
        $_SESSION['image_path_1']=$row['image_path_1'];
    }

    // $_REQUEST['product_name']=$product_name;
?>


<div class="main-container" style="margin:0 5%;">
    <div class="row">
        <div class="col-sm-12" style="margin:1vw 0;">
            <label class="font-size15" style="font-weight:bold;">この商品をレビュー</label>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
        <!-- 商品アイコン -->
            <div style="width:100%; height:100%;">
                <img src="<?php echo $_SESSION['image_path_1'];?>" style="width:100%; border:1px solid black;">
            </div>
        </div>
        <div class="col-sm-10">
        <label><?php echo $_SESSION['product_name'];?></label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <hr>
        </div>
    </div>

<form action="G6-1-3.php" method="post" style="margin:0 10%;">
    <div style="border:1px solid black;">
    <div style="margin:2% 2%">
        <div class="row">
            <div class="col-sm-12">
                <label class="font-size15">総合評価</label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="margin:1vw 1.5vw;">
            	<?php
            	for($i=0; $i<$_SESSION['rating']; $i++){
            	   echo '<lable style=""><img style="height:40px;" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=" alt="GRAYCODE"></lable>';
            	}

            	for($i=0; $i<(5-$_SESSION['rating']); $i++){
            	    echo '<lable style=""><img style="height:40px;" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=" alt="GRAYCODE"></lable>';
            	}
            	?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="reviewtitle">レビュータイトル</label>
                    <p><?php echo $_SESSION['reviewtitle'];?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="reviewcontent">レビュー内容</label>
                    <p><?php echo $_SESSION['reviewcontent'];?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-warning text-white float-right" style="margin-left:1vw;">確認画面へ</button>
            	<button type="button" class="btn bg-secondary text-white float-right" onclick="history.back();">訂正する</button>
            </div>
        </div>
    </div>
	</div>
</form>
</div>

<style>
p,label{
    margin:0;
    padding:0;
}
.font-size15{
    font-size:1.5vw;
}
</style>



<?php require 'old/fotter2.php';?>