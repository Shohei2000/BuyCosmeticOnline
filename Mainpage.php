<?php session_start()?>
<?php require 'old/header2.php';?>
<?php require 'old/array.php';?>

<?php require 'print-customer-name.php';?><!-- 会員登録(無料) or アカウント名 -->
<?php require 'carousel-top.php';?><!-- 広告カルーセル -->

	<div class="container-fluid">
		<div class="row">
		    <?php require 'category-list.php';?><!-- カテゴリーリスト -->
			<div class="col-sm-9 table-bordered">
    			<div class="row">

    				<!-- ランキング 開始 -->
    				<?php
    				for($i=1; $i<=4; $i++){
    				?>

    				<div class="col-sm-12 table-bordered">
    					<div class="main1" style="margin:1em;">
    						<div class="main1_title row">
    							<label class="main_lable1"><?php echo $sort_name_ary[$i];?></label></lable>
								<input class="button" type="button" style="border-radius:0.5vw; width:15%;" onclick="location.href='G3-1-4.php?page=1&sort=<?php echo $i;?>'" value="もっと見る">
    						</div>
    						<div class="row">
    							<?php
    							$sql = $sort_sql_ary[$i].' limit 4';
    							$sql = $pdo -> prepare($sql);
    							$sql ->execute();

    							    foreach($sql as $row){
    							        $product_id=$row['product_id'];
    							        $product_name=$row['product_name'];
    							        $image_path_1=$row['image_path_1'];

    							    echo    '<div class="item_container col-sm-3">';
                    				echo    '<div class="item container-fulid">';

                                    echo    '<div class="item_border container-fulid">';
                                    echo    '<a href="G3-2-1.php?product_id=',$product_id,'">';
                                    echo    '<img class="item_img" src="',$image_path_1,'" alt="item"></a>';
                                    echo    '</div>';

                                    echo    '<div class="item_name_container container-fulid">';
                                    echo    '<a class="font-size1" href="G3-2-1.php?product_id=',$product_id,'">',$product_name,'</a>';
                                    echo    '</div>';

                                    require 'review-star-rate4.php';

    							    echo     '<div class="item_price_container container-fulid">';
                                    echo    '<p class="font-size1">'?> <?php echo $row['price']; ?> <?php echo '円</p>';
                                    echo    '</div>';

                    				echo    '</div>';
                    				echo    '</div>';
    							    }//foreach終了
    							?>
    						</div><!-- row -->
    					</div>
    				</div>

    				<?php
                        }
    				?>
    				<!-- ランキング 終了 -->

<?php require 'brandlogo.php';?><!-- ブランドロゴ -->

    			</div>
			</div>
		</div><!-- row -->
	</div><!-- container-fulid -->

    <div id="content" class="top">
        <!-----ここにコンテンツが入る----->
        <a href="#" id="topBtn">TOP</a>
    </div>

	<style>
        p{
            margin:0;
        }
        ul{
            margin:0;
        }
	   .main_lable1{
            font-weight:bold;
            height:1em;
	   }
	   /*1列目 2列目のCSS 開始*/
	   .item_container{
	       margin:1.5em 0;
	       text-align:center;
	   }
	   .item{
	       width:100%;
	       height:100%;
	   }
	   .item_border{
	       width:95%;
	       border:1px solid gray;
	       margin:0 auto;
	   }
	   .item_img{
	       width:100%;
	       height:auto;
	   }
	   .item_name_container{
	       margin-left:0.5em;
	       text-align:left;
	       font-size:1em;
	   }
	   .item_name_container a{
	       color:black;
	   }
	   .item_late_container{
	       font-size:1em;
	   }
	   .item_price_container{
	       text-align:right;
	       width:90%;
	       font-size:1em;
	   }
	   .font-size1{
	       font-size:1.1vw;
	   }
	   /*1列目 2列目のCSS 終了*/
	</style>

<?php require 'old/fotter2.php';?>