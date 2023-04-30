<!DOCTYPE html>
<html>
<head>
<title>Introduction to jQuery</title>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

  <script type="text/javascript">


    $(document).ready(function () {
      $("#button01").click(function () {
        alert("ボタン1がクリックされました。");
      });

    })
  </script>

</head>
<body>
  <input id="button01" class="button" type="button" value="ボタン1"/>
  <input id="button02" type="button" value="ボタン2" />
  <input id="button03" type="button" value="ボタン3" />
</body>
</html>