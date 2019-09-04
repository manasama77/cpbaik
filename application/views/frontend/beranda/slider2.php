<section id="main-slider" class="no-margin" style="width:100% !important;">
  <div class="container-fluid">
    <div id="myCarousel" class="carousel" data-ride="carousel">

      <!-- INDICATOR -->
      <!--ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol-->
      <!-- END INDICATOR -->

      <div class="carousel-inner" role="listbox">

        <div class="item active">
          <img src="<?=base_url('assets/images/slider/slider1.jpeg');?>" class="img-responsive" style="margin:0 auto !important;">
        </div>

        <div class="item">
          <img src="<?=base_url('assets/images/slider/slider2.jpeg');?>" class="img-responsive" style="margin:0 auto !important;">
        </div>

        <div class="item">
          <img src="<?=base_url('assets/images/slider/slider3.jpeg');?>" class="img-responsive" style="margin:0 auto !important;">
        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="background-image: none;">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="background-image: none;">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </div>
</section>