<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="<?php echo e(url('home')); ?>" class="logo" style="margin-top:20px">
                        <img src="<?php echo e(asset('logo_online.png')); ?>" width="100" alt="YMPI MIRAI"/>
                    </a>
                    <ul class="nav">
                        <li style="background-color:#fff">
                            <a href="<?php echo e(url('home')); ?>" 
                            <?php if(isset($page) && $page == "Dashboard"): ?> class="active" <?php endif; ?>>
                            <i class="fa fa-home"></i> Home</a>
                        </li>
                        <li style="background-color:#fff">
                            <a href="<?php echo e(url('laporan_kesehatan')); ?>" 
                                <?php if(isset($page) && $page == "Laporan Kesehatan"): ?> class="active" <?php endif; ?>>
                                <i class="fa fa-book"></i> Laporan Kesehatan
                            </a>
                        </li>
                        <li style="background-color:#fff">
                             <a href="<?php echo e(url('survey_covid')); ?>" 
                                <?php if(isset($page) && $page == "Survey Covid"): ?> class="active" <?php endif; ?>>
                                <i class="fa fa-heartbeat"></i> Survey Covid
                            </a>
                        </li>

                        <li style="background-color:#fff">
                             <a href="<?php echo e(url('vaksin')); ?>" 
                                <?php if(isset($page) && $page == "Vaksin"): ?> class="active" <?php endif; ?>>
                                <i class="fa fa-heart"></i> Vaksin
                            </a>
                        </li>
                        <li style="background-color:#fff">
                            <a href="<?php echo e(url('pkb')); ?>" <?php if(isset($page) && $page == "PKB"): ?> class="active" <?php endif; ?>>
                                <i class="fa fa-book"></i> PKB
                            </a>
                        </li>
                        <li style="background-color:#fff">
                            <a href="<?php echo e(url('kode_etik')); ?>" <?php if(isset($page) && $page == "Kode Etik"): ?> class="active" <?php endif; ?>>
                                <i class="fa fa-book"></i> Kode Etik
                            </a>
                        </li>
                        <li style="background-color:#fff">
                            <a href="<?php echo e(url('survey_stocktaking')); ?>" 
                                <?php if(isset($page) && $page == "Survey Stocktaking"): ?> class="active" <?php endif; ?>>
                                <i class="fa fa-users"></i> Survey Stocktaking
                            </a>
                        </li>
                        <li style="background-color:#fff">
                           <a href="<?php echo e(url('emergency')); ?>" 
                                <?php if(isset($page) && $page == "Kuisioner Emergency"): ?> class="active" <?php endif; ?>>
                                <i class="fa fa-tty"></i> Kuisioner Emergency
                            </a>
                        </li>
                        <li style="padding-left:0px">
                            <a class="btn btn-danger" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:white;line-height: 30px;"><i class="fa fa-sign-out"></i> Logout</a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </li>
                    </ul>

                    <ul class="nav logout">
                        
                    </ul>


                  
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>

                </nav>
            </div>
        </div>
    </div>
</header>