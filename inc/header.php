<header>
    <!-- Header-top  -->
    <div class="header-top">
        <div class="auto-container ">
            <nav class="navbar navbar-expand-lg ">
                <div class="logo">
                    <a href="<?php echo URLROOT ?>" class="navbar-brand text-muted logo "><img class="img-fluid logo"
                            src="<?php echo URLROOT ?>/assets/images/logo.png" alt="Blogcamp"></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon  ">
                        <i class="fa fa-navicon " style="color:#fff; font-size:28px;"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                    <ul class="navbar-nav  clearfix mt-2">
                        <li class="nav-item">
                            <a href="<?php echo URLROOT ?>" class="nav-link text-white ">
                                <h5>Blog</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URLROOT ?>/books" class="nav-link font-weight-bold text-white">
                                <h5>Kitoblar</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URLROOT ?>/course" class="nav-link font-weight-bold text-white">
                                <h5>Kurslar</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URLROOT ?>/portfolio" class="nav-link font-weight-bold text-white">
                                <h5>Portfolio</h5>
                            </a>
                        </li>
                    </ul>

                    <div class="search-boxed ml-auto d-none d-lg-block">
                        <div class="search-box">
                            <form method="GET" action="<?php echo $url_path.'/'; ?>">
                                <div class="form-group">
                                    <input type="text" name="search" value="" placeholder="Qidiruv so'rovini kiriting"
                                        required="">
                                    <button class="shadow-none" type="submit"><span
                                            class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        </nav>
    </div>
    </div>
    <!-- Header-bottom -->
</header>