<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    	<title>Insert title here</title>
        <script type="text/javascript">
        function previewFile(file) {
        	  // プレビュー画像を追加する要素
        	  const preview = document.getElementById('preview');

        	  // FileReaderオブジェクトを作成
        	  const reader = new FileReader();

        	  // URLとして読み込まれたときに実行する処理
        	  reader.onload = function (e) {
        	    const imageUrl = e.target.result; // URLはevent.target.resultで呼び出せる
        	    const img = document.createElement("img"); // img要素を作成
        	    img.src = imageUrl; // URLをimg要素にセット
        	    preview.appendChild(img); // #previewの中に追加
        	  }

        	  // いざファイルをURLとして読み込む
        	  reader.readAsDataURL(file);
        	}


        	// <input>でファイルが選択されたときの処理
        	const fileInput = document.getElementById('example');
        	const handleFileSelect = () => {
        	  const files = fileInput.files;
        	  for (let i = 0; i < files.length; i++) {
        	    previewFile(files[i]);
        	  }
        	}
        	fileInput.addEventListener('change', handleFileSelect);

            	// ファイルデータ
            	const file = document.getElementById("example").files[0];
            	// フォームデータを作成
            	const formData = new FormData();
            	// avatarというフィールド名でファイルを追加
            	formData.append("avatar", file);
            	// アップロード
            	fetch('Sample/image', { method: "POST", body: formData });
				var a = 199;

            function sample(){
            	  document.getElementById("preview").innerText = a;
            }

        </script>
    </head>

    <body>

<!-- 	<form enctype="multipart/form-data" action="" method="POST"> -->
        <input type="file" id="example" multiple>
        <!-- 👇ここにプレビュー画像を追加する -->
        <div id="preview">aaaaaa</div>
        <input type="button" onclick="sample();">
<!--     </form> -->

	<style>
	#preview img {
  width: 200px;
  margin: 10px;
  border: solid 1px silver;
}
	</style>

    </body>

</html>