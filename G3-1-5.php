<!--
header2 の id="serchbox_container" を action="G3-1-5.php" method="get" に変更
同form内に <input type="hidden" name="page" value=1> を追加
-->

<?php session_start()?>
<?php
//空白で検索ボタンを押したときに、Mainpageに遷移
if(isset($_GET['search'])){
    if(empty($_GET['s'])){
        $success_url="Mainpage.php";
        ?>
        <script>
        	location.href ="<?php echo $success_url;?>"
        </script>
        <?php
    }
}
?>
<?php require 'old/header2.php';?><!-- header2.php -->
<?php require 'old/array.php';?><!-- array.php -->
<?php require 'print-customer-name.php';?><!-- 会員登録(無料) -->
<?php require 'carousel-top.php';?><!-- カルーセルトップ -->

	<div class="container-fluid">
		<div class="row">
		    <?php require 'category-list.php';?><!-- カテゴリー,ブランドリスト -->
			<div class="col-sm-9 table-bordered">
    			<div class="row">
    				<!-- 1列目 New 開始 -->
    				<div class="col-sm-12 table-bordered">
    					<div class="main1" style="margin:1em;">
    						<div class="main1_title">
    							<div class="row">
    								<div class="col-sm-6">
			   							<label class="main_lable1"><?php echo $_GET['s'];?>の検索結果</label>
    								</div>
    								<div class="col-sm-6" style="display:flex; justify-content:flex-end; align-items:center; padding-right:2vw;">
    									<select class="sort" id="" name="sort" onChange="location.href=value;" style="height:2vw; font-size:1vw;">
    										<?php $select_sort = $_GET['select_sort'];?>
    										<option value="G3-1-5.php?page=1&s=<?php echo $_GET['s'];?>&page=1&select_sort=1" <?php if($select_sort==1){echo 'selected';}?>>新着順</option>
    										<option value="G3-1-5.php?page=1&s=<?php echo $_GET['s'];?>&page=1&select_sort=2" <?php if($select_sort==2){echo 'selected';}?>>価格の高い順</option>
    										<option value="G3-1-5.php?page=1&s=<?php echo $_GET['s'];?>&page=1&select_sort=3" <?php if($select_sort==3){echo 'selected';}?>>価格の低い順</option>
    									</select>
    								</div>
    							</div>
    						</div>
    						<hr>
    						<div class="row">
    							<?php
                                $count=0;
    							$offset_page=($_REQUEST['page']*8)-8;//例)1ページ目だとデーターの0行目から 2ページ目からだとデータの4行目から表示(数字を8に変更した場合は、1ページあたり8件表示) ※ここの変更に合わせて、下のlimitの後ろの数字と、ページネーションの数も変更!
    							$sql = "select * from product inner join series on product.series_id = series.series_id where product_name like ? ";
    							$limit_offsset = "limit 8 offset $offset_page";

    							if(isset($select_sort)){//もしセレクトボックスで並び替えが選択された場合は実行する
    							    $sort = $select_sort_ary[$select_sort];//array.phpファイルから該当するSQLを引っ張ってくる[1新着,2高い順,3安い順,4レビュー]
    							    $sql=$pdo->prepare($sql.$sort.$limit_offsset);
    							}else{
    							    $sort = $select_sort_ary[1];//array.phpファイルから該当するSQLを引っ張ってくる[新着順]
    							    $sql=$pdo->prepare($sql.$sort.$limit_offsset);
    							}

    							$check = $sql->execute(['%'.$_GET['s'].'%']);

    							    foreach($sql as $row){
    							        $product_id = $row['product_id'];
    							        $count++;
    							    echo    '<div class="item_container col-sm-3">
                    							<div class="item container-fulid">
                                                    <div class="item_border container-fulid">
                                                         <a href="G3-2-1.php?product_id='?> <?php echo $row['product_id']; ?> <?php echo '">
                                                            <img class="item_img" src="'?> <?php echo $row['image_path_1']; ?> <?php echo '" alt="item"></a>
                                                    </div>
                                                    <div class="item_name_container container-fulid">
                                                        <a class="font-size1" href="G3-2-1.php?product_id='
                                                            ?> <?php echo $row['product_id']; ?> <?php echo '">'?> <?php echo $row['product_name']; ?> <?php echo '</a>
                                                    </div>
                                                    <div class="item_late_container container-fulid">
                                                        '?><?php require 'review-star-rate4.php';?><?php echo '
                                                    </div>
                                                    <div class="item_price_container container-fulid">
                                                        <p class="font-size1">'?> <?php echo $row['price']; ?> <?php echo '円</p>
                                                    </div>
                    							</div>
                    						</div>';
    							    }//foreach終了
    							    if($count==0){
    							        echo '<h5 style="margin:1vw;">該当する商品が現在ございません。<br>商品が追加されるまでお待ちください。</h5>';
    							    }
    							?>
    						</div><!-- row -->
    						<!-- ページ変更画面(ページネーション) 開始-->

    						<div class="" style="text-align:center;">
    							<ul class="pagination">
                                  <li><a href="G3-1-5.php?s=<?php echo $_GET['s'];?>&page= <?php if($_REQUEST['page']!=1){echo $_REQUEST['page']-1;}else{echo '1';}?><?php if(isset($select_sort)){echo '&select_sort='.$select_sort;}?>">«</a></li>
                                  <li><a class="<?php if($_REQUEST['page']==1){echo 'active';}?>" href="G3-1-5.php?s=<?php echo $_GET['s'];?>&page=1<?php if(isset($select_sort)){echo '&select_sort='.$select_sort;}?>">1</a></li>
                                  <?php
                                  $sql = "select *,count(*) as count from product inner join series on product.series_id = series.series_id where product_name like ? ";
                                  $sql=$pdo->prepare($sql);
                                  $check = $sql->execute(['%'.$_GET['s'].'%']);

                                  foreach($sql as $row){
                                    $count = $row['count'];
                                    $pages = ceil($count/8);//例)1画面に4件表示するとして、商品が8件あった場合は2ページ ※ $offsetと一緒に変更する

                                    if($pages > 1){
                                        for($i = 2; $i<=$pages; $i++){
                                            echo '<li><a class="'?><?php if($_REQUEST['page']==$i){echo 'active';}?><?php echo'"href="G3-1-5.php?s='?><?php echo $_GET['s'];?><?php echo '&page='?><?php echo $i;?><?php if(isset($select_sort)){echo '&select_sort=',$select_sort;};?><?php echo '">';
                                            echo $i;
                                            echo '</a></li>';
                                        }
                                    }
                                  }

                                  ?>
                                  <li><a href="G3-1-5.php?s=<?php echo $_GET['s'];?>&page=<?php if($_REQUEST['page']<$pages){echo $_REQUEST['page']+1;}else{echo $_GET['page'];}?><?php if(isset($select_sort)){echo '&select_sort=',$select_sort;};?>">»</a></li>
                                </ul>
    						</div>
    						<!-- ページ変更画面(ページネーション) 終了 -->
    					</div>
    				</div>
    				<!-- 1列目 New 終了 -->
					<?php require 'brandlogo.php';?><!-- ブランドロゴ -->
    			</div>
			</div>

		</div><!-- row -->

	</div><!-- container-fulid -->


	<style>
        p{
            margin:0;
        }
        .category1{
            margin-left:1em;
        }
        ul{
            margin:0;
        }
        .main1_title{
        }
        hr{
            margin:0;
        }
	   	.main_button1{
	   	   margin-left:1em;
    	   width:10em;
    	   font-size:1em;
    	   background-color:gray;
    	   color:white;
    	   border-radius:0.5em;
    	   border:0;
	   }
	   .main_lable1{
	       margin:0;
           font-weight:bold;
           height:1em;
           width:100%;
	   }
	   /*1列目 2列目のCSS 開始*/
	   .item_container{
	       margin:1em 0;
	       text-align:center;
	   }
	   .item{
	       width:100%;
	       height:100%;
	   }
	   .item_border{
	       width:95%;
	       border:solid;
	       border-width:1px;
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
	   /*3列目ロゴCSS開始*/
	   .logo_container{
	       margin:1vw 0;
	       text-align:center;
	   }
	   .logo_img{
	       width:100%;
	       height:auto;
	   }
	   .logo_container_border{
	       border:1px solid gray;
	       width:100%;
	       height:100%;
	   }
	   /*3列目ロゴCSS終了*/
/* 	   ページネーションCSS開始 */
ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination li {display: inline;}

ul.pagination li a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
}

ul.pagination li a.active {
    background-color: gray;
    color: white;
}

ul.pagination li a:hover:not(.active) {background-color: #ddd;}
/*     ページネーションCSS終了 */
	</style>

<?php require 'old/fotter2.php';?>