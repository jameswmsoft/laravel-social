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
                            <h3 class="mt-0 font-18 ml-md-1 mb-md-4">Projects I Follow - <span>{{count($followProjects)}} Projects</span></h3>

                            @if (!$followProjects->count())
                                <p style="margin-left: 5px">There aren't any projects</p>
                            @else
                                @foreach($followProjects as $project)
                                <div class="row" style="margin: 0">
                                    <h5 class="project_title"><i class="ion-ios7-arrow-thin-right"></i><a href="{{route('detail.index', ['pid'=>$project->followable_id])}}">{{$project->followable->name}}</a></h5>
                                </div>
                                @endforeach
                            @endif
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