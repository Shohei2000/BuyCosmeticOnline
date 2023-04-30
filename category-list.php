<!-- ページ左側のカテゴリ 開始 -->
			<div class="col-sm-3 table-bordered" style="background:#EEEEEE;">
				<div class="category">
					<div class="category_name" style="margin-top:1em;">
						<p style="font-size:20px;">□カテゴリ一覧</p>
					</div>
					<div class="category">
						<?php
						echo '<ul style="margin-top:2px; margin-left:-30px;">
						<li>ーーーーーーーーーーーーーーーーーーー</li>
						</ul>';
						foreach($pdo->query('select * from category')as $row){
						    echo     '<ul class="category1 list-unstyled" style="margin-top:2px;">
            							<li>●<a href="G3-1-2.php?category_id='?> <?php echo $row['category_id'].'&page=1'; ?><?php echo'" style="font-size:17px;">'
                                            ?> <?php echo $row['category_name']; ?> <?php echo
                                        '</a></li>
									</ul>';
							echo '<ul style="margin-top:2px; margin-left:-30px;">
							<li>ーーーーーーーーーーーーーーーーーーー</li>
							</ul>';
							}
							//hrefリンクの中に ?category_id=[カテゴリーID]を追加することで、変数を持って遷移先に飛ぶことができる。
							?>
					</div>

					<div class="brand_name" style="margin-top:2em;">
						<p style="font-size:20px;">□ブランド一覧</p>
					</div>
					<div class="brand">
						<?php
						echo '<ul style="margin-top:2px; margin-left:-30px;">
						<li>ーーーーーーーーーーーーーーーーーーー</li>
						</ul>';
						foreach($pdo->query('select * from brand')as $row){
						    echo     '<ul class="brand1 list-unstyled">
            							<li>●<a href="G3-1-3.php?brand_id='?> <?php echo $row['brand_id'].'&page=1'; ?><?php echo'" style="font-size:17px;">'
                                            ?> <?php echo $row['brand_name']; ?> <?php echo
                                        '</a></li>
									</ul>';
									echo '<ul style="margin-top:2px; margin-left:-30px;">
						<li>ーーーーーーーーーーーーーーーーーーー</li>
						</ul>';
							}
							//hrefリンクの中に ?brand_id=[ブランドID]を追加することで、変数を持って遷移先に飛ぶことができる。
							?>
					</div>
				</div>
			</div>
<!-- ページ左側のカテゴリ 終了 -->

<style>
.category1,.brand1{
    margin-left:1em;
}
a:link, a:visited, a:hover, a:active {
  color: #808080;
}
</style>