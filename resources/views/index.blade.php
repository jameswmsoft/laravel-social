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
                                    <h2 style="text-align: center;color: #0B7405;margin-bottom: 20px">UPDATES</h2>
                                    <div class="card m-b-30 update_project_body">
                                        <div class="card-body p-md-5">
                                            <div id="morris-area-example" class="dash-chart">

                                                @foreach($projects as $project)
                                                    <h6 class="update_project_title"><i class="ion-ios7-arrow-thin-right"></i><a href="{{route('detail.index', ['pid'=>$project->id])}}">{{$project->user->getName()}} Posted a Project on BioBox</a></h6>
                                                    @if($project->image != 'default.png')
                                                        <img class="img-fluid" src="{{asset('uploads/project')}}/{{$project->image}}" width="400" height="280"/>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 right-side">
                                    <div class="card m-b-30 update_project_right">
                                        <div class="card-body">
                                            <div id="morris-donut-example" class="dash-chart">

                                                <h4>You may also be interested in </h4>

                                                @if (Auth::user()->interestedProject())
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

                         </div>
            

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

@include('includes/footer_start')

        <!--Morris Chart-->
        <script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
        <script src="{{asset('assets/plugins/raphael/raphael-min.js')}}"></script>

        <script src="{{asset('assets/pages/dashborad.js')}}"></script>

@include('includes/footer_end')