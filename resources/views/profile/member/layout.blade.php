@include('includes/header_start')

<!--Morris Chart CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">

@include('includes/header_end')

<!-- ==================
                         PAGE CONTENT START
                         ================== -->

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9">
                <h2 style="text-align: center;color: #0B7405;margin-bottom: 20px">Profile {{ucwords($member->name)}}</h2>
                <div class="card m-b-30 project_follow_body">
                    <div class="card-body p-md-5">
                        <div id="morris-area-example" class="dash-chart">

                            @yield('membercontent')

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 right-side" style="padding-left: 0;min-height:600px;">
                <h2 style="margin-bottom: 20px">&nbsp;</h2>
                <div class="card" style="background: #9CC29B">
                    <div class="card-body" id="member_rightbar_body">
                        <div id="morris-donut-example" class="dash-chart">

                            <div class="sidebar-inner slimscrollleft">
                                <div id="sidebar-menu">
                                    <ul>
                                        <li class="">
                                            <a href="{{route('member.info', ['mid'=>$member->id])}}" class="waves-effect"><span><i class="mdi mdi-chevron-right"></i>Info <span class="pull-right"></span> </span> </a>
                                        </li>
                                        <li class="has_sub">
                                            <a href="{{route('member.project.following',['mid'=>$member->id])}}" class="waves-effect"><span><i class="mdi mdi-chevron-right"></i>Projects Following<span><span class="detail_member_count">{{$member->followingProject()->count()}}</span></span>  </span> </a>
                                            <ul class="list-unstyled">

                                                @if($member->followingProject()->count() > 0)
                                                    @foreach($member->followingProject() as $project)
                                                        @if($project->id != Auth::user()->id)
                                                            <li><a href="{{route('detail.index', ['pid'=>$project->followable->id])}}">{{$project->followable->name}}</a></li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                        <li class="has_sub">
                                            <a href="javascript:void(0);" class="waves-effect"><span><i class="mdi mdi-chevron-right"></i>Total Partner<span><span class="detail_member_count">{{($member->partners()->count())}}</span></span>  </span> </a>
                                            <ul class="list-unstyled">

                                                @foreach($member->partners() as $partner)
                                                    @if($partner->id != Auth::user()->id)
                                                    <li><a href="{{route('profile.member', ['uid' => $partner->id])}}">{{ucwords($partner->getName())}}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>


    </div> <!-- Page content Wrapper -->

</div> <!-- content -->

@include('includes/footer_start')

<!--Morris Chart-->
<script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('assets/plugins/raphael/raphael-min.js')}}"></script>

<script src="{{asset('assets/pages/dashborad.js')}}"></script>

@include('includes/footer_end')