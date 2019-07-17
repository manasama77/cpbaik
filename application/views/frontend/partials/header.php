<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand">
                        <a href="index.html"><h1><span>Baytul</span>Ikhtiar</h1></a>
                    </div>
                </div>

                <div class="navbar-collapse collapse">
                    <div class="menu">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="index.html" class="active">Home</a></li>
                            <li role="presentation"><a href="about.html">About Us</a></li>
                            <li role="presentation"><a href="services.html">Services</a></li>
                            <li role="presentation"><a href="portfolio.html">Portfolio</a></li>
                            <li role="presentation"><a href="blog.html">Blog</a></li>
                            <li role="presentation"><a href="contact.html">Contact</a></li>
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