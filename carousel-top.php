        <!-- カルーセル開始 -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:20em;">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1" class=""></li>
          <li data-target="#myCarousel" data-slide-to="2" class=""></li>
          <li data-target="#myCarousel" data-slide-to="3" class=""></li>
          <li data-target="#myCarousel" data-slide-to="4" class=""></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active" style="height:20em;"><!-- アイテム１ -->
            <div class="carousel-container1 carousel-container">
				<img src="Sample/image/carousel-bg5.png" style="height:320px;">
            </div>
          </div>

          <div class="carousel-item" style="height:20em;"><!-- アイテム2 -->
            <div class="carousel-container2 carousel-container">
				<img src="Sample/image/2y.png" style="height:320px;">
            </div>
          </div>

          <div class="carousel-item" style="height:20em;"><!-- アイテム3 -->
            <div class="carousel-container3 carousel-container">
				<img src="Sample/image/caroussel-bg7-1.png" style="height:320px;">
            </div>
          </div>

          <div class="carousel-item" style="height:20em;"><!-- アイテム4 -->
            <div class="carousel-container4 carousel-container">
				<img src="Sample/image/carousel-bg8.png" style="height:320px;">
            </div>
          </div>

          <div class="carousel-item" style="height:20em;"><!-- アイテム5 -->
            <div class="carousel-container5 carousel-container">
				<img src="Sample/image/5dayo.png" style="width:1000px;">
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div><!-- カルーセル終了 -->

<style>
.carousel-container{
    display:flex;
    align-items:center;
    justify-content:center;
}
.carousel-container1{
    background-color:#a1d8e6;
    background-image:url(Sample/image/carousel-bg5-1.jpg);
    background-size: 500px;
}
.carousel-container2{
    background-color:#470e0e;
    background-size: contain;
}
.carousel-container3{
    background-color:#470e0e;
    background-size: contain;
}
.carousel-container4{
    background-color:#a1d8e6;
    background-size: contain;
}
.carousel-container5{
    background-color:#353535;
    background-size: contain;
}

</style>