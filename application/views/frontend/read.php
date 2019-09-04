<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="<?=site_url('/');?>">Home</a></li>
      <li>Berita Baik</li>
    </div>
  </div>
</div>

<section id="blog" class="container">
  <div class="blog">
    <div class="row">
      <div class="col-md-12">

        <?php
        if($this->input->post('keyword') != ''){
        ?>
          <div class="blog-item">
            <div class="row">
              <div class="col-xs-12 col-sm-10 blog-content">
                <h4>Pencarian: <?=$this->input->post('keyword');?></h4>
              </div>
            </div>
          </div>
        <?php
        }
        ?>

        <?php 
        if($arr_berita->num_rows() == 0){
        ?>

          <div class="blog-item">
            <div class="row">

              <div class="col-xs-12 col-sm-10 col-md-offset-2 blog-content">
                <h4>Tidak Ada Berita</h4>
              </div>
            </div>
          </div>
          <!--/.blog-item-->

        <?php
        }else{
        ?>

          <?php
          foreach ($arr_berita->result() as $key): 
            $thumbnail = base_url('assets/img/default-image.jpg');
            if($key->gambar != NULL){
              $thumbnail = base_url('assets/img/berita/'.$key->gambar);
            }
          ?>

            <div class="blog-item">
              <div class="row">
                <div class="col-xs-12 col-sm-2">
                  <div class="entry-meta">
                    <span id="publish_date"><?=date('d M Y', strtotime($key->created_date));?></span>
                    <span style="color:#000;"><i class="fa fa-user"></i> <?=$key->created_name;?></span>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-10 blog-content">
                  <img class="img-responsive img-thumbnail img-blog" src="<?=$thumbnail;?>" width="200px" alt="" />
                  <h4><?=$key->judul;?></h4>
                  <p>
                    <?php
                    echo $key->isi
                    ?>
                  </p>
                  <hr>
                  <a href="<?=site_url('berita');?>" class="btn btn-info readmore"><i class="fa fa-angle-left"></i> Kembali</a>
                </div>
              </div>
            </div>
            <!--/.blog-item-->

        <?php 
          endforeach ;
        }
        ?>

        <!--ul class="pagination pagination-lg">
          <li><a href="#"><i class="fa fa-long-arrow-left"></i>Previous Page</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">Next Page<i class="fa fa-long-arrow-right"></i></a></li>
        </ul-->
        <!--/.pagination-->
      </div>
      <!--/.col-md-8-->
    </div>
    <!--/.row-->
  </div>
</section>