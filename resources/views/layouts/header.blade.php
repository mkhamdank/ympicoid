<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ url('home') }}" class="logo" style="margin-top:20px">
                        <img src="{{ asset('logo_online.png')}}" width="100" alt="YMPI MIRAI"/>
                    </a>
                    <ul class="nav">
                        <li style="background-color:#fff">
                            <a href="{{ url('home') }}" 
                            @if(isset($page) && $page == "Dashboard") class="active" @endif>
                            <i class="fa fa-home"></i> Home</a>
                        </li>
                        <li style="background-color:#fff">
                            <a href="{{ url('laporan_kesehatan') }}" 
                                @if(isset($page) && $page == "Laporan Kesehatan") class="active" @endif>
                                <i class="fa fa-book"></i> Laporan Kesehatan
                            </a>
                        </li>
                        <li style="background-color:#fff">
                             <a href="{{ url('survey_covid') }}" 
                                @if(isset($page) && $page == "Survey Covid") class="active" @endif>
                                <i class="fa fa-heartbeat"></i> Survey Covid
                            </a>
                        </li>
                        <li style="background-color:#fff">
                           <a href="{{ url('data_komunikasi') }}" 
                                @if(isset($page) && $page == "Data Komunikasi") class="active" @endif>
                                <i class="fa fa-phone"></i> Data Komunikasi
                            </a>
                        </li>
                        <li style="background-color:#fff">
                             <a href="{{ url('vaksin') }}" 
                                @if(isset($page) && $page == "Vaksin") class="active" @endif>
                                <i class="fa fa-heart"></i> Vaksin
                            </a>
                        </li>
                        <li style="background-color:#fff">
                            <a href="{{ url('pkb') }}" @if(isset($page) && $page == "PKB") class="active" @endif>
                                <i class="fa fa-book"></i> PKB
                            </a>
                        </li>
                        <li style="background-color:#fff">
                            <a href="{{ url('kode_etik') }}" @if(isset($page) && $page == "Kode Etik") class="active" @endif>
                                <i class="fa fa-book"></i> Kode Etik
                            </a>
                        </li>
                        <li style="background-color:#fff">
                            <a href="{{ url('index/survey_stocktaking') }}" 
                                @if(isset($page) && $page == "Survey Stocktaking") class="active" @endif>
                                <i class="fa fa-users"></i> Survey Stocktaking
                            </a>
                        </li>
                        <li style="background-color:#fff">
                           <a href="{{ url('emergency') }}" 
                                @if(isset($page) && $page == "Kuisioner Emergency") class="active" @endif>
                                <i class="fa fa-tty"></i> Kuisioner Emergency
                            </a>
                        </li>
                        <li style="padding-left:0px">
                            <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:white;line-height: 30px;"><i class="fa fa-sign-out"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
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