@include('includes/header_start')

<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{asset('')}}vendor/select2/css/select2.css" />
<link rel="stylesheet" href="{{asset('')}}vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
<link rel="stylesheet" href="{{asset('')}}vendor/datatables/media/css/dataTables.bootstrap4.css" />

@include('includes/header_end')

<!-- ==================
     PAGE CONTENT START
     ================== -->

<div class="page-content-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="card m-b-20">
                    <div class="card-body m-t-15 p-md-5 notify_body">
                        <div class="row m-0">
                            <div class="col-lg-10">
                                <table class="table table-borderless">
                                    <tbody>
                                    @if (!$myprojects->count())
                                        <p style="margin-left: 5px">There aren't any notification</p>
                                    @else
                                        @foreach($myprojects as $myproject)
                                            @if($myproject->table_type == 'Follow')
                                                <tr>
                                                    <td><i class="ion-ios7-arrow-thin-right"></i> <span style="font-weight: 600">{{$myproject->userFrom->getName()}}</span>  requested the follow for your project
                                                    <p class="small pl-md-5 m-0">Project Name: {{$myproject->project->name}}</p>
                                                    </td>
                                                    <td>

                                                            @if($myproject->follow->accepted == 0)

                                                            <a href="{{route('project.follow.accepted', ['fid'=>$myproject->follow->id, 'apt'=>1])}}" class="btn btn-default submit_btn">Confirm</a>
                                                            @else
                                                                <a href="{{route('project.follow.accepted', ['fid'=>$myproject->follow->id, 'apt'=>0])}}" class="btn btn-default reject_btn">Reject</a>
                                                            @endif
                                                            <a href="{{route('notification.delete', ['fid'=>$myproject->id])}}" class="btn btn-default cancel_btn">Delete</a>

                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td><i class="ion-ios7-arrow-thin-right"></i> <span style="font-weight: 600">{{$myproject->userFrom->getName()}}</span>  recommended you for follow recommend
                                                        <p class="small pl-md-5 m-0">Recommend Title: {{$myproject->recommend->body}}</p>
                                                        <p class="small pl-md-5 m-0">Project Name: {{$myproject->project->name}}</p>
                                                    </td>
                                                    <td>

                                                        <a href="{{route('notification.delete', ['fid'=>$myproject->id])}}" class="btn btn-default cancel_btn">Delete</a>

                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div><!-- container -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->

@include('includes/footer_start')

<!-- Specific Page Vendor -->
<script src="{{asset('')}}vendor/select2/js/select2.js"></script>
<script src="{{asset('')}}vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="{{asset('')}}vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/JSZip-2.5.0//jszip.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
<script src="{{asset('')}}vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>


<!-- Examples -->
<script src="{{asset('')}}js/examples/examples.datatables.default.js"></script>
<script src="{{asset('')}}js/examples/examples.datatables.row.with.details.js"></script>
<script src="{{asset('')}}js/examples/examples.datatables.tabletools.js"></script>

@include('includes/footer_end')