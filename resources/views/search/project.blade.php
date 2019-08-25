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
                <div class="card m-b-30">
                    <div class="card-body p-md-5 project_follow_body">

                        <div id="morris-area-example" class="dash-chart">
                            <h3 class="mt-0 font-18 ml-md-1 mb-md-4"><span>Search results for : "{{$query}}"</span></h3>


                                <div class="row pl-md-5 pr-md-5 search_project_body">

                                    @if(!empty($member1))
                                    <div class="col-md-4" style="text-align: center">

                                        <img src="{{asset('uploads/user')}}/{{$member1->user->avatar}}" alt="100x100" class="img-thumbnail" style="width: 100px; height: 100px;">
                                        <h5 class="project_title">

                                            {{ucwords($member1->user->name)}}

                                        </h5>
                                        <p><a href="{{route('profile.member', ['uid' => $member1->user->id])}}">see profile</a></p>

                                    </div>
                                    <div class="col-md-4" style="text-align: center;padding-top: 50px">


                                        <h5 class="project_title" style="margin-bottom: 20px">
                                            <a href="{{route('detail.index', ['pid'=>$project->id])}}" style="font-size: 25px;font-weight: bold;">Go to Project</a>
                                        </h5>
                                        <h5 class="project_title" style="font-size: 25px;text-transform: uppercase;">
                                            {{ucwords($project->name)}}
                                        </h5>

                                    </div>
                                    @endif

                                    @if(!empty($member2))
                                    <div class="col-md-4" style="text-align: center">

                                        <img src="{{asset('uploads/user')}}/{{$member2->user->avatar}}" alt="100x100" class="img-thumbnail" style="width: 100px; height: 100px;">
                                        <h5 class="project_title">

                                            {{ucwords($member2->user->name)}}

                                        </h5>
                                        <p><a href="{{route('profile.member', ['uid' => $member2->user->id])}}">see profile</a></p>

                                    </div>
                                    @endif

                                    <div class="col-md-12" style="text-align: center">

                                        <img src="{{asset('uploads/project')}}/{{$project->image}}" alt="180x180" class="img-thumbnail rounded-circle" style="width: 180px; height: 180px;">

                                    </div>

                                        <div class="col-md-4" style="text-align: center">

                                            @if ($totalMember > 3)
                                                <h5 class="project_title">
                                                    <a href="{{route('detail.index', ['pid'=>$project->id])}}">Full list of project’s
                                                        <br>members</a>

                                                </h5>
                                            @else
                                            <h5 class="project_title">
                                                <a href="{{route('detail.index', ['pid'=>$project->id])}}">Followers</a>

                                            </h5>
                                            @endif
                                        </div>
                                        <div class="col-md-4" style="text-align: center">

                                        </div>

                                    @if(!empty($member3))
                                        <div class="col-md-4" style="text-align: center">

                                            <img src="{{asset('uploads/user')}}/{{$member3->user->avatar}}" alt="100x100" class="img-thumbnail" style="width: 100px; height: 100px;">
                                            <h5 class="project_title">

                                                {{ucwords($member3->user->name)}}

                                            </h5>
                                            <p><a href="{{route('profile.member', ['uid' => $member3->user->id])}}">see profile</a></p>

                                        </div>
                                    @endif

                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card m-b-30">
                    <div class="card-body update_project_right">

                        <div id="morris-donut-example" class="dash-chart">
                            <h4>You may also be interested in </h4>
                            @if(Auth::user()->interestedProject())
                                @foreach(Auth::user()->interestedProject() as $project)
                                    <div class="row" style="margin: 0">
                                        <h5 class="project_title"><i class="ion-ios7-arrow-thin-right"></i><a href="{{route('detail.index', ['pid'=>$project->id])}}">{{$project->name}}</a></h5>
                                    </div>
                                @endforeach
                            @endif
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