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
                            <h3 class="mt-0 font-18 ml-md-1 mb-md-4"><span>Search results: {{$total}} Items contains "{{$query}}"</span></h3>

                            @if (!$results->count())
                                <p style="margin-left: 5px">There aren't any projects</p>
                            @else
                                <div class="row">
                                    <?php $i = 0 ?>
                                @foreach($results as $result)
                                    <?php ++$i; ?>
                                    <div class="@if($i == 3) col-md-12 @else col-md-6 @endif " style="text-align: center">

                                        @if(empty($result->avatar))
                                        <img src="{{asset('uploads/project')}}/{{$result->image}}" alt="150x150" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;">
                                        <h5 class="project_title">
                                            <a href="{{route('detail.index', ['pid'=>$result->id])}}"><span style="font-size: 13px">Project: </span>{{ucwords($result->name)}}</a>
                                        </h5>
                                        @else
                                            <img src="{{asset('uploads/user')}}/{{$result->avatar}}" alt="150x150" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;">
                                            <h5 class="project_title">
                                                <a href="{{route('profile.member', ['uid' => $result->id])}}"><span style="font-size: 13px">User: </span>{{ucwords($result->name)}}</a>
                                            </h5>
                                        @endif
                                    </div>

                                @endforeach
                                </div>
                            <div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-5">
                                    {!! $results->render() !!}
                                </div>

                            </div>

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