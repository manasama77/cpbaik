<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="<?=site_url('/');?>">Beranda</a></li>
      <li>Berita Baik</li>
    </div>
  </div>
</div>

<section id="blog" class="container">
  <div class="blog">
    <div class="row">
      <div class="col-md-10">

        <?php
        if($this->input->post('keyword') != ''){
        ?>
          <!--div class="blog-item">
            <div class="row">
              <div class="col-xs-12 col-sm-10 blog-content">
                <h4>Pencarian: <?=$this->input->post('keyword');?></h4>
              </div>
            </div>
          </div-->
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
            if(!empty($key->gambar)){
              $thumbnail = base_url('assets/img/berita/'.$key->gambar);
            }
          ?>

            <div class="blog-item">
              <div class="row">

                <div class="col-xs-12 col-sm-10 blog-content">
                  <a href="<?=site_url('berita/read/'.$key->id);?>">
                    <img class="img-responsive img-thumbnail img-blog" src="<?=$thumbnail;?>" width="250px" alt="" />
                  </a>
                  <h4><?=$key->judul;?></h4>
                  <p><?=$key->sekilas;?></p>
                  <a href="<?=site_url('berita/read/'.$key->id);?>" class="btn btn-primary readmore">Read More <i class="fa fa-angle-right"></i></a>
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
        <?=$this->pagination->create_links();?>
        <!--/.pagination-->
      </div>
      <!--/.col-md-8-->

      <!--aside class="col-md-4">
        <div class="widget search">
          <form role="form" class="form" method="post" action="<?=site_url('berita');?>">
            <div class="input-group">
              <input type="text" id="keyword" name="keyword" class="form-control search_box" autocomplete="off" placeholder="Search Here" value="<?php if($this->input->post('keyword') == ''){ echo''; }else{ echo $this->input->post('keyword'); } ?>" required>
              <div class="input-group-addon">
                <button type="submit" class="btn btn-info">Search</button>
              </div>
              <?php
              if($this->input->post('keyword') != ''){
              ?>
                <div class="input-group-addon">
                  <a href="<?=site_url('berita');?>" class="btn btn-warning">Clear</a>
                </div>
              <?php
              }
              ?>
            </div>
          </form>
        </div>

      </aside-->
    </div>
    <!--/.row-->
  </div>
</section>