        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu" @if(Request::is('detail/*')) style="background: #EEFFBE" @endif>

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
                            @if(Request::is('detail/*'))
                            <li class="menu-title">
                                <div class="">

                                     <img src="{{asset('uploads/project')}}/{{$project->image}}" class="img-thumbnail" style="width: 180px; height: 180px;">

                                </div>
                            </li>

                            <li class="@if(Request::is('detail/*')) detail @endif">
                                <a class="waves-effect p" style="text-align: center"><span> {{$project->name}} <span class="pull-right"></span> </span> </a>
                            </li>

                            <li class="detail">

                                @if($project->beMemberofProject())
                                    @if(Auth::user()->id == $project->user_id)
                                    <a href="" style="text-align: center;color: #E46C0A;font-weight: 600">Your are an Administrator of this project</a>
                                    @else
                                        <a href="" style="text-align: center;color: #E46C0A;font-weight: 600">Your are an Member of this project</a>
                                    @endif
                                @else
                                    @if($project->hasFollowPending())
                                        <a href="" style="text-align: center;"><i class="fa fa-circle-o-notch"></i><span>Follow Pending</span></a>
                                    @else
                                        <a class="waves-effect" href="{{ route('project.follow', ['pid' => $project->id]) }}"  style="@if( $project->followerofProject()) color: grey;cursor: default;@else color: #E46C0A; @endif text-align: center" ><span>Follow this project</span></a>
                                    @endif
                                @endif

                            </li>
                            @else
                                <li class="menu-title">
                                    <div class="">

                                    <img src="{{Auth::user()->getAvatarURL()}}" alt="200x200" class="img-thumbnail" style="width: 180px; height: 180px;">

                                    </div>
                                </li>
                                <li class="detail">
                                    <a href="{{route('member.info', ['id'=>Auth::user()->id])}}" class="waves-effect detail_project_title"><span> {{ucwords(Auth::user()->getName())}} <span class="pull-right"></span> </span> </a>
                            @endif
                            <li class="menu-title" style="margin-top: 0px !important;"></li>
                            @if(!Request::is('detail/*'))
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><span><i class="mdi mdi-chevron-right"></i>My Profile <span class="pull-right"></span> </span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('profile.index')}}">Edit Profile</a></li>
                                </ul>

                            </li>
                            @endif
                            <li class="@if(Request::is('detail/*')) detail @endif">
                                @if(Request::is('detail/*'))
                                        <a href="{{route('detail.index', ['pid' => $project->id])}}" class="waves-effect"><span><i class="mdi mdi-chevron-right"></i> About {{$project->name}} <span class="pull-right"></span> </span> </a>
                                @else
                                <a href="{{route('project.index')}}" class="waves-effect"><span><i class="mdi mdi-chevron-right"></i> My Project
                                        {{--<span class="detail_member_count">{{Auth::user()->myProjects()->count()}}</span>--}}
                                    </span> </a>
                                    {{--<ul class="list-unstyled">--}}

                                        {{--@if(Auth::user()->myProjects()->count()>0)--}}
                                            {{--@foreach(Auth::user()->myProjects() as $project)--}}
                                                {{--<li><a href="{{route('detail.index', ['pid' => $project->id])}}">{{ucwords($project->name)}}</a></li>--}}
                                            {{--@endforeach--}}
                                        {{--@endif--}}
                                    {{--</ul>--}}
                                @endif
                            </li>
                            <li class="has_sub @if(Request::is('detail/*')) detail @endif">
                                @if(Request::is('detail/*'))
                                    <a href="javascript:void(0);" class="waves-effect"><span><i class="mdi mdi-chevron-right"></i>Members <span class="detail_member_count">{{$members->count()}}</span><span class="pull-right"></span> </span> </a>
                                    <ul class="list-unstyled">

                                        @foreach($members as $member)
                                        <li><a href="{{route('profile.member', ['uid' => $member->user->id])}}">{{ucwords($member->user->getName())}}</a></li>
                                        @endforeach
                                    </ul>
                                @else

                                <a href="{{route('projectFollow.index')}}" class="waves-effect"><span><i class="mdi mdi-chevron-right"></i>Projects I follow<span><span class="detail_member_count">{{Auth::user()->followingProject()->count()}}</span></span>  </span> </a>
                                <ul class="list-unstyled">

                                    @if(Auth::user()->followingProject()->count() > 0)
                                        @foreach(Auth::user()->followingProject() as $project)
                                            @if($project->id != Auth::user()->id)
                                                <li><a href="{{route('detail.index', ['pid'=>$project->followable->id])}}">{{$project->followable->name}}</a></li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>

                                @endif
                            </li>
                            <li class="@if(Request::is('detail/*'))has_sub detail @endif">
                                @if(Request::is('detail/*'))
                                    <a href="javascript:void(0);" class="waves-effect"><span><i class="mdi mdi-chevron-right"></i> Followers <span class="detail_member_count">{{$followers->count()}}</span><span class="pull-right"></span> </span> </a>
                                    <ul class="list-unstyled">
                                        @foreach($followers as $follower)
                                            <li><a href="{{route('profile.member', ['uid'=>$follower->user->id])}}">{{ucwords($follower->user->getName())}}</a></li>
                                        @endforeach
                                    </ul>
                                @else
                                <a href="{{route('notification')}}" class="waves-effect"><span><i class="mdi mdi-chevron-right"></i> Personal <br> <span style="padding-left: 22px">Notifications</span>
                                        @if(Auth::user()->notificationUnread() != 0) <span class="detail_notify_count">{{Auth::user()->notificationUnread()}}</span> @endif<span class="pull-right"></span> </span> </a>

                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->