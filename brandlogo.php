<!-- ブランドロゴ一覧 開始 -->
    				<div class="col-sm-12 table-bordered">
    					<div class="main1" style="margin:1vw 0;">
    						<div class="row">
    							<div class="col-sm-12">
    								<label class="h4">ブランド一覧</lable>
    							</div>
    						</div>
							<div class="row" style="text-align:center;">
								<div class="col-sm-12">
									<div class="row text-center">
										<?php
        								foreach($pdo->query('select * from brand')as $row){
        								    $brand_id = $row['brand_id'];
        								    $brand_name = $row['brand_name'];
                                            $brand_image_path = $row['brand_image_path'];

        								    if(!($brand_image_path=="")){
        								        echo    '<div class="logo_container col-sm-2">';
        								        echo    '<div class="logo_container_border">';
        								        echo    '<a href="G3-1-3.php?brand_id='?> <?php echo $brand_id.'&page=1'; ?><?php echo'">';
                                                echo    '<img class=logo_img src="'?> <?php echo $brand_image_path; ?> <?php echo '" alt="logo" style="width:100%;">';
                                                echo    '</a>';
                                                echo    '</div>';
                                                echo    '</div>';
        								    }
        								}
            							?>
									</div>
								</div>
							</div>
    					</div>
    				</div>
<!-- ブランドロゴ一覧 終了 -->

<style>
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

</style>