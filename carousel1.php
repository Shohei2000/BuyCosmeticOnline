        <!-- カルーセル1開始 -->
        <div style="margin-top:1vw;">
        	<p style="margin:0; padding:0.5vw 10% 0 10%; color:white; background-color:lightgray; font-size:1.5vw;">この商品に関連する商品</p>
        </div>
		<div id="myCarousel1" class="recomend_carousel-container carousel slide" data-ride="carousel">
			<div class="recomned_carousel_inner carousel-inner">
				<div class="carousel-item recomend_carousel_item carousel-item active">
					<ul class="recomend_items_container">
						<?php
						$sql = $pdo ->prepare('select * from product inner join series
                                                	on product.series_id = series.series_id
                                                     where series.category_id = ?
                                                        group by product_id order by product_id DESC limit 7');
						$sql ->execute([$category_id]);
						foreach($sql as $row){
						    $product_id = $row['product_id'];
						    $image_path_1 = $row['image_path_1'];
						    echo '<li class="recomend_item_li"><a href="G3-2-1.php?product_id='?><?php echo $product_id; ?><?php echo '"><img class="recomend_image" src="'?><?php echo $image_path_1; ?><?php echo '"></a></li>';
						}
						?>
					</ul>
				</div>
					<?php
					$sql = $pdo ->prepare('select * ,count(*) as count from product,series where product.series_id = series.series_id and series.category_id = ?');
					$sql -> execute([$category_id]);
					foreach($sql as $row){
					    $count = $row['count'];
					}
					if($count>6){
					    echo '<div class="carousel-item recomend_carousel_item carousel-item">';
					    echo '<ul class="recomend_items_container">';
					    $sql = $pdo ->prepare('select * from product inner join series
                                                	on product.series_id = series.series_id
                                                     where series.category_id = ?
                                                        group by product_id order by product_id DESC limit 6 offset 8');
    					    $sql ->execute([$category_id]);
    					    foreach($sql as $row){
    					        $product_id = $row['product_id'];
    					        $image_path_1 = $row['image_path_1'];
    					        echo '<li class="recomend_item_li"><a href="G3-2-1.php?product_id='?><?php echo $product_id; ?><?php echo '"><img class="recomend_image" src="'?><?php echo $image_path_1; ?><?php echo '"></a></li>';
    						}
					    echo '</ul>';
					    echo '</div>';
					}
					?>
			</div>
			<a class="carousel-control-prev" href="#myCarousel1" role="button" data-slide="prev" style="width:10%; height:10vw;">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#myCarousel1" role="button" data-slide="next" style="width:10%; height:10evw;">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
        <!-- カルーセル1終了 -->