        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="">
                        <!--<a href="index" class="logo text-center">Fonik</a>-->

                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title" style="margin-top: 0px !important;"></li>

                            <li class="menu-title">
                                <div class="">

                                        <img src="{{Auth::user()->getAvatarURL()}}" alt="200x200" class="img-thumbnail" style="width: 180px; height: 180px;">
                                </div>
                            </li>

                            <li class=" detail">
                                <a href="{{route('member.info', ['id'=>Auth::user()->id])}}" class="waves-effect detail_project_title"><span> {{ucwords(Auth::user()->getName())}} <span class="pull-right"></span> </span> </a>
                            </li>

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->