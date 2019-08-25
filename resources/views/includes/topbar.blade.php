            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0">

                                <!-- User-->
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="{{route('home')}}" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <img src="{{Auth::user()->getAvatarURL()}}" alt="user" class="rounded-circle">
                                        <span class="auth_name">{{ucwords(Auth::user()->name)}}</span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <a class="dropdown-item" href="{{route('home')}}"><i class="dripicons-user text-muted"></i>Go to my Profile</a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"s
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="dripicons-exit text-muted"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>

                            <ul class="list-inline mb-0" style="position: absolute;left: 44%;width: 20%">
                                <div class="search-bar" style="padding-top: 25px">
                                    <form id="searchForm" method="post" action="{{route('search.index')}}">
                                        {{ csrf_field() }}
                                        <input class="search-input form-control" id="search" name="search" type="search" value="@if (!empty($query)){{ $query}} @endif" placeholder="Search" />
                                        <div id="resultList"></div>
                                    </form>
                                </div>
                            </ul>
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">
                                        <a href="{{route('home')}}" class="logo"><img src="{{asset('assets/images/logo.png')}}" height="70" alt="logo"></a>
                                    </h3>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                        </nav>

                    </div>