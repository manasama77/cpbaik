<header>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="top:0px !important; min-height:40px !important;">
    <div class="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse" style="margin-top:5px !important;margin-bottom:5px !important;">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--div class="navbar-brand" style="margin-top:0px;">
            <a href="<?=site_url('/');?>">
              <h1 style="color:#FF6347; margin-top:-20px !important; padding-top: 3px !important; ">
                <img src="<?=base_url('assets/img/logo_sm.png');?>" style="width:50px;" alt="LOGO BAIK SMALL">
                <span style="color:#0000FF">BAYTUL
                </span>IKHTIAR
              </h1>
            </a>
          </div-->
        </div>

        <div class="navbar-collapse collapse">
          <div class="menu">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation">
                <a href="<?=site_url('/');?>" <?=($this->uri->segment(1)=="" || $this->uri->segment(1)=="")? 'class="active"' : ''?> >Beranda</a>
              </li>
              <li role="presentation">
                <a href="<?=site_url('tentangkami');?>" <?=($this->uri->segment(1)=="tentangkami")? 'class="active"' : ''?> >Tentang Kami</a>
              </li>
              <li role="presentation"><a href="<?=site_url('berita');?>" <?=($this->uri->segment(1)=="berita")? 'class="active"' : ''?>>Berita Baik</a></li>
              <li role="presentation"><a href="<?=site_url('kisah');?>" <?=($this->uri->segment(1)=="kisah")? 'class="active"' : ''?>>Kisah Baik</a></li>
              <li role="presentation">
                <a href="<?=site_url('hubungi');?>" <?=($this->uri->segment(1)=="hubungi")? 'class="active"' : ''?>>Hubungi Kami</a>
              </li>
              <li role="presentation">
                <a href="#" data-toggle="dropdown">
                  Login <span class="fa fa-caret-down"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?=site_url('login/anggota');?>">Anggota</a></li>
                  <li><a href="<?=site_url('login/karyawan');?>">Karyawan</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        
      </div>
    </div>
  </nav>
</header>