<?php require '../old/header2.php';?>


<div class="container">
	<div class="row" style="height:18vw;">
		<div class="col-sm-12" style="border:1px solid black; padding:1vw;">
			<div class="row w-100 h-100">
				<div class="col-sm-4">
					<p>商品画像</p>
					<p>1枚目には全体が見える写真を登録してください。<br>
						<br>
                        異なる角度から撮影した画像などを合わせて登録すると<br>
                        購入者にイメージが伝わりやすくなります。<br>
                     </p>
				</div>
				<div class="col-sm-8 w-100 p-0">
					<div class="row w-100 h-75" style="margin:0 0.5vw 0 0; padding:0.5vw;">
						<div class="col-sm-12 w-100 p-1">
							<div class="row w-100 h-100 no-gutters p-0" style="margin:0 auto;">
								<div class="col-sm-3">
									<div style="width:95%; height:100%; border:1px solid black;">
										<label>
											<div class="a" id="preview" style="float:right;">
												<input id="example" type="file" name="upfile" style="display:none;">
											</div>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<p style="font-size:1vw;">※画像は最大20枚まで登録できます。<br>
								また、長方形の画像は正方形にカットされて、検索結果/商品ページに表示されます<br>
							</p>
						</div>
					</div>

				</div>

			</div>

		</div>


	</div>


</div>

<style>
.container{
    margin:1vw auto;
}
p{
    margin:0.5vw 0 0 0;
    padding:0;
}
label {
padding:0;
margin:0;
width:100%;
height:100%;
}
img{
    width:100%;
    display:inline-block;
    float:left;
}
</style>

<script>
function previewFile(file) {
 const preview = document.getElementById('preview');
 const reader = new FileReader();
 reader.onload = function (e) {
 const imageUrl = e.target.result; // 画像のURLはevent.target.resultで呼び出せる
 const img = document.createElement("img"); // img要素を作成
 img.src = imageUrl; // 画像のURLをimg要素にセット
 preview.appendChild(img); // #previewの中に追加
 }
 reader.readAsDataURL(file);
}
const fileInput = document.getElementById('example');
const handleFileSelect = () => {
 const files = fileInput.files;
 for (let i = 0; i < files.length; i++) {
 previewFile(files[i]);
 }
}
fileInput.addEventListener('change', handleFileSelect);
</script>

</body>

</html>